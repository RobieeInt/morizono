@props([
    'clusters' => [],
])

<section id="clusters" class="bg-[#EFECDC]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 space-y-10">
        @foreach ($clusters as $idx => $c)
            <div class="cluster-item opacity-0 translate-y-[80px]
    transition-all duration-[1300ms] ease-out
    grid md:grid-cols-2 gap-8 items-start md:items-center border-b-4 border-black py-8"
                id="{{ $c['name'] }}">

                {{-- RIGHT (gambar) duluan pas mobile --}}
                <div x-data="{
                    i: 0,
                    imgs: @js($c['images'] ?? []),
                    prev() { this.i = (this.i - 1 + this.imgs.length) % this.imgs.length },
                    next() { this.i = (this.i + 1) % this.imgs.length }
                }" class="relative order-1 md:order-2">
                    {{-- wrapper gambar: klik kiri = prev, kanan = next --}}
                    <div class="rounded-[18px] overflow-hidden shadow-sm bg-white aspect-[4/4] cursor-pointer"
                        @click="
            const w = $el.clientWidth;
            const x = $event.offsetX;
            if (x < w / 2) { prev() } else { next() }
         ">
                        <template x-if="imgs.length">
                            <img :src="imgs[i]" alt="{{ $c['name'] }}" class="w-full h-full object-cover">
                        </template>
                    </div>

                    {{-- arrows --}}
                    <button @click.stop="prev"
                        class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white rounded-full w-8 h-8 grid place-items-center shadow">
                        ‹
                    </button>
                    <button @click.stop="next"
                        class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white rounded-full w-8 h-8 grid place-items-center shadow">
                        ›
                    </button>

                    {{-- dots --}}
                    <div class="absolute bottom-3 right-4 flex gap-2">
                        <template x-for="(img,idx) in imgs" :key="idx">
                            <span @click="i = idx" class="h-1.5 w-6 rounded-full"
                                :class="idx === i ? 'bg-amber-400' : 'bg-black/20'"></span>
                        </template>
                    </div>
                </div>

                {{-- LEFT (info) di bawah pas mobile --}}
                <div class="order-2 md:order-1 md:flex md:flex-col md:justify-center md:h-full md:self-center">
                    <div class="flex items-start justify-between">
                        <h3 class="text-2xl sm:text-3xl font-light text-[#C8A767] font-heading">{{ $c['name'] }}</h3>
                        <a href="{{ $c['tourUrl'] ?? '#book' }}"
                            class="rounded bg-amber-300 hover:bg-amber-400 text-gray-900 text-xs sm:text-sm font-semibold px-3 py-2 transition">
                            Schedule a tour
                        </a>
                    </div>

                    {{-- specs --}}
                    <div class="mt-4 grid grid-cols-4 gap-x-6 gap-y-2 text-sm text-gray-800">
                        @foreach ($c['specs'] ?? [] as $spec)
                            <div>{{ $spec }}</div>
                        @endforeach
                    </div>

                    {{-- accordion --}}
                    <div class="mt-4 divide-y divide-black/10">
                        @foreach ($c['items'] ?? [] as $item)
                            <div x-data="{ open: false }" class="py-3">
                                <button @click="open=!open" class="w-full flex items-center justify-between text-left">
                                    <span class="text-gray-900">{{ $item['title'] }}</span>
                                    <span class="text-lg select-none" x-text="open ? '–' : '+'"></span>
                                </button>
                                <div x-show="open" x-collapse class="pt-2 text-sm text-gray-700/90 leading-relaxed">
                                    @if (is_array($item['detail']))
                                        <ul class="list-disc ms-5 space-y-1">
                                            @foreach ($item['detail'] as $d)
                                                <li>{{ $d }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>{{ $item['detail'] }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const items = document.querySelectorAll('.cluster-item');

        function revealClusters() {
            items.forEach((sec, i) => {
                const r = sec.getBoundingClientRect().top;
                if (r < window.innerHeight * 0.9) {
                    sec.classList.remove('opacity-0', 'translate-y-[80px]');
                    sec.style.transitionDelay = (i * 120) + "ms"; // delay dikit biar satu² naik
                }
            });
        }

        window.addEventListener('scroll', revealClusters);
        revealClusters();
    });
</script>
