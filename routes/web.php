<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SekolahController;
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

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
Route::get('sekolah/create', [SekolahController::class, 'create'])->name('sekolah.create');
Route::post('sekolah', [SekolahController::class, 'store'])->name('sekolah.store');
Route::get('sekolah/{id}', [SekolahController::class, 'edit'])->name('sekolah.edit');
Route::put('sekolah/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
Route::delete('sekolah/{id}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');