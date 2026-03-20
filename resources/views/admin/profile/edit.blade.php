<x-layouts.admin>
    <header class="mb-12">
        <h1 class="text-4xl font-serif font-bold tracking-tight">Profiel Instellingen</h1>
    </header>

    <div class="max-w-2xl">
        <form action="{{ route('admin.profile.update') }}" method="POST" class="bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-gray-100 space-y-8">
            @csrf
            @method('PATCH')

            <div class="space-y-2">
                <label for="name" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Naam</label>
                <input type="text" name="name" id="name" required value="{{ old('name', $user->name) }}"
                       class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-2">
                <label for="email" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email', $user->email) }}"
                       class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <hr class="border-gray-50">

            <div class="space-y-2">
                <label for="password" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Nieuw Wachtwoord (Optioneel)</label>
                <input type="password" name="password" id="password"
                       class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all">
                @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-2">
                <label for="password_confirmation" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Bevestig Wachtwoord</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all">
            </div>

            <div class="pt-4">
                <button type="submit" 
                        class="px-12 py-5 bg-black text-white text-xs font-bold uppercase tracking-widest rounded-full hover:bg-gray-800 transition-all shadow-lg">
                    Instellingen Opslaan
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>
