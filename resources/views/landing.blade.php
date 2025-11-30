<x-layouts.site :title="'Morizono'">
    <x-sections.hero :background="asset('images/hero.webp')" :logo="asset('logo/logowhite.webp')" title="MORIZONO" tagline="The Art of Japanese Living"
        subtitle="Lorem ipsum dolor sit amet insectum lorem ipsum" :clusters="[
            ['label' => 'Sumire', 'href' => '#Sumire'],
            ['label' => 'Ayame', 'href' => '#Ayame'],
            ['label' => 'Kaede', 'href' => '#Kaede'],
            ['label' => 'Shop House', 'href' => '#Shop House'], // <— ini tambahan
        ]" ctaLabel="Book a tour"
        ctaHref="#book" />



    <x-sections.info-project :img-left="asset('images/about/about1.webp')" :img-right="asset('images/about/about2.webp')" title="Lorem Ipsum Dolor sit Amet insectum" />
    {{-- <x-sections.about :img-left="asset('images/about/about1.webp')" :img-right="asset('images/about/about2.webp')" title="Lorem Ipsum Dolor sit Amet insectum" /> --}}



    {{-- <x-sections.cluster-intro title="Lorem Ipsum dolor sit" /> --}}

    @php
        $sosmed = [
            [
                'title' => 'Kegiatan di Morizono',
                'excerpt' => 'Kehangatan keluarga di hunian Morizono yang nyaman dan asri.',
                'category' => 'Community',
                'date' => '12 Oct 2025',
                'embed' => 'https://youtube.com/shorts/7EJpSeoYmLo',
                'url' => 'https://www.instagram.com/reel/DPD7MmGj8iQ/?igsh=dTNoZDhwMHBub3J3/',
            ],
            [
                'title' => 'Suasana Lingkungan',
                'excerpt' => 'Area hijau dan udara segar untuk gaya hidup sehat.',
                'category' => 'Lifestyle',
                'date' => '14 Oct 2025',
                'embed' => 'https://youtube.com/shorts/davOo8SI6Hw?si=xWnvd-2LShgF8NXq',
                'url' => 'https://www.instagram.com/reel/DQESNuHkwnl/?igsh=dGV0ZXlrMG51bTBs/',
            ],
            [
                'title' => 'Progress Pembangunan',
                'excerpt' => 'Pantau terus progres pembangunan cluster Morizono.',
                'category' => 'Update',
                'date' => '16 Oct 2025',
                'embed' => 'https://youtube.com/shorts/Xyr9EDGu5jY',
                'url' => 'https://www.instagram.com/reel/DQWDg2RE5ru/?igsh=MWQya2t5Y3RtZWJrbQ==/',
            ],
            [
                'title' => 'Event Keluarga',
                'excerpt' => 'Kebersamaan di acara keluarga Morizono Residence.',
                'category' => 'Event',
                'date' => '17 Oct 2025',
                'embed' => 'https://youtube.com/shorts/7EJpSeoYmLo',
                'url' =>
                    'https://www.instagram.com/reel/DNNUZkhT_QG/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==/',
            ],
        ];
    @endphp

    <x-sections.sosmed-carousel :sosmed="$sosmed" seeAllUrl="#" />

    <x-sections.progress-video title="Progress Morizono"
        subtitle="A short look at how Morizono Japanese Living is being developed step by step" :video-src="asset('video/progress.mp4')" />

    <x-sections.usp-resident :items="[
        ['icon' => asset('icons/shophouse.svg'), 'label' => 'Shophouse'],
        ['icon' => asset('icons/clubhouse.svg'), 'label' => 'Clubhouse'],
        ['icon' => asset('icons/mushola.svg'), 'label' => 'Mushola'],
        ['icon' => asset('icons/security.svg'), 'label' => '24H Security'],
        ['icon' => asset('icons/smarthome.svg'), 'label' => 'Smart Home System'],
        ['icon' => asset('icons/cctvmonitoring.svg'), 'label' => 'CCTV Monitoring'],
    ]" />

    <x-sections.usp-home :items="[
        ['icon' => asset('icons/solarpanel.svg'), 'label' => 'Solar Panel'],
        ['icon' => asset('icons/smartdoor.svg'), 'label' => 'Smart Door Lock'],
        ['icon' => asset('icons/cctvoutdoor.svg'), 'label' => 'CCTV Outdoor'],
        ['icon' => asset('icons/smartlightswitch.svg'), 'label' => 'Smart Light Switch'],
        ['icon' => asset('icons/smokesensor.svg'), 'label' => 'Smoke Sensor'],
        ['icon' => asset('icons/voiceassistant.svg'), 'label' => 'Voice Assistant'],
        ['icon' => asset('icons/smartcontactsensor.svg'), 'label' => 'Smart Contact Sensor'],
        ['icon' => asset('icons/doorbell.svg'), 'label' => 'Smart Doorbell'],
        ['icon' => asset('icons/cctvmonitoring.svg'), 'label' => 'Smart CCTV Monitoring'],
        ['icon' => asset('icons/motionsensor.svg'), 'label' => 'Smart Motion Sensor'],
    ]" />

    @php
        $clusters = [
            [
                'name' => 'Sumire',
                'tourUrl' => '#book',
                'specs' => ['6×14', 'LT 84', 'LB 88', '2200 Watt', '2 Floors', '3 Bedroom', '2 Bathroom', '2 Carport'],
                'items' => [
                    [
                        'title' => 'House Structure',
                        'detail' => [
                            'Foundation: Foot Plate + Pancang',
                            'Structure: Cast Concrete K-250',
                            'Wall: Textured Paint, Conwood',
                        ],
                    ],
                    [
                        'title' => 'House Interior',
                        'detail' => 'Finishing material high quality, sanitary set, kitchen sink, dst (dummy).',
                    ],
                    [
                        'title' => 'House Exterior',
                        'detail' => ['Kusen Aluminium', 'Canopy optional', 'Paving block carport'],
                    ],
                    [
                        'title' => 'House Flooring',
                        'detail' => [
                            'Living/Dining: Homogeneous Tile 60x60',
                            'Bedroom: Laminated Wood',
                            'Bathroom: Anti-slip tile',
                        ],
                    ],
                ],
                'images' => [
                    asset('images/sumire/sumire1.webp'),
                    asset('images/sumire/sumire2.webp'),
                    asset('images/sumire/sumire3.webp'),
                    asset('images/sumire/sumire4.webp'),
                    asset('images/sumire/sumire5.webp'),
                ],
            ],
            [
                'name' => 'Ayame',
                'tourUrl' => '#book',
                'specs' => ['6×14', 'LT 84', 'LB 88', '2200 Watt', '2 Floors', '3 Bedroom', '2 Bathroom', '2 Carport'],
                'items' => [
                    [
                        'title' => 'House Structure',
                        'detail' => ['Foundation: Foot Plate', 'Structure: Cast Concrete K-250'],
                    ],
                    ['title' => 'House Interior', 'detail' => 'Dummy interior spec…'],
                    ['title' => 'House Exterior', 'detail' => ['Cat Weatherproof', 'Taman depan minimalis']],
                    ['title' => 'House Flooring', 'detail' => ['Homogeneous Tile 60x60']],
                ],
                'images' => [
                    asset('images/ayame/ayame1.webp'),
                    asset('images/ayame/ayame2.webp'),
                    asset('images/ayame/ayame3.webp'),
                    asset('images/ayame/ayame4.webp'),
                    asset('images/ayame/ayame5.webp'),
                    asset('images/ayame/ayame6.webp'),
                    asset('images/ayame/ayame7.webp'),
                    asset('images/ayame/ayame8.webp'),
                ],
            ],
            [
                'name' => 'Kaede',
                'tourUrl' => '#book',
                'specs' => ['6×14', 'LT 84', 'LB 88', '2200 Watt', '2 Floors', '3 Bedroom', '2 Bathroom', '2 Carport'],
                'items' => [
                    ['title' => 'House Structure', 'detail' => ['Foot Plate + Tie Beam', 'Cast Concrete K-250']],
                    ['title' => 'House Interior', 'detail' => 'Dummy interior spec…'],
                    ['title' => 'House Exterior', 'detail' => 'Dummy exterior spec…'],
                    ['title' => 'House Flooring', 'detail' => ['60x60 tile', 'Lantai kamar kayu laminated']],
                ],
                'images' => [
                    asset('images/kaede/kaede1.webp'),
                    asset('images/kaede/kaede2.webp'),
                    asset('images/kaede/kaede3.webp'),
                    asset('images/kaede/kaede4.webp'),
                    asset('images/kaede/kaede5.webp'),
                    asset('images/kaede/kaede6.webp'),
                    asset('images/kaede/kaede7.webp'),
                    asset('images/kaede/kaede8.webp'),
                ],
            ],
            [
                'name' => 'Shop House',
                'tourUrl' => '#book',
                'specs' => ['6×14', 'LT 84', 'LB 88', '2200 Watt', '2 Floors', '3 Bedroom', '2 Bathroom', '2 Carport'],
                'items' => [
                    ['title' => 'House Structure', 'detail' => ['Foot Plate + Tie Beam', 'Cast Concrete K-250']],
                    ['title' => 'House Interior', 'detail' => 'Dummy interior spec…'],
                    ['title' => 'House Exterior', 'detail' => 'Dummy exterior spec…'],
                    ['title' => 'House Flooring', 'detail' => ['60x60 tile', 'Lantai kamar kayu laminated']],
                ],
                'images' => [
                    asset('images/shophouse/shophouse3.webp'),
                    asset('images/shophouse/shophouse1.webp'),
                    asset('images/shophouse/shophouse4.webp'),
                    asset('images/shophouse/shophouse2.webp'),
                ],
            ],
        ];
    @endphp

    <x-sections.cluster-list :clusters="$clusters" />

    @php
        $surroundGroups = [
            // '0' => [
            //     'label' => '0 Min',
            //     'image' => asset('images/map/0min.webp'),
            //     'items' => [['name' => 'Morizono', 'category' => 'Residential']],
            // ],
            '1' => [
                'label' => '1 Min',
                'image' => asset('images/map/1min.webp'),
                'items' => [
                    ['name' => 'The Park Sawangan', 'category' => 'Shopping Center'],
                    ['name' => 'Indogrosir', 'category' => 'Grocery Mart'],
                    ['name' => 'KFC', 'category' => 'Food'],
                    ['name' => 'Solaria', 'category' => 'Food'],
                ],
            ],
            '5' => [
                'label' => '5 Mins',
                'image' => asset('images/map/5min.webp'),
                'items' => [
                    ['name' => 'Pamulang Toll Gate', 'category' => 'Transportation'],
                    ['name' => 'Hyfresh', 'category' => 'Grocery Mart'],
                    ['name' => 'Burger King', 'category' => 'Food'],
                    ['name' => 'Domino Pizza', 'category' => 'Food'],
                    ['name' => 'Hoka Hoka Bento', 'category' => 'Food'],
                    ['name' => 'Brawijaya Hospital', 'category' => 'Health'],
                    ['name' => 'Commercial and Banking Center', 'category' => 'Financial'],
                    // dst...
                ],
            ],
            '10' => [
                'label' => '10 Mins',
                'image' => asset('images/map/10min.webp'),
                'items' => [
                    ['name' => 'Sawangan Toll Gate', 'category' => 'Transportation'],
                    ['name' => 'PPD Transjakarta Ciputat', 'category' => 'Transportation'],
                    ['name' => 'Kharisma Bangsa Global School', 'category' => 'Education'],
                    ['name' => 'Mitra Keluarga Hospital ', 'category' => 'Health'],
                    ['name' => 'MRT Lebak Bulus', 'category' => 'Transportation'],
                    // dst...
                ],
            ],
            '30' => [
                'label' => '30 Mins',
                'image' => asset('images/map/30min.webp'),
                'items' => [
                    ['name' => 'Pondok Indah Hospital', 'category' => 'Health'],
                    ['name' => 'Pondok Indah Mall', 'category' => 'Shopping Center'],
                    ['name' => 'Bandara Soekarno Hatta', 'category' => 'Transportation'],
                    // dst...
                ],
            ],
        ];
    @endphp

    <x-sections.surroundings :groups="$surroundGroups" />

    {{-- @php
        $posts = [
            [
                'title' => 'Lorem ipsum dolor sit amet insectum',
                'excerpt' =>
                    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.',
                'category' => 'Lifestyle',
                'date' => '12 Oct 2025',
                'image' => asset('images/news/run.webp'),
                'url' => '#',
            ],
            [
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.',
                'category' => 'Guide',
                'date' => '12 Oct 2025',
                'image' => asset('images/news/bus.webp'),
                'url' => '#',
            ],
            [
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' =>
                    'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae.',
                'category' => 'Facility',
                'date' => '12 Oct 2025',
                'image' => asset('images/news/pool.webp'),
                'url' => '#',
            ],
            // tambahin lagi kalau mau
        ];
    @endphp

    <x-sections.news-carousel :posts="$posts" seeAllUrl="#" /> --}}
    @php
        $posts = \App\Models\News::latest('published_at')
            ->take(6)
            ->get()
            ->map(function ($n) {
                return [
                    'title' => $n->title,
                    'excerpt' => $n->excerpt,
                    'category' => $n->category,
                    'date' => optional($n->published_at)->format('d M Y'),
                    'image' => $n->image,
                    'url' => route('news.show', $n), // <-- ke Livewire Show
                ];
            })
            ->toArray();
    @endphp

    <x-sections.news-carousel :posts="$posts" seeAllUrl="{{ route('news.index') }}" />

    <x-sections.contact-map :title="'How can we help you? Write us a message'" :map-query="'Jl. Cinangka Raya, Curug, Bojongsari, Depok, Jawa Barat 16517'" />

    {{-- section placeholders biar link nav ada targetnya --}}
    {{-- <section id="about" class="py-24"></section>
    <section id="clusters" class="py-24"></section>
    <section id="updates" class="py-24"></section>
    <section id="contact" class="py-24"></section>
    <section id="book" class="py-24"></section> --}}
</x-layouts.site>
