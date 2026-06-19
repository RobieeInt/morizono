<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Morizono') }}</title>
    <meta name="description" content="Morizono – Premium cluster residence di Sawangan Depok. Hunian Jepang minimalis dengan konsep Teioku Ichinyo: harmoni rumah dan alam. Cluster Sumire, Ayame, Kaede & Shophouse.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'Morizono – The Art of Japanese Living' }}">
    <meta property="og:description" content="Premium cluster residence di Sawangan Depok. Hunian bergaya Jepang dengan smart home system, clubhouse, dan fasilitas lengkap.">
    <meta property="og:image" content="{{ asset('images/hero.webp') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Morizono">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Morizono – The Art of Japanese Living' }}">
    <meta name="twitter:description" content="Premium cluster residence di Sawangan Depok. Hunian bergaya Jepang dengan smart home system dan fasilitas lengkap.">
    <meta name="twitter:image" content="{{ asset('images/hero.webp') }}">

    <link rel="icon" type="image/svg+xml" href="{{ asset('faviconm.svg') }}">

    {{-- Preconnect external domains --}}
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://connect.facebook.net">
    <link rel="preconnect" href="https://www.youtube-nocookie.com">
    <link rel="dns-prefetch" href="https://i.ytimg.com">

    {{-- Guard anti-overflow & media safety --}}
    <style>
        html,
        body {
            overflow-x: clip;
            width: 100%;
        }

        body {
            position: relative;
        }

        /* height:auto dihapus — override explicit width/height attrs → menyebabkan CLS */
        img,
        video,
        iframe {
            max-width: 100%;
            display: block;
        }

        /* Navbar sering jadi biang—kunci juga */
        nav {
            max-width: 100vw;
            overflow-x: clip;
        }

        nav * {
            max-width: 100%;
        }

        /* Kontainer tailwind (max-w-*) kadang “tumpah” kalau ada anak pakai vw */
        .mx-auto,
        [class*="max-w-"] {
            overflow-x: clip;
        }

        /* Util kecil kalau perlu: <div class="ox-clip"> */
        .ox-clip {
            overflow-x: clip;
        }

        #banner-modal-inner {
            max-width: min(90vw, 480px);
        }

        #banner-img {
            max-height: 80vh;
        }

        @media (min-width: 768px) {
            #banner-modal-inner {
                max-width: min(90vw, 860px);
            }

            #banner-img {
                max-height: 75vh;
            }
        }
    </style>

    {{-- Preload hero LCP image --}}
    <link rel="preload" as="image" href="{{ asset('images/hero.webp') }}" fetchpriority="high">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5H6NF6RC');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body class="font-sans antialiased bg-white overflow-x-hidden">
    <!-- Google Tag Manager (noscript fallback) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5H6NF6RC"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager -->

    {{-- Navbar khusus landing (tanpa auth) --}}
    <x-landing.nav />

    {{-- Spacer kecil biar konten gak ketutup navbar fixed --}}
    <div class="h-14"></div>

    {{-- Page Content --}}
    <main class="ox-clip">
        {{ $slot }}
    </main>

    {{-- Banner Modal --}}
    <div id="banner-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 px-4">
        <div id="banner-modal-inner" class="relative w-full max-w-md">
            {{-- Tombol close --}}
            <button id="banner-close" type="button" aria-label="Tutup banner"
                class="absolute -top-2 right-0 translate-x-1/2 rounded-full bg-white shadow-md w-8 h-8 flex items-center justify-center text-gray-700 text-xl leading-none">
                <span aria-hidden="true">&times;</span>
            </button>

            {{-- Gambar banner --}}
            <img id="banner-img" src="{{ asset('images/banner.webp') }}?v={{ @filemtime(public_path('images/banner.webp')) }}" alt="Morizono Banner"
                class="w-full h-auto rounded-xl shadow-lg border border-white/40" loading="lazy" width="860" height="auto">
        </div>
    </div>
    <x-layouts.footer />

    @livewireScripts

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('banner-modal');
            const closeBtn = document.getElementById('banner-close');

            if (!modal) return;

            const openModal = () => {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            };

            const closeModal = () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            };

            // Buka setiap reload
            openModal();

            // Close via tombol
            if (closeBtn) {
                closeBtn.addEventListener('click', closeModal);
            }

            // Close kalau klik area gelap di luar konten
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });

            // Close via tombol ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeModal();
                }
            });
        });
    </script>

    <!-- Meta Pixel Code (deferred) -->
    <script>
        window.addEventListener('load', function() {
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n; n.loaded = !0; n.version = '2.0'; n.queue = [];
                t = b.createElement(e); t.async = !0; t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '1538302690588155');
            fbq('track', 'PageView');
        });
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1538302690588155&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</body>

</html>
