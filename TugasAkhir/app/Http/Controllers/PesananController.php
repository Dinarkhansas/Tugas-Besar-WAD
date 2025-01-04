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
        //
        $mahasiswa = Pesanan::all();
        
        return view('pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $layanan = Layanan::all();
        return view('pesanan.create', compact('layanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePesananRequest $request)
    {
        //
        $validatedDate = $request->validate([
            'kode_pesanan' => 'required|string',
            'harga' => 'required|string',
            'nama_layanan' => 'required|string',
            'layanan_id' => 'required|string',


        ]);
        Pesanan::create($validatedDate);
        return redirect()->route('pesanan.index')->with('success', 'Data Pesanan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $mahasiswa = Mahasiswa::find($id); 
        return view('mahasiswa.show', compact('mahasiswa')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePesananRequest $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
