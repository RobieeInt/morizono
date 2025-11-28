@props([
    'title' => 'Smart Home Features',
    'subtitle' => 'Modern technology for a more comfortable and secure living',
    'items' => [
        ['icon' => asset('icon/shophouse.svg'), 'label' => 'Shophouse'],
        ['icon' => asset('icon/clubhouse.svg'), 'label' => 'Clubhouse'],
        ['icon' => asset('icon/mushola.svg'), 'label' => 'Mushola'],
        // tambahin lagi sesuka hati lu
    ],
])

<section id="resident-facilities" class="bg-[#EFECDC] py-16 sm:py-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Heading --}}
        <div class="text-center mb-10">
            <h2 class="text-3xl sm:text-4xl font-light tracking-tight text-gray-900">
                {{ $title }}
            </h2>
            @if ($subtitle)
                <p class="mt-3 text-sm sm:text-base text-gray-600 max-w-2xl mx-auto">
                    {{ $subtitle }}
                </p>
            @endif
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8 sm:gap-10">
            @foreach ($items as $i)
                <div class="flex flex-col items-center text-center group cursor-default">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 mb-4">
                        <img src="{{ $i['icon'] }}" alt="{{ $i['label'] }}"
                            class="w-full h-full object-contain opacity-90 group-hover:opacity-100 transition">
                    </div>
                    <p class="text-gray-900 font-medium text-sm sm:text-base tracking-wide">
                        {{ $i['label'] }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>
</section>
