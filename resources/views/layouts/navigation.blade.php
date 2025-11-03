<nav x-data="{ open: false }" class="sticky top-0 z-40 bg-white/80 backdrop-blur border-b border-gray-200 overflow-x-clip">

    <!-- Bar utama -->
    <div class="w-full mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 overflow-x-clip">
        <div class="flex items-center justify-between h-14 w-full overflow-x-clip">
            <!-- Kiri: logo + links -->
            <div class="flex items-center min-w-0 w-auto">
                <a href="{{ route(\Illuminate\Support\Facades\Route::has('dashboard') ? 'dashboard' : 'landing') }}"
                    class="shrink-0 inline-flex items-center">
                    <x-application-logo class="block h-8 w-auto fill-current text-gray-800" />
                </a>

                <div class="hidden sm:flex sm:items-center sm:ms-8 gap-6">
                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('landing')" :active="request()->routeIs('landing')">
                            {{ __('Home') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Kanan desktop -->
            <div class="hidden sm:flex items-center gap-4 min-w-0">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm rounded-md text-gray-600 hover:text-gray-900 transition">
                                <span class="truncate max-w-[12rem]">{{ Auth::user()->name }}</span>
                                <svg class="ms-1 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-900">Register</a>
                    @endif
                @endguest
            </div>

            <!-- Hamburger (TANPA margin negatif) -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Overlay gelap -->
    <div x-show="open" x-transition.opacity class="sm:hidden fixed inset-0 z-40 bg-black/40" @click="open=false"></div>

    <!-- Panel mobile: fixed overlay full width -->
    <div x-show="open" x-transition
        class="sm:hidden fixed top-14 inset-x-0 z-50 bg-white border-t border-gray-200 shadow-md w-full">
        <div class="pt-2 pb-3 space-y-1 px-4">
            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('landing')" :active="request()->routeIs('landing')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        <div class="border-t border-gray-200 px-4 py-3">
            @auth
                <div class="mb-3">
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</div>
                </div>
                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">{{ __('Profile') }}</x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth

            @guest
                <div class="mb-3">
                    <div class="text-base font-medium text-gray-800">Guest</div>
                    <div class="text-sm text-gray-500">Silakan login untuk akses dashboard</div>
                </div>
                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('login')">{{ __('Login') }}</x-responsive-nav-link>
                    @if (Route::has('register'))
                        <x-responsive-nav-link :href="route('register')">{{ __('Register') }}</x-responsive-nav-link>
                    @endif
                </div>
            @endguest
        </div>
    </div>
</nav>
