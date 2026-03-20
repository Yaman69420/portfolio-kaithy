<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArtworkController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::withCount('artworks')->orderBy('name')->get();

        $query = Artwork::query()
            ->with(['category', 'media'])
            ->where('is_published', true)
            ->orderBy('order')
            ->orderBy('created_at', 'desc');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $artworks = $query->paginate(12);

        return view('artworks.index', compact('artworks', 'categories'));
    }

    public function show(Artwork $artwork): View
    {
        abort_if(! $artwork->is_published && ! (auth()->user()?->is_admin), 404);

        return view('artworks.show', compact('artwork'));
    }
}
