<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of posts.
     */
    public function index(): JsonResponse
    {
        $posts = Post::with(['user', 'comments'])
            ->latest()
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $posts,
        ]);
    }

    /**
     * Store a newly created post.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'published' => 'boolean',
        ]);

        $post = Post::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Post created successfully',
            'data' => $post->load('user'),
        ], 201);
    }

    /**
     * Display the specified post.
     */
    public function show(Post $post): JsonResponse
    {
        $post->load(['user', 'comments.user']);

        return response()->json([
            'success' => true,
            'data' => $post,
        ]);
    }

    /**
     * Update the specified post.
     */
    public function update(Request $request, Post $post): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string|min:10',
            'published' => 'sometimes|boolean',
        ]);

        $post->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Post updated successfully',
            'data' => $post->load('user'),
        ]);
    }

    /**
     * Remove the specified post.
     */
    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully',
        ]);
    }
}
