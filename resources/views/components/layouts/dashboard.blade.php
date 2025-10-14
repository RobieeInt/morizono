<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Dashboard' }} • {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r hidden md:flex md:flex-col">
            <div class="p-4 font-semibold">{{ config('app.name') }}</div>
            <nav class="px-2 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Overview</a>
                <a href="{{ route('admin.messages') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Inbox</a>
                <a href="{{ route('admin.export.contacts') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Export
                    CSV</a>
            </nav>
            <div class="mt-auto p-3 text-xs text-gray-500">Logged in as <b>{{ auth()->user()->email }}</b></div>
        </aside>

        <!-- Main -->
        <main class="flex-1">
            <header class="h-14 bg-white border-b flex items-center justify-between px-4">
                <div class="font-medium">{{ $pageTitle ?? 'Dashboard' }}</div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm px-3 py-1.5 rounded bg-gray-900 text-white">Logout</button>
                </form>
            </header>
            <div class="p-4 md:p-6">
                {{ $slot }}
            </div>
        </main>
    </div>
    @livewireScripts
</body>

</html>
