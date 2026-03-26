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
        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: var(--b-bg);
            color: var(--b-text);
        }
        h1, h2, h3, h4 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
        }
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
