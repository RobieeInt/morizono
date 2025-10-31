<x-layouts.site :title="'Morizono'">
    <x-sections.hero :background="asset('images/hero.webp')" :logo="asset('logo/logowhite.webp')" title="MORIZONO" tagline="A Home Where Life Begins and Grows"
        subtitle="Lorem ipsum dolor sit amet insectum lorem ipsum" :clusters="[
            ['label' => 'Sumire', 'href' => '#clusters'],
            ['label' => 'Ayame', 'href' => '#clusters'],
            ['label' => 'Kaede', 'href' => '#clusters'],
        ]" ctaLabel="Book a tour"
        ctaHref="#book" />



    <x-sections.info-project :img-left="asset('images/about/about1.webp')" :img-right="asset('images/about/about2.webp')" title="Lorem Ipsum Dolor sit Amet insectum" />
    {{-- <x-sections.about :img-left="asset('images/about/about1.webp')" :img-right="asset('images/about/about2.webp')" title="Lorem Ipsum Dolor sit Amet insectum" /> --}}



    <x-sections.cluster-intro title="Lorem Ipsum dolor sit" />

    @php
        $sosmed = [
            [
                'title' => 'Kegiatan di Morizono',
                'excerpt' => 'Kehangatan keluarga di hunian Morizono yang nyaman dan asri.',
                'category' => 'Community',
                'date' => '12 Oct 2025',
                'embed' => 'https://www.instagram.com/reel/DQWDg2RE5ru/embed',
                'url' => 'https://www.instagram.com/reel/DQWDg2RE5ru/',
            ],
            [
                'title' => 'Suasana Lingkungan',
                'excerpt' => 'Area hijau dan udara segar untuk gaya hidup sehat.',
                'category' => 'Lifestyle',
                'date' => '14 Oct 2025',
                'embed' => 'https://www.instagram.com/reel/DQESNuHkwnl/embed',
                'url' => 'https://www.instagram.com/reel/DQESNuHkwnl/',
            ],
            [
                'title' => 'Progress Pembangunan',
                'excerpt' => 'Pantau terus progres pembangunan cluster Morizono.',
                'category' => 'Update',
                'date' => '16 Oct 2025',
                'embed' => 'https://www.instagram.com/reel/DPD7MmGj8iQ/embed',
                'url' => 'https://www.instagram.com/reel/DPD7MmGj8iQ/',
            ],
            [
                'title' => 'Event Keluarga',
                'excerpt' => 'Kebersamaan di acara keluarga Morizono Residence.',
                'category' => 'Event',
                'date' => '17 Oct 2025',
                'embed' => 'https://www.instagram.com/reel/DPAgt1YE8s8/embed',
                'url' => 'https://www.instagram.com/reel/DPAgt1YE8s8/',
            ],
        ];
    @endphp

    <x-sections.sosmed-carousel :sosmed="$sosmed" seeAllUrl="#" />

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
        ];
    @endphp

    <x-sections.cluster-list :clusters="$clusters" />

    @php
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

    <x-sections.news-carousel :posts="$posts" seeAllUrl="#" />

    <x-sections.contact-map :title="'How can we help you? Write us a message'" :map-query="'Jl. Cinangka Raya, Curug, Bojongsari, Depok, Jawa Barat 16517'" />

    {{-- section placeholders biar link nav ada targetnya --}}
    {{-- <section id="about" class="py-24"></section>
    <section id="clusters" class="py-24"></section>
    <section id="updates" class="py-24"></section>
    <section id="contact" class="py-24"></section>
    <section id="book" class="py-24"></section> --}}
</x-layouts.site>
