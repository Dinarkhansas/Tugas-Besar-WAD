<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Layanan;
use App\Models\Feedback;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLayananRequest;
use App\Http\Requests\UpdateLayananRequest;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        // Ambil 4 layanan yang dibuat oleh pengguna
        $userLayanan = Layanan::where('user_id', $userId)->take(4)->get();

        // Ambil 8 layanan lainnya yang bukan milik pengguna
        $otherLayanan = Layanan::where('user_id', '!=', $userId)->take(8)->get();

        return view('layanan.index', compact('userLayanan', 'otherLayanan'));
    }

    /**
     * Display a listing of the user's services.
     */
    public function userIndex()
    {
        $userId = auth()->id();

        $layanan = Layanan::where('user_id', $userId)->get();

        return view('layanan.userIndex', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kode_layanan = $this->generateRandomCode(12);

        return view('layanan.create', compact('kode_layanan'));
    }

    // Fungsi untuk menghasilkan kode acak
    private function generateRandomCode($length)
    {
        return substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / 36))), 1, $length);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLayananRequest $request)
    {
        // Menambahkan user_id ke data yang disimpan
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id(); // Menyimpan ID pengguna yang sedang login

        Layanan::create($validatedData);
        return redirect()->route('layanan.index')->with('success', 'Data Layanan yang Tersedia Berhasil Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLayananRequest $request, Layanan $layanan)
    {
        $layanan->update($request->validated());
        return redirect()->route('layanan.index')->with('success', 'Tabel Layanan yang Tersedia Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('layanan.index')->with('success', 'Data Layanan yang Tersedia Berhasil Dihapus');
    }

    public function showPesanan($layanan_id)
    {
        $layanan = Layanan::with('pesanan.pembayaran')->findOrFail($layanan_id); // Mengambil layanan beserta pesanan dan pembayaran
        return view('layanan.pesanan', compact('layanan'));
    }

}
