<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('pembayaran_id');
            $table->foreignId('order_id')->constrained('pesanan', 'order_id')->onDelete('cascade');
            $table->enum('metode_pembayaran', ['tunai']);
            $table->enum('status_bayar', ['belum', 'sudah']);
            $table->dateTime('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};