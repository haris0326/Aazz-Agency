<?php

namespace App\Http\Controllers;

use App\Models\BlogModel\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search'));

        $query = BlogCategory::withCount('blogs')->orderBy('name');

        if ($search !== '') {
            $query->where('name', 'like', "%{$search}%");
        }

        $categories = $query->paginate($request->integer('per_page', 15))->withQueryString();

        return view('admin_panel.blog_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin_panel.blog_categories.create');
    }

    // Handles both the standalone "Add Category" admin page AND the
    // quick AJAX create call (kept for backward compatibility — not
    // used anymore now that the blog form auto-creates categories itself).
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name',
        ]);

        $category = BlogCategory::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        Log::info('Blog category created.', ['id' => $category->id, 'name' => $category->name]);

        if ($request->wantsJson()) {
            return response()->json(['status' => 'success', 'category' => $category]);
        }

        return redirect()->route('blog-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);

        return view('admin_panel.blog_categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        Log::info('Blog category updated.', ['id' => $category->id]);

        return redirect()->route('blog-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete(); // blogs.blog_category_id auto-nulls (FK onDelete set null)

        Log::info('Blog category deleted.', ['id' => $id]);

        return redirect()->route('blog-categories.index')->with('success', 'Category deleted. Posts in it are now uncategorized.');
    }
}