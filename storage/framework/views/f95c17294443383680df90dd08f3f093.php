

<?php $__env->startSection('title', 'Welcome'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="absolute inset-0">
        <div class="absolute transform rotate-45 -top-1/2 -right-1/4 w-96 h-96 bg-white opacity-5 rounded-full"></div>
        <div class="absolute transform -rotate-45 -bottom-1/2 -left-1/4 w-96 h-96 bg-white opacity-5 rounded-full"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight animate-fade-in">
                Welcome to RedCode Intern Blog
                <span class="block text-blue-200 mt-2">Developer Community</span>
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto">
                Connect with developers worldwide. Share your projects, collaborate on ideas, and build meaningful relationships in our vibrant tech community.</p>
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="<?php echo e(route('register')); ?>" class="bg-white text-blue-600 px-10 py-4 rounded-xl font-bold text-lg shadow-2xl hover:shadow-3xl transform hover:scale-105 transition-all duration-200">
                    Start Learning Now
                    <svg class="w-5 h-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
                <a href="/about" class="bg-blue-500 bg-opacity-30 backdrop-blur-sm text-white px-10 py-4 rounded-xl font-bold text-lg border-2 border-white border-opacity-30 hover:bg-opacity-50 transition-all duration-200">
                    Learn More
                </a>
            </div>
            
            <!-- Stats -->
            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2">1000+</div>
                    <div class="text-blue-200">Community Members</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2">280+</div>
                    <div class="text-blue-200">Active Users</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2">500+</div>
                    <div class="text-blue-200">Projects Shared</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold mb-2">10+</div>
                    <div class="text-blue-200">API Integrations</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Platform Features</h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">Everything you need to connect, share, and grow as a developer</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Feature Card 1 -->
        <div class="card group">
            <div class="p-8">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 transition-transform shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">User Profiles</h3>
                <p class="text-gray-600 mb-4">Create and customize your developer profile. Showcase your skills, projects, and experience to the community.</p>
                <a href="<?php echo e(route('users.index')); ?>" class="text-blue-600 font-semibold inline-flex items-center hover:text-blue-700">
                    Browse Profiles
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

        <!-- Feature Card 2 -->
        <div class="card group">
            <div class="p-8">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 transition-transform shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Secure Authentication</h3>
                <p class="text-gray-600 mb-4">Login securely to create posts, manage your profile, and engage with the community.</p>
                <a href="<?php echo e(route('login')); ?>" class="text-purple-600 font-semibold inline-flex items-center hover:text-purple-700">
                    Sign In
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

        <!-- Feature Card 3 -->
        <div class="card group">
            <div class="p-8">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 transition-transform shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Content Sharing</h3>
                <p class="text-gray-600 mb-4">Share your projects, articles, and ideas. Get feedback and connect with other developers.</p>
                <a href="<?php echo e(route('posts.index')); ?>" class="text-green-600 font-semibold inline-flex items-center hover:text-green-700">
                    Browse Posts
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

        <!-- Feature Card 4 -->
        <div class="card group">
            <div class="p-8">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 transition-transform shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Community Engagement</h3>
                <p class="text-gray-600 mb-4">Comment on posts, participate in discussions, and build lasting connections.</p>
                <a href="<?php echo e(route('users.index')); ?>" class="text-orange-600 font-semibold inline-flex items-center hover:text-orange-700">
                    View Community
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

        <!-- Feature Card 5 -->
        <div class="card group">
            <div class="p-8">
                <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 transition-transform shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Blade Templates & UI</h3>
                <p class="text-gray-600 mb-4">Create dynamic views with Blade templating and Tailwind CSS for beautiful interfaces.</p>
                <a href="/posts" class="text-cyan-600 font-semibold inline-flex items-center hover:text-cyan-700">
                    View Posts
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

        <!-- Feature Card 6 -->
        <div class="card group">
            <div class="p-8">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 transition-transform shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Testing & Best Practices</h3>
                <p class="text-gray-600 mb-4">Write feature and unit tests using Pest PHP to ensure code quality and reliability.</p>
                <a href="/payment-demo" class="text-yellow-600 font-semibold inline-flex items-center hover:text-yellow-700">
                    Try Demo
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-white mb-6">Ready to Join Our Community?</h2>
        <p class="text-xl text-blue-100 mb-10">Connect with developers worldwide, share your projects, and grow your skills together.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?php echo e(route('register')); ?>" class="bg-white text-blue-600 px-10 py-4 rounded-xl font-bold text-lg shadow-2xl hover:shadow-3xl transform hover:scale-105 transition-all duration-200">
                Get Started Free
            </a>
            <a href="<?php echo e(route('users.index')); ?>" class="bg-blue-500 bg-opacity-30 backdrop-blur-sm text-white px-10 py-4 rounded-xl font-bold text-lg border-2 border-white border-opacity-30 hover:bg-opacity-50 transition-all duration-200">
                Explore Community
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sadar\OneDrive\Desktop\Redcode\laravel-11-internship\resources\views/welcome.blade.php ENDPATH**/ ?>