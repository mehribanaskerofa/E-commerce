<?php

namespace App\Services;

use App\Enums\BasketType;
use Jackiedo\Cart\Facades\Cart;

class BasketService
{
    public function getCart(BasketType $type)
    {
        return Cart::name($type->value);
    }
}
