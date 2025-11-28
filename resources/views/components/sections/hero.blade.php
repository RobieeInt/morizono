@props([
    'background' => asset('images/hero.jpg'),
    'welcomeText' => 'WELCOME TO',
    'logo' => null,
    'title' => '',
    'tagline' => 'The Art of Japanese Living',
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
    $bgMap = [
        'Ayame' => asset('images/hero-ayame.webp'),
        'Kaede' => asset('images/hero-kaede.webp'),
        'Sumire' => asset('images/hero-sumire.webp'),
        // ShopHouse boleh pakai default background, jadi ga usah dimapping
    ];

    $primaryClusters = array_slice($clusters, 0, 3);
    $extraClusters = array_slice($clusters, 3);
@endphp

<section x-data="{ bgCurrent: '{{ $background }}' }" :style="`background-image:url('${bgCurrent}')`"
    class="relative h-screen w-full overflow-hidden flex items-center justify-center text-center bg-cover bg-center">

    {{-- overlay fade untuk animasi hover bg --}}
    <div x-ref="fade" class="absolute inset-0 bg-black opacity-0 pointer-events-none transition-opacity duration-500">
    </div>

    {{-- overlay gelap --}}
    <div class="absolute inset-0 bg-black/45"></div>

    <div class="relative z-10 flex flex-col items-center justify-center max-w-6xl px-4 sm:px-6 lg:px-8">

        <p class="mt-5 mb-10 max-w-2xl text-white font-heading uppercase tracking-[0.15em] text-[clamp(24px,5vw,32px)]">
            {{ $welcomeText ?? 'zz' }}
        </p>

        @if ($logo)
            <img src="{{ $logo }}" alt="Morizono" class="h-[clamp(60px,10vw,120px)] mb-5 opacity-95">
        @endif

        <p class="mt-3 text-white/90 font-headings uppercase tracking-[0.2em] text-[clamp(12px,1.3vw,18px)]">
            {{ $tagline }}
        </p>

        <div class="mt-6 flex flex-col items-center gap-3">
            {{-- ROW 1: cluster buttons (max 3) --}}
            <div class="w-full max-w-3xl grid grid-cols-1 sm:grid-cols-3 gap-3">
                @foreach ($primaryClusters as $c)
                    @php
                        $label = $c['label'];
                        $href = $c['href'] ?? '#';
                        $bgForThis = $bgMap[$label] ?? $background;
                    @endphp

                    <a href="{{ $href }}"
                        @mouseenter="
                            $refs.fade.classList.add('opacity-60');
                            setTimeout(()=>{ bgCurrent='{{ $bgForThis }}' },200);
                            setTimeout(()=>{ $refs.fade.classList.remove('opacity-60') },300);
                        "
                        @mouseleave="
                            $refs.fade.classList.add('opacity-60');
                            setTimeout(()=>{ bgCurrent='{{ $background }}' },200);
                            setTimeout(()=>{ $refs.fade.classList.remove('opacity-60') },300);
                        "
                        class="backdrop-blur bg-white/25 hover:bg-white/35 text-white rounded px-6 py-3 text-center text-sm font-medium transition">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            {{-- ROW 2: extra buttons (ShopHouse, dll) full width tapi style sama --}}
            @if (count($extraClusters))
                <div class="w-full max-w-3xl grid grid-cols-1 gap-3">
                    @foreach ($extraClusters as $c)
                        @php
                            $label = $c['label'];
                            $href = $c['href'] ?? '#';
                            $bgForThis = $bgMap[$label] ?? $background;
                        @endphp

                        <a href="{{ $href }}"
                            @mouseenter="
                                $refs.fade.classList.add('opacity-60');
                                setTimeout(()=>{ bgCurrent='{{ $bgForThis }}' },200);
                                setTimeout(()=>{ $refs.fade.classList.remove('opacity-60') },300);
                            "
                            @mouseleave="
                                $refs.fade.classList.add('opacity-60');
                                setTimeout(()=>{ bgCurrent='{{ $background }}' },200);
                                setTimeout(()=>{ $refs.fade.classList.remove('opacity-60') },300);
                            "
                            class="backdrop-blur bg-white/25 hover:bg-white/35 text-white rounded px-6 py-3 text-center text-sm font-medium transition">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            @endif

            <img src="{{ asset('logo/developed.webp') }}" alt="Morizono"
                class="w-full max-w-[360px] sm:max-w-[440px] lg:max-w-[520px] opacity-95 mt-20" />
        </div>
    </div>

    <a href="https://wa.me/628568780192" target="_blank" rel="noopener"
        class="fixed left-4 bottom-5 z-20 block shadow-lg transition hover:opacity-90">
        <img src="{{ asset('whatsapp.svg') }}" alt="WhatsApp" class="w-12 h-12" />
    </a>
</section>
