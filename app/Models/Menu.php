<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
    protected $table = 'menu';
    protected $primaryKey = 'menu_id';
    protected $fillable = ['toko_id', 'nama_menu', 'deskripsi', 'harga', 'stok', 'status'];

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id', 'toko_id');
    }
}