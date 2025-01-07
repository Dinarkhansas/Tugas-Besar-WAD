<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pesanan;
use App\Http\Requests\StorePesananRequest;
use App\Http\Requests\UpdatePesananRequest;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $pesanans = Pesanan::with('layanan')
            ->where('user_id', $user->id)
            ->get();

        return view('pesanan.index', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($layanan_id)
    {
        $layanan = Layanan::findOrFail($layanan_id);
        $kodePesanan = $this->generateRandomString(12);

        return view('pesanan.create', compact('layanan', 'kodePesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePesananRequest $request)
    {
        $kodePesanan = $this->generateRandomString(12);

        // Membuat pesanan baru
        Pesanan::create([
            'kode_pesanan' => $kodePesanan,
            'sewa_jam' => $request->sewa_jam,
            'layanan_id' => $request->layanan_id,
            'user_id' => auth()->id(), // Mengambil ID pengguna yang sedang login
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Data Pesanan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        return view('pesanan.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        $layanan = Layanan::all(); // Mengambil semua layanan untuk dropdown
        return view('pesanan.edit', compact('pesanan', 'layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePesananRequest $request, Pesanan $pesanan)
    {
        // Validasi tambahan sewa jam
        $request->validate([
            'additional_sewa_jam' => 'required|integer|min:1', // Validasi untuk tambahan jam sewa
        ]);

        // Menghitung total sewa jam
        $totalSewaJam = $pesanan->sewa_jam + $request->additional_sewa_jam;

        // Memperbarui pesanan dengan total sewa jam
        $pesanan->update([
            'sewa_jam' => $totalSewaJam,
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Data Pesanan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete(); // Menghapus pesanan
        return redirect()->route('pesanan.index')->with('success', 'Data Pesanan Berhasil Dihapus');
    }

    private function generateRandomString($length = 12)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz', ceil($length / strlen($x)))), 1, $length);
    }
}
