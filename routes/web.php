<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SneakerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderAdminController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SliderController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('product-detail/{id}',[SneakerController::class,'detail'])->name('product.detail');
Route::resource('order',OrderController::class);
Route::group(['middleware' => 'auth'], function (){
    Route::get('/dashboard', function () {
        return view('dashboard')
            ->with('dashboard','dashboard');
    })->name('dashboard');


    Route::resource('product',SneakerController::class);
    Route::resource('brand',BrandController::class);
    Route::resource('color',ColorController::class);
    Route::resource('size',SizeController::class);
    Route::resource('type',TypeController::class);
    Route::resource('discount',DiscountController::class);
    Route::resource('status',StatusController::class);
    Route::resource('slider',SliderController::class);
    Route::resource('order-admin',OrderAdminController::class);

});


require __DIR__.'/auth.php';
