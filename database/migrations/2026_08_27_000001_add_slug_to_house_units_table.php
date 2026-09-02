<?php

use App\Models\HouseUnit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('house_units', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('id');
        });

        HouseUnit::whereNull('slug')->get()->each(function (HouseUnit $unit) {
            $raw = str_replace('/', '-', trim("{$unit->cluster} {$unit->tipe} {$unit->unit_no}"));
            $base = Str::slug($raw);
            $slug = $base;
            $i = 2;

            while (HouseUnit::where('slug', $slug)->where('id', '!=', $unit->id)->exists()) {
                $slug = "{$base}-{$i}";
                $i++;
            }

            $unit->forceFill(['slug' => $slug])->saveQuietly();
        });
    }

    public function down(): void
    {
        Schema::table('house_units', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
