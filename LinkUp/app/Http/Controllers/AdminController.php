<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = admin::all();
        
        return view('admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreadminRequest $request)
    {
        $validatedDate = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',

        ]);
        admin::create($validatedDate);
        return redirect()->route('admin.index')->with('success','Data admin berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admins = penyediaLayanan::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminRequest $request, admin $admins)
    {
        $validatedDate = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',

        ]);
        $admins->update($validatedDate);
        return redirect()->route('admin.index')->with('success','Data admin berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admins)
    {
        $admins->delete();
        return redirect()->route('admin.index')->with('succes', "Data Admin Berhasil Dihapus");
    }
}
