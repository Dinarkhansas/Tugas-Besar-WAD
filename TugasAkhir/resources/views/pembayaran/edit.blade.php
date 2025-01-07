@extends('layouts.app')

@section('title', 'Edit Pembayaran')

@section('content')
    <div class="container mt-4">
        <h1>Edit Pembayaran</h1>

        <form action="{{ route('pembayaran.update', $pembayaran) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="mb-3">
                    <label for="kode_pembayaran" class="form-label">Kode Pembayaran</label>
                    <input type="text" class="form-control" id="kode_pembayaran" name="kode_pembayaran"
                        value="{{ $pembayaran->kode_pembayaran }}" readonly>
                </div>
                <label for="bukti_transfer">Bukti Transfer</label>
                <input type="file" class="form-control" name="bukti_transfer">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah bukti transfer.</small>
                @error('bukti_transfer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Perbarui Pembayaran</button>
        </form>
    </div>
@endsection
