<x-layouts.app>
    <article class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="lg:flex lg:gap-16">
            <!-- Image Section -->
            <div class="lg:w-2/3 mb-12 lg:mb-0">
                <div class="bg-gray-100 rounded-2xl overflow-hidden shadow-sm">
                    @if($artwork->hasMedia('artworks'))
                        <img src="{{ $artwork->getFirstMediaUrl('artworks', 'optimized') }}" 
                             alt="{{ $artwork->title }}" 
                             class="w-full h-auto object-cover">
                    @else
                        <div class="aspect-[4/5] w-full flex items-center justify-center text-gray-300">
                             <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Content Section -->
            <div class="lg:w-1/3 space-y-12">
                <div>
                    @if($artwork->category)
                        <span class="text-xs uppercase tracking-widest text-gray-400 font-semibold mb-4 block">
                            {{ $artwork->category->name }}
                        </span>
                    @endif
                    <h1 class="text-5xl font-serif font-bold tracking-tight mb-8">{{ $artwork->title }}</h1>
                    
                    <div class="prose prose-stone text-gray-600 leading-loose">
                        {{ $artwork->description ?: 'Geen beschrijving beschikbaar.' }}
                    </div>
                </div>

                <!-- Metadata Table -->
                <div class="border-t border-gray-100 pt-10">
                    <h3 class="text-xs uppercase tracking-widest text-gray-400 font-bold mb-6">Specificaties</h3>
                    <dl class="space-y-4">
                        @if($artwork->hasMetadata('dimensions'))
                            <div class="flex justify-between items-baseline pb-4 border-b border-gray-50">
                                <dt class="text-sm text-gray-500">Afmetingen</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ $artwork->metadata('dimensions') }}</dd>
                            </div>
                        @endif

                        @if($artwork->hasMetadata('material'))
                            <div class="flex justify-between items-baseline pb-4 border-b border-gray-50">
                                <dt class="text-sm text-gray-500">Materiaal</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ $artwork->metadata('material') }}</dd>
                            </div>
                        @endif

                        @if($artwork->hasMetadata('year'))
                            <div class="flex justify-between items-baseline pb-4 border-b border-gray-50">
                                <dt class="text-sm text-gray-500">Jaar van Creatie</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ $artwork->metadata('year') }}</dd>
                            </div>
                        @endif

                        @if($artwork->hasMetadata('price'))
                            <div class="flex justify-between items-baseline pb-4 border-b border-gray-50">
                                <dt class="text-sm text-gray-500">Prijs</dt>
                                <dd class="text-sm font-medium text-gray-900">&euro;{{ number_format($artwork->metadata('price'), 2, ',', '.') }}</dd>
                            </div>
                        @endif

                        @if($artwork->hasMetadata('status'))
                            <div class="flex justify-between items-baseline pb-4">
                                <dt class="text-sm text-gray-500">Status</dt>
                                <dd class="text-sm font-medium">
                                    <span class="px-3 py-1 bg-gray-50 rounded-full text-xs text-gray-600 uppercase tracking-wide">
                                        {{ $artwork->metadata('status') }}
                                    </span>
                                </dd>
                            </div>
                        @endif
                    </dl>
                </div>

                <!-- Action Button -->
                <div class="pt-8">
                    <a href="/contact?artwork={{ $artwork->slug }}" 
                       class="w-full inline-flex justify-center items-center px-10 py-5 bg-black text-white text-sm font-bold uppercase tracking-widest rounded-full hover:bg-gray-800 transition-all transform hover:scale-[1.02]">
                        Informeer over dit werk
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
