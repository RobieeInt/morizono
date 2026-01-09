<x-layouts.site :title="'Morizono'">
    {{-- =========================
        x-layouts.site Props
        =========================
        :title (string)
        - Judul halaman (biasanya dipakai buat <title> tab browser + SEO/meta).
        - Contoh ganti: :title="'Morizono | Home'"
    --}}

    <x-sections.hero :background="asset('images/hero.webp')" {{-- :background (string URL/path)
            - Background gambar utama di section hero.
            - Ganti file atau path asset() kalau background berubah.
        --}} :logo="asset('logo/logowhite.webp')" {{-- :logo (string URL/path)
            - Logo yang tampil di hero (biasanya versi putih/transparan).
        --}} title="MORIZONO"
        {{-- title (string)
            - Headline utama di hero (tulisan paling gede).
        --}} tagline="The Art of Japanese Living" {{-- tagline (string)
            - Kalimat pendek pendamping headline.
        --}}
        subtitle="Lorem ipsum dolor sit amet insectum lorem ipsum" {{-- subtitle (string)
            - Deskripsi tambahan (lebih panjang dari tagline).
        --}} :clusters="[
            ['label' => 'Sumire', 'href' => '#Sumire'],
            ['label' => 'Ayame', 'href' => '#Ayame'],
            ['label' => 'Kaede', 'href' => '#Kaede'],
            ['label' => 'Shop House', 'href' => '#ShopHouse'], // <— ini tambahan
        ]"
        {{-- :clusters (array)
            - List menu/shortcut cluster (biasanya tombol/anchor di hero).
            - Format per item:
              - label: teks yang tampil di UI
              - href : tujuan link (anchor #id atau URL)
            - Cara nambah cluster baru:
              1) Tambah item baru di array ini
              2) Pastikan section target punya id yang sesuai (contoh: id="Sumire")
        --}} ctaLabel="Book a tour" {{-- ctaLabel (string)
            - Teks tombol CTA utama.
        --}} ctaHref="#contact" {{-- ctaHref (string)
            - Link tujuan tombol CTA.
            - Bisa anchor (#contact) atau URL (contoh WhatsApp/landing page lain).
        --}} />



    <x-sections.info-project :img-left="asset('images/about/about1.webp')" {{-- :img-left (string URL/path)
            - Gambar kiri section info-project.
        --}} :img-right="asset('images/about/about2.webp')" {{-- :img-right (string URL/path)
            - Gambar kanan section info-project.
        --}}
        title="Lorem Ipsum Dolor sit Amet insectum" {{-- title (string)
            - Judul section info-project.
        --}} />
    {{-- <x-sections.about :img-left="asset('images/about/about1.webp')" :img-right="asset('images/about/about2.webp')" title="Lorem Ipsum Dolor sit Amet insectum" /> --}}



    {{-- <x-sections.cluster-intro title="Lorem Ipsum dolor sit" /> --}}

    {{-- ==============================
        SOSMED CAROUSEL (DOKUMENTASI)
        ==============================
        Tujuan:
        - Render carousel konten sosmed (video + info) dari array $sosmed.

        Langkah mengganti isi carousel sosmed:
        1) Cari variabel $sosmed di bawah ini
        2) Tiap card di carousel = 1 item array (satu blok [ ... ])
        3) Ubah field: title, excerpt, category, date, embed, url
        4) Tambah card baru:
           - Copy 1 blok item
           - Paste di bawahnya
           - Ubah datanya
        5) Hapus card:
           - Hapus 1 blok item lengkap
    --}}
    @php
        $sosmed = [
            [
                'title' => 'Product Specification',
                // title (string)
                // - Judul card/post yang tampil di carousel.
                // - Usahakan pendek biar rapi.

                'excerpt' => 'Detail spesifikasi rumah di Morizono.',
                // excerpt (string)
                // - Deskripsi singkat/summary isi konten.
                // - Biasanya 1 kalimat.

                'category' => 'Specification',
                // category (string)
                // - Label kategori (badge) di UI.
                // - Bebas, tapi konsisten: "Lifestyle", "Event", "Testimonial", "Specification", dll.

                'date' => '12 Oct 2025',
                // date (string)
                // - Tanggal tampil di card.
                // - Format bebas, tapi usahakan konsisten.

                'embed' => 'https://youtube.com/shorts/na38ndKgfFU?feature=share',
                // embed (string URL)
                // - Link video untuk ditampilkan/di-embed (contoh YouTube Shorts).
                // - Kalau component butuh format embed khusus, sesuaikan di componentnya.

                'url' =>
                    'https://www.instagram.com/reel/DPD7MmGj8iQ/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==/',
                // url (string URL)
                // - Link tujuan saat user klik card / tombol action.
                // - Biasanya link Instagram/TikTok/YouTube atau halaman internal.
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

    <x-sections.sosmed-carousel :sosmed="$sosmed" {{-- :sosmed (array)
            - Data sumber isi carousel.
            - Harus array of items dengan keys:
              title, excerpt, category, date, embed, url
        --}} seeAllUrl="#" {{-- seeAllUrl (string URL)
            - Link tombol "See All" (kalau component punya).
            - Isi dengan route/URL tujuan untuk lihat semua konten sosmed.
        --}} />

    <x-sections.progress-video title="Morizono Development Progress" {{-- title (string)
            - Judul section video progress.
        --}}
        subtitle="A short look at how Morizono Japanese Living is being developed step by step" {{-- subtitle (string)
            - Subjudul/deskripsi pendukung video.
        --}}
        :video-src="asset('video/progress.mp4')" {{-- :video-src (string URL/path)
            - Sumber file video mp4 yang diputar.
        --}} />

    <x-sections.usp-resident :items="[
        ['icon' => asset('icons/shophouse.svg'), 'label' => 'Shophouse'],
        ['icon' => asset('icons/clubhouse.svg'), 'label' => 'Clubhouse'],
        ['icon' => asset('icons/mushola.svg'), 'label' => 'Mushola'],
        ['icon' => asset('icons/security.svg'), 'label' => '24H Security'],
        ['icon' => asset('icons/smarthome.svg'), 'label' => 'Smart Home System'],
        ['icon' => asset('icons/cctvmonitoring.svg'), 'label' => 'CCTV Monitoring'],
        ['icon' => asset('icons/playground.svg'), 'label' => 'Children’s Playground'],
    ]" {{-- :items (array)
            - List USP (Unique Selling Points) untuk fasilitas resident/kawasan.
            - Format per item:
              - icon : path icon (svg/png)
              - label: teks yang tampil
            - Cara nambah: tambah array item baru di list ini.
        --}} />

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
    ]" {{-- :items (array)
            - List USP fitur di dalam rumah (smart home).
            - Format sama: icon + label.
            - Item yang di-comment berarti sengaja disembunyiin.
        --}} />

    @php
        /*
    |--------------------------------------------------------------------------
    | CLUSTERS DATA (untuk <x-sections.cluster-list :clusters="$clusters" />)
    |--------------------------------------------------------------------------
    | $clusters = daftar tipe unit/cluster (Sumire/Ayame/Kaede/Shophouse)
    | yang akan dirender jadi section detail + galeri foto + spesifikasi.
    |
    | Struktur per cluster (wajib):
    | - name    (string)  : Nama cluster yang tampil di UI. Biasanya juga dipakai buat anchor/id.
    | - tourUrl (string)  : URL/anchor tombol CTA (misal "#contact" atau link WA).
    | - specs   (array)   : Ringkasan spesifikasi singkat (chip/list). Isinya string bebas.
    | - items   (array)   : Detail spesifikasi per kategori (Structure/Interior/Exterior/Flooring/dll).
    | - images  (array)   : List gambar (asset url) buat slider/galeri.
    |
    | Struktur items[]:
    | - title  (string) : Nama kategori spesifikasi (contoh: "House Structure").
    | - detail (array)  : List bullet detail untuk kategori tsb. Tiap item string.
    |
    | Cara edit cepat:
    | 1) Ubah nama cluster:
    |    - edit 'name'
    |
    | 2) Ubah CTA per cluster:
    |    - edit 'tourUrl' (contoh: '#contact' atau 'https://wa.me/62xxxx')
    |
    | 3) Ubah ringkasan specs:
    |    - edit array 'specs' (urutan tampil biasanya sesuai urutan array)
    |
    | 4) Tambah/hapus kategori spesifikasi:
    |    - di 'items', tambah/hapus blok:
    |      [
    |        'title' => 'Kategori Baru',
    |        'detail' => ['Poin 1', 'Poin 2']
    |      ]
    |
    | 5) Tambah/hapus gambar:
    |    - di 'images', tambah asset('...') baru atau comment/hapus item.
    |
    | Catatan penting (biar UI ga rusak):
    | - 'images' sebaiknya minimal 2 gambar supaya slider ga “kosong”.
    | - 'detail' mending 2-6 poin per kategori (kepanjangan bikin layout berat).
    | - Hindari enter/newline panjang di string detail (seperti paragraf curhat),
    |   mending pecah jadi beberapa item array biar tampil rapi.
    | - Kalau name dipakai jadi anchor, jangan pakai spasi aneh.
    |   (contoh: "Shop House" kadang lebih aman "Shophouse" untuk id).
    |--------------------------------------------------------------------------
    */
        $clusters = [
            [
                'name' => 'Sumire',
                // name (string)
                // - Nama cluster.
                // - Biasanya jadi heading dan bisa dipakai sebagai anchor/id di UI.

                'tourUrl' => '#contact',
                // tourUrl (string URL)
                // - Link tombol "Book a tour" khusus cluster ini.

                'specs' => ['6×14', 'LT 84', 'LB 88', '2200 Watt', '2 Storey', '3 Bedroom', '2 Bathroom', '2 Carport'],
                // specs (array of string)
                // - Ringkasan spesifikasi utama (list singkat di atas/side).

                'items' => [
                    [
                        'title' => 'House Structure',
                        // title (string)
                        // - Judul kategori spesifikasi.

                        'detail' => [
                            // detail (array of string)
                            // - Poin-poin detail spesifikasi dalam kategori itu.
                            'Foundation: Foot Plate + Minipiles',
                            'Structure: Cast Concrete K-250',
                            'Wall: Red Brick, Light Brick. ”
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
                        'detail' => ['Roof: Flat Concrete, UPVC Roof', 'Carport: Granroof YKK'],
                    ],
                    [
                        'title' => 'House Flooring',
                        'detail' => [
                            'Main: HT 60x60',
                            'Terrace & Balcony HT 60x60',
                            'Bathroom: HT 60x60',
                            'Bathroom Wall: HT 60x60',
                            'Carport : Ceramic Tile 40x40',
                        ],
                    ],
                ],
                // items (array)
                // - Detail spesifikasi per kategori (Structure/Interior/Exterior/Flooring/dll).

                'images' => [
                    asset('images/sumire/sumire1.webp'),
                    asset('images/sumire/sumire2.webp'),
                    // asset('images/sumire/sumire3.webp'),
                    // asset('images/sumire/sumire4.webp'),
                    // asset('images/sumire/sumire5.webp'),
                ],
                // images (array of string URL/path)
                // - Foto-foto cluster untuk slider/galeri.
                // - Cara nambah: buka comment / tambah asset(...) baru.
            ],
            [
                'name' => 'Ayame',
                'tourUrl' => '#contact',
                'specs' => [
                    '7×14',
                    'LT 98',
                    'LB 109',
                    '2200 Watt',
                    '2 Storey',
                    '3 Bedrooms',
                    '2 Bathroom',
                    '2 Carport',
                ],
                'items' => [
                    [
                        'title' => 'House Structure',
                        'detail' => [
                            'Foundation: Foot Plate + Minipiles',
                            'Structure: Cast Concrete Quality K-250',
                            'Wall: Red Brick, Light Brick',
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
                        'detail' => [
                            'Roof: Flat Concrete, UPVC Roof',
                            'Carport: Granroof YKK',
                            'Wall: Conwood, Textured Paint, Exterior Paint',
                        ],
                    ],
                    [
                        'title' => 'House Flooring',
                        'detail' => [
                            'Main: HT 60×60',
                            'Terrace & Balcony: HT 60x60 ',
                            'Bathroom: HT 60×60',
                            'Bathroom Wall: HT 60x60',
                            'Carport: Ceramic Tile 40x40 ',
                        ],
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
                    '2 Storey',
                    '3 Bedrooms',
                    '2 Bathroom',
                    '2 Carport',
                ],
                'items' => [
                    [
                        'title' => 'House Structure',
                        'detail' => [
                            'Foundation: Foot Plate + Minipiles',
                            'Structure: Cast Concrete Quality K-250',
                            'Wall: Red Brick, Light Brick.',
                        ],
                    ],
                    [
                        'title' => 'House Interior',
                        'detail' => [
                            'Ceiling: Gypsum Board',
                            'Kitchen: Kitchen Sink, Concrete Table + HT 60x60, Grease Trap ',
                            'Door: Engineering Door',
                            'Window: YKK Aluminum',
                            'Sanitary: TOTO',
                        ],
                    ],
                    [
                        'title' => 'House Exterior',
                        'detail' => [
                            'Roof: Flat Concrete, UPVC Roof',
                            'Carport: Granroof YKK',
                            'Wall: Conwood, Textured Paint, Exterior Paint',
                        ],
                    ],
                    [
                        'title' => 'House Flooring',
                        'detail' => [
                            'Main: HT 60×60',
                            'Terrace & Balcony: HT 60x60 ',
                            'Bathroom: HT 60×60',
                            'Bathroom Wall: HT 60×60',
                            'Carport: Ceramic Tile 40x40 ',
                        ],
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
                'name' => 'ShopHouse',
                'tourUrl' => '#contact',

                // ringkasan spesifikasi utama
                'specs' => ['2 Storey 5×15', '3 Storey 5×15', '3 Storey 6×15 Corner', '3500 Watt'],

                // spesifikasi detail per kategori
                'items' => [
                    [
                        'title' => 'Structure',
                        'detail' => [
                            'Minipiles',
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
                            'Sanitary: TOTO',
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

    <x-sections.cluster-list :clusters="$clusters" {{-- :clusters (array)
            - Data semua cluster yang dirender.
            - Struktur per cluster: name, tourUrl, specs[], items[], images[].
        --}} />

    @php
        /*
    |--------------------------------------------------------------------------
    | SURROUNDINGS GROUPS DATA (untuk <x-sections.surroundings :groups="$surroundGroups" />)
    |--------------------------------------------------------------------------
    | $surroundGroups = data “akses sekitar” yang biasanya tampil sebagai:
    | - Tabs/segment (0 min / 1 min / 5 mins / 10 mins / 30 mins)
    | - Gambar peta per tab
    | - List POI (Point of Interest) per tab
    |
    | Struktur $surroundGroups:
    | - Key group (string)        : ID group, biasanya menit ("0", "1", "5", "10", "30").
    |                               Dipakai component buat urutan / mapping tab.
    |
    | Tiap group wajib punya:
    | - label (string)            : Teks tab yang tampil di UI (contoh: "5 Mins").
    |                               Boleh kosong untuk group "0" kalau desainnya begitu.
    |
    | - image (string URL/path)   : Gambar peta/ilustrasi untuk group tsb.
    |
    | - items (array)             : List POI yang ditampilkan pada tab group tsb.
    |
    | Struktur items[] (POI):
    | - name (string)             : Nama tempat/POI.
    | - category (string)         : Label kecil pendamping (bisa “Food”, “Health”, “Transportation”,
    |                               atau bisa juga “5 Menit”, dll). Tergantung desain component.
    |
    | Optional (kalau butuh icon per item):
    | - icon (string URL/path)    : Path icon (png/svg). Kalau kosong, component biasanya pakai default.
    | - icon_alt (string)         : Alt text icon untuk aksesibilitas (recommended kalau icon diisi).
    |
    | Cara edit cepat:
    | 1) Ganti nama tab:
    |    - edit group['label']
    |
    | 2) Ganti gambar map:
    |    - edit group['image'] ke asset('images/map/xxx.webp')
    |
    | 3) Tambah POI baru:
    |    - tambah 1 array item di group['items'] format:
    |      ['name' => 'Nama', 'category' => 'Kategori', 'icon' => asset(...), 'icon_alt' => '...']
    |
    | 4) Hapus POI:
    |    - hapus 1 item array di items
    |
    | 5) Tambah tab baru (misal "15 Mins"):
    |    - tambah key baru '15' => [label, image, items]
    |    - pastikan component support key tsb (kalau component sort manual, urutan mungkin perlu disesuaikan)
    |
    | Catatan biar UI aman:
    | - Konsistenin bahasa label (misal semua "Mins" atau semua "Menit").
    | - Kalau category dipakai buat filter/badge style, konsistenin nilainya:
    |   contoh: Transportation/Education/Health/Food/Shopping Center.
    | - Kalau ada item penting (tol/MRT) dan mau icon, isi icon + icon_alt biar rapi.
    |--------------------------------------------------------------------------
    */
        $surroundGroups = [
            '0' => [
                'label' => '',
                // label (string)
                // - Nama label group (tab). Contoh: "1 Min", "5 Mins", dst.
                // - Untuk 0 menit kadang dikosongkan.

                'image' => asset('images/map/0Minn.webp'),
                // image (string URL/path)
                // - Gambar peta untuk group ini.

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
                        // name (string)
                        // - Nama tempat/POI.

                        'category' => '5 Menit',
                        // category (string)
                        // - Bisa waktu/jarak atau tipe kategori, tergantung desain komponen.

                        'icon' => asset('icons/highway.png'),
                        // icon (string URL/path) [optional]
                        // - Icon item (kalau tidak ada, component biasanya pakai default).

                        'icon_alt' => 'Exit Tol Sawangan',
                        // icon_alt (string) [optional]
                        // - Alt text icon untuk aksesibilitas.
                    ],
                    [
                        'name' => 'Exit Tol Pamulang',
                        'category' => '10 Menit',
                        'icon' => asset('icons/highway.png'),
                        'icon_alt' => 'Exit Tol Pamulang',
                    ],
                    [
                        'name' => 'JR Connexion',
                        'category' => 'to mrt lebak bulus',
                        'icon' => asset('icons/bus-stop.png'),
                        'icon_alt' => 'MRT Lebak Bulus',
                    ],
                ],
                // items (array)
                // - List POI yang ditampilkan di group itu.
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

    <x-sections.surroundings :groups="$surroundGroups" {{-- :groups (array)
            - Data untuk section surroundings (akses sekitar).
            - Struktur group: label, image, items[].
        --}} />

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
                    // title (string) - judul berita

                    'excerpt' => $n->excerpt,
                    // excerpt (string) - ringkasan berita untuk preview

                    'category' => $n->category,
                    // category (string) - label kategori/badge

                    'date' => optional($n->published_at)->format('d M Y'),
                    // date (string) - tanggal publish yang sudah diformat

                    'image' => $n->image,
                    // image (string URL/path) - thumbnail berita

                    'url' => route('news.show', $n), // <-- ke Livewire Show
                    // url (string URL) - link ke detail berita
                ];
            })
            ->toArray();
    @endphp

    <x-sections.news-carousel :posts="$posts" {{-- :posts (array)
            - Data berita untuk carousel.
            - Minimal keys: title, excerpt, category, date, image, url
        --}} seeAllUrl="{{ route('news.index') }}"
        {{-- seeAllUrl (string URL)
            - Link tombol "See All" ke halaman index berita.
        --}} />

    <x-sections.contact-map :title="'How can we help you? Write us a message'" {{-- :title (string)
            - Judul section contact.
        --}} :map-query="'Jl. Cinangka Raya, Curug, Bojongsari, Depok, Jawa Barat 16517'" {{-- :map-query (string)
            - Alamat/keyword yang dipakai untuk map (embed/search).
            - Ganti kalau alamat berubah.
        --}} />

    {{-- section placeholders biar link nav ada targetnya --}}
    {{-- <section id="about" class="py-24"></section>
    <section id="clusters" class="py-24"></section>
    <section id="updates" class="py-24"></section>
    <section id="contact" class="py-24"></section>
    <section id="book" class="py-24"></section> --}}
</x-layouts.site>
