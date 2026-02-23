<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Store a newly created comment.
     */
    public function store(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string|min:3|max:1000',
        ]);

        $comment = $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('posts.show', $post)
            ->with('success', 'Comment added successfully!');
    }

    /**
     * Remove the specified comment.
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        // Only allow users to delete their own comments
        if (auth()->id() !== $comment->user_id) {
            abort(403, 'You can only delete your own comments.');
        }

        $postId = $comment->post_id;
        $comment->delete();

        return redirect()
            ->route('posts.show', $postId)
            ->with('success', 'Comment deleted successfully!');
    }
}
