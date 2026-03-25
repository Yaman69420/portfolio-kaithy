<x-layouts.admin>
    <header class="mb-12 flex flex-col md:flex-row md:justify-between md:items-center gap-6">
        <h1 class="text-3xl md:text-4xl font-serif font-bold tracking-tight text-center md:text-left">Kunstwerken</h1>
        <a href="{{ route('admin.artworks.create') }}" 
           class="w-full md:w-auto px-8 py-3 bg-black text-white text-xs font-bold uppercase tracking-widest rounded-full hover:bg-gray-800 transition-all shadow-lg text-center">
            Nieuw Kunstwerk
        </a>
    </header>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-8 py-4 text-xs uppercase tracking-widest font-bold text-gray-400">Beeld</th>
                        <th class="px-8 py-4 text-xs uppercase tracking-widest font-bold text-gray-400">Titel</th>
                        <th class="px-8 py-4 text-xs uppercase tracking-widest font-bold text-gray-400">Categorie</th>
                        <th class="px-8 py-4 text-xs uppercase tracking-widest font-bold text-gray-400">Status</th>
                        <th class="px-8 py-4 text-xs uppercase tracking-widest font-bold text-gray-400">Acties</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($artworks as $artwork)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-8 py-4">
                                <div class="w-16 h-16 rounded-lg bg-gray-100 overflow-hidden shadow-sm">
                                    @if($artwork->hasMedia('artworks'))
                                        <img src="{{ $artwork->getFirstMediaUrl('artworks', 'thumb') }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-8 py-4 font-bold">{{ $artwork->title }}</td>
                            <td class="px-8 py-4 text-sm text-gray-500">{{ $artwork->category?->name ?: 'Geen' }}</td>
                            <td class="px-8 py-4">
                                @if($artwork->is_published)
                                    <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-[10px] uppercase font-bold border border-green-100">Gepubliceerd</span>
                                @else
                                    <span class="px-3 py-1 bg-gray-50 text-gray-400 rounded-full text-[10px] uppercase font-bold border border-gray-100">Draft</span>
                                @endif
                            </td>
                            <td class="px-8 py-4">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.artworks.edit', $artwork) }}" class="text-xs uppercase tracking-widest font-bold border-2 px-3 py-1.5 transition-colors" style="border-color: var(--b-border); color: var(--b-text);">Bewerk</a>
                                    <form action="{{ route('admin.artworks.destroy', $artwork) }}" method="POST" onsubmit="return confirm('Weet je het zeker?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-xs uppercase tracking-widest font-bold border-2 px-3 py-1.5 transition-colors" style="border-color: #e03a3e; color: #e03a3e;">Verwijder</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center text-gray-400 italic">Nog geen kunstwerken toegevoegd.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-8 py-4 bg-gray-50 border-t border-gray-100">
            {{ $artworks->links() }}
        </div>
    </div>
</x-layouts.admin>
