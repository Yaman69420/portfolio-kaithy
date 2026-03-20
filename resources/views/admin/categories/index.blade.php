<x-layouts.admin>
    <header class="mb-12">
        <h1 class="text-4xl font-serif font-bold tracking-tight">Categorieën</h1>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Form to add new -->
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 h-fit">
            <h2 class="text-xl font-serif font-bold mb-6">Nieuwe Categorie</h2>
            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label for="name" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Naam</label>
                    <input type="text" name="name" id="name" required
                           class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all">
                </div>
                <button type="submit" 
                        class="w-full px-8 py-4 bg-black text-white text-xs font-bold uppercase tracking-widest rounded-full hover:bg-gray-800 transition-all shadow-lg">
                    Toevoegen
                </button>
            </form>
        </div>

        <!-- List of existing -->
        <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-8 py-4 text-xs uppercase tracking-widest font-bold text-gray-400">Naam</th>
                        <th class="px-8 py-4 text-xs uppercase tracking-widest font-bold text-gray-400">Aantal Kunstwerken</th>
                        <th class="px-8 py-4 text-xs uppercase tracking-widest font-bold text-gray-400 text-right">Acties</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($categories as $category)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-8 py-4 font-bold">{{ $category->name }}</td>
                            <td class="px-8 py-4 text-sm text-gray-500">{{ $category->artworks_count }}</td>
                            <td class="px-8 py-4 text-right">
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Weet je het zeker?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-xs uppercase tracking-widest font-bold text-red-400 hover:text-red-600 transition-colors">Verwijder</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-8 py-12 text-center text-gray-400 italic">Nog geen categorieën aangemaakt.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
