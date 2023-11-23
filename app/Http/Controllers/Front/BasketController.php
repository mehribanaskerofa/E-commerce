<?php

namespace App\Http\Controllers\Front;

use App\Enums\BasketType;
use App\Http\Controllers\Controller;
use App\Services\BasketService;

class BasketController extends Controller
{
    public function __construct(protected BasketService $basketService)
    {
    }

    public function index()
    {
        $basket=$this->basketService->getCart(BasketType::BASKET);
        return view('front.shop-cart');
    }
}
