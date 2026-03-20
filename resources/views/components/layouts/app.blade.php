<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <title>{{ config('app.name', 'Kaithy Portfolio') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fcfaf7;
            color: #1a1a1a;
        }
        h1, h2, h3, h4, .serif {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col">
    <x-navigation.main />

    <main class="flex-grow container mx-auto px-4 py-12">
        {{ $slot }}
    </main>

    <footer class="py-12 border-t border-gray-100 bg-white/50">
        <div class="container mx-auto px-4 text-center text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
