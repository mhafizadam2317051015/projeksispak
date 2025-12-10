<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosisController;
use App\Models\Gejala;

Route::get('', function () {
    $gejala = Gejala::all();
    return view('welcome', compact('gejala'));
})->name('diagnosa.form');

Route::get('/diagnosa', function () {
    $gejala = Gejala::all();
    return view('diagnosis.form', compact('gejala'));
})->name('diagnosa.form');

Route::post('/diagnosa/proses', [DiagnosisController::class, 'proses'])
    ->name('diagnosa.proses');
