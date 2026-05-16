<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pesanan extends Model
{
    protected $table = 'pesanans';

    protected $fillable = [
        'kode_pesanan',
        'penyewa_id',
        'properti_id',
        'pemilik_properti_id',
        'tanggal_pesanan',
        'tanggal_mulai_sewa',
        'tanggal_selesai_sewa',
        'durasi_bulan',
        'harga_per_bulan',
        'harga_total',
        'status',
        'catatan_penyewa',
        'catatan_pemilik',
        'alasan_penolakan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_pesanan' => 'date',
            'tanggal_mulai_sewa' => 'date',
            'tanggal_selesai_sewa' => 'date',
            'harga_per_bulan' => 'decimal:2',
            'harga_total' => 'decimal:2',
        ];
    }

    public function penyewa(): BelongsTo
    {
        return $this->belongsTo(Penyewa::class, 'penyewa_id');
    }

    public function properti(): BelongsTo
    {
        return $this->belongsTo(Properti::class, 'properti_id');
    }

    public function pemilik(): BelongsTo
    {
        return $this->belongsTo(PemilikProperti::class, 'pemilik_properti_id');
    }

    public function pembayarans(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'pesanan_id');
    }
}
