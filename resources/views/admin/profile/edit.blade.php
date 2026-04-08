<x-layouts.admin>
    <header class="mb-12">
        <h1 class="text-4xl font-bold uppercase tracking-tighter" style="color: var(--b-text);">Instellingen</h1>
        <div class="flex mt-3" aria-hidden="true">
            <div class="h-1 w-12 b-red"></div>
            <div class="h-1 w-8 b-yellow"></div>
            <div class="h-1 w-16 b-blue"></div>
        </div>
    </header>

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-10 max-w-3xl">
        @csrf
        @method('PATCH')

        {{-- ── Section 1: Site naam & logo ── --}}
        <div class="border-2 overflow-hidden" style="border-color: var(--b-border); background-color: var(--b-surface);">
            <div class="px-8 py-4 border-b-2 flex items-center gap-3" style="border-color: var(--b-border);">
                <div class="w-3 h-3 b-yellow"></div>
                <h2 class="text-xs font-bold uppercase tracking-widest" style="color: var(--b-text);">Site naam &amp; logo</h2>
            </div>
            <div class="p-8 space-y-6">
                <div class="space-y-2">
                    <label for="site_name" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text); opacity: 0.6;">
                        Sitenaam (verschijnt in navigatie &amp; footer)
                    </label>
                    <input type="text" name="site_name" id="site_name" required value="{{ old('site_name', $settings['site_name']) }}"
                           class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                           style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                    <p class="text-xs" style="color: var(--b-text); opacity: 0.45;">Bijv. "Kaithy", "Kaithy Art", "Studio Kaithy"</p>
                    @error('site_name') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        {{-- ── Section 1b: Profielfoto ── --}}
        <div class="border-2 overflow-hidden" style="border-color: var(--b-border); background-color: var(--b-surface);">
            <div class="px-8 py-4 border-b-2 flex items-center gap-3" style="border-color: var(--b-border);">
                <div class="w-3 h-3 b-red"></div>
                <h2 class="text-xs font-bold uppercase tracking-widest" style="color: var(--b-text);">Profielfoto (Over mij pagina)</h2>
            </div>
            <div class="p-8">
                <div class="flex flex-col md:flex-row items-start gap-8">
                    {{-- Current photo preview --}}
                    @php $currentPhoto = $settings['profile_photo'] ?? ''; @endphp
                    <div class="w-40 h-40 overflow-hidden border-2 flex-shrink-0"
                         style="border-color: var(--b-border); background-color: var(--b-bg);">
                        @if($currentPhoto)
                            <img src="{{ asset('storage/' . $currentPhoto) }}" alt="Profielfoto"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center" style="color: var(--b-text); opacity: 0.2;">
                                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <div class="flex-1 space-y-3">
                        <label for="profile_photo" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text); opacity: 0.6;">
                            Nieuwe foto uploaden
                        </label>
                        <input type="file" name="profile_photo" id="profile_photo" accept="image/*"
                               class="block w-full text-sm border-2 p-3 focus:outline-none"
                               style="border-color: var(--b-border); color: var(--b-text); background-color: var(--b-bg); font-family: 'Space Grotesk', sans-serif;">
                        <p class="text-xs" style="color: var(--b-text); opacity: 0.4;">
                            JPG, PNG of WebP · Max 5MB · Aanbevolen verhouding: 3:4 (portret)
                        </p>
                        @error('profile_photo') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror

                        @if($currentPhoto)
                            <label class="flex items-center gap-2 mt-2 cursor-pointer">
                                <input type="checkbox" name="remove_profile_photo" value="1"
                                       class="w-4 h-4 border-2" style="border-color: var(--b-border);">
                                <span class="text-xs font-bold uppercase tracking-widest" style="color: #e03a3e;">Huidige foto verwijderen</span>
                            </label>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Section 2: Over mij pagina ── --}}
        <div class="border-2 overflow-hidden" style="border-color: var(--b-border); background-color: var(--b-surface);">
            <div class="px-8 py-4 border-b-2 flex items-center gap-3" style="border-color: var(--b-border);">
                <div class="w-3 h-3 b-red"></div>
                <h2 class="text-xs font-bold uppercase tracking-widest" style="color: var(--b-text);">Over mij pagina</h2>
            </div>
            <div class="p-8 space-y-6">
                <div class="space-y-2">
                    <label for="bio_name" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text); opacity: 0.6;">Naam (grote titel)</label>
                    <input type="text" name="bio_name" id="bio_name" required value="{{ old('bio_name', $settings['bio_name']) }}"
                           class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                           style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                    @error('bio_name') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label for="bio_subtitle" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text); opacity: 0.6;">Ondertitel / functie</label>
                    <input type="text" name="bio_subtitle" id="bio_subtitle" value="{{ old('bio_subtitle', $settings['bio_subtitle']) }}"
                           placeholder="Bijv. Beeldend kunstenaar · Antwerpen"
                           class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                           style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                    @error('bio_subtitle') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label for="bio_text" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text); opacity: 0.6;">Bio tekst</label>
                    <textarea name="bio_text" id="bio_text" rows="6"
                              placeholder="Schrijf hier je bio. Je kan meerdere alinea's schrijven door een lege regel te laten."
                              class="w-full px-5 py-4 border-2 focus:outline-none transition-all resize-none"
                              style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">{{ old('bio_text', $settings['bio_text']) }}</textarea>
                    <p class="text-xs" style="color: var(--b-text); opacity: 0.45;">Lege regel = nieuwe alinea. Max 2000 tekens.</p>
                    @error('bio_text') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        {{-- ── Section 3: Instagram ── --}}
        <div class="border-2 overflow-hidden" style="border-color: var(--b-border); background-color: var(--b-surface);">
            <div class="px-8 py-4 border-b-2 flex items-center gap-3" style="border-color: var(--b-border);">
                <div class="w-3 h-3 b-blue"></div>
                <h2 class="text-xs font-bold uppercase tracking-widest" style="color: var(--b-text);">Instagram</h2>
            </div>
            <div class="p-8 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="instagram_handle" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text); opacity: 0.6;">Gebruikersnaam</label>
                        <input type="text" name="instagram_handle" id="instagram_handle" value="{{ old('instagram_handle', $settings['instagram_handle']) }}"
                               placeholder="@kaithy_art"
                               class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                               style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                        @error('instagram_handle') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="instagram_url" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text); opacity: 0.6;">Profiel URL</label>
                        <input type="url" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $settings['instagram_url']) }}"
                               placeholder="https://instagram.com/kaithy_art"
                               class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                               style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                        @error('instagram_url') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Section 3b: Notificatie email ── --}}
        <div class="border-2 overflow-hidden" style="border-color: var(--b-border); background-color: var(--b-surface);">
            <div class="px-8 py-4 border-b-2 flex items-center gap-3" style="border-color: var(--b-border);">
                <div class="w-3 h-3" style="background-color: #e03a3e;"></div>
                <h2 class="text-xs font-bold uppercase tracking-widest" style="color: var(--b-text);">Notificatie email</h2>
            </div>
            <div class="p-8 space-y-4">
                <div class="space-y-2">
                    <label for="notification_email" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text); opacity: 0.6;">
                        Stuur contactberichten naar
                    </label>
                    <input type="email" name="notification_email" id="notification_email"
                           value="{{ old('notification_email', $settings['notification_email']) }}"
                           placeholder="jouw@email.com"
                           class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                           style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                    <p class="text-xs" style="color: var(--b-text); opacity: 0.45;">
                        Als iemand het contactformulier invult, krijg je een e-mail op dit adres.
                        Laat leeg om geen emails te ontvangen (berichten zijn dan enkel zichtbaar in het dashboard).
                    </p>
                    @error('notification_email') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                </div>

                {{-- SMTP status indicator --}}
                @php
                    $mailer = config('mail.default');
                    $isConfigured = !in_array($mailer, ['log', 'array']);
                @endphp
                <div class="flex items-center gap-2 pt-2">
                    <div class="w-2 h-2 rounded-full" style="background-color: {{ $isConfigured ? '#22c55e' : '#e03a3e' }};"></div>
                    <p class="text-xs font-bold uppercase tracking-widest" style="color: var(--b-text); opacity: 0.5;">
                        Mail driver: <span style="color: {{ $isConfigured ? '#22c55e' : '#e03a3e' }}">{{ strtoupper($mailer) }}</span>
                        @if(!$isConfigured)
                            — nog niet geconfigureerd, zie instructies hieronder
                        @else
                            — actief
                        @endif
                    </p>
                </div>

                @if(!$isConfigured)
                <div class="mt-4 p-5 border-2" style="border-color: #f7b11c; background-color: rgba(247,177,28,0.06);">
                    <p class="text-xs font-bold uppercase tracking-widest mb-3" style="color: #f7b11c;">Configuratie vereist — .env bestand</p>
                    <p class="text-xs mb-3" style="color: var(--b-text); opacity: 0.7;">Voeg dit toe aan je <code style="font-family: monospace; background: rgba(0,0,0,0.1); padding: 1px 4px;">.env</code> bestand om Gmail te gebruiken:</p>
                    <pre style="font-size: 11px; font-family: monospace; line-height: 1.8; color: var(--b-text); opacity: 0.8; overflow-x: auto;">MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=jouw@gmail.com
