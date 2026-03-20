<nav class="sticky top-0 z-50 bg-[#fcfaf7]/80 backdrop-blur-md border-b border-gray-100">
    <div class="container mx-auto px-4 h-20 flex items-center justify-between">
        <a href="/" class="text-2xl font-serif font-semibold tracking-tight">
            {{ config('app.name', 'Kaithy') }}
        </a>

        <div class="hidden md:flex items-center space-x-8 text-sm font-medium tracking-wide uppercase">
            <a href="/" class="hover:text-gray-500 transition-colors">Galerij</a>
            <a href="/over-mij" class="hover:text-gray-500 transition-colors">Over mij</a>
            <a href="/contact" class="hover:text-gray-500 transition-colors">Contact</a>
            
            @auth
                @if(auth()->user()->is_admin)
                    <a href="/admin" class="px-4 py-2 bg-black text-white rounded-full text-xs transition-transform hover:scale-105">Admin</a>
                @endif
            @endauth
        </div>

        <div class="md:hidden">
            <!-- Mobile Menu Toggle (Simplified for now) -->
            <button class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>
    </div>
</nav>
