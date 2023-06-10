<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/admin/login',[AdminController::class,'loginView'])->name('admin.login-view');
Route::post('/admin/login',[AdminController::class,'login'])->name('admin.login');

Route::get('/home',[HomeController::class,'home'])->name('home');
Route::get('/shop',[HomeController::class,'shop'])->name('shop');
Route::get('/product-detail',[HomeController::class,'productDetail'])->name('product-detail');
Route::get('/shop-cart',[HomeController::class,'shopCart'])->name('shop-cart');
Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');

