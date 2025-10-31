@props([
    'eyebrow' => 'Why Morizono?',
    'titlee' => 'Why Morizono?',
    'desc' =>
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
])

<section id="clusters" class="bg-[#EFECDC]">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 pb-16 sm:pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
            <div>
                <div class="text-xs tracking-[0.25em] text-gray-600 mb-2">{{ $eyebrow }}</div>
                <h3 class="text-4xl sm:text-5xl font-light text-[#C8A767]">
                    {{ $titlee }}
                </h3>
            </div>
            <div class="text-sm sm:text-base text-gray-700/90 leading-relaxed">
                {{ $desc }}
            </div>
        </div>
    </div>
</section>
