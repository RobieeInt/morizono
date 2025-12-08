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
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased bg-white overflow-x-hidden">
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
        <div class="relative w-full max-w-md">
            {{-- Tombol close --}}
            <button id="banner-close" type="button"
                class="absolute -top-2 right-0 translate-x-1/2 rounded-full bg-white shadow-md w-8 h-8 flex items-center justify-center text-gray-700 text-xl leading-none">
                &times;
            </button>

            {{-- Gambar banner --}}
            <img id="banner-img" src="{{ asset('images/banner.webp') }}" alt="Morizono Banner"
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
</body>

</html>
