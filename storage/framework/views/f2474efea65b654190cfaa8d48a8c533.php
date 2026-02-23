<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo $__env->yieldContent('title', config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <div class="min-h-screen">
            <!-- Enhanced Navigation -->
            <nav class="bg-white/90 backdrop-blur-lg shadow-lg sticky top-0 z-50 border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-20">
                        <div class="flex items-center">
                            <!-- Logo -->
                            <a href="/" class="flex items-center space-x-3 group">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                                    <?php echo e(config('app.name', 'Laravel')); ?>

                                </span>
                            </a>
                            
                            <!-- Desktop Navigation -->
                            <div class="hidden md:ml-10 md:flex md:space-x-2">
                                <a href="/" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 <?php echo e(request()->is('/') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900'); ?>">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    Home
                                </a>
                                <a href="/about" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 <?php echo e(request()->is('about') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900'); ?>">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    About
                                </a>
                                <a href="/posts" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 <?php echo e(request()->is('posts*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900'); ?>">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                    Blog
                                </a>
                            </div>
                        </div>
                        
                        <!-- Desktop Auth Buttons -->
                        <div class="hidden md:flex items-center space-x-4">
                            <?php if(auth()->guard()->check()): ?>
                                <span class="text-gray-700 text-sm">Welcome, <?php echo e(auth()->user()->name); ?></span>
                                <a href="<?php echo e(route('profile.edit')); ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Profile
                                </a>
                                <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                        Logout
                                    </button>
                                </form>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                                    Log in
                                </a>
                                <a href="<?php echo e(route('register')); ?>" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-lg font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                                    Register
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="pb-16">
                <?php echo $__env->yieldContent('content'); ?>
            </main>

            <!-- Enhanced Footer -->
            <footer class="bg-gray-900 text-white mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div class="col-span-1 md:col-span-2">
                            <h3 class="text-2xl font-bold mb-4 bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent"><?php echo e(config('app.name', 'Laravel')); ?></h3>
                            <p class="text-gray-400 mb-4">A modern developer community platform connecting professionals worldwide. Share projects, collaborate on ideas, and grow together.</p>
                            <div class="flex space-x-4">
                                <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-400 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-gray-600 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.840 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                </a>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                            <ul class="space-y-2 text-gray-400">
                                <li><a href="/" class="hover:text-blue-400 transition-colors">Home</a></li>
                                <li><a href="/about" class="hover:text-blue-400 transition-colors">About</a></li>
                                <li><a href="/users" class="hover:text-blue-400 transition-colors">Users</a></li>
                                <li><a href="/posts" class="hover:text-blue-400 transition-colors">Posts</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Resources</h4>
                            <ul class="space-y-2 text-gray-400">
                                <li><a href="/payment-demo" class="hover:text-blue-400 transition-colors">Payment Demo</a></li>
                                <li><a href="<?php echo e(route('login')); ?>" class="hover:text-blue-400 transition-colors">Login</a></li>
                                <li><a href="<?php echo e(route('register')); ?>" class="hover:text-blue-400 transition-colors">Register</a></li>
                                <li><a href="#" class="hover:text-blue-400 transition-colors">API Documentation</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                        <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Laravel')); ?>. Built with ❤️ using Laravel 11 & Tailwind CSS.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\sadar\OneDrive\Desktop\Redcode\laravel-11-internship\resources\views/layouts/public.blade.php ENDPATH**/ ?>