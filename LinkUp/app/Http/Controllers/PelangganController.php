<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pelanggab = pelanggan::all();
        
        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepelangganRequest $request)
    {
        //
        $validatedDate = $request->validate([
            'id' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'umur' => 'required|integer',
            'kontak' => 'required|integer'
        ]);
        pelanggan::create($validatedDate);
        return redirect()->route('pelanggan.index')->with('success','Data Pelanggan berhasil disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $pelanggans = pelanggan::find($id); 
        return view('pelanggan.show',compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $pelanggans = pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepelangganRequest $request, pelanggan $pelanggans)
    {
        //
        $validatedDate = $request->validate([
            'id' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'umur' => 'required|integer',
            'kontak' => 'required|integer'
        ]);
        $pelanggans->update($validatedDate);
        return redirect()->route('pelanggan.index')->with('success','Data Pelanggan Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelanggan $pelanggans)
    {
        //
        $pelanggans->delete();
        return redirect()->route('pelanggan.index')->with('succes', "Data Pelanggan Berhasil Dihapus");
    }
}
