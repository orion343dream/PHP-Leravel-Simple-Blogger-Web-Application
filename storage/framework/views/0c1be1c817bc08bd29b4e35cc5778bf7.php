

<?php $__env->startSection('title', 'Edit Post'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Edit Post</h1>
                <p class="text-gray-600 mt-1">Update your post content</p>
            </div>
            <a href="<?php echo e(route('posts.show', $post)); ?>" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Cancel
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <form action="<?php echo e(route('posts.update', $post)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Post Title *</label>
                    <input type="text" name="title" id="title" value="<?php echo e(old('title', $post->title)); ?>" 
                           placeholder="Enter a catchy title for your post..."
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                    <textarea name="content" id="content" rows="12" 
                              placeholder="Share your thoughts, project details, or ideas..."
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('content', $post->content)); ?></textarea>
                    <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <p class="mt-1 text-sm text-gray-500">Minimum 10 characters</p>
                </div>

                <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="published" value="1" <?php echo e(old('published', $post->published) ? 'checked' : ''); ?> 
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
                    <a href="<?php echo e(route('posts.show', $post)); ?>" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sadar\OneDrive\Desktop\Redcode\laravel-11-internship\resources\views/posts/edit.blade.php ENDPATH**/ ?>