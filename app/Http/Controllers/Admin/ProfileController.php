<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function edit(): View
    {
        return view('admin.profile.edit', [
            'user'     => auth()->user(),
            'settings' => [
                'site_name'          => SiteSettings::get('site_name', 'Kaithy'),
                'bio_name'           => SiteSettings::get('bio_name', 'Kaithy'),
                'bio_subtitle'       => SiteSettings::get('bio_subtitle'),
                'bio_text'           => SiteSettings::get('bio_text'),
                'instagram_handle'   => SiteSettings::get('instagram_handle', '@kaithy_art'),
                'instagram_url'      => SiteSettings::get('instagram_url', 'https://instagram.com'),
                'profile_photo'      => SiteSettings::get('profile_photo'),
                'notification_email' => SiteSettings::get('notification_email'),
            ],
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password'              => ['nullable', 'confirmed', 'min:8'],
            'site_name'             => ['required', 'string', 'max:100'],
            'bio_name'              => ['required', 'string', 'max:100'],
            'bio_subtitle'          => ['nullable', 'string', 'max:255'],
            'bio_text'              => ['nullable', 'string', 'max:2000'],
            'instagram_handle'      => ['nullable', 'string', 'max:100'],
            'instagram_url'         => ['nullable', 'url', 'max:255'],
            'notification_email'    => ['nullable', 'email', 'max:255'],
            'profile_photo'         => ['nullable', 'image', 'max:5120'],
            'remove_profile_photo'  => ['nullable', 'boolean'],
        ]);

        // Update user account
        $user->name  = $validated['name'];
        $user->email = $validated['email'];
        if ($validated['password']) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        // Handle profile photo
        if ($request->boolean('remove_profile_photo')) {
            $old = SiteSettings::get('profile_photo');
            if ($old) Storage::disk('public')->delete($old);
            SiteSettings::set('profile_photo', '');
        } elseif ($request->hasFile('profile_photo')) {
            $old = SiteSettings::get('profile_photo');
            if ($old) Storage::disk('public')->delete($old);
            $path = $request->file('profile_photo')->store('profile', 'public');
            SiteSettings::set('profile_photo', $path);
        }

        // Update site settings
        SiteSettings::set('site_name',        $validated['site_name']);
        SiteSettings::set('bio_name',         $validated['bio_name']);
        SiteSettings::set('bio_subtitle',     $validated['bio_subtitle'] ?? '');
        SiteSettings::set('bio_text',         $validated['bio_text'] ?? '');
        SiteSettings::set('instagram_handle',   $validated['instagram_handle'] ?? '');
        SiteSettings::set('instagram_url',      $validated['instagram_url'] ?? '');
        SiteSettings::set('notification_email', $validated['notification_email'] ?? '');

        return back()->with('success', 'Instellingen succesvol opgeslagen.');
    }
}
