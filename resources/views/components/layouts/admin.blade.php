<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-black text-white p-8 space-y-8 hidden md:block">
            <h2 class="text-2xl font-serif font-bold">Admin</h2>
            <nav class="space-y-4">
                <a href="{{ route('admin.index') }}" class="block text-sm uppercase tracking-widest font-bold hover:text-gray-400">Dashboard</a>
                <a href="{{ route('admin.artworks.index') }}" class="block text-sm uppercase tracking-widest font-bold hover:text-gray-400">Kunstwerken</a>
                <a href="{{ route('admin.categories.index') }}" class="block text-sm uppercase tracking-widest font-bold hover:text-gray-400">Categorieën</a>
                <a href="{{ route('admin.profile.edit') }}" class="block text-sm uppercase tracking-widest font-bold hover:text-gray-400">Profiel</a>
                <a href="/" target="_blank" class="block text-sm uppercase tracking-widest font-bold hover:text-gray-400 opacity-50">Bekijk site</a>
            </nav>
            <div class="pt-8">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs uppercase tracking-widest font-bold text-red-400 hover:text-red-300">Uitloggen</button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-8 md:p-12">
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
