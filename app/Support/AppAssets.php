<?php

namespace App\Support;

class AppAssets
{
    public static function property(int $index = 1): string
    {
        $index = max(1, min(3, $index));

        return asset("images/properti-{$index}.svg");
    }

    public static function headline(): string
    {
        return asset('images/headline.svg');
    }

    public static function about(): string
    {
        return asset('images/tentang-kami.svg');
    }

    public static function avatar(): string
    {
        return asset('images/avatar.svg');
    }
}
