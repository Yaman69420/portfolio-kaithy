<x-layouts.app>
    <section class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <header class="text-center mb-16">
            <h1 class="text-5xl font-serif font-semibold mb-6 tracking-tight">Galerij</h1>
            <p class="text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">
                Een collectie van mijn meest recente werken, variërend van olieverfschilderijen tot abstracte sculpturen.
            </p>
        </header>

        <!-- Category Filters -->
        @if($categories->count() > 0)
            <div class="flex flex-wrap justify-center gap-4 mb-16">
                <a href="{{ route('artworks.index') }}" 
                   class="px-6 py-2.5 rounded-full text-xs font-semibold tracking-widest uppercase transition-all {{ !request('category') ? 'bg-black text-white shadow-lg' : 'bg-white border border-gray-100 text-gray-500 hover:border-gray-300' }}">
                    Alles
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('artworks.index', ['category' => $category->slug]) }}" 
                       class="px-6 py-2.5 rounded-full text-xs font-semibold tracking-widest uppercase transition-all {{ request('category') === $category->slug ? 'bg-black text-white shadow-lg' : 'bg-white border border-gray-100 text-gray-500 hover:border-gray-300' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        @endif

        @if($artworks->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($artworks as $artwork)
                    <x-ui.artwork-card :artwork="$artwork" />
                @endforeach
            </div>

            <div class="mt-20">
                {{ $artworks->links() }}
            </div>
        @else
            <div class="text-center py-40 bg-white rounded-2xl border border-dashed border-gray-200">
                <p class="text-gray-400 font-serif italic text-xl">Nog geen kunstwerken gevonden in deze categorie.</p>
                <a href="{{ route('artworks.index') }}" class="mt-4 inline-block text-black font-medium border-b border-black">Terug naar de volledige galerij</a>
            </div>
        @endif

        <x-ui.instagram-feed />
    </section>
</x-layouts.app>
