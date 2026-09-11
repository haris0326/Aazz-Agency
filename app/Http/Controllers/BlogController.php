<?php

namespace App\Http\Controllers;

use App\Models\BlogModel\Blog;
use App\Models\BlogModel\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Admin listing — drafts and published mixed together, most recent
     * activity always on top, exactly like the Services list.
     */
    public function index(Request $request)
    {
        $statusFilter = $request->input('status', 'all'); // all | published | draft
        $search       = trim((string) $request->input('search'));
        $categoryId   = $request->input('blog_category_id');

        $query = Blog::with('category')->orderByDesc('updated_at');

        if ($statusFilter === 'published') {
            $query->where('status', 'published');
        } elseif ($statusFilter === 'draft') {
            $query->where('status', 'draft');
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        if ($categoryId) {
            $query->where('blog_category_id', $categoryId);
        }

        $blogs      = $query->paginate($request->integer('per_page', 15))->withQueryString();
        $categories = BlogCategory::orderBy('name')->get();

        return view('admin_panel.blog.index', compact('blogs', 'categories', 'statusFilter'));
    }

    public function create()
    {
        $categories = BlogCategory::orderBy('name')->get();

        return view('admin_panel.blog.add_blog', compact('categories'));
    }

    public function edit($id)
    {
        $blog       = Blog::with('seo')->findOrFail($id);
        $categories = BlogCategory::orderBy('name')->get();

        return view('admin_panel.blog.edit_blog', compact('blog', 'categories'));
    }

    /**
     * Silent autosave — creates the blog row on the very first call (status
     * stays 'draft'), then updates the same row by id on every call after.
     * No field is required here; a draft is allowed to be incomplete.
     */
    public function autosaveDraft(Request $request)
    {
        $validated = $request->validate([
            'blog_id'                  => 'nullable|integer|exists:blogs,id',
            'payload'                  => 'required|array',
            'payload.title'            => 'nullable|string|max:255',
            'payload.slug'             => 'nullable|string|max:255',
            'payload.content'          => 'nullable|string',
            'payload.blog_category'    => 'nullable|string|max:255',
            'payload.tags'             => 'nullable|string',
            'payload.meta_title'       => 'nullable|string|max:255',
            'payload.meta_description' => 'nullable|string',
            'payload.meta_keywords'    => 'nullable|string|max:255',
        ]);

        $payload = $validated['payload'];

        try {
            $blog = DB::transaction(function () use ($validated, $payload) {
                $tags = null;
                if (!empty($payload['tags'])) {
                    $tags = array_values(array_filter(array_map('trim', explode(',', $payload['tags']))));
                }

                $blogData = [
                    'title'            => $payload['title'] ?? null,
                    'content'          => $payload['content'] ?? null,
                    'blog_category_id' => $this->resolveCategory($payload['blog_category'] ?? null),
                    'tags'             => $tags,
                    'status'           => 'draft',
                    'author_id'        => auth()->id(),
                ];

                if (!empty($payload['slug'])) {
                    $blogData['slug'] = Str::slug($payload['slug']);
                }

                if (!empty($validated['blog_id'])) {
                    $blog = Blog::findOrFail($validated['blog_id']);
                    $blog->update($blogData);
                } else {
                    $blog = Blog::create($blogData);
                }

                $blog->seo()->updateOrCreate(
                    ['blog_id' => $blog->id],
                    [
                        'meta_title'       => $payload['meta_title'] ?? null,
                        'meta_description' => $payload['meta_description'] ?? null,
                        'meta_keywords'    => $payload['meta_keywords'] ?? null,
                    ]
                );

                return $blog;
            });

            Log::info('Blog draft autosaved.', [
                'blog_id'  => $blog->id,
                'admin_id' => auth()->id(),
            ]);

            return response()->json([
                'status'   => 'success',
                'blog_id'  => $blog->id,
                'saved_at' => now()->toDateTimeString(),
            ]);
        } catch (\Throwable $e) {
            Log::error('Blog draft autosave failed.', [
                'blog_id' => $validated['blog_id'] ?? null,
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
            ]);

            return response()->json(['status' => 'error', 'message' => 'Could not save draft.'], 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'blog_id'           => 'nullable|integer|exists:blogs,id',
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255',
            'content'           => 'required|string',
            'blog_category'     => 'nullable|string|max:255',
            'tags'              => 'nullable|string',
            'featured_image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'meta_title'        => 'required|string|max:255',
            'meta_description'  => 'required|string|max:500',
            'meta_keywords'     => 'nullable|string|max:255',
        ]);

        try {
            $blog = DB::transaction(function () use ($validated, $request) {
                $blog = !empty($validated['blog_id'])
                    ? Blog::findOrFail($validated['blog_id'])
                    : new Blog();

                $blog->title            = $validated['title'];
                $blog->slug             = $this->generateUniqueSlug($validated['title'], $validated['slug'] ?? null, $blog->id);
                $blog->content          = $validated['content'];
                $blog->blog_category_id = $this->resolveCategory($validated['blog_category'] ?? null);
                $blog->author_id        = auth()->id();
                $blog->status           = 'published';
                $blog->published_at     = $blog->published_at ?? now();

                if (!empty($validated['tags'])) {
                    $blog->tags = array_values(array_filter(array_map('trim', explode(',', $validated['tags']))));
                }

                if ($request->hasFile('featured_image')) {
                    if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
                        @unlink(public_path($blog->featured_image));
                    }
                    $image     = $request->file('featured_image');
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('uploads/blogs'), $imageName);
                    $blog->featured_image = 'uploads/blogs/' . $imageName;
                }

                $blog->save();

                $blog->seo()->updateOrCreate(
                    ['blog_id' => $blog->id],
                    [
                        'meta_title'       => $validated['meta_title'],
                        'meta_description' => $validated['meta_description'],
                        'meta_keywords'    => $validated['meta_keywords'] ?? null,
                    ]
                );

                return $blog;
            });

            Log::info('Blog published.', ['blog_id' => $blog->id, 'slug' => $blog->slug]);

            return redirect()->route('blog.index')->with('success', 'Blog post published successfully.');
        } catch (\Throwable $e) {
            Log::error('Blog publish failed.', [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
            ]);

            return back()->withInput()->with('error', 'Could not publish: ' . $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255',
            'content'           => 'required|string',
            'blog_category'     => 'nullable|string|max:255',
            'tags'              => 'nullable|string',
            'featured_image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'meta_title'        => 'required|string|max:255',
            'meta_description'  => 'required|string|max:500',
            'meta_keywords'     => 'nullable|string|max:255',
        ]);

        $blog = Blog::findOrFail($id);

        try {
            DB::transaction(function () use ($validated, $request, $blog) {
                $blog->title            = $validated['title'];
                $blog->slug             = $this->generateUniqueSlug($validated['title'], $validated['slug'] ?? null, $blog->id);
                $blog->content          = $validated['content'];
                $blog->blog_category_id = $this->resolveCategory($validated['blog_category'] ?? null);
                $blog->status           = 'published';
                $blog->published_at     = $blog->published_at ?? now();

                $blog->tags = !empty($validated['tags'])
                    ? array_values(array_filter(array_map('trim', explode(',', $validated['tags']))))
                    : null;

                if ($request->hasFile('featured_image')) {
                    if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
                        @unlink(public_path($blog->featured_image));
                    }
                    $image     = $request->file('featured_image');
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('uploads/blogs'), $imageName);
                    $blog->featured_image = 'uploads/blogs/' . $imageName;
                }

                $blog->save();

                $blog->seo()->updateOrCreate(
                    ['blog_id' => $blog->id],
                    [
                        'meta_title'       => $validated['meta_title'],
                        'meta_description' => $validated['meta_description'],
                        'meta_keywords'    => $validated['meta_keywords'] ?? null,
                    ]
                );
            });

            Log::info('Blog updated.', ['blog_id' => $blog->id]);

            return redirect()->route('blog.index')->with('success', 'Blog post updated successfully.');
        } catch (\Throwable $e) {
            Log::error('Blog update failed.', ['blog_id' => $id, 'message' => $e->getMessage()]);

            return back()->withInput()->with('error', 'Could not update: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
            @unlink(public_path($blog->featured_image));
        }

        $blog->delete(); // blog_seo cascades automatically

        Log::info('Blog deleted.', ['blog_id' => $id]);

        return redirect()->route('blog.index')->with('success', 'Blog post deleted successfully.');
    }

   /**
     * Public single-post page.
     * Fetches the post, related posts (same category first, then
     * recent fallback), and a rough reading-time estimate.
     */
    /**
     * ============================================================
     *  DROP-IN REPLACEMENT for BlogController::show()
     *  Replaces the version from before — only change is the
     *  addition of $comments (approved comments for this post).
     * ============================================================
 */

    public function show($slug)
    {
        $blog = Blog::published()
            ->with(['category', 'seo', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();

        $blog->increment('views');

        // Related posts — prefer same category, top up with recent posts
        // if the category doesn't have enough published siblings.
        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->when($blog->blog_category_id, fn ($q) => $q->where('blog_category_id', $blog->blog_category_id))
            ->latest('published_at')
            ->take(4)
            ->get();

        if ($relatedBlogs->count() < 3) {
            $fill = Blog::published()
                ->where('id', '!=', $blog->id)
                ->whereNotIn('id', $relatedBlogs->pluck('id'))
                ->latest('published_at')
                ->take(3 - $relatedBlogs->count())
                ->get();

            $relatedBlogs = $relatedBlogs->merge($fill);
        }

        // ~200 words per minute, minimum 1 minute
        $wordCount = str_word_count(strip_tags((string) $blog->content));
        $readTime  = max(1, (int) ceil($wordCount / 200));

        // Only approved comments are ever shown publicly.
        $comments = $blog->approvedComments()->get();

        return view('blog_show', compact('blog', 'relatedBlogs', 'readTime', 'comments'));
    }

    /**
     * CKEditor 4 classic "Upload" tab handler — response format is
     * CKEditor's own callback script, not JSON.
     */
    public function uploadEditorImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $funcNum   = $request->query('CKEditorFuncNum');
        $image     = $request->file('upload');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/blogs/content'), $imageName);
        $url = asset('uploads/blogs/content/' . $imageName);

        Log::info('Blog editor image uploaded.', ['url' => $url]);

        return response()->make(
            "<script>window.parent.CKEDITOR.tools.callFunction({$funcNum}, " . json_encode($url) . ", '');</script>"
        );
    }

    private function generateUniqueSlug(string $title, ?string $desiredSlug, ?int $ignoreId = null): string
    {
        $base = Str::slug($desiredSlug ?: $title);
        if ($base === '') {
            $base = 'post';
        }

        $slug = $base;
        $i = 2;
        while (
            Blog::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }

    private function resolveCategory(?string $name): ?int
    {
        $name = trim((string) $name);

        if ($name === '') {
            return null;
        }

        $category = BlogCategory::firstOrCreate(
            ['slug' => Str::slug($name)],
            ['name' => $name]
        );

        return $category->id;
    }


}