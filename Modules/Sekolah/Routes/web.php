<?php

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

use Modules\Sekolah\Http\Controllers\SekolahController;

Route::prefix('sekolah')->group(function() {
    Route::get('/', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::get('/create', 'SekolahController@create')->name('sekolah.create');
    Route::post('/store', [SekolahController::class, 'store'])->name('sekolah.store');
    Route::get('/edit/{id}', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('/update/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::delete('/destory/{id}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');
});