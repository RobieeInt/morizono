<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('house_units', function (Blueprint $table) {
            $table->id();
            $table->string('cluster');
            $table->string('tipe');
            $table->string('unit_no')->nullable();
            $table->unsignedInteger('luas_tanah');
            $table->unsignedInteger('luas_bangunan');
            $table->unsignedBigInteger('harga');
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('house_units');
    }
};
