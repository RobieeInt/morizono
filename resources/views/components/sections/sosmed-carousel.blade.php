@props([
    'title' => 'Follow Our Social Media',
    'subtitle' => 'Stay connected with Morizono for updates, stories, and more',
    'seeAllUrl' => '#',
    // sosmed: array of [title, excerpt, category, date, embed (youtube url), url (instagram permalink)]
    'sosmed' => [],
])

@props([
    'eyebrow' => 'Why Morizono?',
    'titlee' => 'Why Morizono?',
    'desc' =>
        'Because home should feel like harmony, not chaos. Morizono brings together natural warmth, minimalist design, and thoughtful space planning so every corner breathes calm. It’s more than a house — it’s balance, crafted for those who want serenity without sacrificing sophistication.',
])

@php
    $posts = $sosmed ?? [];
@endphp

<section id="sosmed" class="bg-[#EFECDC]">

    {{-- Section Clusters --}}
    <section id="clusters" class="bg-[#EFECDC]">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 pb-6 sm:pb-8">
            <div class="text-center md:text-center md:px-6">
                <h3 class="text-4xl sm:text-5xl font-light text-[#C8A767] font-heading">
                    {{ $titlee }}
                </h3>
            </div>
        </div>
    </section>

    {{-- Instagram (YouTube embed video-only behavior) --}}
    <div id="instagram" class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 pt-4 sm:pt-5 pb-10 sm:pb-12">

        {{-- Helper macro: render 1 sosmed card (facade YT) --}}
        @php
            if (! function_exists('ytIdFromUrl')) {
                function ytIdFromUrl($url) {
                    if (!$url) return null;
                    if (preg_match('~youtube\.com/shorts/([^/?#&]+)~i', $url, $m)) return $m[1];
                    if (preg_match('~(?:youtube\.com/watch\?v=|youtu\.be/)([^/?#&]+)~i', $url, $m)) return $m[1];
                    return null;
                }
            }
        @endphp

        {{-- MOBILE SLIDER (<lg) --}}
        <div class="lg:hidden relative" x-data="sosmedMobile({})" x-init="init()">
            <div x-ref="track" class="overflow-x-auto scroll-smooth snap-x snap-mandatory hide-scrollbar"
                @scroll.debounce.120="onScroll()">
                <div class="flex gap-4 w-max">
                    @foreach ($posts as $p)
                        @php
                            $permalink = $p['url'] ?? '';
                            $ytId = ytIdFromUrl($p['embed'] ?? null);
                            $baseParam = 'mute=1&playsinline=1&controls=1&rel=0&modestbranding=1&loop=1&fs=0&iv_load_policy=3&autoplay=1';
                            $embedSrc = $ytId ? "https://www.youtube-nocookie.com/embed/{$ytId}?{$baseParam}&playlist={$ytId}" : null;
                        @endphp

                        <article class="relative snap-start shrink-0" style="width:85vw">
                            <div class="relative rounded-[10px] overflow-hidden shadow">
                                <a href="{{ $permalink }}" target="_blank" rel="noopener"
                                    class="absolute inset-0 z-20" aria-label="Open Instagram post"></a>

                                {{-- YouTube iframe (lazy: load saat section masuk viewport) --}}
                                @if ($embedSrc)
                                    <div style="position:relative;aspect-ratio:9/16;background:#000">
                                        <iframe data-src="{{ $embedSrc }}"
                                            style="position:absolute;inset:0;width:100%;height:100%;border:0"
                                            title="{{ $p['title'] ?? 'Video' }}"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; compute-pressure"
                                            allowfullscreen></iframe>
                                    </div>
                                @else
                                    <div style="background:#000;aspect-ratio:9/16"></div>
                                @endif

                                {{-- Gradient + caption overlay di bawah --}}
                                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                                <div class="absolute left-0 right-0 bottom-0 p-4 text-white z-10">
                                    <h3 class="text-xl font-semibold leading-snug">{{ $p['title'] ?? '' }}</h3>
                                    @if (!empty($p['excerpt']))
                                        <p class="mt-1 text-sm text-white/85 line-clamp-2">{{ $p['excerpt'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            {{-- dots --}}
            <div class="mt-5 flex justify-center gap-2">
                <template x-for="(d,idx) in dots" :key="idx">
                    <span :class="idx === activeDot ? 'bg-amber-400' : 'bg-black/25'"
                        class="h-1.5 w-8 rounded-full"></span>
                </template>
            </div>
        </div>

        {{-- DESKTOP GRID (≥lg) --}}
        <div class="hidden lg:grid lg:grid-cols-4 gap-6 lg:gap-8">
            @foreach ($posts as $p)
                @php
                    $permalink = $p['url'] ?? '';
                    $ytId = ytIdFromUrl($p['embed'] ?? null);
                    $baseParam = 'mute=1&playsinline=1&controls=1&rel=0&modestbranding=1&loop=1&fs=0&iv_load_policy=3&autoplay=1';
                    $embedSrc = $ytId ? "https://www.youtube-nocookie.com/embed/{$ytId}?{$baseParam}&playlist={$ytId}" : null;
                @endphp

                <article class="relative group sosmed-card opacity-0 translate-y-[50px] transition-all duration-[900ms] ease-out">
                    <div class="relative rounded-[10px] overflow-hidden shadow">
                        <a href="{{ $permalink }}" target="_blank" rel="noopener"
                            class="absolute inset-0 z-20" aria-label="Open Instagram post"></a>

                        {{-- YouTube iframe (lazy: load saat section masuk viewport) --}}
                        @if ($embedSrc)
                            <div class="ratio-9-16 relative">
                                <iframe data-src="{{ $embedSrc }}"
                                    class="absolute inset-0 w-full h-full border-0"
                                    title="{{ $p['title'] ?? 'Video' }}"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; compute-pressure"
                                    allowfullscreen></iframe>
                            </div>
                        @else
                            <div class="bg-black ratio-9-16"></div>
                        @endif

                        {{-- Gradient + caption overlay di bawah --}}
                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        <div class="absolute top-3 left-4 text-[12px] font-medium text-white/80 z-10">{{ $p['category'] ?? '' }}</div>
                        <div class="absolute top-3 right-4 text-[12px] text-white/70 z-10">{{ $p['date'] ?? '' }}</div>
                        <div class="absolute left-0 right-0 bottom-0 p-4 sm:p-5 text-white z-10">
                            <h3 class="text-xl sm:text-2xl font-semibold leading-snug">{{ $p['title'] ?? '' }}</h3>
                            @if (!empty($p['excerpt']))
                                <p class="mt-2 text-sm text-white/85 line-clamp-2">{{ $p['excerpt'] }}</p>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

    </div>

    <style>
        .ratio-9-16 {
            aspect-ratio: 9 / 16;
            background: #000;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    {{-- Script: facade YT (load iframe hanya saat diklik) --}}
    @once
        <script>
            // Alpine mini untuk slider mobile
            function sosmedMobile() {
                return {
                    dots: [],
                    activeDot: 0,
                    onScroll() {
                        const el = this.$refs.track;
                        const w = el.clientWidth || 1;
                        this.activeDot = Math.round(el.scrollLeft / w);
                    },
                    updateDots() {
                        const items = this.$refs.track?.querySelectorAll('article').length || 0;
                        const pages = Math.max(1, items);
                        this.dots = Array.from({ length: pages });
                        this.activeDot = Math.min(this.activeDot, pages - 1);
                    },
                    init() { this.updateDots(); }
                }
            }

            document.addEventListener('DOMContentLoaded', () => {
                // Reveal animasi saat scroll — hanya desktop cards
                const cards = document.querySelectorAll('.sosmed-card');
                function revealCards() {
                    cards.forEach(c => {
                        if (c.getBoundingClientRect().top < window.innerHeight * 0.92) {
                            c.classList.remove('opacity-0');
                            c.style.transform = 'none';
                        }
                    });
                }
                window.addEventListener('scroll', revealCards, { passive: true });
                revealCards();

                // Lazy-load YouTube iframes saat section #sosmed masuk viewport
                const sosmedSection = document.getElementById('sosmed');
                if (sosmedSection && 'IntersectionObserver' in window) {
                    const obs = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                document.querySelectorAll('#sosmed iframe[data-src]').forEach(iframe => {
                                    iframe.src = iframe.dataset.src;
                                    delete iframe.dataset.src;
                                });
                                obs.disconnect();
                            }
                        });
                    }, { rootMargin: '50px' });
                    obs.observe(sosmedSection);
                } else {
                    // Fallback: load langsung jika IntersectionObserver tidak didukung
                    document.querySelectorAll('#sosmed iframe[data-src]').forEach(iframe => {
                        iframe.src = iframe.dataset.src;
                    });
                }
            });
        </script>
    @endonce
</section>
