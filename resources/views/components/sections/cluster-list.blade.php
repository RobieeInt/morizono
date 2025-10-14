@props([
    'clusters' => [],
])

<section id="clusters" class="bg-[#EFECDC]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 space-y-10">
        @foreach ($clusters as $idx => $c)
            {{-- tiap cluster punya border sendiri --}}
            <div
                class="grid md:grid-cols-2 items-stretch border-4 border-[#2c2c2c] rounded-2xl bg-white/70 shadow-md overflow-hidden">

                {{-- LEFT: info --}}
                <div class="order-2 md:order-1 p-6 sm:p-8 flex flex-col justify-center">
                    <div class="flex items-start justify-between">
                        <h3 class="text-2xl sm:text-3xl font-semibold text-[#1f1f1f] tracking-wide">
                            {{ $c['name'] }}
                        </h3>
                        <a href="{{ $c['tourUrl'] ?? '#book' }}"
                            class="rounded bg-amber-300 hover:bg-amber-400 text-gray-900 text-xs sm:text-sm font-semibold px-3 py-2 transition">
                            Schedule a tour
                        </a>
                    </div>

                    {{-- specs --}}
                    <div class="mt-4 grid grid-cols-4 gap-x-6 gap-y-2 text-sm text-gray-800">
                        @foreach ($c['specs'] ?? [] as $spec)
                            <div class="font-medium">{{ $spec }}</div>
                        @endforeach
                    </div>

                    {{-- accordion items --}}
                    <div class="mt-6 divide-y divide-[#d2cbb0]">
                        @foreach ($c['items'] ?? [] as $item)
                            <div x-data="{ open: false }" class="py-4">
                                <button @click="open=!open"
                                    class="w-full flex items-center justify-between text-left font-semibold text-[#2c2c2c] hover:text-[#C8A767] transition">
                                    <span>{{ $item['title'] }}</span>
                                    <span class="text-xl select-none font-light" x-text="open ? '–' : '+'"></span>
                                </button>
                                <div x-show="open" x-collapse class="pt-3 text-sm text-gray-800 leading-relaxed">
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

                {{-- RIGHT: image slider --}}
                <div x-data="{
                    i: 0,
                    imgs: @js($c['images'] ?? []),
                    prev() { this.i = (this.i - 1 + this.imgs.length) % this.imgs.length },
                    next() { this.i = (this.i + 1) % this.imgs.length }
                }"
                    class="relative order-1 md:order-2 flex items-center justify-center bg-black">
                    <div class="w-full h-full flex items-center justify-center">
                        <template x-if="imgs.length">
                            <img :src="imgs[i]" alt="{{ $c['name'] }}"
                                class="max-h-[380px] w-full object-contain object-center">
                        </template>
                    </div>

                    <button @click="prev"
                        class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white rounded-full w-8 h-8 grid place-items-center shadow">
                        ‹
                    </button>
                    <button @click="next"
                        class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white rounded-full w-8 h-8 grid place-items-center shadow">
                        ›
                    </button>

                    <div class="absolute bottom-3 right-4 flex gap-2">
                        <template x-for="(img,idx) in imgs" :key="idx">
                            <span @click="i = idx" class="h-1.5 w-6 rounded-full cursor-pointer"
                                :class="idx === i ? 'bg-amber-400' : 'bg-white/30'"></span>
                        </template>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
