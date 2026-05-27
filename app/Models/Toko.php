<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Toko extends Model
{
    use HasFactory;

    protected $table = 'toko';
    protected $primaryKey = 'toko_id';
    protected $fillable = [
        'user_id',
        'nama_toko',
        'deskripsi',
        'lokasi',
        'jam_buka',
        'jam_tutup',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'toko_id', 'toko_id');
    }
}