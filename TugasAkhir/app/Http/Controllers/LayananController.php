<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Http\Requests\StoreLayananRequest;
use App\Http\Requests\UpdateLayananRequest;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $layanan= Layanan::all();
        
        return view('layanan.index', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLayananRequest $request)
    {
        //
        $validatedDate = $request->validate([
            'kode_layanan' => 'required|string',
            'nama_pelayan' => 'required|string',
            'kontak' => 'required|string',
            'nama_layanan' => 'required|string',
            'deskripsi' => 'required|string',
            

        ]);
        Layanan::create($validatedDate);
        return redirect()->route('layanan.index')->with('success', 'Data Layanan yang Tersedia Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $layanan = Layanan::find($id);  // Mengambil data dosen dari database
        return view('layanan.show', compact('layanan'));  // Mengirimkan data dosen ke view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $layanan = Layanan::findOrFail($id);
        return view('layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLayananRequest $request, Layanan $layanan)
    {
        //
        $validatedDate = $request->validate([
            'kode_layanan' => 'required|string',
            'nama_pelayan' => 'required|string',
            'kontak' => 'required|string',
            'nama_layanan' => 'required|string',
            'deskripsi' => 'required|string',

        ]);
        $layanan->update($validatedDate);
        return redirect()->route('layanan.index')->with('succes', 'Tabel Layanan yang Tersedia Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        //
        $layanan->delete();

        return redirect()->route('dosen.index')->with('succes', "Data Layanan yang Tersedia Berhasil Dihapus");
    }
}
