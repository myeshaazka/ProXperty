<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penyewa extends Model
{
    protected $table = 'penyewas';

    protected $fillable = [
        'username',
        'nama_lengkap',
        'email',
        'no_telepon',
        'alamat',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function pesanans(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'penyewa_id');
    }
}
