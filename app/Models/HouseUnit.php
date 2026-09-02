<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HouseUnit extends Model
{
    protected $fillable = [
        'cluster', 'tipe', 'unit_no', 'luas_tanah', 'luas_bangunan', 'harga', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'harga' => 'integer',
        'luas_tanah' => 'integer',
        'luas_bangunan' => 'integer',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::creating(function (HouseUnit $unit) {
            if (blank($unit->slug)) {
                $unit->slug = static::generateUniqueSlug($unit->cluster, $unit->tipe, $unit->unit_no);
            }
        });
    }

    protected static function generateUniqueSlug(string $cluster, string $tipe, ?string $unitNo): string
    {
        $raw = str_replace('/', '-', trim("{$cluster} {$tipe} {$unitNo}"));
        $base = Str::slug($raw);
        $slug = $base;
        $i = 2;

        while (static::where('slug', $slug)->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function label(): string
    {
        return trim("{$this->cluster} {$this->tipe}" . ($this->unit_no ? " ({$this->unit_no})" : ''));
    }
}
