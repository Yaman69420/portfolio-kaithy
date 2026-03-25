@php
    use App\Models\SiteSettings;
    $bioName      = SiteSettings::get('bio_name', 'Kaithy');
    $bioSubtitle  = SiteSettings::get('bio_subtitle');
    $bioText      = SiteSettings::get('bio_text');
    $profilePhoto = SiteSettings::get('profile_photo');
@endphp

<x-layouts.app>
    <section class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        <!-- Bauhaus header -->
        <h1 class="text-7xl md:text-9xl font-bold uppercase tracking-tighter leading-none mb-4" style="color: var(--b-text);">
            Over mij
        </h1>
        <div class="flex mb-16" aria-hidden="true">
            <div class="h-2 w-16 b-yellow"></div>
            <div class="h-2 w-24 b-red"></div>
            <div class="h-2 w-32 b-blue"></div>
        </div>

        <div class="flex flex-col md:flex-row items-start gap-16">

            <!-- Portrait -->
            <div class="md:w-1/2">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-full h-full border-2" style="border-color: var(--b-border);"></div>
                    <div class="overflow-hidden aspect-[3/4] relative z-10" style="background-color: var(--b-surface);">
                        @if($profilePhoto)
                            <img src="{{ asset('storage/' . $profilePhoto) }}"
                                 alt="{{ $bioName }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center" style="color: var(--b-text); opacity: 0.15;">
                                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 b-red rounded-full z-0 opacity-80"></div>
                </div>
            </div>

            <!-- Text -->
            <div class="md:w-1/2 space-y-8">
                <div>
                    <h2 class="text-4xl font-bold uppercase tracking-tighter" style="color: var(--b-text);">{{ $bioName }}</h2>
                    @if($bioSubtitle)
                        <p class="text-sm font-bold uppercase tracking-widest mt-2" style="color: var(--b-text); opacity: 0.5;">{{ $bioSubtitle }}</p>
                    @endif
                    <div class="h-1 w-12 b-yellow mt-3"></div>
                </div>

                @if($bioText)
                    <div class="space-y-6 text-base leading-loose" style="color: var(--b-text); opacity: 0.8;">
                        @foreach(explode("\n\n", trim($bioText)) as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach
                    </div>
                @else
                    <p class="text-base leading-loose" style="color: var(--b-text); opacity: 0.4; font-style: italic;">
                        Geen bio ingesteld. Voeg tekst toe via Admin → Instellingen.
                    </p>
                @endif

                <div class="pt-4">
                    <a href="{{ route('contact.show') }}"
                       class="inline-flex items-center px-10 py-4 text-xs font-bold uppercase tracking-widest border-2 transition-all hover:-translate-y-0.5"
                       style="background-color: var(--b-text); color: var(--b-bg); border-color: var(--b-text);">
                        Laten we kennismaken
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
