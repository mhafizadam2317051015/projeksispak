<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\TentangController;

// Redirect ke diagnosa
Route::get('/', function () {
    return redirect('/diagnosa');
});

// Halaman diagnosa
Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
Route::post('/diagnosa/hasil', [DiagnosaController::class, 'hasil'])->name('diagnosa.hasil');

// Halaman tentang
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');
