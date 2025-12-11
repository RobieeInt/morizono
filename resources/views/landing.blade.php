<x-layouts.site :title="'Morizono'">
    <x-sections.hero :background="asset('images/hero.webp')" :logo="asset('logo/logowhite.webp')" title="MORIZONO" tagline="The Art of Japanese Living"
        subtitle="Lorem ipsum dolor sit amet insectum lorem ipsum" :clusters="[
            ['label' => 'Sumire', 'href' => '#Sumire'],
            ['label' => 'Ayame', 'href' => '#Ayame'],
            ['label' => 'Kaede', 'href' => '#Kaede'],
            ['label' => 'Shop House', 'href' => '#Shop House'], // <— ini tambahan
        ]" ctaLabel="Book a tour"
        ctaHref="#contact" />



    <x-sections.info-project :img-left="asset('images/about/about1.webp')" :img-right="asset('images/about/about2.webp')" title="Lorem Ipsum Dolor sit Amet insectum" />
    {{-- <x-sections.about :img-left="asset('images/about/about1.webp')" :img-right="asset('images/about/about2.webp')" title="Lorem Ipsum Dolor sit Amet insectum" /> --}}



    {{-- <x-sections.cluster-intro title="Lorem Ipsum dolor sit" /> --}}

    @php
        $sosmed = [
            [
                'title' => 'Product Specification',
                'excerpt' => 'Detail spesifikasi rumah di Morizono.',
                'category' => 'Specification',
                'date' => '12 Oct 2025',
                'embed' => 'https://youtube.com/shorts/na38ndKgfFU?feature=share',
                'url' =>
                    'https://www.instagram.com/reel/DPD7MmGj8iQ/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==/',
            ],
            [
                'title' => 'Suasana',
                'excerpt' => 'Area hijau dan udara segar untuk gaya hidup sehat.',
                'category' => 'Lifestyle',
                'date' => '14 Oct 2025',
                'embed' => 'https://youtube.com/shorts/sqls_sBSko8?feature=share',
                'url' =>
                    'https://www.instagram.com/reel/DK1kpfmTyKe/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==/',
            ],
            [
                'title' => 'Testimoni',
                'excerpt' => 'Dengar langsung dari penghuni Morizono tentang pengalaman mereka.',
                'category' => 'Testimonial',
                'date' => '16 Oct 2025',
                'embed' => 'https://youtube.com/shorts/xXPfO2JVd4c?feature=share',
                'url' =>
                    'https://www.instagram.com/reel/DQanVHzk1b1/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==/',
            ],
            [
                'title' => 'Event',
                'excerpt' => 'Kebersamaan di acara keluarga Morizono Residence.',
                'category' => 'Event',
                'date' => '17 Oct 2025',
                'embed' => 'https://youtube.com/shorts/LRcCIOxdOYE?feature=share',
                'url' =>
                    'https://www.instagram.com/reel/DLBlcQBzvL6/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==/',
            ],
        ];
    @endphp

    <x-sections.sosmed-carousel :sosmed="$sosmed" seeAllUrl="#" />

    <x-sections.progress-video title="Morizono Development Progress"
        subtitle="A short look at how Morizono Japanese Living is being developed step by step" :video-src="asset('video/progress.mp4')" />

    <x-sections.usp-resident :items="[
        ['icon' => asset('icons/shophouse.svg'), 'label' => 'Shophouse'],
        ['icon' => asset('icons/clubhouse.svg'), 'label' => 'Clubhouse'],
        ['icon' => asset('icons/mushola.svg'), 'label' => 'Mushola'],
        ['icon' => asset('icons/security.svg'), 'label' => '24H Security'],
        ['icon' => asset('icons/smarthome.svg'), 'label' => 'Smart Home System'],
        ['icon' => asset('icons/cctvmonitoring.svg'), 'label' => 'CCTV Monitoring'],
        ['icon' => asset('icons/playground.svg'), 'label' => 'Children’s Playground'],
    ]" />

    <x-sections.usp-home :items="[
        ['icon' => asset('icons/solarpanel.svg'), 'label' => 'Solar Panel'],
        ['icon' => asset('icons/smartdoor.svg'), 'label' => 'Smart Door Lock'],
        ['icon' => asset('icons/cctvmonitoring.svg'), 'label' => 'Smart CCTV Indoor'],
        ['icon' => asset('icons/cctvoutdoor.svg'), 'label' => 'Smart CCTV Outdoor'],
        ['icon' => asset('icons/smartlightswitch.svg'), 'label' => 'Smart Light Switch'],
        // ['icon' => asset('icons/smokesensor.svg'), 'label' => 'Smoke Sensor'],
        ['icon' => asset('icons/voiceassistant.svg'), 'label' => 'Voice Assistant'],
        // ['icon' => asset('icons/smartcontactsensor.svg'), 'label' => 'Smart Contact Sensor'],
        ['icon' => asset('icons/doorbell.svg'), 'label' => 'Smart Doorbell'],
        ['icon' => asset('icons/motionsensor.svg'), 'label' => 'Smart Motion Sensor'],
    ]" />

    @php
        $clusters = [
            [
                'name' => 'Sumire',
                'tourUrl' => '#contact',
                'specs' => [
                    '6×14',
                    'LT 84',
                    'LB 88',
                    '2200 Watt',
                    '2 Floor → Storey',
                    '3 Bedroom',
                    '2 Bathroom',
                    '2 Carport',
                ],
                'items' => [
                    [
                        'title' => 'House Structure',
                        'detail' => [
                            'Foundation: Foot Plate + Pancang → Minipiles',
                            'Structure: Cast Concrete K-250',
                            'Wall: Textured Paint, Conwood No conwood in T6 new layout only in T7 & T8 and also the content is misplaced wall finish is more suitable in house exterior section rather than in house structure section.
                        if we want to mention about wall in house structure better use “Red Brick, Light Brick”
                        ',
                        ],
                    ],
                    [
                        'title' => 'House Interior',
                        'detail' => [
                            'Ceiling: Gypsum Board ',
                            'Kitchen: Kitchen Sink, Concrete Table + HT 60x60, Grease Trap',
                            'Door: Engineering Door',
                            'Window: YKK Aluminium ',
                            'Sanitary : TOTO',
                        ],
                    ],
                    [
                        'title' => 'House Exterior',
                        'detail' => ['Roof: Flat Concrete, UPVC Roof', 'Carport: Alderon Roof, Granroof YKK'],
                    ],
                    [
                        'title' => 'House Flooring',
                        'detail' => [
                            'Main: HT 60x60',
                            'Terrace & Balcony HT 60x60',
                            'Bathroom: HT 60x60',
                            'Wall: HT 60x60',
                            'Carport : Ceramic Tile 40x40',
                        ],
                    ],
                ],
                'images' => [
                    asset('images/sumire/sumire1.webp'),
                    asset('images/sumire/sumire2.webp'),
                    // asset('images/sumire/sumire3.webp'),
                    // asset('images/sumire/sumire4.webp'),
                    // asset('images/sumire/sumire5.webp'),
                ],
            ],
            [
                'name' => 'Ayame',
                'tourUrl' => '#contact',
                'specs' => [
                    '7×14',
                    'LT 98',
                    'LB 109',
                    '2200 Watt',
                    '2 Floors',
                    '3 Bedrooms',
                    '2 Bathroom',
                    '2 Carport',
                ],
                'items' => [
                    [
                        'title' => 'House Structure',
                        'detail' => [
                            'Foundation: Foot Plate + Pancang',
                            'Structure: Cast Concrete Quality K-250',
                            'Wall: Plastered Brick, Paint Texture & Conwood',
                        ],
                    ],
                    [
                        'title' => 'House Interior',
                        'detail' => [
                            'Ceiling: Gypsum Board',
                            'Kitchen: Aluminum Sink, Ceramic-coated Concrete Table, Grease Trap',
                            'Door: Engineering Door',
                            'Window: YKK Aluminum',
                            'Bathroom: Toto',
                        ],
                    ],
                    [
                        'title' => 'House Exterior',
                        'detail' => ['Roof: Flat Concrete', 'Carport: Alderson Roof, Granroof YKK'],
                    ],
                    [
                        'title' => 'House Flooring',
                        'detail' => ['Main: HT 60×60', 'Terrace: HT 40×40', 'Bathroom: HT 60×60', 'Wall: HT 60×60'],
                    ],
                ],
                'images' => [
                    asset('images/ayame/ayame1.webp'),
                    asset('images/ayame/ayame2.webp'),
                    asset('images/ayame/ayame3.webp'),
                    asset('images/ayame/ayame4.webp'),
                    asset('images/ayame/ayame5.webp'),
                    asset('images/ayame/ayame6.webp'),
                ],
            ],
            [
                'name' => 'Kaede',
                'tourUrl' => '#contact',
                'specs' => [
                    '8×14',
                    'LT 112',
                    'LB 129',
                    '2200 Watt',
                    '2 Floors',
                    '3 Bedrooms',
                    '2 Bathroom',
                    '2 Carport',
                ],
                'items' => [
                    [
                        'title' => 'House Structure',
                        'detail' => [
                            'Foundation: Foot Plate + Pancang',
                            'Structure: Cast Concrete Quality K-250',
                            'Wall: Paint Texture & Conwood',
                        ],
                    ],
                    [
                        'title' => 'House Interior',
                        'detail' => [
                            'Ceiling: Gypsum Board',
                            'Kitchen: Aluminum Sink, Ceramic-coated Concrete Table',
                            'Door: Engineering Door',
                            'Window: YKK Aluminum',
                            'Bathroom: Toto',
                        ],
                    ],
                    [
                        'title' => 'House Exterior',
                        'detail' => ['Roof: Flat Concrete', 'Carport: Alderon Roof, Granroof YKK'],
                    ],
                    [
                        'title' => 'House Flooring',
                        'detail' => ['Main: HT 60×60', 'Terrace: HT 40×40', 'Bathroom: HT 60×60', 'Wall: HT 60×60'],
                    ],
                ],
                'images' => [
                    asset('images/kaede/kaede1.webp'),
                    asset('images/kaede/kaede2.webp'),
                    asset('images/kaede/kaede3.webp'),
                    asset('images/kaede/kaede4.webp'),
                    asset('images/kaede/kaede5.webp'),
                    asset('images/kaede/kaede6.webp'),
                ],
            ],
            [
                'name' => 'Shophouse',
                'tourUrl' => '#contact',

                // ringkasan spesifikasi utama
                'specs' => ['2 Story 5×15', '3 Story 5×15', '3 Story 6×15 Corner', '3500 Watt'],

                // spesifikasi detail per kategori
                'items' => [
                    [
                        'title' => 'Structure',
                        'detail' => [
                            'Pancang',
                            'Structure: Cast Concrete Quality K-250',
                            'Wall: Red Brick & Light Brick',
                        ],
                    ],
                    [
                        'title' => 'Interior',
                        'detail' => [
                            'Ceiling: Gypsum Board',
                            'Door: YKK Aluminum & PVC Door',
                            'Window: YKK Aluminum',
                            'Sanitary: Toto',
                        ],
                    ],
                    [
                        'title' => 'Exterior',
                        'detail' => ['Finishing: Exterior Paint, Conwood', 'Roof: UPVC Roof'],
                    ],
                    [
                        'title' => 'Flooring',
                        'detail' => [
                            'Main: HT 60×60',
                            'Terrace: HT 60×60',
                            'Bathroom: Ceramic Tile 40×40 (floor & wall)',
                        ],
                    ],
                ],

                // foto-foto, biarin format sama
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
            '0' => [
                'label' => '',
                'image' => asset('images/map/0Minn.webp'),
                'items' => [
                    // [
                    //     'name' => 'Morizono',
                    //     'category' => 'Residential',
                    //     // kalau mau icon di 0 min juga, isi di sini
                    //     // 'icon' => asset('icons/home.png'),
                    //     // 'icon_alt' => 'Morizono Residence',
                    // ],
                    [
                        'name' => 'Exit Tol Sawangan',
                        'category' => 'Highway',
                        'icon' => asset('icons/highway.png'),
                        'icon_alt' => 'Exit Tol Sawangan',
                    ],
                    [
                        'name' => 'Exit Tol Pamulang',
                        'category' => 'Highway',
                        'icon' => asset('icons/highway.png'),
                        'icon_alt' => 'Exit Tol Pamulang',
                    ],
                    [
                        'name' => 'MRT Lebak Bulus',
                        'category' => 'Transportation',
                        'icon' => asset('icons/bus-stop.png'),
                        'icon_alt' => 'MRT Lebak Bulus',
                    ],
                ],
            ],
            '1' => [
                'label' => '1 Min',
                'image' => asset('images/map/1Minn.webp'),
                'items' => [
                    ['name' => 'The Park Sawangan', 'category' => 'Shopping Center'],
                    ['name' => 'Indogrosir', 'category' => 'Grocery Mart'],
                    ['name' => 'KFC', 'category' => 'Food'],
                    ['name' => 'Solaria', 'category' => 'Food'],
                ],
            ],
            '5' => [
                'label' => '5 Mins',
                'image' => asset('images/map/5Minn.webp'),
                'items' => [
                    [
                        'name' => 'Pamulang Toll Gate',
                        'category' => 'Transportation',
                        'icon' => asset('icons/highway.png'),
                        'icon_alt' => 'Exit Tol Pamulang',
                    ],
                    ['name' => 'Hyfresh', 'category' => 'Grocery Mart'],
                    ['name' => 'Burger King', 'category' => 'Food'],
                    ['name' => 'Domino Pizza', 'category' => 'Food'],
                    ['name' => 'Hoka Hoka Bento', 'category' => 'Food'],
                    ['name' => 'Brawijaya Hospital', 'category' => 'Health'],
                    ['name' => 'Commercial and Banking Center', 'category' => 'Financial'],
                ],
            ],
            '10' => [
                'label' => '10 Mins',
                'image' => asset('images/map/10Minn.webp'),
                'items' => [
                    [
                        'name' => 'Sawangan Toll Gate',
                        'category' => 'Transportation',
                        'icon' => asset('icons/highway.png'),
                        'icon_alt' => 'Exit Tol Sawangan',
                    ],
                    [
                        'name' => 'MRT Lebak Bulus',
                        'category' => 'Transportation',
                        'icon' => asset('icons/bus-stop.png'),
                        'icon_alt' => 'MRT Lebak Bulus',
                    ],
                    ['name' => 'PPD Transjakarta Ciputat', 'category' => 'Transportation'],
                    ['name' => 'Kharisma Bangsa Global School', 'category' => 'Education'],
                    ['name' => 'Mitra Keluarga Hospital ', 'category' => 'Health'],
                ],
            ],
            '30' => [
                'label' => '30 Mins',
                'image' => asset('images/map/30Minn.webp'),
                'items' => [
                    ['name' => 'Pondok Indah Hospital', 'category' => 'Health'],
                    ['name' => 'Pondok Indah Mall', 'category' => 'Shopping Center'],
                    ['name' => 'Bandara Soekarno Hatta', 'category' => 'Transportation'],
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
