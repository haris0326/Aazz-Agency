<?php

namespace App\Http\Controllers;

use App\Models\BlogModel\Blog;
use App\Models\BlogModel\BlogComment;
use App\Rules\NoUrlInText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogCommentController extends Controller
{
    /**
     * PUBLIC — visitor submits a comment on a blog post.
     * Every new comment starts as 'pending' and only becomes
     * visible once an admin approves it from the admin panel.
     */
    public function store(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'name'    => 'required|string|min:2|max:100',
            'email'   => [
                'required',
                'string',
                'email',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@(gmail|hotmail|yahoo)\.com$/i',
            ],
            'message' => [
                'required',
                'string',
                'min:5',
                'max:3000', // hard cap — no comment can exceed 3000 characters
                new NoUrlInText(),
            ],
        ], [
            'email.regex' => 'Only Gmail, Hotmail or Yahoo email addresses are accepted.',
            'message.max' => 'Comments can be at most 3000 characters long.',
        ]);

        try {
            $comment = BlogComment::create([
                'blog_id'    => $blog->id,
                'name'       => $validated['name'],
                'email'      => $validated['email'],
                'message'    => $validated['message'],
                'status'     => 'pending',
                'ip_address' => $request->ip(),
            ]);

            Log::info('Blog comment submitted.', [
                'comment_id' => $comment->id,
                'blog_id'    => $blog->id,
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Thanks! Your comment has been submitted and is awaiting approval.',
            ]);
        } catch (\Throwable $e) {
            Log::error('Blog comment submission failed.', [
                'blog_id' => $blog->id,
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'status'  => 'error',
                'message' => 'Could not submit your comment. Please try again.',
            ], 500);
        }
    }

    /**
     * ADMIN — list all comments, optionally filtered by status
     * (pending / approved / rejected) and a text search.
     */
    public function index(Request $request)
    {
        $statusFilter = $request->input('status', 'all'); // all | pending | approved | rejected
        $search       = trim((string) $request->input('search'));

        $query = BlogComment::with('blog')->latest();

        if (in_array($statusFilter, ['pending', 'approved', 'rejected'], true)) {
            $query->where('status', $statusFilter);
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $comments = $query->paginate(20)->withQueryString();

        $counts = [
            'all'      => BlogComment::count(),
            'pending'  => BlogComment::where('status', 'pending')->count(),
            'approved' => BlogComment::where('status', 'approved')->count(),
            'rejected' => BlogComment::where('status', 'rejected')->count(),
        ];

        return view('admin_panel.blog_comments.index', compact('comments', 'statusFilter', 'counts'));
    }

    /**
     * ADMIN — approve / reject / reset a comment's status.
     */
    public function updateStatus(Request $request, BlogComment $comment)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $comment->update(['status' => $validated['status']]);

        Log::info('Blog comment status updated.', [
            'comment_id' => $comment->id,
            'status'     => $validated['status'],
        ]);

        return back()->with('success', 'Comment status updated.');
    }

    /**
     * ADMIN — permanently delete a comment.
     */
    public function destroy(BlogComment $comment)
    {
        $comment->delete();

        Log::info('Blog comment deleted.', ['comment_id' => $comment->id]);

        return back()->with('success', 'Comment deleted.');
    }
}