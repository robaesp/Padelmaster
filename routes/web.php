<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [InicioController::class, 'index'])->name('inicio');


Route::get('/signUp', [SignUpController::class, 'index'])->name('register');
Route::post('/signUp', [SignUpController::class, 'signUpPost']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'loginPost']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/{user:username}', [PostController::class, 'index'])->name('profile.index');

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::get('/post/{court}', [PostController::class,'show'])->name('post.show');
Route::delete('/post/{court}', [PostController::class, 'destroy'])->name('post.destroy');

Route::post('/imagenes', [ImgController::class,'store'])->name('imagenes.store');

