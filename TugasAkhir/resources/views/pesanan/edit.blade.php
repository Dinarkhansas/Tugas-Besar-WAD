@extends('layouts.app')

@section('title', 'Edit Pesanan')

@section('content')
    <div class="container mt-4">
        <h1>Edit Pesanan</h1>
        <form action="{{ route('pesanan.update', $pesanan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="sewa_jam" class="form-label">Durasi Sewa Saat Ini (Jam)</label>
                <input type="number" class="form-control" id="sewa_jam" name="sewa_jam" value="{{ $pesanan->sewa_jam }}" readonly>
            </div>
            <div class="mb-3">
                <label for="additional_sewa_jam" class="form-label">Tambahkan Durasi Sewa (Jam)</label>
                <input type="number" class="form-control" id="additional_sewa_jam" name="additional_sewa_jam" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui Pesanan</button>
            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
