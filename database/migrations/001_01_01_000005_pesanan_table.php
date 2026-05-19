<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
{
    Schema::create('pesanan', function (Blueprint $table) {
        $table->id('pesanan_id');
        
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
        $table->unsignedBigInteger('toko_id');
        $table->foreign('toko_id')->references('toko_id')->on('toko')->onDelete('cascade');
        $table->string('nama_pembeli');
        $table->integer('no_meja');
        $table->text('keterangan')->nullable();
        $table->dateTime('tanggal_order');

        $table->integer('total_harga');
        $table->string('status')->default('Pending'); 
        
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};