<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('toko', function (Blueprint $table) {
            $table->id('toko_id');
            
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            
            $table->string('nama_toko', 100);
            $table->text('deskripsi')->nullable();
            $table->string('lokasi', 150);
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('toko');
    }
};