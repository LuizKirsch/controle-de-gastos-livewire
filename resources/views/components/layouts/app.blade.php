<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 shadow-md">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <!-- Logo/Title -->
            <a href="/" class="text-white text-2xl font-semibold">{{ config('app.name') }}</a>

            <!-- User info (if authenticated) -->
            @auth
                <div class="text-white">
                    <span class="mr-4">Olá, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">
                            Sair
                        </button>
                    </form>
                </div>
            @endauth

            <!-- Hamburger Menu Icon -->
            <div class="lg:hidden flex items-center">
                <button id="menu-toggle" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex space-x-6">
                <a href="{{route('home')}}" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Início</a>
                <a href="{{route('expenses')}}" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Gastos</a>
                <a href="#" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Serviços</a>
                <a href="#" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Contato</a>
            </div>
        </div>

        <!-- Mobile Menu (hidden by default) -->
        <div id="mobile-menu" class="lg:hidden hidden">
            <div class="flex flex-col space-y-4 p-4">
                <a href="{{route('home')}}" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Início</a>
                <a href="{{route('expenses')}}" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Gastos</a>
                <a href="#" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Serviços</a>
                <a href="#" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Contato</a>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="container mx-auto py-10">
        {{ $slot }}
    </main>

    @livewireScripts

    <script>
        // Toggle mobile menu
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
