<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosisController;

// Route utama langsung ke form diagnosis
use App\Models\Gejala;

Route::get('', function () {
    $gejala = Gejala::all();
    return view('welcome', compact('gejala'));
})->name('diagnosa.form');

// Diagnosis routes
Route::get('/diagnosa', [DiagnosisController::class, 'form'])->name('diagnosis.form');
Route::post('/diagnosa/proses', [DiagnosisController::class, 'proses'])->name('diagnosa.proses');
Route::get('/diagnosa/reset', [DiagnosisController::class, 'reset'])->name('diagnosa.reset');