<?php

namespace App\Enums;


enum UserType:int
{
    case USER = 0;
    case INSTRUCTOR = 1;
    case ADMIN = 2;

    public static function getValues():array{
        return array_map(fn($c)=>$c->value , self::cases());
    }
}
