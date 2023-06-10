<?php

namespace App\Enums;

enum ProductTypes :int
{
    case FEATURED=0;
    case HOT_TREND=1;
    case BEST_SELLER=2;
    case LASTEST=3;

    public static function toArray():array
    {
        return array_column(array_values(self::cases()),'value');
    }
}
