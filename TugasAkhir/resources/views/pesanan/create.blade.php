@extends('layouts.app')

@section('title', 'Buat Pesanan')

@section('content')
    <div class="container mt-4">
        <h1>Buat Pesanan Baru</h1>

        <div class="card mb-4 rounded shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Detail Layanan</h5>
                <p class="card-text"><strong>Nama Layanan:</strong> {{ $layanan->nama_layanan }}</p>
                <p class="card-text"><strong>Kode Layanan:</strong> {{ $layanan->kode_layanan }}</p>
                <p class="card-text"><strong>Harga Per Jam:</strong> Rp {{ number_format($layanan->harga_per_jam, 2, ',', '.') }}</p>
                <p class="card-text"><strong>Deskripsi:</strong> {{ $layanan->deskripsi }}</p>
            </div>
        </div>

        <form action="{{ route('pesanan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kode_pesanan" class="form-label">Kode Pesanan</label>
                <input type="text" class="form-control" id="kode_pesanan" name="kode_pesanan" value="{{ $kodePesanan }}" readonly>
            </div>
            <div class="mb-3">
                <label for="sewa_jam" class="form-label">Durasi Sewa (Jam)</label>
                <input type="number" class="form-control" id="sewa_jam" name="sewa_jam" required>
            </div>
            <input type="hidden" name="layanan_id" value="{{ $layanan->id }}">
            <button type="submit" class="btn btn-primary">Simpan Pesanan</button>
            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
