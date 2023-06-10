<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return view('front.home');
    }
    public function shop()
    {
        return view('front.shop');
    }
    public function productDetail()
    {
        return view('front.product-detail');
    }
    public function shopCart()
    {
        return view('front.shop-cart');
    }
    public function checkout()
    {
        return view('front.checkout');
    }
    public function contact()
    {
        return view('front.contact');
    }
}
