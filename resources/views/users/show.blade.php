@extends('layouts.public')

@section('title', $user->name)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
            <div>
                <a href="{{ route('users.edit', $user) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mr-2">
                    Edit
                </a>
                <a href="{{ route('users.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">
                    Back to List
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">User Information</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Name</p>
                    <p class="font-medium">{{ $user->name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="font-medium">{{ $user->email }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Created</p>
                    <p class="font-medium">{{ $user->created_at->format('M d, Y') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Posts</p>
                    <p class="font-medium">{{ $user->posts->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">User's Posts</h2>
            @forelse($user->posts as $post)
                <div class="border-b pb-4 mb-4 last:border-b-0">
                    <h3 class="font-semibold text-lg">{{ $post->title }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ $post->getSummary() }}</p>
                    <div class="flex items-center gap-4 text-xs text-gray-500">
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                        @if($post->published)
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Published</span>
                        @else
                            <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">Draft</span>
                        @endif
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">View</a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No posts yet</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
