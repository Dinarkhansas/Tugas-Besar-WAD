<?php

namespace App\Http\Controllers;

use App\Models\penyediaLayanan;
use App\Http\Requests\StorepenyediaLayananRequest;
use App\Http\Requests\UpdatepenyediaLayananRequest;

class PenyediaLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyediaLayanan = penyediaLayanan::all();
        
        return view('penyediaLayanan.index', compact('penyediaLayanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyediaLayanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepenyediaLayananRequest $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'id' => 'required|string',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'umur' => 'required|integer',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'deskripsi' => 'required|string',
            'jenis_layanan' => 'required|string',
        ]);
    
        penyediaLayanan::create($validatedData);
        return redirect()->route('penyediaLayanan.index')->with('success', 'Data penyedia layanan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penyediaLayanan = penyediaLayanan::find($id); 
        return view('penyediaLayanan.show',compact('penyediaLayanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penyediaLayanan = penyediaLayanan::findOrFail($id);
        return view('penyediaLayanans.edit', compact('penyediaLayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepenyediaLayananRequest $request, penyediaLayanan $penyediaLayanan)
    {
        $validatedData = $request->validate([
            'id' => 'required|string',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'umur' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|integer',
            'deskripsi' => 'required|string',
            'jenis_layanan' => 'required|string',
        ]);
        $penyediaLayanan->update($validatedData);
        return redirect()->route('penyediaLayanan.index')->with('success', 'Data penyedia layanan berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penyediaLayanan $penyediaLayanan)
    {
        $penyediaLayanan->delete();
        return redirect()->route('penyediaLayanan.index')->with('succes', "Data penyedia Layanan Berhasil Dihapus");
    }
}
