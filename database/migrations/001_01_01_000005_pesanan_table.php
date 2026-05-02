<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->foreignId('toko_id')->constrained('toko', 'toko_id');
            $table->dateTime('tanggal_order');
            $table->decimal('total_harga', 12, 2);
            $table->enum('status', ['menunggu', 'diproses', 'siap diambil', 'selesai', 'dibatalkan']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};