<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

// Simpan base URL di satu tempat
$apiBase = env('API_BASE_URL', 'http://127.0.0.1:8001');

Route::get('/', fn() => view('welcome'));

// READ — tampilkan data (GET ✅)
Route::get('/data-tugas', function() use ($apiBase) {
    $response = Http::get("{$apiBase}/ambil-tugas");
    return response()->json($response->json());
});

// CREATE — pakai POST ✅
Route::post('/tambah', function() use ($apiBase) {
    $response = Http::post("{$apiBase}/tambah", [
        'nama_tugas'    => request('nama_tugas'),
        'nama_dosen'    => request('nama_dosen'),
        'deadline_tugas'=> request('deadline_tugas'),
    ]);
    return $response->json();
});

// UPDATE — pakai PATCH ✅
Route::patch('/edit/{tugas_id}', function($tugas_id) use ($apiBase) {
    $response = Http::patch("{$apiBase}/edit/{$tugas_id}", [
        'nama_tugas'    => request('nama_tugas'),
        'nama_dosen'    => request('nama_dosen'),
        'deadline_tugas'=> request('deadline_tugas'),
    ]);
    return $response->json();
});

// DELETE — pakai DELETE ✅
Route::delete('/hapus/{tugas_id}', function($tugas_id) use ($apiBase) {
    $response = Http::delete("{$apiBase}/hapus/{$tugas_id}");
    return $response->json();
});

// Dashboard — protected oleh Jetstream auth
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});
