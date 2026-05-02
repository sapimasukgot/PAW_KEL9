<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model {
    protected $table = 'toko';
    protected $primaryKey = 'toko_id';
    protected $fillable = ['user_id', 'nama_toko', 'deskripsi', 'lokasi', 'jam_buka', 'jam_tutup'];

    public function menus() {
        return $this->hasMany(Menu::class, 'toko_id');
    }
}