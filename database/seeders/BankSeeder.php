<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    public function run(): void
    {
        $banks = [
            [
                'name' => 'Bank Mandiri',
                'min_dp_percent' => 10,
                'fixed_rate_percent' => 5,
                'fixed_years' => 3,
                'floating_rate_percent' => 12,
                'reservation_fee' => 5000000,
                'booking_fee' => 5000000,
                'biaya_kpr_percent' => 2,
                'biaya_bphtb_percent' => 5,
                'biaya_ajb_nominal' => 15000000,
                'is_active' => true,
            ],
            [
                'name' => 'BTN (Bank Tabungan Negara)',
                'min_dp_percent' => 5,
                'fixed_rate_percent' => 4.75,
                'fixed_years' => 2,
                'floating_rate_percent' => 10.5,
                'reservation_fee' => 3000000,
                'booking_fee' => 5000000,
                'biaya_kpr_percent' => 1.75,
                'biaya_bphtb_percent' => 5,
                'biaya_ajb_nominal' => 12000000,
                'is_active' => true,
            ],
            [
                'name' => 'BCA',
                'min_dp_percent' => 15,
                'fixed_rate_percent' => 5.5,
                'fixed_years' => 3,
                'floating_rate_percent' => 10.75,
                'reservation_fee' => 5000000,
                'booking_fee' => 5000000,
                'biaya_kpr_percent' => 2.25,
                'biaya_bphtb_percent' => 5,
                'biaya_ajb_nominal' => 15000000,
                'is_active' => true,
            ],
            [
                'name' => 'CIMB Niaga',
                'min_dp_percent' => 10,
                'fixed_rate_percent' => 4.99,
                'fixed_years' => 5,
                'floating_rate_percent' => 11.5,
                'reservation_fee' => 5000000,
                'booking_fee' => 5000000,
                'biaya_kpr_percent' => 2,
                'biaya_bphtb_percent' => 5,
                'biaya_ajb_nominal' => 15000000,
                'is_active' => true,
            ],
            [
                'name' => 'BNI',
                'min_dp_percent' => 10,
                'fixed_rate_percent' => 5.25,
                'fixed_years' => 3,
                'floating_rate_percent' => 11.25,
                'reservation_fee' => 5000000,
                'booking_fee' => 5000000,
                'biaya_kpr_percent' => 2,
                'biaya_bphtb_percent' => 5,
                'biaya_ajb_nominal' => 15000000,
                'is_active' => true,
            ],
        ];

        foreach ($banks as $bank) {
            Bank::updateOrCreate(['name' => $bank['name']], $bank);
        }
    }
}
