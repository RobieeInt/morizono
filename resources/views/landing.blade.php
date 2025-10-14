<x-layouts.site :title="'Morizono'">
    <x-sections.hero :background="asset('images/hero.jpg')" :logo="asset('logo/logo.png')" title="MORIZONO" tagline="A Home Where Life Begins and Grows"
        subtitle="Lorem ipsum dolor sit amet insectum lorem ipsum" :clusters="[
            ['label' => 'Sumire', 'href' => '#clusters'],
            ['label' => 'Ayame', 'href' => '#clusters'],
            ['label' => 'Kaede', 'href' => '#clusters'],
        ]" ctaLabel="Book a tour"
        ctaHref="#book" />



    <x-sections.about :img-left="asset('images/about/about1.jpg')" :img-right="asset('images/about/about2.png')" title="Lorem Ipsum Dolor sit Amet insectum" />

    <x-sections.cluster-intro title="Lorem Ipsum dolor sit" />

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
                    asset('images/sumire/sumire1.jpg'),
                    asset('images/sumire/sumire2.jpg'),
                    asset('images/sumire/sumire3.jpg'),
                    asset('images/sumire/sumire4.jpg'),
                    asset('images/sumire/sumire5.jpg'),
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
                    asset('images/ayame/ayame1.jpg'),
                    asset('images/ayame/ayame2.jpg'),
                    asset('images/ayame/ayame3.jpg'),
                    asset('images/ayame/ayame4.jpg'),
                    asset('images/ayame/ayame5.jpg'),
                    asset('images/ayame/ayame6.jpg'),
                    asset('images/ayame/ayame7.jpg'),
                    asset('images/ayame/ayame8.jpg'),
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
                    asset('images/kaede/kaede1.jpg'),
                    asset('images/kaede/kaede2.jpg'),
                    asset('images/kaede/kaede3.jpg'),
                    asset('images/kaede/kaede4.jpg'),
                    asset('images/kaede/kaede5.jpg'),
                    asset('images/kaede/kaede6.jpg'),
                    asset('images/kaede/kaede7.jpg'),
                    asset('images/kaede/kaede8.jpg'),
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
                'image' => asset('images/news/run.png'),
                'url' => '#',
            ],
            [
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.',
                'category' => 'Guide',
                'date' => '12 Oct 2025',
                'image' => asset('images/news/bus.png'),
                'url' => '#',
            ],
            [
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' =>
                    'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae.',
                'category' => 'Facility',
                'date' => '12 Oct 2025',
                'image' => asset('images/news/pool.png'),
                'url' => '#',
            ],
            // tambahin lagi kalau mau
        ];
    @endphp

    <x-sections.news-carousel :posts="$posts" seeAllUrl="#" />

    <x-sections.contact-map :title="'How can we help you?\nWrite us a message'" :map-query="'Jl. Cinangka Raya, Curug, Bojongsari, Depok, Jawa Barat 16517'" />

    {{-- section placeholders biar link nav ada targetnya --}}
    {{-- <section id="about" class="py-24"></section>
    <section id="clusters" class="py-24"></section>
    <section id="updates" class="py-24"></section>
    <section id="contact" class="py-24"></section>
    <section id="book" class="py-24"></section> --}}
</x-layouts.site>
