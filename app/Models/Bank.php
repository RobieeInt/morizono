<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name', 'min_dp_percent', 'fixed_rate_percent', 'fixed_years', 'floating_rate_percent',
        'reservation_fee', 'booking_fee', 'biaya_kpr_percent', 'biaya_bphtb_percent',
        'biaya_ajb_nominal', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'min_dp_percent' => 'float',
        'fixed_rate_percent' => 'float',
        'floating_rate_percent' => 'float',
        'biaya_kpr_percent' => 'float',
        'biaya_bphtb_percent' => 'float',
        'reservation_fee' => 'integer',
        'booking_fee' => 'integer',
        'biaya_ajb_nominal' => 'integer',
        'fixed_years' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
