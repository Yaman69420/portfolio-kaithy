<x-layouts.app>
    <section class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="md:w-1/2">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-full h-full border-2 border-gray-100 rounded-2xl"></div>
                    <div class="bg-gray-100 rounded-2xl overflow-hidden aspect-[3/4] relative z-10 shadow-sm">
                        <!-- Placeholder for Portrait -->
                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                             <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:w-1/2 space-y-8">
                <h1 class="text-5xl font-serif font-bold tracking-tight">Kaithy</h1>
                <h2 class="text-xl italic text-gray-500 font-serif">Beeldend Kunstenaar & Visionair</h2>
                
                <div class="prose prose-stone text-gray-600 leading-loose space-y-6">
                    <p>
                        Mijn werk verkent de grens tussen de fysieke realiteit en de abstracte wereld van emoties. Door gebruik te maken van uiteenlopende materialen probeer ik de essentie van menselijke ervaringen vast te leggen.
                    </p>
                    <p>
                        Gevestigd in een rustig atelier in de stad, laat ik me inspireren door de kleine details in het dagelijks leven die vaak over het hoofd worden gezien. Mijn passie ligt bij het creëren van werken die niet alleen visueel aantrekkelijk zijn, maar ook uitnodigen tot reflectie.
                    </p>
                </div>

                <div class="pt-8">
                    <a href="{{ route('contact.show') }}" 
                       class="inline-flex items-center px-10 py-5 bg-black text-white text-xs font-bold uppercase tracking-widest rounded-full hover:bg-gray-800 transition-all shadow-lg">
                        Laten we kennismaken
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
