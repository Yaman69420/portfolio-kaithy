<x-layouts.app>
    <article class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="lg:flex lg:gap-16">

            <!-- Image Section -->
            <div class="lg:w-2/3 mb-12 lg:mb-0 anim-slide" style="animation-delay: 0s;">
                <div class="overflow-hidden" style="background-color: var(--b-surface);">
                    @if($artwork->hasMedia('artworks'))
                        <img src="{{ $artwork->getFirstMediaUrl('artworks', 'optimized') }}"
                             alt="{{ $artwork->title }}"
                             class="w-full h-auto object-cover"
                             style="display: block;">
                    @else
                        <div class="aspect-[4/5] w-full flex items-center justify-center"
                             style="background-color: var(--b-surface);">
                            <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 style="color: var(--b-text); opacity: 0.15;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Content Section -->
            <div class="lg:w-1/3 space-y-10 anim-slide" style="animation-delay: 0.15s;">
                <div>
                    @if($artwork->category)
                        <span class="text-[10px] font-bold uppercase tracking-widest border-2 px-2 py-0.5 mb-6 inline-block"
                              style="border-color: var(--b-border); color: var(--b-text);">
                            {{ $artwork->category->name }}
                        </span>
                    @endif
                    <h1 class="text-5xl font-bold uppercase tracking-tighter leading-none mt-4 mb-4"
                        style="color: var(--b-text);">
                        {{ $artwork->title }}
                    </h1>
                    <div class="flex mb-6" aria-hidden="true">
                        <div class="h-1 w-16 b-red"></div>
                        <div class="h-1 w-8 b-yellow"></div>
                        <div class="h-1 w-12 b-blue"></div>
                    </div>
                    <p class="text-base leading-loose" style="color: var(--b-text); opacity: 0.7;">
                        {{ $artwork->description ?: 'Geen beschrijving beschikbaar.' }}
                    </p>
                </div>

                <!-- Metadata Table -->
                <div class="border-t-2 pt-8" style="border-color: var(--b-border);">
                    <h3 class="text-xs uppercase tracking-widest font-bold mb-6" style="color: var(--b-text); opacity: 0.5;">
                        Specificaties
                    </h3>
                    <dl class="space-y-4">
                        @if($artwork->hasMetadata('dimensions'))
                            <div class="flex justify-between items-baseline pb-4 border-b-2"
                                 style="border-color: var(--b-border); opacity: 0.3;" ></div>
                            <div class="flex justify-between items-baseline pb-4 border-b" style="border-color: rgba(128,128,128,0.2);">
                                <dt class="text-sm font-bold uppercase tracking-wider" style="color: var(--b-text); opacity: 0.5;">Afmetingen</dt>
                                <dd class="text-sm font-bold" style="color: var(--b-text);">{{ $artwork->metadata('dimensions') }}</dd>
                            </div>
                        @endif
                        @if($artwork->hasMetadata('material'))
                            <div class="flex justify-between items-baseline pb-4 border-b" style="border-color: rgba(128,128,128,0.2);">
                                <dt class="text-sm font-bold uppercase tracking-wider" style="color: var(--b-text); opacity: 0.5;">Materiaal</dt>
                                <dd class="text-sm font-bold" style="color: var(--b-text);">{{ $artwork->metadata('material') }}</dd>
                            </div>
                        @endif
                        @if($artwork->hasMetadata('year'))
                            <div class="flex justify-between items-baseline pb-4 border-b" style="border-color: rgba(128,128,128,0.2);">
                                <dt class="text-sm font-bold uppercase tracking-wider" style="color: var(--b-text); opacity: 0.5;">Jaar</dt>
                                <dd class="text-sm font-bold" style="color: var(--b-text);">{{ $artwork->metadata('year') }}</dd>
                            </div>
                        @endif
                        @if($artwork->hasMetadata('price'))
                            <div class="flex justify-between items-baseline pb-4 border-b" style="border-color: rgba(128,128,128,0.2);">
                                <dt class="text-sm font-bold uppercase tracking-wider" style="color: var(--b-text); opacity: 0.5;">Prijs</dt>
                                <dd class="text-base font-bold" style="color: var(--b-text);">&euro;{{ number_format($artwork->metadata('price'), 2, ',', '.') }}</dd>
                            </div>
                        @endif
                        @if($artwork->hasMetadata('status'))
                            <div class="flex justify-between items-baseline pb-4">
                                <dt class="text-sm font-bold uppercase tracking-wider" style="color: var(--b-text); opacity: 0.5;">Status</dt>
                                <dd>
                                    <span class="text-[10px] uppercase px-2 py-0.5 border-2 font-bold"
                                          style="border-color: var(--b-border); color: var(--b-text);">
                                        {{ $artwork->metadata('status') }}
                                    </span>
                                </dd>
                            </div>
                        @endif
                    </dl>
                </div>

                <!-- CTA Button -->
                <div class="pt-4">
                    <a href="/contact?artwork={{ $artwork->slug }}"
                       class="w-full inline-flex justify-center items-center px-10 py-4 text-sm font-bold uppercase tracking-widest border-2 transition-all hover:-translate-y-0.5"
                       style="background-color: var(--b-text); color: var(--b-bg); border-color: var(--b-text);">
                        Informeer over dit werk
                    </a>
                </div>
            </div>
        </div>
    </article>
</x-layouts.app>
