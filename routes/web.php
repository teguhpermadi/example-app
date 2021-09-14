<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [UserController::class, 'index'])->name('profile');
Route::put('/profile', [UserController::class, 'update'])->name('profile.update');
Route::post('/profile', [UserController::class, 'update_avatar'])->name('profile.update_avatar');

Route::get('tes/{id}', [UserController::class, 'destroy']);