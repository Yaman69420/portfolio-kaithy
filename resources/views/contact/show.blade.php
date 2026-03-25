<x-layouts.app>
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        <!-- Bauhaus header -->
        <h1 class="text-7xl md:text-9xl font-bold uppercase tracking-tighter leading-none mb-4" style="color: var(--b-text);">
            Contact
        </h1>
        <div class="flex mb-6" aria-hidden="true">
            <div class="h-2 w-32 b-blue"></div>
            <div class="h-2 w-16 b-red"></div>
            <div class="h-2 w-24 b-yellow"></div>
        </div>
        <p class="text-base max-w-2xl leading-relaxed mb-16" style="color: var(--b-text); opacity: 0.7;">
            Heb je een vraag over een specifiek werk of wil je een opdracht bespreken? Stuur me gerust een bericht.
        </p>

        <!-- Form container -->
        <div class="border-2 overflow-hidden" style="border-color: var(--b-border); background-color: var(--b-surface);">
            <div class="p-8 md:p-12">

                @if(session('success'))
                    <div class="mb-10 p-6 border-2 flex items-center gap-4" style="border-color: #e03a3e; background-color: rgba(224,58,62,0.05);">
                        <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #e03a3e;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <p class="font-bold uppercase tracking-widest text-xs" style="color: #e03a3e;">{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label for="name" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text);">Naam</label>
                            <input type="text" name="name" id="name" required value="{{ old('name') }}"
                                   class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                                   style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                            @error('name') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text);">Email</label>
                            <input type="email" name="email" id="email" required value="{{ old('email') }}"
                                   class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                                   style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                            @error('email') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="subject" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text);">Onderwerp</label>
                        <input type="text" name="subject" id="subject"
                               value="{{ old('subject', $artwork ? 'Vraag over: ' . $artwork->title : '') }}"
                               class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                               style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                        @error('subject') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="message" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text);">Bericht</label>
                        <textarea name="message" id="message" rows="6" required
                                  class="w-full px-5 py-4 border-2 focus:outline-none transition-all resize-none"
                                  style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">{{ old('message') }}</textarea>
                        @error('message') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                                class="w-full md:w-auto px-12 py-4 text-xs font-bold uppercase tracking-widest border-2 transition-all hover:-translate-y-0.5"
                                style="background-color: var(--b-text); color: var(--b-bg); border-color: var(--b-text);">
                            Bericht Verzenden
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
