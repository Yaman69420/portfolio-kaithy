@props(['artwork'])

<div class="group relative overflow-hidden bg-white rounded-lg shadow-sm transition-all duration-500 hover:shadow-xl hover:-translate-y-1">
    <a href="{{ route('artworks.show', $artwork) }}" class="block">
        <div class="aspect-[4/5] bg-gray-100 overflow-hidden">
            @if($artwork->hasMedia('artworks'))
                <img src="{{ $artwork->getFirstMediaUrl('artworks', 'optimized') }}" 
                     alt="{{ $artwork->title }}" 
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            @else
                <div class="w-full h-full flex items-center justify-center text-gray-300">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
            @endif
        </div>
        
        <div class="p-6">
            <h3 class="text-xl font-serif font-semibold mb-1 group-hover:text-gray-600 transition-colors">
                {{ $artwork->title }}
            </h3>
            
            @if($artwork->category)
                <p class="text-xs uppercase tracking-widest text-gray-400 font-medium">
                    {{ $artwork->category->name }}
                </p>
            @endif
            
            <div class="mt-4 flex items-center justify-between">
                @if($artwork->hasMetadata('price'))
                    <span class="text-sm font-medium text-gray-900">
                        &euro;{{ number_format($artwork->metadata('price'), 2, ',', '.') }}
                    </span>
                @endif

                @if($artwork->hasMetadata('status'))
                    <span class="text-[10px] uppercase px-2 py-0.5 rounded-full border border-gray-100 text-gray-500">
                        {{ $artwork->metadata('status') }}
                    </span>
                @endif
            </div>
        </div>
    </a>
</div>
