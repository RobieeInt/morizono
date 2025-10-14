<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Morizono') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased bg-white">
    {{-- Navbar khusus landing (tanpa auth) --}}
    <x-landing.nav />

    {{-- Spacer kecil biar konten gak ketutup navbar fixed --}}
    <div class="h-14"></div>

    {{-- Page Content --}}
    <main>
        {{ $slot }}
    </main>

    <x-layouts.footer />

    @livewireScripts
</body>

</html>