MAIL_PASSWORD=xxxx_xxxx_xxxx_xxxx
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=jouw@gmail.com
MAIL_FROM_NAME="Kaithy Portfolio"</pre>
                    <p class="text-xs mt-3" style="color: var(--b-text); opacity: 0.55;">
                        Voor Gmail: gebruik een <strong>App Password</strong> (niet je gewone wachtwoord).<br>
                        Ga naar <strong>Google Account → Beveiliging → 2-stapsverificatie → App-wachtwoorden</strong> om er één aan te maken.
                    </p>
                </div>
                @endif
            </div>
        </div>

        {{-- ── Section 4: Account ── --}}
        <div class="border-2 overflow-hidden" style="border-color: var(--b-border); background-color: var(--b-surface);">
            <div class="px-8 py-4 border-b-2 flex items-center gap-3" style="border-color: var(--b-border);">
                <div class="w-3 h-3 b-black"></div>
                <h2 class="text-xs font-bold uppercase tracking-widest" style="color: var(--b-text);">Account</h2>
            </div>
            <div class="p-8 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="name" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text); opacity: 0.6;">Naam</label>
                        <input type="text" name="name" id="name" required value="{{ old('name', $user->name) }}"
                               class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                               style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                        @error('name') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text); opacity: 0.6;">Email</label>
                        <input type="email" name="email" id="email" required value="{{ old('email', $user->email) }}"
                               class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                               style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                        @error('email') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2 border-t-2" style="border-color: var(--b-border); opacity: 0.2;"></div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="password" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text); opacity: 0.6;">Nieuw Wachtwoord (optioneel)</label>
                        <input type="password" name="password" id="password"
                               class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                               style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                        @error('password') <p class="text-xs font-bold mt-1" style="color: #e03a3e;">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="password_confirmation" class="text-xs uppercase tracking-widest font-bold" style="color: var(--b-text); opacity: 0.6;">Bevestig Wachtwoord</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="w-full px-5 py-4 border-2 focus:outline-none transition-all"
                               style="background-color: var(--b-bg); border-color: var(--b-border); color: var(--b-text); font-family: 'Space Grotesk', sans-serif;">
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Section 5: Kleurenpalet ── --}}
        <div class="border-2 overflow-hidden" style="border-color: var(--b-border); background-color: var(--b-surface);">
            <div class="px-8 py-4 border-b-2 flex items-center gap-3" style="border-color: var(--b-border);">
                <div class="w-3 h-3 b-blue"></div>
                <h2 class="text-xs font-bold uppercase tracking-widest" style="color: var(--b-text);">Kleurenpalet</h2>
            </div>
            <div class="p-8">
                @php
                    $paletteOptions = [
                        'bauhaus'       => ['label' => 'Bauhaus',        'dark' => false, 'swatches' => ['#e03a3e', '#f7b11c', '#0d5c9c', '#1a1a1a', '#f4f4f4']],
                        'bordeaux'      => ['label' => 'Bordeaux',       'dark' => false, 'swatches' => ['#8C3040', '#D8CBBA', '#4F6478', '#2D3E50', '#131C27']],
                        'naval'         => ['label' => 'Naval',          'dark' => false, 'swatches' => ['#1D3A52', '#3D6F87', '#D9D3B3', '#C2B898', '#756B57']],
                        'atelier'       => ['label' => 'Atelier',        'dark' => false, 'swatches' => ['#1D2320', '#4A5550', '#EEE8D4', '#8B2D2D', '#5A0909']],
                        'noir'          => ['label' => 'Noir',           'dark' => true,  'swatches' => ['#111111', '#1C1C1C', '#C0392B', '#E8D5A3', '#2C3E50']],
                        'midnight'      => ['label' => 'Midnight',       'dark' => true,  'swatches' => ['#0D1117', '#161B22', '#4FC3F7', '#FFA726', '#1565C0']],
                        'foret'         => ['label' => 'Forêt',          'dark' => true,  'swatches' => ['#0D1B0F', '#132115', '#52B788', '#D4A017', '#2D6A4F']],
                        'bordeaux-nuit' => ['label' => 'Bordeaux Nuit',  'dark' => true,  'swatches' => ['#160B0D', '#1F1215', '#C62A47', '#D4AF37', '#8B4513']],
                    ];
                    $currentPalette = $settings['color_palette'] ?: 'bauhaus';
                @endphp
                <div x-data="{ selected: '{{ $currentPalette }}' }">
                    <p class="text-xs font-bold uppercase tracking-widest mb-3" style="color: var(--b-text); opacity: 0.45;">Lichte paletten</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        @foreach($paletteOptions as $key => $opt)
                        @if(!$opt['dark'])
                        <label class="cursor-pointer" style="display:block;">
                            <input type="radio" name="color_palette" value="{{ $key }}"
                                   {{ $currentPalette === $key ? 'checked' : '' }}
                                   x-on:change="selected = '{{ $key }}'"
                                   class="sr-only">
                            <div class="border-2 transition-all"
                                 :style="selected === '{{ $key }}'
                                    ? 'border-width:3px;border-color:var(--b-text);opacity:1'
                                    : 'border-color:var(--b-border);opacity:0.45'">
                                <div class="flex h-10">
                                    @foreach($opt['swatches'] as $swatch)
                                    <div style="background:{{ $swatch }};flex:1;"></div>
                                    @endforeach
                                </div>
                            </div>
                            <p class="mt-2 text-xs font-bold uppercase tracking-widest text-center" style="color: var(--b-text);">{{ $opt['label'] }}</p>
                        </label>
                        @endif
                        @endforeach
                    </div>

                    <p class="text-xs font-bold uppercase tracking-widest mb-3" style="color: var(--b-text); opacity: 0.45;">Altijd donkere paletten</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($paletteOptions as $key => $opt)
                        @if($opt['dark'])
                        <label class="cursor-pointer" style="display:block;">
                            <input type="radio" name="color_palette" value="{{ $key }}"
                                   {{ $currentPalette === $key ? 'checked' : '' }}
                                   x-on:change="selected = '{{ $key }}'"
                                   class="sr-only">
                            <div class="border-2 transition-all"
                                 :style="selected === '{{ $key }}'
                                    ? 'border-width:3px;border-color:var(--b-text);opacity:1'
                                    : 'border-color:var(--b-border);opacity:0.45'">
                                <div class="flex h-10">
                                    @foreach($opt['swatches'] as $swatch)
                                    <div style="background:{{ $swatch }};flex:1;"></div>
                                    @endforeach
                                </div>
                            </div>
                            <p class="mt-2 text-xs font-bold uppercase tracking-widest text-center" style="color: var(--b-text);">{{ $opt['label'] }}</p>
                        </label>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Section 6: Font ── --}}
        <div class="border-2 overflow-hidden" style="border-color: var(--b-border); background-color: var(--b-surface);">
            <div class="px-8 py-4 border-b-2 flex items-center gap-3" style="border-color: var(--b-border);">
                <div class="w-3 h-3 b-yellow"></div>
                <h2 class="text-xs font-bold uppercase tracking-widest" style="color: var(--b-text);">Font (titels &amp; headings)</h2>
            </div>
            <div class="p-8">
                @php
                    $fontOptions = [
                        'space-grotesk' => ['label' => 'Space Grotesk', 'family' => 'Space Grotesk, sans-serif'],
                        'kaoly'         => ['label' => 'Kaoly',         'family' => 'Kaoly, sans-serif'],
                        'bebas-neue'    => ['label' => 'Bebas Neue',    'family' => 'Bebas Neue, sans-serif'],
                        'playfair'      => ['label' => 'Playfair Display', 'family' => 'Playfair Display, serif'],
                        'cormorant'     => ['label' => 'Cormorant Garamond', 'family' => 'Cormorant Garamond, serif'],
                        'russo-one'     => ['label' => 'Russo One',     'family' => 'Russo One, sans-serif'],
                    ];
                    $currentFont = $settings['site_font'] ?? 'space-grotesk';
                @endphp

                {{-- Load all font options for the preview --}}
                <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Playfair+Display:wght@700&family=Cormorant+Garamond:wght@700&family=Russo+One&display=swap" rel="stylesheet">

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4"
                     x-data="{ selected: '{{ $currentFont }}' }">
                    @foreach($fontOptions as $key => $opt)
                    <label class="cursor-pointer" style="display:block;">
                        <input type="radio" name="site_font" value="{{ $key }}"
                               {{ $currentFont === $key ? 'checked' : '' }}
                               x-on:change="selected = '{{ $key }}'"
                               class="sr-only">
                        <div class="border-2 p-4 transition-all"
                             style="background-color: var(--b-bg);"
                             :style="selected === '{{ $key }}'
                                ? 'border-width:3px;border-color:var(--b-text);opacity:1'
                                : 'border-color:var(--b-border);opacity:0.55'">
                            <p style="font-family:{{ $opt['family'] }}; font-size:32px; text-transform:uppercase; line-height:1; color:var(--b-text);">
                                Kaithy
                            </p>
                            <p class="mt-2 text-xs font-bold uppercase tracking-widest" style="font-family:'Space Grotesk',sans-serif; color:var(--b-text); opacity:0.5;">{{ $opt['label'] }}</p>
                        </div>
                    </label>
                    @endforeach
                </div>
                <p class="text-xs mt-4" style="color: var(--b-text); opacity: 0.4;">Enkel titels en headings. Body tekst blijft altijd Space Grotesk.</p>
            </div>
        </div>

        <div class="pt-2">
            <button type="submit"
                    class="px-12 py-4 text-xs font-bold uppercase tracking-widest border-2 transition-all hover:-translate-y-0.5"
                    style="background-color: var(--b-text); color: var(--b-bg); border-color: var(--b-text);">
                Alles Opslaan
            </button>
        </div>
    </form>
</x-layouts.admin>
