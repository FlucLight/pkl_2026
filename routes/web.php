<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data-tugas', function(){
    $response = Http::get('http://127.0.0.1:8000/ambil-tugas');
    dd($response->json());
});

Route::get('/tambah', function(){
    $response = Http::post('http://127.0.0.1:8000/tambah', [
        'nama_tugas' => 'coba nambahin langsung bro',
        'nama_dosen' => 'hibatul gagah',
        'deadline_tugas' => '2026-07-15 04:25:13'
    ]);
    return "udah ditambahkan maseh respon:" . $response->body();
});


Route::get('/edit/{tugas_id}', function($tugas_id){
    $response = Http::patch("http://127.0.0.1:8000/edit/{$tugas_id}", [
        'nama_tugas' => 'coba edit langsung bro',
        'nama_dosen' => 'hibatul sigma',
        'deadline_tugas' => '2026-07-21 04:25:13'
    ]);
    return $response->json();
});

Route::get('/hapus/{tugas_id}', function($tugas_id){
    $response = Http::delete("http://127.0.0.1:8000/hapus/{$tugas_id}");
    return "cobain deh bro, ini kehapus gak respone:" . $response->body();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
