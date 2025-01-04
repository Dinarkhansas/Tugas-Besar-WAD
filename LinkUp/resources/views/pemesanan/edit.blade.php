@extends('layouts.layout')
@section('content')
    {{-- Back Button --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
        <a href="{{ route('pemesanans.index') }}" class="btn btn-outline-custom d-flex gap-2" style="background-color: #3C76B4">
            <div class="">
            </div> Daftar Pemesanan
        </a>
    </div>

    {{-- Edit Sebuah Buku --}}
    <form action="{{ route('pemesanans.update', $pemesanan->id) }}" method="post" >
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control @error('id') is-invalid @enderror" id="id"
                        name="id" value="{{ old('id', $pemesanan->id) }}">
                    @error('id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                    <textarea class="form-control @error('jenis_layanan') is-invalid @enderror" id="jenis_layanan" name="jenis_layanan">{{ old('jenis_layanan', $pemesanan->jenis_layanan) }}</textarea>
                    @error('jenis_layanan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        name="harga" value="{{ old('harga', $pesanans->harga) }}">
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="id" class="form-label">Penyedia Layanan</label>
                    <select class="form-control @error('id') is-invalid @enderror" id="id" name="id" required>
                        <option value="">Pilih Penyedia Layanan</option>
                        @foreach ($penyediaLayanans as $row)
                            <option value="{{ $row->id }}" {{ $row->id == $pemesanan->id ? 'selected' : '' }}>
                                {{ $row->id }} - {{ $row->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <a href="{{ route('pemesanans.index') }}" class="btn btn-danger">Batalkan</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection