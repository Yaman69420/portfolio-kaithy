<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <title>Admin - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data="{ sidebarOpen: false }" class="bg-gray-50 font-sans antialiased">
    <!-- Mobile Header -->
    <header class="md:hidden bg-white border-b border-gray-100 p-4 flex items-center justify-between sticky top-0 z-40">
        <a href="/" class="text-xl font-serif font-bold tracking-tight">{{ config('app.name') }}</a>
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 text-gray-500 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
        </button>
    </header>

    <div class="min-h-screen flex">
        <!-- Sidebar Overlay (Mobile) -->
        <div x-show="sidebarOpen" 
             x-cloak
             @click="sidebarOpen = false" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 md:hidden"></div>

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
               class="fixed md:static inset-y-0 left-0 w-64 bg-black text-white p-8 space-y-8 z-50 transition-transform duration-300 ease-in-out">
            
            <div class="flex items-center justify-between md:block">
                <h2 class="text-2xl font-serif font-bold">Admin</h2>
                <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <nav class="space-y-4">
                <a href="{{ route('admin.index') }}" class="block text-sm uppercase tracking-widest font-bold hover:text-gray-400">Dashboard</a>
                <a href="{{ route('admin.artworks.index') }}" class="block text-sm uppercase tracking-widest font-bold hover:text-gray-400">Kunstwerken</a>
                <a href="{{ route('admin.categories.index') }}" class="block text-sm uppercase tracking-widest font-bold hover:text-gray-400">Categorieën</a>
                <a href="{{ route('admin.profile.edit') }}" class="block text-sm uppercase tracking-widest font-bold hover:text-gray-400">Profiel</a>
                <a href="/" target="_blank" class="block text-sm uppercase tracking-widest font-bold hover:text-gray-400 opacity-50 border-t border-gray-800 pt-4">Bekijk site</a>
            </nav>
            <div class="pt-8 border-t border-gray-800">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs uppercase tracking-widest font-bold text-red-400 hover:text-red-300">Uitloggen</button>
                    <p class="mt-4 text-[10px] text-gray-600 uppercase tracking-tighter">Ingelogd als {{ auth()->user()->email }}</p>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-4 md:p-12 overflow-x-hidden">
            @if(session('success'))
                <div class="mb-8 p-4 bg-green-100 text-green-700 rounded-xl border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>
</body>
</html>
