<?php

namespace App\Enums;

enum LevelType:int
{
    case BEGINNER = 0;
    case INTERMEDIATE = 1;
    case ADVANCED = 2;

    public static function getValues():array{
        return array_map(fn($c)=>$c->value , self::cases());
    }
}
