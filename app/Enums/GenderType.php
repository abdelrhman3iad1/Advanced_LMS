<?php

namespace App\Enums;


enum GenderType:int
{
    case MALE = 1;
    case FEMALE = 0;

    // public static function getValue(){
    //     return array_column(self::cases() , 'value') ;
    // }

    public static function getValues():array{
        return array_map( fn($case)=>$case->value , self::cases());
    }


}
