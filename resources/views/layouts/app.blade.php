<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nike Stories')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans">
    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-black">
                        NIKE
                    </a>
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-900 hover:text-gray-600 px-3 py-2 text-sm font-medium">Stories</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Featured</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Top Products</a>
                    
                    <!-- Auth Buttons -->
                    <div class="flex items-center space-x-4 ml-8">
                        <a href="{{ url('/login') }}" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Login</a>
                        <a href="{{ url('/signup') }}" class="bg-black text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-gray-800 transition-colors">Sign Up</a>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="text-gray-500 hover:text-gray-900">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">NIKE Stories</h3>
                    <p class="text-gray-400 text-sm">Stories that move you forward.</p>
                </div>
                <div>
                    <h4 class="font-medium mb-4">Stories</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">Featured</a></li>
                        <li><a href="#" class="hover:text-white">Athletes</a></li>
                        <li><a href="#" class="hover:text-white">Innovation</a></li>
                        <li><a href="#" class="hover:text-white">Community</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-medium mb-4">Products</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">Most Viewed</a></li>
                        <li><a href="#" class="hover:text-white">Top 5</a></li>
                        <li><a href="#" class="hover:text-white">New Releases</a></li>
                        <li><a href="#" class="hover:text-white">Best Sellers</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-medium mb-4">Connect</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white">Newsletter</a></li>
                        <li><a href="#" class="hover:text-white">Social Media</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-400">
                <p>&copy; 2025 Nike Stories. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
