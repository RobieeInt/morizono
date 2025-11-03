<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        /* hard clamp nav lebar viewport */
        nav {
            max-width: 100vw;
        }

        nav * {
            max-width: 100%;
        }

        /* kalau Safari masih ngeyel di iOS */
        nav {
            overflow-x: clip;
            position: sticky;
            left: 0;
            right: 0;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased overflow-x-hidden">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main>
            {{ $slot }}
        </main>
    </div>
</body>

<script>
    (function() {
        function markNavOverflow() {
            const vw = document.documentElement.clientWidth;
            document.querySelectorAll('nav *').forEach(el => {
                el.style.outline = '';
                const r = el.getBoundingClientRect();
                if (r.right > vw + 1 || r.left < -1) {
                    el.style.outline = '2px solid #f43f5e';
                    // console.log('NAV OVERFLOW:', el, {left:r.left, right:r.right, vw});
                }
            });
        }
        window.addEventListener('load', markNavOverflow, {
            once: true
        });
        window.addEventListener('resize', () => setTimeout(markNavOverflow, 100));
    })();
</script>

</html>
