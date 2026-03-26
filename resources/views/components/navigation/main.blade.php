<nav x-data="{
        open: false,
        darkMode: localStorage.getItem('theme') !== 'light',
        toggle() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
            document.documentElement.classList.toggle('dark', this.darkMode);
        }
     }"
     class="sticky top-0 z-50 backdrop-blur-md border-b-2"
     style="background-color: var(--b-bg); border-color: var(--b-border);">

    <div class="container mx-auto px-4 h-20 flex items-center justify-between">

        <!-- Logo -->
        @php use App\Models\SiteSettings; @endphp
        <a href="/" class="text-xl font-bold uppercase tracking-tighter" style="color: var(--b-text);">
            {{ SiteSettings::get('site_name', config('app.name', 'Kaithy')) }}
        </a>

        <!-- Desktop nav -->
        <div class="hidden md:flex items-center space-x-8 text-xs font-bold tracking-widest uppercase">
            <a href="/" class="pb-0.5 border-b-2 border-transparent hover:border-[#e03a3e] hover:text-[#e03a3e] transition-colors" style="color: var(--b-text);">Galerij</a>
            <a href="/over-mij" class="pb-0.5 border-b-2 border-transparent hover:border-[#e03a3e] hover:text-[#e03a3e] transition-colors" style="color: var(--b-text);">Over mij</a>
            <a href="/contact" class="pb-0.5 border-b-2 border-transparent hover:border-[#e03a3e] hover:text-[#e03a3e] transition-colors" style="color: var(--b-text);">Contact</a>

            @auth
                @if(auth()->user()->is_admin)
                    <a href="/admin" class="px-4 py-2 font-bold uppercase text-xs border-2 transition-colors"
                       style="background-color: var(--b-text); color: var(--b-bg); border-color: var(--b-text);">
                        Admin
                    </a>
                @endif
            @endauth

            <!-- Dark/light pill toggle -->
            <button @click="toggle()"
                    :title="darkMode ? 'Naar licht thema' : 'Naar donker thema'"
                    class="relative inline-flex items-center h-6 w-11 rounded-full focus:outline-none transition-colors duration-300 shrink-0"
                    :style="darkMode ? 'background-color:#0d5c9c;' : 'background-color:#9ca3af;'">
                <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-white shadow transition-transform duration-300"
                      :style="darkMode ? 'transform:translateX(22px)' : 'transform:translateX(2px)'">
                    <svg x-show="!darkMode" class="w-2.5 h-2.5" fill="none" stroke="#6b7280" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m8.66-9h-1M4.34 12h-1m15.07-6.07-.71.71M6.34 17.66l-.71.71M17.66 17.66l.71.71M6.34 6.34l.71.71M12 8a4 4 0 100 8 4 4 0 000-8z"/>
                    </svg>
                    <svg x-show="darkMode" class="w-2.5 h-2.5" fill="none" stroke="#0d5c9c" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                </span>
            </button>
        </div>

        <!-- Mobile: toggle + hamburger -->
        <div class="md:hidden flex items-center space-x-2">
            <!-- Mobile pill toggle -->
            <button @click="toggle()"
                    :title="darkMode ? 'Naar licht thema' : 'Naar donker thema'"
                    class="relative inline-flex items-center h-6 w-11 rounded-full focus:outline-none transition-colors duration-300 shrink-0"
                    :style="darkMode ? 'background-color:#0d5c9c;' : 'background-color:#9ca3af;'">
                <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-white shadow transition-transform duration-300"
                      :style="darkMode ? 'transform:translateX(22px)' : 'transform:translateX(2px)'">
                    <svg x-show="!darkMode" class="w-2.5 h-2.5" fill="none" stroke="#6b7280" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m8.66-9h-1M4.34 12h-1m15.07-6.07-.71.71M6.34 17.66l-.71.71M17.66 17.66l.71.71M6.34 6.34l.71.71M12 8a4 4 0 100 8 4 4 0 000-8z"/>
                    </svg>
                    <svg x-show="darkMode" class="w-2.5 h-2.5" fill="none" stroke="#0d5c9c" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                </span>
            </button>
            <button @click="open = !open" class="p-2 focus:outline-none" style="color: var(--b-text);">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
                <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="md:hidden absolute top-full left-0 w-full border-b-2 z-50"
         style="background-color: var(--b-bg); border-color: var(--b-border);"
         @click.away="open = false">
        <div class="px-6 py-10 flex flex-col items-center space-y-8 text-sm font-bold tracking-widest uppercase"
             style="color: var(--b-text);">
            <a href="/" @click="open = false" class="hover:text-[#e03a3e] transition-colors">Galerij</a>
            <a href="/over-mij" @click="open = false" class="hover:text-[#e03a3e] transition-colors">Over mij</a>
            <a href="/contact" @click="open = false" class="hover:text-[#e03a3e] transition-colors">Contact</a>

            @auth
                @if(auth()->user()->is_admin)
                    <a href="/admin" @click="open = false"
                       class="px-10 py-3 font-bold border-2 text-sm uppercase"
                       style="background-color: var(--b-text); color: var(--b-bg); border-color: var(--b-text);">
                        Admin
                    </a>
                @endif
            @endauth
        </div>
    </div>
</nav>
