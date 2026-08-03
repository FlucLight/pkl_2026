<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TugasController extends Controller
{
    // Base URL dari FastAPI
    private string $apiBaseUrl = 'http://127.0.0.1:8000';

    /**
     * Menampilkan halaman daftar tugas (UI Utama)
     */
    public function index()
    {
        $tugasList = [];
        $apiConnected = true;
        $errorMessage = null;

        try {
            $response = Http::timeout(3)->get("{$this->apiBaseUrl}/ambil-tugas");

            if ($response->successful()) {
                $tugasList = $response->json();
            } else {
                $apiConnected = false;
                $errorMessage = "Gagal mengambil data dari API FastAPI. Status: " . $response->status();
            }
        } catch (\Exception $e) {
            $apiConnected = false;
            $errorMessage = "Tidak dapat terhubung ke server FastAPI di {$this->apiBaseUrl}. Pastikan server Python/FastAPI sudah dijalankan.";
            Log::error("API FastAPI Error: " . $e->getMessage());
        }

        return view('tugas.index', compact('tugasList', 'apiConnected', 'errorMessage'));
    }

    /**
     * Menyimpan data tugas baru ke API FastAPI
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tugas' => 'required|string|max:255',
            'nama_dosen' => 'required|string|max:255',
            'deadline_tugas' => 'required',
        ], [
            'nama_tugas.required' => 'Nama tugas wajib diisi.',
            'nama_dosen.required' => 'Nama dosen wajib diisi.',
            'deadline_tugas.required' => 'Deadline tugas wajib diisi.',
        ]);

        // Format datetime agar sesuai format ISO/FastAPI (YYYY-MM-DDTHH:MM)
        $deadlineFormatted = date('Y-m-d\TH:i:s', strtotime($request->deadline_tugas));

        try {
            $response = Http::post("{$this->apiBaseUrl}/tambah", [
                'nama_tugas' => $request->nama_tugas,
                'nama_dosen' => $request->nama_dosen,
                'deadline_tugas' => $deadlineFormatted,
            ]);

            if ($response->successful()) {
                return redirect()->route('tugas.index')->with('success', 'Tugas berhasil ditambahkan!');
            }

            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan tugas: ' . $response->body());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Koneksi ke FastAPI gagal: ' . $e->getMessage());
        }
    }

    /**
     * Mengupdate data tugas via API FastAPI
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tugas' => 'required|string|max:255',
            'nama_dosen' => 'required|string|max:255',
            'deadline_tugas' => 'required',
        ]);

        $deadlineFormatted = date('Y-m-d\TH:i:s', strtotime($request->deadline_tugas));

        try {
            $response = Http::patch("{$this->apiBaseUrl}/edit/{$id}", [
                'nama_tugas' => $request->nama_tugas,
                'nama_dosen' => $request->nama_dosen,
                'deadline_tugas' => $deadlineFormatted,
            ]);

            if ($response->successful()) {
                return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diperbarui!');
            }

            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui tugas: ' . $response->body());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Koneksi ke FastAPI gagal: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus tugas via API FastAPI
     */
    public function destroy($id)
    {
        try {
            $response = Http::delete("{$this->apiBaseUrl}/hapus/{$id}");

            if ($response->successful()) {
                return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus!');
            }

            return redirect()->back()->with('error', 'Gagal menghapus tugas: ' . $response->body());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Koneksi ke FastAPI gagal: ' . $e->getMessage());
        }
    }
}
