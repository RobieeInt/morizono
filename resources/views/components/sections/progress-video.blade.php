@props([
    'title' => 'Progress Morizono',
    'subtitle' => 'Glimpse of our development journey',
    'videoSrc' => asset('video/progress.mp4'),
])

<section id="progress" class="bg-[#EFECDC]">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        {{-- Heading --}}
        <div class="text-center mb-8">
            <h2 class="text-3xl sm:text-4xl font-light tracking-tight text-gray-900">
                {{ $title }}
            </h2>
            @if ($subtitle)
                <p class="mt-3 text-sm sm:text-base text-gray-600 max-w-2xl mx-auto">
                    {{ $subtitle }}
                </p>
            @endif
        </div>

        {{-- Video wrapper --}}
        <div class="relative max-w-4xl mx-auto" x-data="{ muted: true }">
            <div class="aspect-video rounded-2xl overflow-hidden shadow-lg bg-black relative">
                <video x-ref="vid" class="w-full h-full object-cover" muted loop playsinline preload="none"
                    data-src="{{ $videoSrc }}">
                    Browser Anda tidak mendukung video HTML5.
                </video>

                {{-- tombol unmute --}}
                <button x-show="muted"
                    @click="
                        muted = false;
                        $refs.vid.muted = false;
                        $refs.vid.volume = 1;
                        $refs.vid.play();
                    "
                    class="absolute bottom-3 right-3 bg-black/70 text-white text-xs sm:text-sm px-3 py-1.5 rounded-full flex items-center gap-1 hover:bg-black/90">
                    🔊 Tap to unmute
                </button>
            </div>
        </div>

        <script>
            (function() {
                const section = document.getElementById('progress');
                if (!section) return;
                const observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (!entry.isIntersecting) return;
                        const vid = section.querySelector('video[data-src]');
                        if (!vid) return;
                        const src = vid.dataset.src;
                        vid.innerHTML = '<source src="' + src + '" type="video/mp4">';
                        vid.load();
                        vid.play().catch(function() {});
                        observer.disconnect();
                    });
                }, { rootMargin: '200px' });
                observer.observe(section);
            })();
        </script>
    </div>
</section>
