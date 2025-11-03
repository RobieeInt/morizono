@props([
    'title' => 'Latest News & Updates',
    'subtitle' => '',
    'seeAllUrl' => '#',
    // posts: array of [title, excerpt, category, date, image, url]
    'posts' => [],
])

<section id="updates"
    class="bg-[#EFECDC] updates-sec opacity-0 translate-y-[80px] transition-all duration-[1000ms] ease-out">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-12 sm:py-16" x-data="newsSlider({
        perPage: (window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 640 ? 2 : 1))
    })" x-init="$watch('perPage', v => updateDots());
    window.addEventListener('resize', () => {
        perPage = (window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 640 ? 2 : 1));
        updateDots();
    });">

        {{-- header --}}
        <div class="grid grid-cols-3 items-end mb-6 sm:mb-8">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light tracking-tight text-gray-900 font-heading">
                    {{ $title }}
                </h2>
            </div>
            <div class="text-left text-sm text-gray-600 hidden sm:block ml-20">
                {{ $subtitle }}
            </div>
            <div class="text-right">
                <a href="{{ $seeAllUrl }}" class="text-sm underline hover:text-gray-900">See all Article</a>
            </div>
        </div>

        {{-- slider --}}
        <div class="relative overflow-visible"> {{-- penting: biar tombol di luar gak kepotong --}}
            {{-- buttons DI LUAR konten, bulat --}}
            <button type="button" @click="prev()" aria-label="Previous"
                class="hidden sm:grid place-items-center absolute -left-14 top-1/2 -translate-y-1/2 z-20
               w-11 h-11 rounded-full border bg-white/90 hover:bg-white shadow">
                <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M15 6l-6 6 6 6" />
                </svg>
            </button>

            <button type="button" @click="next()" aria-label="Next"
                class="grid place-items-center absolute -right-14 top-1/2 -translate-y-1/2 z-20
               w-11 h-11 rounded-full border bg-white/90 hover:bg-white shadow">
                <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 6l6 6-6 6" />
                </svg>
            </button>

            {{-- track --}}
            <div x-ref="track" class="overflow-x-auto scroll-smooth snap-x snap-mandatory hide-scrollbar"
                @scroll.debounce.100="onScroll()">
                <div class="flex gap-6 lg:gap-8 w-max">
                    @foreach ($posts as $p)
                        <article class="relative snap-start w-[86vw] sm:w-[44vw] lg:w-[352px] shrink-0">
                            <div class="relative rounded-[10px] overflow-hidden shadow">
                                <img src="{{ $p['image'] }}" alt="{{ $p['title'] }}"
                                    class="w-full h-[360px] object-cover">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent">
                                </div>

                                {{-- badges --}}
                                <div class="absolute top-3 left-4 text-[12px] font-medium text-white/90">
                                    {{ $p['category'] }}
                                </div>
                                <div class="absolute top-3 right-4 text-[12px] text-white/80">
                                    {{ $p['date'] }}
                                </div>

                                {{-- copy bottom --}}
                                <div class="absolute left-0 right-0 bottom-0 p-4 sm:p-5 text-white">
                                    <h3 class="text-xl sm:text-2xl font-semibold leading-snug">
                                        {{ $p['title'] }}
                                    </h3>
                                    <p class="mt-2 text-sm text-white/85 line-clamp-2">
                                        {{ $p['excerpt'] }}
                                    </p>

                                    <a href="{{ $p['url'] }}"
                                        class="mt-4 inline-flex w-full items-center justify-between rounded bg-white/90 hover:bg-white text-gray-900 text-sm font-medium px-4 py-2">
                                        <span>More details</span>
                                        <span>›</span>
                                    </a>
                                </div>
                            </div>
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

    {{-- tiny helper to hide scrollbar aesthetically --}}
    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <script>
        function newsSlider(init) {
            return {
                perPage: init.perPage ?? 3,
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
                    const w = el.clientWidth || 1;
                    this.activeDot = Math.round(el.scrollLeft / w);
                },
                next() {
                    const el = this.$refs.track;
                    el.scrollBy({
                        left: el.clientWidth,
                        behavior: 'smooth'
                    });
                    this.activeDot = Math.min(this.activeDot + 1, (this.dots.length - 1));
                },
                prev() {
                    const el = this.$refs.track;
                    el.scrollBy({
                        left: -el.clientWidth,
                        behavior: 'smooth'
                    });
                    this.activeDot = Math.max(this.activeDot - 1, 0);
                },
                goTo(i) {
                    const el = this.$refs.track;
                    el.scrollTo({
                        left: i * el.clientWidth,
                        behavior: 'smooth'
                    });
                    this.activeDot = i;
                },
                init() {
                    this.updateDots();
                }
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            function revealUpdates() {
                const sec = document.querySelector('.updates-sec');
                if (!sec) return;
                const r = sec.getBoundingClientRect().top;
                if (r < window.innerHeight * .85) {
                    sec.classList.remove('opacity-0', 'translate-y-[80px]');
                    window.removeEventListener('scroll', revealUpdates);
                }
            }
            window.addEventListener('scroll', revealUpdates);
            revealUpdates();
        });
    </script>
</section>
