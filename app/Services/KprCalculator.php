<?php

namespace App\Services;

class KprCalculator
{
    /**
     * Standard annuity PMT formula (Excel-equivalent), returned as a positive
     * installment amount for a positive loan balance.
     */
    public static function pmt(float $rate, int $nper, float $pv): float
    {
        if ($nper <= 0) {
            return 0.0;
        }

        if ($rate == 0.0) {
            return $pv / $nper;
        }

        return ($pv * $rate * (1 + $rate) ** $nper) / ((1 + $rate) ** $nper - 1);
    }

    /**
     * @param array{
     *   harga: float,
     *   dp_percent: float,
     *   subsidi_dp_percent?: float,
     *   other_support_nominal?: float,
     *   reservation_fee: float,
     *   booking_fee: float,
     *   fixed_rate_percent: float,
     *   fixed_years: int,
     *   floating_rate_percent: float,
     *   tenor_years: int,
     *   biaya_kpr_percent: float,
     *   biaya_bphtb_percent: float,
     *   biaya_ajb_nominal: float,
     * } $input
     */
    public function calculate(array $input): array
    {
        $harga = (float) $input['harga'];
        $dpNominal = $harga * (float) $input['dp_percent'];
        $subsidiDpNominal = $harga * (float) ($input['subsidi_dp_percent'] ?? 0);
        $otherSupport = (float) ($input['other_support_nominal'] ?? 0);
        $reservationFee = (float) $input['reservation_fee'];
        $bookingFee = (float) $input['booking_fee'];

        // Only the booking fee reduces the loan principal (verified against
        // the client's Excel: G22 = D13-G18-G19-G20-G21, where G18 is
        // "Booking Fee" — the reservation fee (G17) is tracked separately
        // and is NOT subtracted here).
        $plafondKpr = $harga - $bookingFee - $dpNominal - $subsidiDpNominal - $otherSupport;

        $totalMonths = (int) $input['tenor_years'] * 12;
        $fixedMonths = (int) $input['fixed_years'] * 12;
        $floatingMonths = max($totalMonths - $fixedMonths, 0);

        $fixedMonthlyRate = (float) $input['fixed_rate_percent'] / 12;
        $installmentFixed = self::pmt($fixedMonthlyRate, $totalMonths, $plafondKpr);

        $balance = $plafondKpr;
        for ($m = 1; $m <= $fixedMonths; $m++) {
            $interest = $balance * $fixedMonthlyRate;
            $principal = $installmentFixed - $interest;
            $balance -= $principal;
        }
        $remainingPrincipalAtFloatStart = $balance;

        $floatingMonthlyRate = (float) $input['floating_rate_percent'] / 12;
        $installmentFloating = self::pmt($floatingMonthlyRate, $floatingMonths, $remainingPrincipalAtFloatStart);

        $totalInterestFixed = ($installmentFixed * $fixedMonths) - ($plafondKpr - $remainingPrincipalAtFloatStart);
        $totalInterestFloating = ($installmentFloating * $floatingMonths) - $remainingPrincipalAtFloatStart;
        $totalInterest = $totalInterestFixed + $totalInterestFloating;
        $totalPayment = $plafondKpr + $totalInterest;

        $biayaKpr = $plafondKpr * (float) $input['biaya_kpr_percent'];
        $biayaBphtb = $harga * (float) $input['biaya_bphtb_percent'];
        $biayaAjb = (float) $input['biaya_ajb_nominal'];
        $totalUpfrontCost = $reservationFee + $bookingFee + $dpNominal + $biayaKpr + $biayaBphtb + $biayaAjb;

        return [
            'plafond_kpr' => round($plafondKpr),
            'total_months' => $totalMonths,
            'fixed_months' => $fixedMonths,
            'floating_months' => $floatingMonths,
            'installment_fixed' => round($installmentFixed, 2),
            'installment_floating' => round($installmentFloating, 2),
            'remaining_principal_at_float_start' => round($remainingPrincipalAtFloatStart, 2),
            'total_interest' => round($totalInterest, 2),
            'total_payment' => round($totalPayment, 2),
            'costs' => [
                'dp_nominal' => round($dpNominal),
                'reservation_fee' => $reservationFee,
                'booking_fee' => $bookingFee,
                'biaya_kpr' => round($biayaKpr),
                'biaya_bphtb' => round($biayaBphtb),
                'biaya_ajb' => round($biayaAjb),
                'total_upfront_cost' => round($totalUpfrontCost),
            ],
        ];
    }
}
