<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;

// Halaman Utama - Welcome Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman Manajemen Tugas (Akses via /tugas)
Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
Route::put('/tugas/{id}', [TugasController::class, 'update'])->name('tugas.update');
Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

