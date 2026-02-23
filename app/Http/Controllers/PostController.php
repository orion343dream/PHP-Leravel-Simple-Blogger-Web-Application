<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * PostController - Demonstrates RESTful CRUD operations
 */
class PostController extends Controller
{
    /**
     * Display a listing of posts.
     */
    public function index(): View
    {
        $posts = Post::with('user')
            ->published()
            ->latest()
            ->paginate(15);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        
        // Assign the authenticated user as the post author
        $validated['user_id'] = auth()->id();

        $post = Post::create($validated);

        return redirect()
            ->route('posts.show', $post)
            ->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified post.
     */
    public function show(Post $post): View
    {
        $post->load(['user', 'comments.user']);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post): View
    {
        // Authorization: only post owner can edit
        if (auth()->id() !== $post->user_id) {
            abort(403, 'You can only edit your own posts.');
        }
        
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        // Authorization: only post owner can update
        if (auth()->id() !== $post->user_id) {
            abort(403, 'You can only update your own posts.');
        }
        
        $validated = $request->validated();

        $post->update($validated);

        return redirect()
            ->route('posts.show', $post)
            ->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        // Authorization: only post owner can delete
        if (auth()->id() !== $post->user_id) {
            abort(403, 'You can only delete your own posts.');
        }
        
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
