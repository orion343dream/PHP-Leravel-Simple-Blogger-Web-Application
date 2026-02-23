@extends('layouts.public')

@section('title', 'Edit Post')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Edit Post</h1>
                <p class="text-gray-600 mt-1">Update your post content</p>
            </div>
            <a href="{{ route('posts.show', $post) }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Cancel
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Post Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" 
                           placeholder="Enter a catchy title for your post..."
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                    <textarea name="content" id="content" rows="12" 
                              placeholder="Share your thoughts, project details, or ideas..."
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('content') border-red-500 @enderror">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-gray-500">Minimum 10 characters</p>
                </div>

                <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="published" value="1" {{ old('published', $post->published) ? 'checked' : '' }} 
                               class="rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500 w-5 h-5">
                        <span class="ml-3">
                            <span class="text-sm font-medium text-gray-900">Published</span>
                            <span class="block text-xs text-gray-500">Uncheck to save as draft</span>
                        </span>
                    </label>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition shadow-lg font-semibold">
                        Update Post
                    </button>
                    <a href="{{ route('posts.show', $post) }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
