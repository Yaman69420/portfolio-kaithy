@php
    use App\Models\SiteSettings;
    $igHandle = SiteSettings::get('instagram_handle', '@kaithy_art');
    $igUrl    = SiteSettings::get('instagram_url', 'https://instagram.com');
@endphp

<div class="mt-32">
    <div class="text-center mb-16">
        <h2 class="text-3xl font-bold uppercase tracking-tighter mb-4" style="color: var(--b-text);">Volg op Instagram</h2>
        <div class="flex justify-center mb-4" aria-hidden="true">
            <div class="h-1 w-8 b-red"></div>
            <div class="h-1 w-6 b-yellow"></div>
            <div class="h-1 w-10 b-blue"></div>
        </div>
        @if($igHandle)
            <a href="{{ $igUrl }}" target="_blank"
               class="text-xs uppercase tracking-widest font-bold hover:text-[#e03a3e] transition-colors"
               style="color: var(--b-text); opacity: 0.5;">
                {{ $igHandle }}
            </a>
        @endif
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @for($i = 1; $i <= 4; $i++)
            @php $colors = ['#e03a3e', '#0d5c9c', '#f7b11c', '#e03a3e']; $c = $colors[$i - 1]; @endphp
            <a href="{{ $igUrl }}" target="_blank"
               class="aspect-square overflow-hidden group relative block"
               style="background-color: var(--b-surface);">
                <!-- Bauhaus colour strip at bottom -->
                <div class="absolute bottom-0 left-0 w-full h-1" style="background-color: {{ $c }};"></div>
                <div class="w-full h-full flex items-center justify-center" style="color: var(--b-text); opacity: 0.15;">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </div>
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center"
                     style="background-color: rgba(0,0,0,0.4);">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </div>
            </a>
        @endfor
    </div>
</div>
