@props([
    'title' => 'Simulasi Cicilan KPR',
    'subtitle' => 'Hitung estimasi cicilan dari berbagai bank rekanan sebelum ambil keputusan.',
])

<section class="bg-[#EFECDC]">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-14 sm:py-20 text-center">
        <div class="text-xs tracking-widest text-[#C8A767] font-semibold mb-2">MORIZONO</div>
        <h2 class="text-3xl sm:text-4xl font-light text-[#4a3c33]" style="font-family:'Marcellus',serif;">
            {{ $title }}
        </h2>
        <p class="text-gray-600 mt-3 max-w-xl mx-auto">{{ $subtitle }}</p>

        <a href="{{ route('kpr.simulator') }}"
            class="inline-flex items-center justify-center rounded bg-[#4a3c33] hover:bg-[#3a2f28] text-[#C8A767] font-semibold px-8 py-3 mt-6 transition">
            Simulasi KPR Sekarang
        </a>
    </div>
</section>
