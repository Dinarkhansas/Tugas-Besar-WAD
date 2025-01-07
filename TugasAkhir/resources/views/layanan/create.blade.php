@extends('layouts.app')

@section('title', 'Tambah Layanan')

@section('content')
    <div class="container mt-4">
        <h1>Tambah Layanan</h1>
        <form action="{{ route('layanan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kode_layanan" class="form-label">Kode Layanan</label>
                <input type="text" class="form-control" id="kode_layanan" name="kode_layanan" value="{{ $kode_layanan }}" readonly required>
            </div>
            <div class="mb-3">
                <label for="nama_pelayan" class="form-label">Nama Pelayan</label>
                <input type="text" class="form-control" id="nama_pelayan" name="nama_pelayan" value="{{ auth()->user()->name }}" readonly required>
            </div>
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control" id="kontak" name="kontak" required>
            </div>
            <div class="mb-3">
                <label for="nama_layanan" class="form-label">Nama Layanan</label>
                <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>
            <div class="mb-3">
                <label for="harga_per_jam" class="form-label">Harga Per Jam (Rp)</label>
                <input type="number" class="form-control" id="harga_per_jam" name="harga_per_jam" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
