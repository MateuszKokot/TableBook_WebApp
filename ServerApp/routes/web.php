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

Route::get('/bookings',[\App\Http\Controllers\BookingController::class, 'index']);
Route::get('/bookings/idRestaurant/{number}/bookingDate/{date}',[\App\Http\Controllers\BookingController::class, 'getBookings']);
Route::get('/bookings/nextBite/idRestaurant/{number}/bookingDate/{date}',[\App\Http\Controllers\BookingController::class, 'nextBite']);
Route::get('/bookings/previousBite/idRestaurant/{number}/bookingDate/{date}',[\App\Http\Controllers\BookingController::class, 'previousBite']);



