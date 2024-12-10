<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head> 

<body style="background: url('{{ asset('storage/01JEKK8DZWHKFFAHRNPZ04SJ90.png') }}') no-repeat center center fixed; background-size: cover;">
    <header class="flex items-center justify-between py-3 px-6 border-b border-gray-100 bg-white sticky top-0 z-50 shadow-md">
        <div id="header-left" class="flex items-center">
            <div class="text-gray-800 font-semibold">
                <span class="text-xl">Blog</span> <span class="text-red-500 text-xl">&lt;AKB&gt;</span>
            </div>
            <div class="top-menu ml-10">
                <ul class="flex space-x-4">
                    <li>
                        <a class="flex space-x-2 items-center text-sm 
                            {{ Request::is('/') ? 'text-yellow-500' : 'text-gray-500 hover:text-yellow-500' }}" 
                            href="http://127.0.0.1:8000">
                            Home
                        </a>
                    </li>
                    
                    <li>
                        <a class="flex space-x-2 items-center text-sm 
                            {{ Request::is('blog') ? 'text-yellow-500' : 'text-gray-500 hover:text-yellow-500' }}" 
                            href="http://127.0.0.1:8000/blog">
                            Blog
                        </a>
                    </li>
                    
                    {{-- <li>
                        <a class="flex space-x-2 items-center text-sm 
                            {{ Request::is('about') ? 'text-yellow-500' : 'text-gray-500 hover:text-yellow-500' }}" 
                            href="http://127.0.0.1:8000/about">
                            About Me
                        </a>
                    </li> --}}
                    
                </ul>
            </div>
        </div>
    </header>
     
    
    <!-- Kontainer Utama -->
     <main class="min-h-screen flex items-center justify-center">
        <!-- Box Putih -->
        <div class="bg-white w-full max-w-6xl mx-auto p-10 rounded-lg shadow-lg">

            
            @yield('konten')
            
        </div>
    </main>
    <footer class="text-sm space-x-4 flex items-center border-t border-gray-100 flex-wrap justify-center py-4 border-gray-100 bg-white">
        {{--<a class="text-gray-500 hover:text-yellow-500" href="">About Me</a>
         <a class="text-gray-500 hover:text-yellow-500" href="">Help</a>
        <a class="text-gray-500 hover:text-yellow-500" href="">Login</a>
        <a class="text-gray-500 hover:text-yellow-500" href="">Explore</a> --}}
    </footer>
</body>
</html>
