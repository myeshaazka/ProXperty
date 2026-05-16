<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Properti extends Model
{
    protected $table = 'propertis';

    protected $fillable = [
        'pemilik_properti_id',
        'nama_properti',
        'tipe_properti',
        'alamat_properti',
        'kota',
        'provinsi',
        'harga_properti',
        'luas_tanah',
        'luas_bangunan',
        'jumlah_kamar',
        'deskripsi',
        'fasilitas',
        'foto_utama',
        'status',
        'alasan_penolakan',
    ];

    protected function casts(): array
    {
        return [
            'fasilitas' => 'array',
            'harga_properti' => 'decimal:2',
            'luas_tanah' => 'decimal:2',
            'luas_bangunan' => 'decimal:2',
        ];
    }

    public function pemilik(): BelongsTo
    {
        return $this->belongsTo(PemilikProperti::class, 'pemilik_properti_id');
    }

    public function pesanans(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'properti_id');
    }
}
