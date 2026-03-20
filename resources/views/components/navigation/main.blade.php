<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-[#fcfaf7]/80 backdrop-blur-md border-b border-gray-100">
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
            <button @click="open = !open" class="p-2 focus:outline-none">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div x-show="open" 
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="md:hidden absolute top-20 left-0 w-full bg-[#fcfaf7] border-b border-gray-100 shadow-xl z-50"
         @click.away="open = false">
        <div class="px-6 py-10 flex flex-col items-center space-y-8 text-lg font-medium tracking-widest uppercase">
            <a href="/" @click="open = false" class="hover:text-gray-500 transition-colors">Galerij</a>
            <a href="/over-mij" @click="open = false" class="hover:text-gray-500 transition-colors">Over mij</a>
            <a href="/contact" @click="open = false" class="hover:text-gray-500 transition-colors">Contact</a>
            
            @auth
                @if(auth()->user()->is_admin)
                    <a href="/admin" @click="open = false" class="px-10 py-3 bg-black text-white rounded-full text-sm font-bold">Admin</a>
                @endif
            @endauth
        </div>
    </div>
</nav>
