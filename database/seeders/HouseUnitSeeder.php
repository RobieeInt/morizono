<?php

namespace Database\Seeders;

use App\Models\HouseUnit;
use Illuminate\Database\Seeder;

class HouseUnitSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            [
                'cluster' => 'Ayame',
                'tipe' => 'Hook',
                'unit_no' => 'F.07.31',
                'luas_tanah' => 122,
                'luas_bangunan' => 102,
                'harga' => 2426626000,
                'is_active' => true,
            ],
            [
                'cluster' => 'Kaede',
                'tipe' => '36/72',
                'unit_no' => null,
                'luas_tanah' => 72,
                'luas_bangunan' => 36,
                'harga' => 850000000,
                'is_active' => true,
            ],
            [
                'cluster' => 'Kaede',
                'tipe' => '45/90',
                'unit_no' => null,
                'luas_tanah' => 90,
                'luas_bangunan' => 45,
                'harga' => 1150000000,
                'is_active' => true,
            ],
            [
                'cluster' => 'Kaede',
                'tipe' => '60/120',
                'unit_no' => null,
                'luas_tanah' => 120,
                'luas_bangunan' => 60,
                'harga' => 1650000000,
                'is_active' => true,
            ],
            [
                'cluster' => 'Kaede',
                'tipe' => 'Hook 70/140',
                'unit_no' => null,
                'luas_tanah' => 140,
                'luas_bangunan' => 70,
                'harga' => 2100000000,
                'is_active' => true,
            ],
        ];

        foreach ($units as $unit) {
            HouseUnit::updateOrCreate(
                ['cluster' => $unit['cluster'], 'tipe' => $unit['tipe'], 'unit_no' => $unit['unit_no']],
                $unit
            );
        }
    }
}
