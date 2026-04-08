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

    @php
        $palette = \App\Models\SiteSettings::get('color_palette', '');
        $palettes = [
            'bordeaux'      => ['red'=>'#8C3040','blue'=>'#4F6478','yellow'=>'#D8CBBA','bg'=>'#EDE6DA','text'=>'#131C27','surface'=>'#F5F1EA','border'=>'#131C27','dark_bg'=>'#131C27','dark_text'=>'#D8CBBA','dark_surface'=>'#2D3E50','dark_border'=>'#D8CBBA'],
            'naval'         => ['red'=>'#3D6F87','blue'=>'#1D3A52','yellow'=>'#C2B898','bg'=>'#E8E4CE','text'=>'#1D3A52','surface'=>'#F2EFE1','border'=>'#1D3A52','dark_bg'=>'#1D3A52','dark_text'=>'#D9D3B3','dark_surface'=>'#263E52','dark_border'=>'#D9D3B3'],
            'atelier'       => ['red'=>'#8B2D2D','blue'=>'#4A5550','yellow'=>'#EEE8D4','bg'=>'#F2EDE0','text'=>'#1D2320','surface'=>'#FAF8F2','border'=>'#1D2320','dark_bg'=>'#1D2320','dark_text'=>'#EEE8D4','dark_surface'=>'#2A3330','dark_border'=>'#EEE8D4'],
            'noir'          => ['red'=>'#C0392B','blue'=>'#2C3E50','yellow'=>'#E8D5A3','bg'=>'#F5F5F5','text'=>'#111111','surface'=>'#FFFFFF','border'=>'#111111','dark_bg'=>'#111111','dark_text'=>'#F0F0F0','dark_surface'=>'#1C1C1C','dark_border'=>'#F0F0F0'],
            'midnight'      => ['red'=>'#4FC3F7','blue'=>'#1565C0','yellow'=>'#FFA726','bg'=>'#F0F4F8','text'=>'#0D1117','surface'=>'#FFFFFF','border'=>'#30363D','dark_bg'=>'#0D1117','dark_text'=>'#C9D1D9','dark_surface'=>'#161B22','dark_border'=>'#30363D'],
            'foret'         => ['red'=>'#52B788','blue'=>'#2D6A4F','yellow'=>'#D4A017','bg'=>'#EDF7EE','text'=>'#0D1B0F','surface'=>'#FFFFFF','border'=>'#2D6A4F','dark_bg'=>'#0D1B0F','dark_text'=>'#C8E6C9','dark_surface'=>'#132115','dark_border'=>'#52B788'],
            'bordeaux-nuit' => ['red'=>'#C62A47','blue'=>'#8B4513','yellow'=>'#D4AF37','bg'=>'#F5EDE8','text'=>'#160B0D','surface'=>'#FFFFFF','border'=>'#C62A47','dark_bg'=>'#160B0D','dark_text'=>'#F0E6D3','dark_surface'=>'#1F1215','dark_border'=>'#C62A47'],
        ];
        $p = $palettes[$palette] ?? null;

        // ── Custom palette ──
        $customColors = null;
        if ($palette === 'custom') {
            $customColors = [
                'c1' => \App\Models\SiteSettings::get('custom_c1', '#e03a3e'),
                'c2' => \App\Models\SiteSettings::get('custom_c2', '#f7b11c'),
                'c3' => \App\Models\SiteSettings::get('custom_c3', '#0d5c9c'),
                'c4' => \App\Models\SiteSettings::get('custom_c4', '#1a1a1a'),
                'c5' => \App\Models\SiteSettings::get('custom_c5', '#f4f4f4'),
            ];
        }
    @endphp
    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: var(--b-bg);
            color: var(--b-text);
        }
        @if($p)
        :root {
            --b-red: {{ $p['red'] }};
            --b-blue: {{ $p['blue'] }};
            --b-yellow: {{ $p['yellow'] }};
            --b-bg: {{ $p['bg'] }};
            --b-text: {{ $p['text'] }};
            --b-surface: {{ $p['surface'] }};
            --b-border: {{ $p['border'] }};
        }
        html.dark {
            --b-bg: {{ $p['dark_bg'] }};
            --b-text: {{ $p['dark_text'] }};
            --b-surface: {{ $p['dark_surface'] }};
            --b-border: {{ $p['dark_border'] }};
        }
        @endif
        @if($customColors)
        :root {
            --b-red:     {{ $customColors['c1'] }};
            --b-yellow:  {{ $customColors['c2'] }};
            --b-blue:    {{ $customColors['c3'] }};
            --b-bg:      {{ $customColors['c5'] }};
            --b-text:    {{ $customColors['c4'] }};
            --b-surface: {{ $customColors['c5'] }};
            --b-border:  {{ $customColors['c4'] }};
        }
        html.dark {
            --b-bg:      {{ $customColors['c4'] }};
            --b-text:    {{ $customColors['c5'] }};
            --b-surface: {{ $customColors['c4'] }};
            --b-border:  {{ $customColors['c5'] }};
        }
        @endif
    </style>

    <!-- Dark mode: dark is default; only go light if explicitly saved -->
    <script>
        (function () {
            const saved = localStorage.getItem('theme');
            if (saved !== 'light') {
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
                        <!-- Dark mode pill toggle -->
                        <button x-data="{ darkMode: localStorage.getItem('theme') !== 'light' }"
                                @click="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light'); document.documentElement.classList.toggle('dark', darkMode)"
                                :title="darkMode ? 'Naar licht thema' : 'Naar donker thema'"
                                class="relative inline-flex items-center h-6 w-11 rounded-full focus:outline-none transition-colors duration-300 shrink-0"
                                :style="darkMode ? 'background-color:#0d5c9c;' : 'background-color:#9ca3af;'">
                            <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-white shadow transition-transform duration-300"
                                  :style="darkMode ? 'transform:translateX(22px)' : 'transform:translateX(2px)'">
                                <svg x-show="!darkMode" class="w-2.5 h-2.5" fill="none" stroke="#6b7280" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m8.66-9h-1M4.34 12h-1m15.07-6.07-.71.71M6.34 17.66l-.71.71M17.66 17.66l.71.71M6.34 6.34l.71.71M12 8a4 4 0 100 8 4 4 0 000-8z"/>
                                </svg>
                                <svg x-show="darkMode" class="w-2.5 h-2.5" fill="none" stroke="#0d5c9c" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                                </svg>
                            </span>
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
                    <a href="/" target="_blank" class="block text-xs uppercase tracking-widest font-bold text-gray-500 hover:text-gray-300 transition-colors pt-2">Bekijk site</a>
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
