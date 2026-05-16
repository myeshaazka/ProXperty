<?php

namespace App\Support;

use App\Models\Admin;
use App\Models\PemilikProperti;
use App\Models\Penyewa;
use Illuminate\Database\Eloquent\Model;

class AuthSession
{
    public const ROLE_ADMIN = 'admin';

    public const ROLE_PEMILIK = 'pemilik';

    public const ROLE_PENYEWA = 'penyewa';

    public static function login(Model $user, string $role): void
    {
        $name = match ($role) {
            self::ROLE_ADMIN => $user->username,
            default => $user->nama_lengkap,
        };

        session([
            'login' => true,
            'role' => $role,
            'user_id' => $user->id,
            'name' => $name,
            'email' => $user->email,
            'phone' => $user->no_telepon ?? '',
        ]);
    }

    public static function logout(): void
    {
        session()->forget(['login', 'role', 'user_id', 'name', 'email', 'phone', 'registered']);
    }

    public static function check(): bool
    {
        return (bool) session('login');
    }

    public static function role(): ?string
    {
        return session('role');
    }

    public static function userId(): ?int
    {
        $id = session('user_id');

        return $id !== null ? (int) $id : null;
    }

    public static function isPenyewa(): bool
    {
        return self::role() === self::ROLE_PENYEWA;
    }

    public static function isPemilik(): bool
    {
        return self::role() === self::ROLE_PEMILIK;
    }

    public static function isAdmin(): bool
    {
        return self::role() === self::ROLE_ADMIN;
    }

    public static function resolveUser(): Admin|PemilikProperti|Penyewa|null
    {
        if (! self::check()) {
            return null;
        }

        return match (self::role()) {
            self::ROLE_ADMIN => Admin::find(self::userId()),
            self::ROLE_PEMILIK => PemilikProperti::find(self::userId()),
            self::ROLE_PENYEWA => Penyewa::find(self::userId()),
            default => null,
        };
    }
}
