<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login',[AdminController::class,'loginView'])->name('admin.login-view');
Route::post('/admin/login',[AdminController::class,'login'])->name('admin.login');
//,'middleware'=>'admin'
Route::group(['prefix'=>'admin','as'=>'admin.'],function () {
    Route::get('/',[AdminController::class,'index'])->name('home');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');

    Route::resource('category',CategoryController::class);


    Route::resource('product',ProductController::class);

    Route::resource('product-image',ProductImageController::class)->except(['index','create','show']);
    Route::get('product-image/{productId}',[ProductImageController::class,'index'])->name('product-image.index');
    Route::get('product-image/create/{productId}',[ProductImageController::class,'create'])->name('product-image.create');
    Route::post('sort-product-image',[ProductImageController::class,'sort'])->name('product-image-sort');

});
