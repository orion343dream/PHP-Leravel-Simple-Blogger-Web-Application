@extends('layouts.public')

@section('title', 'Posts')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Community Blog</h1>
                <p class="text-gray-600 mt-1">Explore projects and ideas shared by our community</p>
            </div>
            @auth
                <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition shadow-lg flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Create Post
                </a>
            @else
                <div class="text-center">
                    <p class="text-gray-600 text-sm mb-2">Want to share your ideas?</p>
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition shadow-lg inline-block">
                        Login to Post
                    </a>
                </div>
            @endauth
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($posts as $post)
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                    <div class="flex items-start justify-between mb-3">
                        <h2 class="text-xl font-bold text-gray-900 hover:text-blue-600">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </h2>
                        @if($post->published)
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Published</span>
                        @else
                            <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">Draft</span>
                        @endif
                    </div>
                    
                    <p class="text-gray-600 mb-4">{{ $post->getSummary() }}</p>
                    
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-xs">
                                {{ strtoupper(substr($post->user->name, 0, 1)) }}
                            </div>
                            <span>{{ $post->user->name }}</span>
                        </div>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t">
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center">
                            Read More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        
                        @auth
                            @if(auth()->id() === $post->user_id)
                                <div class="flex gap-2">
                                    <a href="{{ route('posts.edit', $post) }}" class="text-indigo-600 hover:text-indigo-800 text-sm">Edit</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm" onclick="return confirm('Delete this post?')">Delete</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-12 bg-gray-50 rounded-lg">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-600 mb-4">No posts found.</p>
                    @auth
                        <a href="{{ route('posts.create') }}" class="text-blue-600 hover:underline">Create the first post</a>
                    @else
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up to create a post</a>
                    @endauth
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
