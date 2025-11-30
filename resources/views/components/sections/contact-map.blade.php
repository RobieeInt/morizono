@props([
    'title' => 'How can we help you? Write us a message',
    'mapQuery' => 'Jl. Cinangka Raya, Curug, Bojongsari, Depok, Jawa Barat 16517',
])

<section id="contact" class="bg-[#4a3c33]">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-stretch">
            {{-- LEFT: FORM PANEL --}}
            <div class="h-full">
                <div class="rounded-md h-full p-6 sm:p-8 flex flex-col">
                    <h2 class="whitespace-pre-line text-3xl sm:text-4xl font-light leading-tight text-[#C8A767]">
                        {!! nl2br(e($title)) !!}
                    </h2>

                    <div class="mt-6 flex-1 flex">
                        <div class="w-full">
                            <livewire:contact-form />
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT: MAP PANEL --}}
            {{-- <div class="h-full">
                <div class="rounded-md overflow-hidden h-full flex flex-col">
                    <iframe title="Morizono Location" class="w-full flex-1 min-h-[420px]" style="border:0"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps?q={{ urlencode($mapQuery) }}&hl=id&z=16&output=embed">
                    </iframe>

                    <div class="flex justify-end p-2">
                        <a target="_blank" rel="noopener"
                            href="https://www.google.com/maps/dir/?api=1&destination={{ urlencode($mapQuery) }}"
                            class="inline-flex items-center gap-2 text-xs text-white/90 px-3 py-1.5 rounded bg-black/30 hover:bg-black/40">
                            Buka arah
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M14 3l7 7-7 7-1.5-1.5 4.5-4.5H3v-2h14L12.5 4.5 14 3z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div> --}}
            {{-- RIGHT: IMAGE PANEL --}}
            <div class="h-full">
                <div class="rounded-md overflow-hidden h-full">
                    <img src="{{ asset('images/about/about1.webp') }}" alt="Morizono Office"
                        class="w-full h-full object-cover">
                </div>
            </div>

        </div>
    </div>
</section>
