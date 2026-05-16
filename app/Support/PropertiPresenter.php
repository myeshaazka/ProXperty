<?php

namespace App\Support;

use App\Models\Properti;

class PropertiPresenter
{
    public static function imageUrl(Properti $properti): string
    {
        if ($properti->foto_utama) {
            if (str_starts_with($properti->foto_utama, 'http')) {
                return $properti->foto_utama;
            }

            return asset('storage/'.$properti->foto_utama);
        }

        return AppAssets::property(self::imageIndex($properti));
    }

    public static function imageIndex(Properti $properti): int
    {
        return ($properti->id % 3) + 1;
    }

    public static function tipeLabel(string $tipe): string
    {
        return match ($tipe) {
            'apartemen' => 'Apartemen',
            'rumah' => 'Rumah',
            'kos' => 'Kos',
            'ruko' => 'Ruko',
            'villa' => 'Villa',
            'kantor' => 'Kantor',
            default => ucfirst($tipe),
        };
    }

    public static function normalizeTipe(?string $tipe): string
    {
        $tipe = strtolower(trim((string) $tipe));

        return match ($tipe) {
            'apartement', 'apartment' => 'apartemen',
            default => $tipe,
        };
    }
}
