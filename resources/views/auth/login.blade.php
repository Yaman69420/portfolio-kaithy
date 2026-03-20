<x-layouts.app>
    <div class="max-w-md mx-auto py-24 px-4 sm:px-6 lg:px-8">
        <header class="text-center mb-12">
            <h1 class="text-4xl font-serif font-bold mb-4 tracking-tight">Welkom terug</h1>
            <p class="text-gray-400 text-sm uppercase tracking-widest font-bold">Beheerderspaneel Kaithy</p>
        </header>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-12">
            <form action="{{ route('login.post') }}" method="POST" class="space-y-8">
                @csrf
                
                <div class="space-y-2">
                    <label for="email" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Email</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}"
                           class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all placeholder-gray-300">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label for="password" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Wachtwoord</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all placeholder-gray-300">
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" 
                            class="w-full px-12 py-5 bg-black text-white text-xs font-bold uppercase tracking-widest rounded-full hover:bg-gray-800 transition-all transform hover:scale-[1.02] shadow-lg">
                        Inloggen
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
