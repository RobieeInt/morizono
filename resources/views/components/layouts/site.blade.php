<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Morizono') }}</title> <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('faviconm.svg') }}">

    {{-- Guard anti-overflow & media safety --}}
    <style>
        /* Kunci lebar dari akar */
        html,
        body {
            overflow-x: clip;
            width: 100%;
        }

        /* Tambahan untuk iOS/Safari yang suka ngeyel */
        body {
            position: relative;
        }

        /* Semua media ikut container */
        img,
        video,
        iframe {
            max-width: 100%;
            height: auto;
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
    </style>

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
            <button id="banner-close" type="button"
                class="absolute -top-2 right-0 translate-x-1/2 rounded-full bg-white shadow-md w-8 h-8 flex items-center justify-center text-gray-700 text-xl leading-none">
                &times;
            </button>

            {{-- Gambar banner --}}
            <img id="banner-img" src="{{ asset('images/banner.webp') }}?v={{ time() }}" alt="Morizono Banner"
                class="w-full h-auto rounded-xl shadow-lg border border-white/40">
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

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1538302690588155');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1538302690588155&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</body>

</html>
