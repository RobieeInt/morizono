{{-- resources/views/layouts/site.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Title --}}
    <title>{{ $title ?? config('app.name', 'Morizono') }}</title>

    {{-- CSRF for forms & Livewire --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Tailwind/Alpine/whatever via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Livewire styles (perlu, biar komponen nggak nyasar) --}}
    @livewireStyles

    {{-- Slot optional styles from pages/components --}}
    @stack('styles')
</head>

<body class="font-sans antialiased bg-[#EFECDC]">
    {{-- Landing navbar yang clean (tanpa Auth::user()) --}}
    <x-landing.nav />

    <main>
        {{ $slot }}
    </main>

    @include('components.layouts.footer')

    {{-- Livewire scripts (WAJIB) --}}
    @livewireScripts

    {{-- Slot optional scripts --}}
    @stack('scripts')
</body>

</html>
