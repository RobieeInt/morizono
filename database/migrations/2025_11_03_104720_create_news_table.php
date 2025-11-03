<?php

// database/migrations/2025_11_03_000000_create_news_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->date('published_at')->nullable();
            $table->string('image')->nullable();   // simpan path asset()
            $table->string('excerpt', 600)->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('news');
    }
};
