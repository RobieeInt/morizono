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

        {{-- MOBILE SLIDER (<sm) --}}
        <div class="sm:hidden relative" x-data="sosmedMobile({})" x-init="init()">
            {{-- track --}}
            <div x-ref="track" class="overflow-x-auto scroll-smooth snap-x snap-mandatory hide-scrollbar"
                @scroll.debounce.120="onScroll()">
                <div class="flex gap-4 w-max">
                    @foreach ($posts as $p)
                        @php
                            $permalink = $p['url'] ?? '';
                            $yt = $p['embed'] ?? null;
                            $ytId = null;

                            if ($yt) {
                                if (preg_match('~youtube\.com/shorts/([^/?#&]+)~i', $yt, $m)) {
                                    $ytId = $m[1];
                                } elseif (preg_match('~(?:youtube\.com/watch\?v=|youtu\.be/)([^/?#&]+)~i', $yt, $m)) {
                                    $ytId = $m[1];
                                }
                            }

                            $isFirst = $loop->first;
                            $baseParam =
                                'mute=1&playsinline=1&controls=0&rel=0&modestbranding=1&loop=1&fs=0&iv_load_policy=3';
                            $ytSrc = $ytId
                                ? "https://www.youtube.com/embed/{$ytId}?{$baseParam}&playlist={$ytId}&autoplay=" .
                                    ($isFirst ? '1' : '0')
                                : null;
                        @endphp

                        <article class="relative snap-start w-[86vw] shrink-0">
                            <div class="relative rounded-[10px] overflow-hidden shadow">
                                {{-- overlay ke IG --}}
                                <a href="{{ $permalink }}" target="_blank" rel="noopener"
                                    class="absolute inset-0 z-20" aria-label="Open Instagram post"></a>

                                @if ($ytSrc)
                                    <div class="bg-black ratio-9-16">
                                        <iframe class="ytvid w-full h-full block" data-vid="{{ $ytId }}"
                                            data-base="https://www.youtube.com/embed/{{ $ytId }}?{{ $baseParam }}&playlist={{ $ytId }}"
                                            src="{{ $ytSrc }}" title="{{ $p['title'] ?? 'Shorts' }}"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen loading="lazy"></iframe>
                                    </div>
                                @else
                                    <div class="bg-black ratio-9-16"></div>
                                @endif

                                <div
                                    class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/60 via-black/25 to-transparent">
                                </div>

                                {{-- badges --}}
                                <div class="absolute top-3 left-4 text-[12px] font-medium text-white/90 z-10">
                                    {{ $p['category'] ?? '' }}
                                </div>
                                <div class="absolute top-3 right-4 text-[12px] text-white/80 z-10">
                                    {{ $p['date'] ?? '' }}
                                </div>

                                {{-- caption --}}
                                <div class="absolute left-0 right-0 bottom-0 p-4 text-white z-10">
                                    <h3 class="text-xl font-semibold leading-snug">
                                        {{ $p['title'] ?? '' }}
                                    </h3>
                                    @if (!empty($p['excerpt']))
                                        <p class="mt-2 text-sm text-white/85 line-clamp-2">
                                            {{ $p['excerpt'] }}
                                        </p>
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

        {{-- DESKTOP/TABLET GRID (≥sm) --}}
        <div class="hidden sm:grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            @foreach ($posts as $p)
                @php
                    $permalink = $p['url'] ?? '';
                    $yt = $p['embed'] ?? null;
                    $ytId = null;

                    if ($yt) {
                        if (preg_match('~youtube\.com/shorts/([^/?#&]+)~i', $yt, $m)) {
                            $ytId = $m[1];
                        } elseif (preg_match('~(?:youtube\.com/watch\?v=|youtu\.be/)([^/?#&]+)~i', $yt, $m)) {
                            $ytId = $m[1];
                        }
                    }

                    $isFirst = $loop->first;
                    $baseParam = 'mute=1&playsinline=1&controls=0&rel=0&modestbranding=1&loop=1&fs=0&iv_load_policy=3';
                    $ytSrc = $ytId
                        ? "https://www.youtube.com/embed/{$ytId}?{$baseParam}&playlist={$ytId}&autoplay=" .
                            ($isFirst ? '1' : '0')
                        : null;
                @endphp

                <article class="relative group">
                    <div class="relative rounded-[10px] overflow-hidden shadow">
                        {{-- overlay klik ke IG --}}
                        <a href="{{ $permalink }}" target="_blank" rel="noopener" class="absolute inset-0 z-20"
                            aria-label="Open Instagram post"></a>

                        @if ($ytSrc)
                            <div class="bg-black ratio-9-16">
                                <iframe class="ytvid w-full h-full block" data-vid="{{ $ytId }}"
                                    data-base="https://www.youtube.com/embed/{{ $ytId }}?{{ $baseParam }}&playlist={{ $ytId }}"
                                    src="{{ $ytSrc }}" title="{{ $p['title'] ?? 'Shorts' }}"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen loading="lazy"></iframe>
                            </div>
                        @else
                            <div class="bg-black ratio-9-16"></div>
                        @endif

                        <div
                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/60 via-black/25 to-transparent">
                        </div>

                        {{-- badges --}}
                        <div class="absolute top-3 left-4 text-[12px] font-medium text-white/90 z-10">
                            {{ $p['category'] ?? '' }}
                        </div>
                        <div class="absolute top-3 right-4 text-[12px] text-white/80 z-10">
                            {{ $p['date'] ?? '' }}
                        </div>

                        {{-- caption --}}
                        <div class="absolute left-0 right-0 bottom-0 p-4 sm:p-5 text-white z-10">
                            <h3 class="text-xl sm:text-2xl font-semibold leading-snug">
                                {{ $p['title'] ?? '' }}
                            </h3>
                            @if (!empty($p['excerpt']))
                                <p class="mt-2 text-sm text-white/85 line-clamp-2">
                                    {{ $p['excerpt'] }}
                                </p>
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

    {{-- Script: autoplay pertama, hover autoplay item lain, pause yang lain --}}
    @once
        <script>
            // Desktop hover autoplay (juga standarisasi pertama)
            document.addEventListener('DOMContentLoaded', () => {
                const iframes = Array.from(document.querySelectorAll('.ytvid'));

                function playOnly(vidId) {
                    iframes.forEach(iframe => {
                        const base = iframe.dataset.base;
                        const id = iframe.dataset.vid;
                        if (!base || !id) return;

                        const src = base + (id === vidId ? '&autoplay=1' : '&autoplay=0');
                        if (iframe.src !== src) iframe.src = src;
                    });
                }

                const first = iframes[0];
                if (first) playOnly(first.dataset.vid);

                // Hover untuk desktop
                document.querySelectorAll('article .ytvid').forEach(iframe => {
                    const article = iframe.closest('article');
                    if (!article) return;
                    article.addEventListener('mouseover', () => playOnly(iframe.dataset.vid), {
                        passive: true
                    });
                });
            });

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
                        const pages = Math.max(1, items); // perPage 1 di mobile
                        this.dots = Array.from({
                            length: pages
                        });
                        this.activeDot = Math.min(this.activeDot, pages - 1);
                    },
                    init() {
                        this.updateDots();
                    }
                }
            }
        </script>
    @endonce
</section>
