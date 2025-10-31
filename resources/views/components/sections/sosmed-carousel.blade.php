@props([
    'title' => 'Follow Our Social Media',
    'subtitle' => 'Stay connected with Morizono for updates, stories, and more',
    'seeAllUrl' => '#',
    // sosmed: array of [title, excerpt, category, date, embed, url]
    'sosmed' => [],
])

<section id="sosmed" class="bg-[#EFECDC]">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-12 sm:py-16" x-data="sosmedSlider({
        perPage: (window.innerWidth >= 1024 ? 3 : window.innerWidth >= 640 ? 2 : 1),
        intervalMs: 5000
    })" x-init="$watch('perPage', v => updateDots());
    window.addEventListener('resize', () => { perPage = (window.innerWidth >= 1024 ? 3 : window.innerWidth >= 640 ? 2 : 1); });
    init();"
        @mouseenter="pause()" @mouseleave="play()">

        {{-- header --}}
        {{-- <div class="grid grid-cols-3 items-end mb-6 sm:mb-8">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light tracking-tight text-gray-900">{{ $title }}</h2>
            </div>
            <div class="text-center text-sm text-gray-600 hidden sm:block">
                {{ $subtitle }}
            </div>
            <div class="text-right">
                <a href="{{ $seeAllUrl }}" class="text-sm underline hover:text-gray-900">Visit Page</a>
            </div>
        </div> --}}

        {{-- slider --}}
        <div class="relative">
            {{-- buttons --}}
            <button type="button" @click="prev()" aria-label="Previous"
                class="hidden sm:flex absolute -left-3 top-1/2 -translate-y-1/2 z-20 bg-white/80 hover:bg-white rounded-md w-9 h-9 items-center justify-center shadow">
                ‹
            </button>
            <button type="button" @click="next()" aria-label="Next"
                class="flex absolute -right-3 top-1/2 -translate-y-1/2 z-20 bg-white/90 hover:bg-white rounded-md w-10 h-10 items-center justify-center shadow">
                ›
            </button>

            {{-- track --}}
            <div x-ref="track" class="overflow-x-auto scroll-smooth snap-x snap-mandatory hide-scrollbar"
                @scroll.debounce.100="onScroll()" @pointerdown="pause()" @pointerup="play()">
                <div class="flex gap-6 lg:gap-8 w-max">
                    @foreach ($sosmed as $p)
                        <article class="relative snap-start w-[86vw] sm:w-[44vw] lg:w-[352px] shrink-0">
                            <a href="{{ $p['url'] }}" target="_blank" rel="noopener" class="block group">
                                <div class="relative rounded-[10px] overflow-hidden shadow">
                                    {{-- Instagram Embed --}}
                                    <div class="aspect-[9/16] bg-black relative">
                                        <iframe src="{{ $p['embed'] }}" class="w-full h-full" frameborder="0"
                                            allowfullscreen scrolling="no" loading="lazy">
                                        </iframe>
                                        {{-- klik overlay biar area iframe tetap bisa diklik --}}
                                        <div class="absolute inset-0"></div>
                                    </div>

                                    {{-- gradient overlay --}}
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent">
                                    </div>

                                    {{-- badges --}}
                                    <div class="absolute top-3 left-4 text-[12px] font-medium text-white/90">
                                        {{ $p['category'] ?? '' }}
                                    </div>
                                    <div class="absolute top-3 right-4 text-[12px] text-white/80">
                                        {{ $p['date'] ?? '' }}
                                    </div>

                                    {{-- caption --}}
                                    <div class="absolute left-0 right-0 bottom-0 p-4 sm:p-5 text-white">
                                        <h3
                                            class="text-xl sm:text-2xl font-semibold leading-snug group-hover:underline">
                                            {{ $p['title'] }}
                                        </h3>
                                        <p class="mt-2 text-sm text-white/85 line-clamp-2">
                                            {{ $p['excerpt'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>

            {{-- dots --}}
            <div class="mt-5 flex justify-end gap-2 pe-1">
                <template x-for="(d,idx) in dots" :key="idx">
                    <span :class="idx === activeDot ? 'bg-amber-400' : 'bg-black/25'"
                        class="h-1.5 w-8 rounded-full cursor-pointer" @click="goTo(idx)"></span>
                </template>
            </div>
        </div>
    </div>

    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    {{-- Alpine controller --}}
    <script>
        function sosmedSlider(init) {
            return {
                perPage: init.perPage ?? 3,
                intervalMs: init.intervalMs ?? 5000,
                timer: null,
                dots: [],
                activeDot: 0,

                updateDots() {
                    const items = this.$refs.track?.querySelectorAll('article').length || 0;
                    const pages = Math.max(1, Math.ceil(items / this.perPage));
                    this.dots = Array.from({
                        length: pages
                    });
                    this.activeDot = Math.min(this.activeDot, pages - 1);
                },
                onScroll() {
                    const el = this.$refs.track;
                    const w = el.clientWidth;
                    if (w > 0) this.activeDot = Math.round(el.scrollLeft / w);
                },
                next() {
                    const el = this.$refs.track;
                    el.scrollBy({
                        left: el.clientWidth,
                        behavior: 'smooth'
                    });
                    this.activeDot = (this.activeDot + 1) % this.dots.length;
                },
                prev() {
                    const el = this.$refs.track;
                    el.scrollBy({
                        left: -el.clientWidth,
                        behavior: 'smooth'
                    });
                    this.activeDot = (this.activeDot - 1 + this.dots.length) % this.dots.length;
                },
                goTo(i) {
                    const el = this.$refs.track;
                    el.scrollTo({
                        left: i * el.clientWidth,
                        behavior: 'smooth'
                    });
                    this.activeDot = i;
                },
                play() {
                    clearInterval(this.timer);
                    this.timer = setInterval(() => this.next(), this.intervalMs);
                },
                pause() {
                    clearInterval(this.timer);
                },
                init() {
                    this.updateDots();
                    this.play();
                },
            }
        }
    </script>
</section>
