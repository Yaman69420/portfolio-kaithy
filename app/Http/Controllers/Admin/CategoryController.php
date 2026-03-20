<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::withCount('artworks')->orderBy('name')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return back()->with('success', 'Categorie succesvol aangemaakt.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        if ($category->artworks()->count() > 0) {
            return back()->with('error', 'Deze categorie bevat nog kunstwerken en kan niet verwijderd worden.');
        }

        $category->delete();
        return back()->with('success', 'Categorie verwijderd.');
    }
}
