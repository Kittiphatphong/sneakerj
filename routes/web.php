<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SneakerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TypeController;


Route::get('/', function () {
    return view('welcome');
});

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
});


require __DIR__.'/auth.php';
