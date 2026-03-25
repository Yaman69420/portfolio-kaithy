<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <title>Admin — {{ config('app.name') }}</title>

    <!-- Fonts: Space Grotesk (Bauhaus) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: var(--b-bg);
            color: var(--b-text);
        }
    </style>

    <!-- Dark mode: apply class before paint -->
    <script>
        (function () {
            const saved = localStorage.getItem('theme');
            if (saved === 'dark') {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
</head>
<body x-data="{ sidebarOpen: false }" class="antialiased">

    <!-- Mobile Header -->
    <header class="md:hidden border-b-2 p-4 flex items-center justify-between sticky top-0 z-40"
            style="background-color: var(--b-bg); border-color: var(--b-border);">
        <a href="/" class="text-xl font-bold uppercase tracking-tighter" style="color: var(--b-text);">
            {{ config('app.name') }}
        </a>
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 focus:outline-none" style="color: var(--b-text);">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
            </svg>
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
               class="fixed md:static inset-y-0 left-0 w-64 text-white p-0 z-50 transition-transform duration-300 ease-in-out flex flex-col"
               style="background-color: #1a1a1a;">

            <!-- Bauhaus colour bar at top of sidebar -->
            <div class="flex w-full h-2" aria-hidden="true">
                <div class="b-red" style="flex: 4"></div>
                <div class="b-yellow" style="flex: 3"></div>
                <div class="b-blue" style="flex: 5"></div>
            </div>

            <div class="p-8 space-y-8 flex-1">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold uppercase tracking-tighter text-white">Admin</h2>
                    <div class="flex items-center gap-2">
                        <!-- Dark mode toggle -->
                        <button x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }"
                                @click="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light'); document.documentElement.classList.toggle('dark', darkMode)"
                                class="p-1.5 border border-gray-600 hover:border-gray-400 transition-colors focus:outline-none text-gray-400 hover:text-white"
                                :title="darkMode ? 'Naar licht thema' : 'Naar donker thema'">
                            <svg x-show="darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 3v1m0 16v1m8.66-9h-1M4.34 12h-1m15.07-6.07-.71.71M6.34 17.66l-.71.71M17.66 17.66l.71.71M6.34 6.34l.71.71M12 8a4 4 0 100 8 4 4 0 000-8z"/>
                            </svg>
                            <svg x-show="!darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                            </svg>
                        </button>
                        <button @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <nav class="space-y-4">
                    <a href="{{ route('admin.index') }}" class="block text-xs uppercase tracking-widest font-bold text-gray-300 hover:text-white border-b border-gray-800 pb-4 transition-colors">Dashboard</a>
                    <a href="{{ route('admin.artworks.index') }}" class="block text-xs uppercase tracking-widest font-bold text-gray-300 hover:text-white border-b border-gray-800 pb-4 transition-colors">Kunstwerken</a>
                    <a href="{{ route('admin.categories.index') }}" class="block text-xs uppercase tracking-widest font-bold text-gray-300 hover:text-white border-b border-gray-800 pb-4 transition-colors">Categorieën</a>
                    <a href="{{ route('admin.profile.edit') }}" class="block text-xs uppercase tracking-widest font-bold text-gray-300 hover:text-white border-b border-gray-800 pb-4 transition-colors">Profiel</a>
                    <a href="/" target="_blank" class="block text-xs uppercase tracking-widest font-bold text-gray-500 hover:text-gray-300 transition-colors pt-2">↗ Bekijk site</a>
                </nav>

                <div class="border-t border-gray-800 pt-8">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs uppercase tracking-widest font-bold transition-colors" style="color: #e03a3e;">
                            Uitloggen
                        </button>
                        <p class="mt-4 text-[10px] text-gray-600 uppercase tracking-tighter">
                            {{ auth()->user()->email }}
                        </p>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-4 md:p-12 overflow-x-hidden" style="background-color: var(--b-bg);">
            @if(session('success'))
                <div class="mb-8 p-4 border-2 flex items-center gap-3" style="border-color: #0d5c9c; background-color: rgba(13,92,156,0.08);">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #0d5c9c;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <p class="text-xs font-bold uppercase tracking-widest" style="color: #0d5c9c;">{{ session('success') }}</p>
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>
</body>
</html>
