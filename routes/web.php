<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/foods', [FoodController::class, 'index']);
Route::get('/hotels/search', [HotelController::class, 'search']);
Route::get('/foods/search', [FoodController::class, 'search']);
Route::get('/hotels', [HotelController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);



