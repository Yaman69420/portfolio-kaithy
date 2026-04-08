<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    @php use App\Models\SiteSettings; @endphp
    <title>{{ SiteSettings::get('site_name', config('app.name', 'Kaithy')) }}</title>

    <!-- Fonts: Space Grotesk (Bauhaus) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @font-face {
            font-family: 'Kaoly';
            src: url('{{ asset('fonts/kaoly/Kaoly.ttf') }}') format('truetype');
            font-weight: normal;
            font-display: swap;
        }
    </style>

    @php
        $palette = \App\Models\SiteSettings::get('color_palette', '');
        $palettes = [
            // ── Lichte paletten ──
            'bordeaux'      => ['red'=>'#8C3040','blue'=>'#4F6478','yellow'=>'#D8CBBA','bg'=>'#EDE6DA','text'=>'#131C27','surface'=>'#F5F1EA','border'=>'#131C27','dark_bg'=>'#131C27','dark_text'=>'#D8CBBA','dark_surface'=>'#2D3E50','dark_border'=>'#D8CBBA'],
            'naval'         => ['red'=>'#3D6F87','blue'=>'#1D3A52','yellow'=>'#C2B898','bg'=>'#E8E4CE','text'=>'#1D3A52','surface'=>'#F2EFE1','border'=>'#1D3A52','dark_bg'=>'#1D3A52','dark_text'=>'#D9D3B3','dark_surface'=>'#263E52','dark_border'=>'#D9D3B3'],
            'atelier'       => ['red'=>'#8B2D2D','blue'=>'#4A5550','yellow'=>'#EEE8D4','bg'=>'#F2EDE0','text'=>'#1D2320','surface'=>'#FAF8F2','border'=>'#1D2320','dark_bg'=>'#1D2320','dark_text'=>'#EEE8D4','dark_surface'=>'#2A3330','dark_border'=>'#EEE8D4'],
            // ── Donkere paletten (met lichte variant) ──
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

        // ── Font ──
        $font = \App\Models\SiteSettings::get('site_font', 'space-grotesk');
        $fontFamilies = [
            'space-grotesk' => "'Space Grotesk', sans-serif",
            'kaoly'         => "'Kaoly', sans-serif",
            'bebas-neue'    => "'Bebas Neue', sans-serif",
            'playfair'      => "'Playfair Display', serif",
            'cormorant'     => "'Cormorant Garamond', serif",
            'russo-one'     => "'Russo One', sans-serif",
            'cinzel'        => "'Cinzel Decorative', serif",
        ];
        $fontFamily = $fontFamilies[$font] ?? $fontFamilies['space-grotesk'];
        $googleFontMap = [
            'bebas-neue' => 'Bebas+Neue',
            'playfair'   => 'Playfair+Display:wght@700',
            'cormorant'  => 'Cormorant+Garamond:wght@700',
            'russo-one'  => 'Russo+One',
            'cinzel'     => 'Cinzel+Decorative:wght@400;700',
        ];
    @endphp

    {{-- Load selected Google Font if needed --}}
    @if(isset($googleFontMap[$font]))
        <link href="https://fonts.googleapis.com/css2?family={{ $googleFontMap[$font] }}&display=swap" rel="stylesheet">
    @endif

    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: var(--b-bg);
            color: var(--b-text);
        }
        h1, h2, h3, h4 {
            font-family: {!! $font === 'kaoly' ? "'Space Grotesk', sans-serif" : $fontFamily !!};
            font-weight: {{ in_array($font, ['bebas-neue', 'russo-one']) ? 'normal' : '700' }};
            text-transform: uppercase;
        }
        @if($font === 'kaoly')
        h1 {
            font-family: 'Kaoly', sans-serif;
            font-weight: normal;
        }
        @endif
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
<body class="antialiased min-h-screen flex flex-col">

    <!-- Bauhaus colour bar -->
    <div class="flex w-full h-2" aria-hidden="true">
        <div class="b-red" style="flex: 4"></div>
        <div class="b-yellow" style="flex: 3"></div>
        <div class="b-blue" style="flex: 5"></div>
    </div>

    <x-navigation.main />

    <main class="flex-grow container mx-auto px-4 py-12">
        {{ $slot }}
    </main>

    <footer class="py-10 border-t-2" style="border-color: var(--b-border); background-color: var(--b-surface);">
        <div class="container mx-auto px-4 text-center">
            <p class="text-xs font-bold uppercase tracking-widest" style="color: var(--b-text);">
                &copy; {{ date('Y') }} {{ SiteSettings::get('site_name', config('app.name')) }}
            </p>
        </div>
    </footer>
</body>
</html>
