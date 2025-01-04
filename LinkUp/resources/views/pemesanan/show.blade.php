@extends('layouts.layout')

@section('content')
    {{-- Back Button --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary" style="background-color: #3C76B4">
            <div class="">
            </div> Daftar Pesanan
        </a>
        <a href="{{ route('pemesanans.edit', $pemesanans->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('pemesanans.destroy', $pemesanans->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-danger">Hapus</button>
        </form>
    </div>

    {{-- Show Sebuah Daftar Dosen --}}
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $pemesanans->id }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                <textarea class="form-control" id="jenis_layanan" name="jenis_layanan" disabled>{{ $pemesanans->jenis_layanan }}</textarea>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $pemesanans->harga }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="id" class="form-label">ID Penyedia Layanan</label>
                <input type="number" class="form-control" id="id" name="id"
                    value="{{ $pemesanans->id }}" disabled>
            </div>
        </div>
    </div>
@endsection