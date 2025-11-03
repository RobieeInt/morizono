@props([
    // default background
    'background' => asset('images/hero.jpg'),
    'welcomeText' => 'WELCOME TO',
    'logo' => null,
    'title' => '',
    'tagline' => 'Crafted with Japanese Precision, Built for Comfortable Living',
    'subtitle' => '',
    'clusters' => [
        ['label' => 'Sumire', 'href' => '#sumire'],
        ['label' => 'Ayame', 'href' => '#ayame'],
        ['label' => 'Kaede', 'href' => '#kaede'],
    ],
    'ctaLabel' => 'Book a tour',
    'ctaHref' => '#book',
])

@php
    // Peta label -> background (3 aset)
    $bgMap = [
        'Ayame' => asset('images/hero-ayame.webp'),
        'Kaede' => asset('images/hero-kaede.webp'),
        'Sumire' => asset('images/hero-sumire.webp'),
    ];
@endphp

<section x-data="{ bgCurrent: '{{ $background }}' }" :style="`background-image:url('${bgCurrent}')`"
    class="relative h-screen w-full overflow-hidden flex items-center justify-center text-center bg-cover bg-center">
    {{-- overlay gelap tipis --}}
    <div class="absolute inset-0 bg-black/45"></div>

    {{-- konten utama, center --}}
    <div class="relative z-10 flex flex-col items-center justify-center max-w-6xl px-4 sm:px-6 lg:px-8">

        <p
            class="mt-5 mb-10 max-w-2xl text-white text-5xl sm:text-3xl md:text-5xl font-heading uppercase tracking-[0.15em]">
            {{ $welcomeText ?? 'zz' }}
        </p>

        @if ($logo)
            <img src="{{ $logo }}" alt="Morizono" class="h-16 md:h-28 lg:h-32 mb-5 opacity-95">
        @endif

        <p class="mt-3 text-white/90 text-sm sm:text-base font-headings uppercase tracking-[0.2em]">
            {{ $tagline }}
        </p>

        <p class="mt-5 max-w-2xl text-white/80 text-xs sm:text-sm font-heading uppercase tracking-[0.15em]">
            {{-- {{ $subtitle }} --}}
        </p>

        {{-- cluster buttons + developed branding (dijadiin satu stack biar nempel) --}}
        <div class="mt-6 flex flex-col items-center gap-3">
            <div class="w-full max-w-3xl grid grid-cols-1 sm:grid-cols-3 gap-3">
                @foreach ($clusters as $c)
                    @php
                        $label = $c['label'] ?? '';
                        $bgForThis = $bgMap[$label] ?? $background;
                    @endphp
                    <a href="{{ $c['href'] }}" @mouseenter="bgCurrent='{{ $bgForThis }}'"
                        @mouseleave="bgCurrent='{{ $background }}'" @focus="bgCurrent='{{ $bgForThis }}'"
                        @blur="bgCurrent='{{ $background }}'"
                        class="backdrop-blur bg-white/25 hover:bg-white/35 text-white rounded px-6 py-3 text-center text-sm font-medium transition">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            {{-- developed branding, rapet di bawah tombol --}}
            <img src="{{ asset('logo/developed.webp') }}" alt="Morizono"
                class="w-full max-w-[360px] sm:max-w-[440px] lg:max-w-[520px] opacity-95 mt-20" />
        </div>
    </div>

    {{-- floating CTA kanan atas (optional) --}}
    {{-- @if ($ctaLabel && $ctaHref)
        <a href="{{ $ctaHref }}"
           class="hidden md:inline-flex absolute top-4 right-4 bg-amber-300 hover:bg-amber-400 text-gray-900 text-sm font-semibold rounded-full px-4 py-2 transition z-20">
           {{ $ctaLabel }}
        </a>
    @endif --}}

    {{-- WhatsApp floating button kiri bawah --}}
    <a href="https://wa.me/628568780192" target="_blank" rel="noopener"
        class="fixed left-4 bottom-5 z-20 block shadow-lg transition hover:opacity-90">
        <img src="{{ asset('whatsapp.svg') }}" alt="WhatsApp" class="w-12 h-12" />
    </a>
</section>
