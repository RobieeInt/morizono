@props([
    // path gambar hero. Isi absolut atau url(), terserah selera
    'background' => asset('images/hero.jpg'),
    'logo' => null, // path logo kecil di atas title (opsional)
    'title' => '',
    'tagline' => 'A Home Where Life Begins and Grows',
    'subtitle' => 'Lorem ipsum dolor sit amet insectum lorem ipsum',
    'clusters' => [
        ['label' => 'Sumire', 'href' => '#sumire'],
        ['label' => 'Ayame', 'href' => '#ayame'],
        ['label' => 'Kaede', 'href' => '#kaede'],
    ],
    // CTA kanan atas (opsional)
    'ctaLabel' => 'Book a tour',
    'ctaHref' => '#book',
])

<section class="relative h-screen w-full overflow-hidden flex items-center justify-center text-center">
    {{-- background image --}}
    <div class="absolute inset-0 bg-center bg-cover" style="background-image: url('{{ $background }}')"
        aria-hidden="true"></div>

    {{-- overlay gelap tipis --}}
    <div class="absolute inset-0 bg-black/45"></div>

    {{-- konten utama, bener2 tengah --}}
    <div class="relative z-10 flex flex-col items-center justify-center max-w-6xl px-4 sm:px-6 lg:px-8">
        @if ($logo)
            <img src="{{ $logo }}" alt="Morizono" class="h-10 sm:h-12 mb-5 opacity-95">
        @endif

        <h1 class="tracking-[0.35em] text-white text-4xl sm:text-5xl md:text-6xl font-light">
            {{ $title }}
        </h1>

        <p class="mt-3 text-white/90 text-sm sm:text-base">
            {{ $tagline }}
        </p>

        <p class="mt-5 max-w-2xl text-white/80 text-xs sm:text-sm">
            {{ $subtitle }}
        </p>

        {{-- cluster buttons --}}
        <div class="mt-8 w-full max-w-3xl grid grid-cols-1 sm:grid-cols-3 gap-3">
            @foreach ($clusters as $c)
                <a href="{{ $c['href'] }}"
                    class="backdrop-blur bg-white/25 hover:bg-white/35 text-gray-900 rounded px-6 py-3 text-center text-sm font-medium transition">
                    {{ $c['label'] }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- floating CTA kanan atas (optional, mirip mockup navbar) --}}
    @if ($ctaLabel && $ctaHref)
        <a href="{{ $ctaHref }}"
            class="hidden md:inline-flex absolute top-4 right-4 bg-amber-300 hover:bg-amber-400 text-gray-900 text-sm font-semibold rounded-full px-4 py-2 transition z-20">
            {{ $ctaLabel }}
        </a>
    @endif

    {{-- WhatsApp floating button kiri bawah --}}
    <a href="https://wa.me/628568780192" target="_blank" rel="noopener"
        class="fixed left-4 bottom-5 z-20 block shadow-lg transition hover:opacity-90">
        <img src="{{ asset('whatsapp.svg') }}" alt="WhatsApp" class="w-12 h-12" />
    </a>
</section>
