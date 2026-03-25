@props(['artwork', 'index' => 0, 'height' => 'aspect-[4/5]'])

@php
    $accentColors = ['#e03a3e', '#0d5c9c', '#f7b11c'];
    $accent = $accentColors[$index % 3];
@endphp

<div class="group relative overflow-hidden transition-all duration-500 hover:-translate-y-1"
     style="background-color: var(--b-surface);">
    <a href="{{ route('artworks.show', $artwork) }}" class="block">

        <!-- Coloured circle accent -->
        <div class="absolute -top-4 -left-4 w-20 h-20 rounded-full z-0 mix-blend-multiply transition-transform group-hover:scale-150 duration-500 pointer-events-none"
             style="background-color: {{ $accent }};"></div>

        <!-- Image -->
        <div class="{{ $height }} overflow-hidden relative z-10" style="background-color: var(--b-surface);">
            @if($artwork->hasMedia('artworks'))
                <img src="{{ $artwork->getFirstMediaUrl('artworks', 'optimized') }}"
                     alt="{{ $artwork->title }}"
                     loading="lazy"
                     decoding="async"
                     class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 group-hover:scale-105">
            @else
                <div class="w-full h-full flex items-center justify-center" style="background-color: var(--b-surface);">
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

            <h3 class="text-xl font-bold uppercase mt-3 leading-tight" style="color: var(--b-text);">
                {{ $artwork->title }}
            </h3>

            <!-- Horizontal accent line -->
            <div class="h-1 w-10 mt-3 mb-3" style="background-color: {{ $accent }};"></div>

            <div class="flex items-center justify-between">
                @if($artwork->hasMetadata('price'))
                    <span class="text-sm font-bold" style="color: var(--b-text);">
                        &euro;{{ number_format($artwork->metadata('price'), 2, ',', '.') }}
                    </span>
                @endif

                @if($artwork->hasMetadata('status'))
                    <span class="text-[10px] uppercase px-2 py-0.5 border-2 font-bold"
                          style="border-color: var(--b-border); color: var(--b-text);">
                        {{ $artwork->metadata('status') }}
                    </span>
                @endif
            </div>
        </div>
    </a>
</div>
