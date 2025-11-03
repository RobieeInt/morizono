<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Morizono') }}</title>

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

    <x-layouts.footer />

    @livewireScripts
</body>

</html>
