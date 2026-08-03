<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

// Simpan base URL di satu tempat
$apiBase = env('API_BASE_URL', 'http://localhost:7000');

Route::get('/', fn() => view('welcome'));

// READ — tampilkan data (GET)
Route::get('/data-tugas', function () use ($apiBase) {
    $response = Http::get("{$apiBase}/ambil-tugas");
    return response()->json($response->json());
});

Route::get('/tambah', function () use ($apiBase) {
    $response = Http::post("{$apiBase}/tambah", [
        'nama_tugas'    => 'coba nambahin langsung bro',
        'nama_dosen'    => 'hibatul gagah',
        'deadline_tugas' => '2026-07-15 04:25:13'
    ]);
    return "udah ditambahkan maseh respon:" . $response->body();
});

Route::get('/edit/{tugas_id}', function ($tugas_id) use ($apiBase) {
    $response = Http::patch("{$apiBase}/edit/{$tugas_id}", [
        'nama_tugas'    => 'coba edit langsung bro',
        'nama_dosen'    => 'hibatul sigma',
        'deadline_tugas' => '2026-07-21 04:25:13'
    ]);
    return $response->json();
});

Route::get('/hapus/{tugas_id}', function ($tugas_id) use ($apiBase) {
    $response = Http::delete("{$apiBase}/hapus/{$tugas_id}");
    return "cobain deh bro, ini kehapus gak respone:" . $response->body();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});
