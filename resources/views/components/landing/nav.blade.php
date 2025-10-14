<nav x-data="{ open: false }" class="fixed inset-x-0 top-0 z-30 bg-white/70 backdrop-blur border-b border-black/5">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-14 items-center justify-between">
            <!-- left: logo -->
            <a href="{{ route('landing') }}" class="flex items-center gap-2">
                <img src="{{ asset('logo/logo.png') }}" alt="Morizono" class="h-6 w-auto">
                <span class="sr-only">Morizono</span>
            </a>

            <!-- center: links (desktop) -->
            <ul class="hidden md:flex items-center gap-8 text-sm text-gray-800">
                <li><a href="#home" class="hover:text-gray-900">Home</a></li>
                <li><a href="#about" class="hover:text-gray-900">About</a></li>
                <li><a href="#clusters" class="hover:text-gray-900">Our Cluster</a></li>
                <li><a href="#updates" class="hover:text-gray-900">Updates</a></li>
                <li><a href="#contact" class="hover:text-gray-900">Contact</a></li>
            </ul>

            <!-- right: CTA + burger -->
            <div class="flex items-center gap-3">
                <a href="#book"
                    class="hidden sm:inline-flex rounded-full bg-amber-300 px-3.5 py-2 text-sm font-semibold text-gray-900 hover:bg-amber-400 transition">
                    Book a tour
                </a>
                <button class="md:hidden p-2 text-gray-700" @click="open=!open" aria-label="Menu">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path :class="{ 'hidden': open, 'block': !open }" class="block" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'block': open, 'hidden': !open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- mobile menu -->
        <div class="md:hidden pt-2 pb-3" x-show="open" x-transition>
            <ul class="space-y-1 text-sm">
                <li><a href="#home" class="block rounded px-3 py-2 hover:bg-black/5">Home</a></li>
                <li><a href="#about" class="block rounded px-3 py-2 hover:bg-black/5">About</a></li>
                <li><a href="#clusters" class="block rounded px-3 py-2 hover:bg-black/5">Our Cluster</a></li>
                <li><a href="#updates" class="block rounded px-3 py-2 hover:bg-black/5">Updates</a></li>
                <li><a href="#contact" class="block rounded px-3 py-2 hover:bg-black/5">Contact</a></li>
                <li><a href="#book"
                        class="block rounded px-3 py-2 bg-amber-300/80 hover:bg-amber-400 text-gray-900 font-semibold">Book
                        a tour</a></li>
            </ul>
        </div>
    </div>
</nav>
