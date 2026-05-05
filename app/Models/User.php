<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = ['nama', 'email', 'password', 'role'];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function toko() {
        return $this->hasOne(Toko::class, 'user_id');
    }

    public function pesanan() {
        return $this->hasMany(Pesanan::class, 'user_id');
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}