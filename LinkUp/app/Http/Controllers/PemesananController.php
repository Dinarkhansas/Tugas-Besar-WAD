<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Http\Requests\StorepemesananRequest;
use App\Http\Requests\UpdatepemesananRequest;
use App\Models\penyediaLayanan;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pelanggan = Pemesanan::all();
        
        return view('pemesanan.index', compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $penyediaLayanan = penyediaLayanan::all();
        return view('pemesanan.create', compact('penyedia_layanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepemesananRequest $request)
    {
        //
        $validatedDate = $request->validate([
            'id' => 'required|integer',
            'jenis_layanan' => 'required|string',
            'harga' => 'required|string|',
            'id_penyedia_layanan' => 'required|integer|exists:penyedia_layanan,id',

        ]);
        Pemesanan::create($validatedDate);
        return redirect()->route('pemesanan.index')->with('success', 'Data Pemesanan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $pemesanan = Pemesanan::find($id); 
        return view('pemesanan.show', compact('pemesanan')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $pemesanan = Pemesanan::findOrFail($id);
        $penyediaLayanan = penyediaLayanan::all();
        return view('pemesanan.edit', compact('pemesanan', 'penyedia_layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepemesananRequest $request, Pemesanan $pemesanan)
    {
        //
        $validatedDate = $request->validate([
            'id' => 'required|integer',
            'jenis_layanan' => 'required|string',
            'harga' => 'required|string|',
            'id_penyedia_layanan' => 'required|integer|exists:penyedia_layanan,id',

        ]);
        $pemesanan->update($validatedDate);
        return redirect()->route('pemesanan.index')->with('succes', 'Data Pemesanan Berhasil Diperbaharui');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pemesanan $pemesanan)
    {
        //
        $pemesanan->delete();

        return redirect()->route('pemesanan.index')->with('succes', "Data Pemesanan Berhasil Dihapus");
    }
}
