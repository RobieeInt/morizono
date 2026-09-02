<?php

namespace Tests\Unit;

use App\Services\KprCalculator;
use PHPUnit\Framework\TestCase;

class KprCalculatorTest extends TestCase
{
    public function test_calculation_matches_client_excel_example(): void
    {
        $calculator = new KprCalculator();

        $result = $calculator->calculate([
            'harga' => 2426626000,
            'dp_percent' => 0,
            'subsidi_dp_percent' => 0.10,
            'other_support_nominal' => 30000000,
            'reservation_fee' => 5000000,
            'booking_fee' => 5000000,
            'fixed_rate_percent' => 0.05,
            'fixed_years' => 3,
            'floating_rate_percent' => 0.12,
            'tenor_years' => 10,
            'biaya_kpr_percent' => 0.02,
            'biaya_bphtb_percent' => 0.05,
            'biaya_ajb_nominal' => 15000000,
        ]);

        $this->assertEqualsWithDelta(2148963400, $result['plafond_kpr'], 1);
        $this->assertEqualsWithDelta(22793091.03, $result['installment_fixed'], 1);
        $this->assertEqualsWithDelta(1612653011.22, $result['remaining_principal_at_float_start'], 1);
        $this->assertEqualsWithDelta(28467732.70, $result['installment_floating'], 1);
    }
}
