<!doctype html>
  
    <head>    
        @vite(['resources/css/app.css', 'resources/js/app.js']) 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        <title>Blog</title>
    </head>
<body class="flex flex-col min-h-screen bg-green-600 font-sans">
    <!--Navigation Bar-->
    <div class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <div>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:bg-gray-700 py-2 px-4">Home</a></li>
                <li><a href="{{route('blog.index')}}" class="hover:bg-gray-700 py-2 px-4">Blogs</a></li>
            </ul>
        </div>
        <div>
            <ul class="flex space-x-4">
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ route('users.show', [auth()->user()])}}" class="hover:bg-gray-700 py-2 px-4">{{auth()->user()->name}}</a></li>
                        <li><a href="#" class="hover:bg-gray-700 py-2 px-4">Sign Out</a></li>
                    @else 
                        <li><a href="{{ route('login') }}" class="hover:bg-gray-700 py-2 px-4">Login</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="hover:bg-gray-700 py-2 px-4">Register</a></li>
                    @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>

    <div class="flex-1 p-8">
        @yield('content')
    </div>

</body>
