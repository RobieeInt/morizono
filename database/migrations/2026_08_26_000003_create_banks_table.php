<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('min_dp_percent', 5, 2)->default(10);
            $table->decimal('fixed_rate_percent', 5, 2);
            $table->unsignedTinyInteger('fixed_years');
            $table->decimal('floating_rate_percent', 5, 2);
            $table->unsignedBigInteger('reservation_fee')->default(5000000);
            $table->unsignedBigInteger('booking_fee')->default(5000000);
            $table->decimal('biaya_kpr_percent', 5, 2)->default(2.00);
            $table->decimal('biaya_bphtb_percent', 5, 2)->default(5.00);
            $table->unsignedBigInteger('biaya_ajb_nominal')->default(15000000);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
