<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
{
    Schema::create('pesanan', function (Blueprint $table) {
        $table->integer('pesanan_id')->autoIncrement(); 
            $table->integer('user_id')->unsigned();
            $table->integer('toko_id')->unsigned();
            $table->string('nama_pembeli');
            $table->integer('no_meja');
            $table->integer('total_harga');
            $table->string('status');
            $table->text('keterangan')->nullable();
            $table->dateTime('tanggal_order');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('toko_id')->references('toko_id')->on('toko')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};