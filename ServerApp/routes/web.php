<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('bookings')->group(function (){
    Route::get('/',[\App\Http\Controllers\BookingController::class, 'index']);
    Route::get('/idRestaurant/{number}/bookingDate/{date}',[\App\Http\Controllers\BookingController::class, 'getBookings']);
    Route::get('/getOneDayBookings/idRestaurant/{number}/bookingDate/{date}',[\App\Http\Controllers\BookingController::class, 'getOneDayBookings']);
    Route::get('/nextBite/idRestaurant/{number}/bookingDate/{date}',[\App\Http\Controllers\BookingController::class, 'nextBite']);
    Route::get('/previousBite/idRestaurant/{number}/bookingDate/{date}',[\App\Http\Controllers\BookingController::class, 'previousBite']);
    Route::delete('/delete/idBooking/{number}',[\App\Http\Controllers\BookingController::class, 'destroy']);
});

Route::prefix('tables')->group(function (){
    Route::get('/',[\App\Http\Controllers\TableController::class, 'index']);
});

Route::prefix('restaurants')->group(function (){
    Route::get('/',[\App\Http\Controllers\RestaurantController::class, 'index']);
});
