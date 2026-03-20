<x-layouts.app>
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <header class="text-center mb-16">
            <h1 class="text-5xl font-serif font-semibold mb-6 tracking-tight text-gray-900">Contact</h1>
            <p class="text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">
                Heb je een vraag over een specifiek werk of wil je een opdracht bespreken? Stuur me gerust een bericht.
            </p>
        </header>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 md:p-12">
                @if(session('success'))
                    <div class="mb-10 p-6 bg-green-50 border border-green-100 text-green-700 rounded-2xl flex items-center gap-4 animate-fade-in">
                        <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <p class="font-medium">{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label for="name" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Naam</label>
                            <input type="text" name="name" id="name" required value="{{ old('name') }}"
                                   class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all placeholder-gray-300">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Email</label>
                            <input type="email" name="email" id="email" required value="{{ old('email') }}"
                                   class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all placeholder-gray-300">
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="subject" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Onderwerp</label>
                        <input type="text" name="subject" id="subject" 
                               value="{{ old('subject', $artwork ? 'Vraag over: ' . $artwork->title : '') }}"
                               class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all placeholder-gray-300">
                        @error('subject') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="message" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Bericht</label>
                        <textarea name="message" id="message" rows="6" required
                                  class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all placeholder-gray-300 resize-none">{{ old('message') }}</textarea>
                        @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full md:w-auto px-12 py-5 bg-black text-white text-xs font-bold uppercase tracking-widest rounded-full hover:bg-gray-800 transition-all transform hover:scale-[1.02] shadow-lg">
                            Bericht Verzenden
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
