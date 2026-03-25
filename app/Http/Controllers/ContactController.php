<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageReceived;
use App\Models\Artwork;
use App\Models\ContactMessage;
use App\Models\SiteSettings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        $message = ContactMessage::create($validated);

        // Send email notification
        $notifyEmail = SiteSettings::get('notification_email');

        if ($notifyEmail) {
            try {
                Mail::to($notifyEmail)->send(new ContactMessageReceived($message));
            } catch (\Exception $e) {
                // Log the error but don't break the user experience
                Log::error('Failed to send contact notification email: ' . $e->getMessage());
            }
        }

        return back()->with('success', 'Bedankt! Je bericht is verzonden. Ik neem zo snel mogelijk contact met je op.');
    }
}
