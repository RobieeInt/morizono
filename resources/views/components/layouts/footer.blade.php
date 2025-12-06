@props([
    'address' => 'Jl. Cinangka Raya, Bojongsari Sawangan Depok',
    'hours_days' => 'Senin - Minggu',
    'hours_time' => '08:00 - 18:00 WIB',
    'wa' => '0822 8000 0319',
    'email' => 'marketing@gardens.id',
])

<footer class="bg-[#353232] text-white/90">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-6 gap-8">

            {{-- Brand + copyrights (span 2 on lg) --}}
            <div class="col-span-2">
                <img src="{{ asset('logo/logowhite.webp') }}" alt="Morizono"
                    class="block w-auto h-auto sm:w-auto sm:h-7 mb-3 opacity-90 object-contain">
                <img src="{{ asset('logo/developed2.webp') }}" alt="Morizono"
                    class="block w-auto h-auto sm:w-auto sm:h-7 mb-3 opacity-90 object-contain">
                {{--
                <img src="{{ asset('logo/footerph.webp') }}" alt="Sumitomo Forestry"
                    class="block w-full h-auto sm:w-auto sm:h-12 mb-6 opacity-90 object-contain"> --}}

                <p class="text-xs leading-6 text-white/70">
                    Copyright © {{ date('Y') }}
                    PT Graha Perdana Indah.
                    All Rights Reserved.
                    By Reconext
                </p>
            </div>

            {{-- Address --}}
            <div>
                <div class="text-[11px] uppercase tracking-[0.18em] text-white/50 mb-2">Marketing Gallery</div>
                <div class="text-sm leading-6">{{ $address }}</div>
            </div>

            {{-- WhatsApp + Email stack on lg into two boxes --}}
            <div>
                <div class="text-[11px] uppercase tracking-[0.18em] text-white/50 mb-2">WhatsApp</div>
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $wa) }}"
                    class="text-sm leading-6 hover:underline">{{ $wa }}</a>

                <div class="mt-6 text-[11px] uppercase tracking-[0.18em] text-white/50 mb-2">E-mail</div>
                <a href="mailto:{{ $email }}" class="text-sm leading-6 hover:underline">{{ $email }}</a>
            </div>

            {{-- Opening hours --}}
            <div>
                <div class="text-[11px] uppercase tracking-[0.18em] text-white/50 mb-2">Opening Hours</div>
                <div class="text-sm leading-6">
                    {{ $hours_days }} <span class="opacity-50">
                        <br>
                    </span> {{ $hours_time }}
                </div>
            </div>

            {{-- Links --}}
            <div class="grid grid-cols-2 gap-8 lg:gap-6 col-span-2 lg:col-span-1">
                <div>
                    <div class="text-[11px] uppercase tracking-[0.18em] text-white/50 mb-2">Company</div>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('landing') }}#home" class="hover:underline">Home</a></li>
                        <li><a href="{{ route('landing') }}#about" class="hover:underline">About</a></li>
                        <li><a href="{{ route('landing') }}#clusters" class="hover:underline">Our Unit Types</a></li>
                        <li><a href="{{ route('landing') }}#updates" class="hover:underline">Update</a></li>
                        <li><a href="{{ route('landing') }}#contact" class="hover:underline">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <div class="text-[11px] uppercase tracking-[0.18em] text-white/50 mb-2">Follow Us</div>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:underline">Instagram</a></li>
                        <li><a href="#" class="hover:underline">Youtube</a></li>
                        <li><a href="#" class="hover:underline">Facebook</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    {{-- garis tipis biar rapi, tanpa ruang ekstra --}}
    <div class="h-px bg-white/5"></div>
</footer>
