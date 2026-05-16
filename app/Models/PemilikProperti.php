<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PemilikProperti extends Model
{
    protected $table = 'pemilik_propertis';

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

    public function propertis(): HasMany
    {
        return $this->hasMany(Properti::class, 'pemilik_properti_id');
    }

    public function pesanans(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'pemilik_properti_id');
    }
}
