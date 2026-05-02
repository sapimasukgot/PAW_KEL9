<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {
    protected $table = 'rating';
    protected $primaryKey = 'rating_id';
    protected $fillable = ['user_id', 'toko_id', 'nilai', 'ulasan', 'tanggal'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function toko() {
        return $this->belongsTo(Toko::class, 'toko_id');
    }
}