<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesan_id')->constrained('pesan')->onDelete('cascade'); // ID Pesan
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade'); // ID Menu
            $table->integer('jumlah'); // Jumlah
            $table->decimal('harga', 10, 2); // Harga
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesan_details');
    }
};
