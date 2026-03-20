<x-layouts.admin>
    <header class="mb-12">
        <a href="{{ route('admin.artworks.index') }}" class="text-xs uppercase tracking-widest font-bold text-gray-400 hover:text-black transition-colors mb-4 block">&larr; Terug naar overzicht</a>
        <h1 class="text-4xl font-serif font-bold tracking-tight">Bewerk Kunstwerk</h1>
    </header>

    <form action="{{ route('admin.artworks.update', $artwork) }}" method="POST" enctype="multipart/form-data" class="space-y-12">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Left: Main Info -->
            <div class="lg:col-span-2 space-y-8 bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-gray-100">
                <div class="space-y-2">
                    <label for="title" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Titel</label>
                    <input type="text" name="title" id="title" required value="{{ old('title', $artwork->title) }}"
                           class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all">
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label for="description" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Beschrijving</label>
                    <textarea name="description" id="description" rows="6"
                              class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all resize-none">{{ old('description', $artwork->description) }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label for="category_id" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Categorie</label>
                        <select name="category_id" id="category_id"
                                class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all appearance-none">
                            <option value="">Geen categorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $artwork->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="order" class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1">Volgorde (Sorteer)</label>
                        <input type="number" name="order" id="order" value="{{ old('order', $artwork->order) }}"
                               class="w-full px-6 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all">
                        <p class="text-[10px] text-gray-400 mt-1 italic">Lage nummers (zoals 1) verschijnen als eerste in de galerij.</p>
                    </div>
                </div>
            </div>

            <!-- Right: Image & Metadata -->
            <div class="space-y-8">
                <!-- Current Image -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <label class="text-xs uppercase tracking-widest font-bold text-gray-400 ml-1 mb-4 block">Afbeelding</label>
                    
                    @if($artwork->hasMedia('artworks'))
                        <div class="mb-6 rounded-2xl overflow-hidden shadow-sm">
                            <img src="{{ $artwork->getFirstMediaUrl('artworks', 'optimized') }}" class="w-full h-auto">
                        </div>
                    @endif

                    <input type="file" name="image" id="image"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:uppercase file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
                    <p class="text-[10px] text-gray-400 mt-2 italic">Laat leeg om de huidige afbeelding te behouden.</p>
                    @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Metadata Fields -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 space-y-6">
                    <h3 class="text-xs uppercase tracking-widest font-bold text-gray-400">Extra Details (Optioneel)</h3>
                    
                    <div class="space-y-2">
                        <label for="meta_status" class="text-[10px] uppercase tracking-widest font-bold text-gray-300">Status</label>
                        <select name="metadata[status]" id="meta_status" 
                                class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl text-sm focus:ring-1 focus:ring-black transition-all appearance-none">
                            <option value="">Geen status</option>
                            <option value="Beschikbaar" {{ old('metadata.status', $artwork->metadata('status')) == 'Beschikbaar' ? 'selected' : '' }}>Beschikbaar</option>
                            <option value="Gereserveerd" {{ old('metadata.status', $artwork->metadata('status')) == 'Gereserveerd' ? 'selected' : '' }}>Gereserveerd</option>
                            <option value="Verkocht" {{ old('metadata.status', $artwork->metadata('status')) == 'Verkocht' ? 'selected' : '' }}>Verkocht</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="meta_dimensions" class="text-[10px] uppercase tracking-widest font-bold text-gray-300">Afmetingen</label>
                        <input type="text" name="metadata[dimensions]" id="meta_dimensions" value="{{ old('metadata.dimensions', $artwork->metadata('dimensions')) }}"
                               class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl text-sm focus:ring-1 focus:ring-black transition-all">
                    </div>

                    <div class="space-y-2">
                        <label for="meta_material" class="text-[10px] uppercase tracking-widest font-bold text-gray-300">Materiaal</label>
                        <input type="text" name="metadata[material]" id="meta_material" value="{{ old('metadata.material', $artwork->metadata('material')) }}"
                               class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl text-sm focus:ring-1 focus:ring-black transition-all">
                    </div>

                    <div class="space-y-2">
                        <label for="meta_year" class="text-[10px] uppercase tracking-widest font-bold text-gray-300">Jaar</label>
                        <input type="text" name="metadata[year]" id="meta_year" value="{{ old('metadata.year', $artwork->metadata('year')) }}"
                               class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl text-sm focus:ring-1 focus:ring-black transition-all">
                    </div>

                    <div class="space-y-2">
                        <label for="meta_price" class="text-[10px] uppercase tracking-widest font-bold text-gray-300">Prijs (€)</label>
                        <input type="number" step="0.01" name="metadata[price]" id="meta_price" value="{{ old('metadata.price', $artwork->metadata('price')) }}"
                               class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl text-sm focus:ring-1 focus:ring-black transition-all">
                    </div>

                    <div class="flex items-center gap-3 pt-4">
                        <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $artwork->is_published) ? 'checked' : '' }}
                               class="w-5 h-5 rounded border-gray-200 text-black focus:ring-black">
                        <label for="is_published" class="text-xs uppercase tracking-widest font-bold text-gray-400">Publiceer op site</label>
                    </div>
                </div>

                <button type="submit" 
                        class="w-full px-12 py-5 bg-black text-white text-xs font-bold uppercase tracking-widest rounded-full hover:bg-gray-800 transition-all shadow-xl">
                    Wijzigingen Opslaan
                </button>
            </div>
        </div>
    </form>
</x-layouts.admin>
