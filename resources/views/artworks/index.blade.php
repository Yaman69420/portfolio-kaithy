<x-layouts.app>
    <section class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        <!-- Bauhaus header -->
        <header class="mb-16 anim-slide" style="animation-delay: 0s;">
            <h1 class="text-7xl md:text-9xl font-bold uppercase tracking-tighter leading-none" style="color: var(--b-text);">
                Galerij
            </h1>
            <div class="flex mt-4 mb-6" aria-hidden="true">
                <div class="h-2 w-24 b-red"></div>
                <div class="h-2 w-16 b-yellow"></div>
                <div class="h-2 w-32 b-blue"></div>
            </div>
            <p class="text-base max-w-2xl leading-relaxed" style="color: var(--b-text); opacity: 0.7;">
                Een collectie van mijn meest recente werken, variërend van olieverfschilderijen tot abstracte sculpturen.
            </p>
        </header>

        <!-- Category filters -->
        @if($categories->count() > 0)
            <div class="flex flex-wrap gap-3 mb-16 anim-slide" style="animation-delay: 0.15s;">
                <a href="{{ route('artworks.index') }}"
                   class="px-5 py-2 text-xs font-bold tracking-widest uppercase border-2 transition-all"
                   style="{{ !request('category') ? 'background-color: var(--b-text); color: var(--b-bg); border-color: var(--b-text);' : 'background-color: transparent; color: var(--b-text); border-color: var(--b-border);' }}">
                    Alles
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('artworks.index', ['category' => $category->slug]) }}"
                       class="px-5 py-2 text-xs font-bold tracking-widest uppercase border-2 transition-all"
                       style="{{ request('category') === $category->slug ? 'background-color: var(--b-text); color: var(--b-bg); border-color: var(--b-text);' : 'background-color: transparent; color: var(--b-text); border-color: var(--b-border);' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        @endif

        @if($artworks->count() > 0)
            {{-- Bauhaus editorial layout: groups of 3 — first is large (8 cols), next two are small (4 cols each) --}}
            @php $globalIndex = 0; @endphp
            @foreach($artworks->chunk(3) as $chunk)
                <div class="bauhaus-grid gap-y-8 mb-8">
                    @foreach($chunk as $artwork)
                        @php
                            $posInGroup = $loop->index; // 0, 1, or 2 within the chunk
                            $isLarge = $posInGroup === 0;
                            $colSpan = $isLarge ? 'col-span-12 md:col-span-8' : 'col-span-12 md:col-span-4';
                            $imgHeight = $isLarge ? 'h-[32rem]' : 'h-80';
                            $accentColors = ['#e03a3e', '#0d5c9c', '#f7b11c'];
                            $accent = $accentColors[$globalIndex % 3];
                        @endphp
                        <article class="{{ $colSpan }} relative group overflow-hidden transition-all duration-500 hover:-translate-y-1 anim-slide"
                                 style="background-color: var(--b-surface); animation-delay: {{ 0.25 + $globalIndex * 0.12 }}s;">
                            <a href="{{ route('artworks.show', $artwork) }}" class="block">

                                <!-- Coloured circle accent -->
                                <div class="absolute -top-4 -left-4 w-20 h-20 rounded-full z-0 mix-blend-multiply transition-transform group-hover:scale-150 duration-500 pointer-events-none"
                                     style="background-color: {{ $accent }};"></div>

                                <!-- Image -->
                                <div class="{{ $imgHeight }} w-full overflow-hidden relative z-10"
                                     style="background-color: var(--b-surface);">
                                    @if($artwork->hasMedia('artworks'))
                                        <img src="{{ $artwork->getFirstMediaUrl('artworks', 'optimized') }}"
                                             alt="{{ $artwork->title }}"
                                             class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 group-hover:scale-105"
                                             style="display: block;">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center"
                                             style="background-color: var(--b-surface);">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                 style="color: var(--b-text); opacity: 0.2;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <!-- Info -->
                                <div class="p-5 relative z-10">
                                    @if($artwork->category)
                                        <span class="text-[10px] font-bold uppercase tracking-widest border-2 px-2 py-0.5"
                                              style="border-color: var(--b-border); color: var(--b-text);">
                                            {{ $artwork->category->name }}
                                        </span>
                                    @endif
                                    <h3 class="font-bold uppercase mt-3 leading-tight {{ $isLarge ? 'text-3xl' : 'text-xl' }}"
                                        style="color: var(--b-text);">
                                        {{ $artwork->title }}
                                    </h3>
                                    <div class="h-1 w-10 mt-3 mb-3" style="background-color: {{ $accent }};"></div>
                                    <div class="flex items-center justify-between min-h-[1.75rem]">
                                        <span class="text-sm font-bold" style="color: var(--b-text);">
                                            @if($artwork->hasMetadata('price'))
                                                &euro;{{ number_format($artwork->metadata('price'), 2, ',', '.') }}
                                            @endif
                                        </span>
                                        @if($artwork->hasMetadata('status'))
                                            <span class="text-[10px] uppercase px-2 py-0.5 border-2 font-bold"
                                                  style="border-color: var(--b-border); color: var(--b-text);">
                                                {{ $artwork->metadata('status') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </article>
                        @php $globalIndex++; @endphp
                    @endforeach
                </div>
            @endforeach

            <div class="mt-20">
                {{ $artworks->links() }}
            </div>
        @else
            <div class="text-center py-40 border-2" style="border-color: var(--b-border);">
                <p class="font-bold uppercase tracking-widest text-lg" style="color: var(--b-text); opacity: 0.4;">
                    Nog geen kunstwerken gevonden in deze categorie.
                </p>
                <a href="{{ route('artworks.index') }}"
                   class="mt-6 inline-block text-xs font-bold uppercase tracking-widest border-b-2 pb-0.5"
                   style="border-color: var(--b-red); color: var(--b-red);">
                    Terug naar de volledige galerij
                </a>
            </div>
        @endif

        <x-ui.instagram-feed />
    </section>
</x-layouts.app>
