<?php

namespace App\Enums;

enum Language: string
{
    case ENGLISH = 'en';
    case ARABIC = 'ar';
    case FRENCH = 'fr';

    public static function getValues():array{
        return array_map(fn($c) => $c->value,self::cases());
    }
}
