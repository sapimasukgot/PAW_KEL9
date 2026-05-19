<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model {
    protected $table = 'pesanan';
    protected $primaryKey = 'pesanan_id';
    protected $fillable = [
        'user_id',
        'toko_id',
        'nama_pembeli',
        'no_meja',
        'total_harga',
        'status',
        'keterangan',
        'tanggal_order'
    ];
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