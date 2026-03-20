<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(Request $request): View
    {
        $artwork = null;
        if ($request->filled('artwork')) {
            $artwork = Artwork::where('slug', $request->artwork)->first();
        }

        return view('contact.show', compact('artwork'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Bedankt! Je bericht is verzonden. Ik neem zo snel mogelijk contact met je op.');
    }
}
