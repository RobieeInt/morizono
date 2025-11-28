@props([
    'title' => 'Accessible Surroundings',
    'subtitle' => 'Everything you need within minutes from Morizono',
    // groups: per menit
    // '1' => [
    //   'label' => '1 MINUTE',
    //   'image' => asset('image/map/1min.webp'),
    //   'items' => [
    //      ['name' => 'The Park Sawangan', 'category' => 'Shopping Center'],
    //   ],
    // ]
    'groups' => [],
])

@php
    // default kalau parent belum kirim data
    if (empty($groups)) {
        $groups = [
            '0' => [
                'label' => '0 MINUTE',
                'image' => asset('image/map/0min.webp'),
                'items' => [['name' => 'Morizono', 'category' => 'Residential']],
            ],
            '1' => [
                'label' => '1 MINUTE',
                'image' => asset('image/map/1min.webp'),
                'items' => [
                    ['name' => 'The Park Sawangan', 'category' => 'Shopping Center'],
                    ['name' => 'Indogrosir', 'category' => 'Grocery Mart'],
                    ['name' => 'KFC', 'category' => 'Food'],
                    ['name' => 'Solaria', 'category' => 'Food'],
                ],
            ],
            '5' => [
                'label' => '5 MINUTES',
                'image' => asset('image/map/5min.webp'),
                'items' => [
                    ['name' => 'Pamulang Toll Gate', 'category' => 'Transportation'],
                    ['name' => 'Hyfresh', 'category' => 'Grocery Mart'],
                    ['name' => 'Burger King', 'category' => 'Food'],
                    ['name' => 'Domino Pizza', 'category' => 'Food'],
                ],
            ],
            '10' => [
                'label' => '10 MINUTES',
                'image' => asset('image/map/10min.webp'),
                'items' => [
                    ['name' => 'Hoka Hoka Bento', 'category' => 'Food'],
                    ['name' => 'Brawijaya Hospital', 'category' => 'Health'],
                    ['name' => 'Commercial & Banking Center', 'category' => 'Finance'],
                ],
            ],
            '30' => [
                'label' => '30 MINUTES',
                'image' => asset('image/map/30min.webp'),
                'items' => [
                    ['name' => 'Pondok Indah Mall', 'category' => 'Shopping Center'],
                    ['name' => 'Bandara Soekarno Hatta', 'category' => 'Transportation'],
                ],
            ],
        ];
    }

    $firstKey = array_key_first($groups);
@endphp

<section id="surroundings" class="bg-[#EFECDC]">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

        {{-- Heading (sama style kayak progress) --}}
        <div class="text-center mb-8">
            <h2 class="text-3xl sm:text-4xl font-light tracking-tight text-gray-900">
                {{ $title }}
            </h2>
            @if ($subtitle)
                <p class="mt-3 text-sm sm:text-base text-gray-600 max-w-2xl mx-auto">
                    {{ $subtitle }}
                </p>
            @endif
        </div>

        {{-- Content: kiri list, kanan map --}}
        <div class="mt-8 grid md:grid-cols-2 gap-10 md:gap-12 items-start" x-data="surroundingsMinute({
            groups: @js($groups),
            initialKey: '{{ $firstKey }}'
        })">

            {{-- KIRI: list --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    Accessible Surroundings
                </h3>

                <template x-if="current">
                    <ol class="space-y-3 max-h-[420px] overflow-y-auto pr-1">
                        <template x-for="(item, idx) in current.items" :key="idx">
                            <li class="flex items-start gap-3 text-sm sm:text-base">
                                <span
                                    class="mt-0.5 w-7 h-7 rounded-full border border-gray-500 flex items-center justify-center text-[11px] sm:text-xs font-semibold text-gray-800 bg-white/70">
                                    <span x-text="idx + 1"></span>
                                </span>
                                <div>
                                    <p class="text-gray-900" x-text="item.name"></p>
                                    <p class="text-xs text-gray-600" x-text="item.category"></p>
                                </div>
                            </li>
                        </template>
                    </ol>
                </template>
            </div>

            {{-- KANAN: map + tombol menit (style mirip progress) --}}
            <div class="relative max-w-md md:max-w-lg mx-auto">
                <div class="rounded-full overflow-hidden shadow-lg bg-white">
                    <div class="aspect-square">
                        <template x-if="current">
                            <img :src="current.image" alt="Surroundings map"
                                class="w-full h-full object-cover object-center">
                        </template>
                    </div>
                </div>

                {{-- tombol menit --}}
                <div class="mt-5 flex flex-wrap justify-center gap-2 sm:gap-3">
                    <template x-for="(group, key) in groups" :key="key">
                        <button type="button" @click="setActive(key)"
                            class="px-3 sm:px-4 py-1.5 rounded-full border text-xs sm:text-sm font-medium tracking-wide transition"
                            :class="active === key ?
                                'bg-gray-900 text-white border-gray-900' :
                                'bg-white text-gray-800 border-gray-300 hover:bg-gray-100'">
                            <span x-text="group.label"></span>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function surroundingsMinute({
        groups,
        initialKey
    }) {
        return {
            groups,
            active: initialKey,
            get current() {
                return this.groups[this.active] || null;
            },
            setActive(key) {
                this.active = key;
            },
        }
    }
</script>
