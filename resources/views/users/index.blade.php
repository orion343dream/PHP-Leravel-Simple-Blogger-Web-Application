@extends('layouts.public')

@section('title', 'Users')

@section('content')
<!-- Page Header -->
<div class="bg-gradient-to-r from-blue-600 to-indigo-600 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-bold text-white mb-2">User Directory</h1>
                <p class="text-blue-100">Browse and manage all registered users</p>
            </div>
            <a href="{{ route('users.create') }}" class="btn-primary bg-white text-blue-600 hover:bg-gray-50">
                <svg class="w-5 h-5 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Create New User
            </a>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-lg mb-8 flex items-center shadow-sm">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="card">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Users</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $users->total() }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Active Users</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $users->total() }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Current Page</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $users->currentPage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($users as $user)
            <div class="card group">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mr-4 shadow-lg">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $user->email }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mb-4 py-3 px-4 bg-gray-50 rounded-lg">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-blue-600">{{ $user->posts->count() }}</p>
                            <p class="text-xs text-gray-500">Posts</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-purple-600">{{ $user->comments->count() }}</p>
                            <p class="text-xs text-gray-500">Comments</p>
                        </div>
                        <div class="text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $user->email_verified_at ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ $user->email_verified_at ? 'Verified' : 'Pending' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('users.show', $user) }}" class="flex-1 bg-blue-50 text-blue-600 px-4 py-2 rounded-lg text-center font-semibold hover:bg-blue-100 transition-colors">
                            View
                        </a>
                        <a href="{{ route('users.edit', $user) }}" class="flex-1 bg-indigo-50 text-indigo-600 px-4 py-2 rounded-lg text-center font-semibold hover:bg-indigo-100 transition-colors">
                            Edit
                        </a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-50 text-red-600 px-4 py-2 rounded-lg font-semibold hover:bg-red-100 transition-colors">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16">
                <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No Users Found</h3>
                <p class="text-gray-500 mb-4">Get started by creating your first user.</p>
                <a href="{{ route('users.create') }}" class="btn-primary inline-flex">Create User</a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $users->links() }}
    </div>
</div>
@endsection
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
