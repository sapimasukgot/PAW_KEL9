<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model {
    protected $table = 'pesanan';
    protected $primaryKey = 'order_id';
    protected $fillable = ['user_id', 'toko_id', 'tanggal_order', 'total_harga', 'status'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function details() {
        return $this->hasMany(DetailPesanan::class, 'order_id');
    }

    public function pembayaran() {
        return $this->hasOne(Pembayaran::class, 'order_id');
    }
}