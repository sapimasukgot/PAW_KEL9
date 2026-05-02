<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model {
    protected $table = 'pembayaran';
    protected $primaryKey = 'pembayaran_id';
    protected $fillable = ['order_id', 'metode_pembayaran', 'status_bayar', 'tanggal_bayar'];

    public function pesanan() {
        return $this->belongsTo(Pesanan::class, 'order_id');
    }
}