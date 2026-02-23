

<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <a href="<?php echo e(route('posts.index')); ?>" class="text-blue-600 hover:underline flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Back to Posts
            </a>
            
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->id() === $post->user_id): ?>
                    <div>
                        <a href="<?php echo e(route('posts.edit', $post)); ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition mr-2">
                            Edit Post
                        </a>
                        <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition" onclick="return confirm('Are you sure you want to delete this post?')">
                                Delete Post
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <article class="bg-white rounded-lg shadow p-8">
            <div class="mb-6">
                <h1 class="text-4xl font-bold text-gray-900 mb-3"><?php echo e($post->title); ?></h1>
                <div class="flex items-center gap-4 text-sm text-gray-500">
                    <span>By <a href="<?php echo e(route('users.show', $post->user)); ?>" class="text-blue-600 hover:underline"><?php echo e($post->user->name); ?></a></span>
                    <span>•</span>
                    <span><?php echo e($post->created_at->format('F d, Y')); ?></span>
                    <span>•</span>
                    <?php if($post->published): ?>
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Published</span>
                    <?php else: ?>
                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">Draft</span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="prose max-w-none">
                <p class="text-gray-700 leading-relaxed whitespace-pre-line"><?php echo e($post->content); ?></p>
            </div>

            <div class="mt-8 pt-6 border-t">
                <h3 class="font-semibold mb-2">About the Author</h3>
                <p class="text-gray-600"><?php echo e($post->user->name); ?> has written <?php echo e($post->user->posts->count()); ?> posts.</p>
            </div>
        </article>

        <!-- Comments Section -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">
                Comments (<?php echo e($post->comments->count()); ?>)
            </h2>

            <?php if(auth()->guard()->check()): ?>
                <!-- Add Comment Form -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Add a Comment</h3>
                    <form action="<?php echo e(route('comments.store', $post)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-4">
                            <textarea 
                                name="content" 
                                rows="4" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                placeholder="Share your thoughts..."
                                required><?php echo e(old('content')); ?></textarea>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Post Comment
                        </button>
                    </form>
                </div>
            <?php else: ?>
                <!-- Login Prompt for Guests -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-lg p-8 mb-6 text-center">
                    <svg class="w-12 h-12 text-blue-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">You must login first</h3>
                    <p class="text-gray-700 mb-6">Join the conversation by logging in or creating an account</p>
                    <div class="flex gap-3 justify-center">
                        <a href="<?php echo e(route('login')); ?>" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition inline-flex items-center shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                            Log In
                        </a>
                        <a href="<?php echo e(route('register')); ?>" class="bg-white text-blue-600 px-8 py-3 rounded-lg border-2 border-blue-600 hover:bg-blue-50 transition inline-flex items-center shadow">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                            Register
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Comments List -->
            <div class="space-y-4">
                <?php $__empty_1 = true; $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold">
                                    <?php echo e(strtoupper(substr($comment->user->name, 0, 1))); ?>

                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900"><?php echo e($comment->user->name); ?></p>
                                    <p class="text-sm text-gray-500"><?php echo e($comment->created_at->diffForHumans()); ?></p>
                                </div>
                            </div>

                            <?php if(auth()->guard()->check()): ?>
                                <?php if(auth()->id() === $comment->user_id): ?>
                                    <form action="<?php echo e(route('comments.destroy', $comment)); ?>" method="POST" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm" onclick="return confirm('Delete this comment?')">
                                            Delete
                                        </button>
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <p class="text-gray-700 leading-relaxed"><?php echo e($comment->content); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="bg-gray-50 rounded-lg p-8 text-center">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <p class="text-gray-600">No comments yet. Be the first to share your thoughts!</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sadar\OneDrive\Desktop\Redcode\laravel-11-internship\resources\views/posts/show.blade.php ENDPATH**/ ?>