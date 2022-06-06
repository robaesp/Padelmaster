<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
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

Route::get('/admin', [AdminController::class,'index'])->name('admin');

Route::get('/admin/createUser', [AdminController::class,'createUser'])->name('admin.createUser');
Route::post('/admin/createUser', [AdminController::class,'storeUser'])->name('admin.storeUser');
Route::get('/admin/editUser/{id}', [AdminController::class,'editUser'])->name('admin.editUser');
Route::put('/admin/editUser/{id}', [AdminController::class,'editedUser'])->name('admin.editedUser');
Route::delete('/admin/deleteUser/{id}', [AdminController::class,'deletedUser'])->name('admin.deleteUser');

Route::get('/admin/createCourt', [AdminController::class,'createCourt'])->name('admin.createCourt');
Route::post('/admin/createCourt', [AdminController::class,'storeCourt'])->name('admin.storeCourt');
Route::get('/admin/editCourt/{id}', [AdminController::class,'editCourt'])->name('admin.editCourt');
Route::put('/admin/editCourt/{id}', [AdminController::class,'editedCourt'])->name('admin.editedCourt');
Route::delete('/admin/deleteCourt/{id}', [AdminController::class,'deletedCourt'])->name('admin.deleteCourt');




Route::get('/{user:username}', [PostController::class, 'index'])->name('profile.index');
Route::get('/editProfile/{id}',[ProfileController::class, 'index'])->name('profileEdit.index');
Route::put('/editProfile/{id}',[ProfileController::class, 'store'])->name('profileStore.index');

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::get('/post/{court}', [PostController::class,'show'])->name('post.show');
Route::post('/post/{court}', [PostController::class,'storeBooking'])->name('post.booking');
Route::delete('/post/delete/{court}', [PostController::class, 'deleteBooking'])->name('post.deleteBooking');

Route::delete('/post/{court}', [PostController::class, 'destroy'])->name('post.destroy');

Route::post('/imagenes', [ImgController::class,'store'])->name('imagenes.store');



