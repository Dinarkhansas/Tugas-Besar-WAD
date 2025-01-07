@extends('layouts.app')

@section('title', 'Buat Pembayaran')

@section('content')
    <div class="container mt-4">
        <h1>Buat Pembayaran untuk Pesanan {{ $pesanan->kode_pesanan }}</h1>

        <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">

            <div class="form-group">
                <label for="kode_pembayaran">Kode Pembayaran</label>
                <input type="text" class="form-control" id="kode_pembayaran" name="kode_pembayaran" value="{{ $kodePembayaran }}" readonly>
            </div>

            <div class="form-group">
                <label for="bukti_transfer">Bukti Transfer</label>
                <input type="file" class="form-control" name="bukti_transfer" required>
                @error('bukti_transfer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Kirim Pembayaran</button>
        </form>
    </div>
@endsection
