<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArtworkController extends Controller
{
    public function index(): View
    {
        $artworks = Artwork::with('category', 'media')
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.artworks.index', compact('artworks'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('admin.artworks.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'required|image|max:5120', // Max 5MB
            'is_published' => 'boolean',
            'order' => 'integer',
            'metadata' => 'nullable|array',
        ]);

        $metadata = array_filter($request->input('metadata', []), function ($value) {
            return $value !== null && $value !== '';
        });

        $artwork = Artwork::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'is_published' => $request->boolean('is_published', true),
            'order' => $validated['order'] ?? 0,
            'metadata' => $metadata,
        ]);

        if ($request->hasFile('image')) {
            $artwork->addMediaFromRequest('image')
                ->toMediaCollection('artworks');
        }

        return redirect()->route('admin.artworks.index')
            ->with('success', 'Kunstwerk succesvol toegevoegd.');
    }

    public function edit(Artwork $artwork): View
    {
        $categories = Category::all();

        return view('admin.artworks.edit', compact('artwork', 'categories'));
    }

    public function update(Request $request, Artwork $artwork): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|max:5120',
            'is_published' => 'boolean',
            'order' => 'integer',
            'metadata' => 'nullable|array',
        ]);

        $metadata = array_filter($request->input('metadata', []), function ($value) {
            return $value !== null && $value !== '';
        });

        $artwork->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'is_published' => $request->boolean('is_published'),
            'order' => $validated['order'] ?? 0,
            'metadata' => $metadata,
        ]);

        if ($request->hasFile('image')) {
            $artwork->clearMediaCollection('artworks');
            $artwork->addMediaFromRequest('image')
                ->toMediaCollection('artworks');
        }

        return redirect()->route('admin.artworks.index')
            ->with('success', 'Kunstwerk succesvol bijgewerkt.');
    }

    public function destroy(Artwork $artwork): RedirectResponse
    {
        $artwork->delete();

        return redirect()->route('admin.artworks.index')
            ->with('success', 'Kunstwerk succesvol verwijderd.');
    }
}
