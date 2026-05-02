<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model {
    protected $table = 'detail_pesanan';
    protected $primaryKey = 'detail_id';
    protected $fillable = ['order_id', 'menu_id', 'jumlah', 'harga_satuan', 'subtotal'];

    public function menu() {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function pesanan() {
        return $this->belongsTo(Pesanan::class, 'order_id');
    }
}