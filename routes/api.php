<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/courts', [APIController::class, 'courts'])->name('court');
Route::get('/users', [APIController::class, 'users'])->name('user');
Route::get('/bookings', [APIController::class, 'booking'])->name('booking');

Route::get('/reserva/{id}', [APIController::class, 'reserva'])->name('reserva');

Route::get('/courts/{court}', [APIController::class, 'court'])->name('court');
Route::get('/court/challengers', [APIController::class, 'challengers'])->name('challengers');

