<x-layouts.admin>
    <header class="mb-12">
        <h1 class="text-4xl font-serif font-bold tracking-tight">Dashboard</h1>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <p class="text-xs uppercase tracking-widest font-bold text-gray-400 mb-2">Totaal Kunstwerken</p>
            <p class="text-3xl font-serif font-bold">{{ \App\Models\Artwork::count() }}</p>
        </div>
        
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <p class="text-xs uppercase tracking-widest font-bold text-gray-400 mb-2">Berichten</p>
            <p class="text-3xl font-serif font-bold">{{ \App\Models\ContactMessage::count() }}</p>
        </div>
        
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <p class="text-xs uppercase tracking-widest font-bold text-gray-400 mb-2">Categorieën</p>
            <p class="text-3xl font-serif font-bold">{{ \App\Models\Category::count() }}</p>
        </div>
    </div>
    
    <div class="mt-12 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex justify-between items-center">
            <h2 class="text-xl font-serif font-bold">Recente Berichten</h2>
            <a href="#" class="text-xs uppercase tracking-widest font-bold text-gray-400 hover:text-black transition-colors">Alle berichten</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse(\App\Models\ContactMessage::latest()->take(5)->get() as $message)
                <div class="p-8 hover:bg-gray-50 transition-colors">
                    <div class="flex justify-between mb-2">
                        <p class="font-bold">{{ $message->name }} <span class="text-gray-400 font-normal">({{ $message->email }})</span></p>
                        <p class="text-xs text-gray-400">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                    <p class="text-sm text-gray-600 italic">"{{ Str::limit($message->message, 100) }}"</p>
                </div>
            @empty
                <div class="p-12 text-center text-gray-400 italic">Geen berichten ontvangen.</div>
            @endforelse
        </div>
    </div>
</x-layouts.admin>
