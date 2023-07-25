<?php

namespace App\Enums;

enum DiscountTypes :int
{
    case CASH=0;
    case PERCENT=1;

//    public static function toArray():array
//    {
//        return array_column(array_values(self::cases()),'value');
//    }
}
