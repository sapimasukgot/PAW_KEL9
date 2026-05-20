<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->id('rating_id');
            $table->integer('pesanan_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('toko_id')->unsigned();
            $table->tinyInteger('nilai');
            $table->text('ulasan')->nullable();
            $table->dateTime('tanggal');
            $table->timestamps();
            $table->foreign('pesanan_id')->references('pesanan_id')->on('pesanan')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('toko_id')->references('toko_id')->on('toko')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rating');
    }
};