<?php

// database/seeders/NewsSeeder.php
namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Lorem ipsum dolor sit amet insectum',
                'category' => 'Lifestyle',
                'published_at' => '2025-10-12',
                'image' => asset('images/news/run.webp'),
                'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.',
                'content' => '<p>Isi artikel lengkap kamu di sini. Tambah heading, gambar, apa pun.</p>',
            ],
            [
                'title' => 'Lorem ipsum dolor sit amet',
                'category' => 'Guide',
                'published_at' => '2025-10-12',
                'image' => asset('images/news/bus.webp'),
                'excerpt' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem.',
                'content' => '<p>Konten artikel kedua.</p>',
            ],
            [
                'title' => 'Lorem ipsum dolor sit amet',
                'category' => 'Facility',
                'published_at' => '2025-10-12',
                'image' => asset('images/news/pool.webp'),
                'excerpt' => 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse.',
                'content' => '<p>Konten artikel ketiga.</p>',
            ],
        ];

        foreach ($items as $it) {
            News::updateOrCreate(
                ['slug' => Str::slug($it['title'])],
                array_merge($it, ['slug' => Str::slug($it['title'])])
            );
        }
    }
}
