@extends('layouts.layout')
@section('content')
    {{-- Back Button --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3" >
        <a href="{{ route('penyediaLayanan.index') }}" class="btn btn-outline-custom d-md-flex gap-2" style="background-color: #3C76B4">
            <div class="" >
            </div> Daftar Penyedia Layanan
        </a>
    </div>

    {{-- Edit Sebuah Buku --}}
    <form action="{{ route('penyediaLayanan.update', $dosen->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control @error('id') is-invalid @enderror" id="id"
                        name="id" value="{{ old('id', $penyediaLayanans->id) }}">
                    @error('id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('id', $penyediaLayanans->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                        name="jenis_kelamin" value="{{ old('jenis_kelamin', $penyediaLayanans->jenis_kelamin) }}">
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur"
                        name="umur" value="{{ old('umur', $penyediaLayanans->umur) }}">
                    @error('umur')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" value="{{ old('alamat', $penyediaLayanans->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak"
                        name="kontak" value="{{ old('kontak', $penyediaLayanans->kontak) }}">
                    @error('kontak')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                        name="deskripsi" value="{{ old('deskripsi', $penyediaLayanans->deskripsi) }}">
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                    <input type="text" class="form-control @error('jenis_layanan') is-invalid @enderror" id="jenis_layanan"
                        name="jenis_layanan" value="{{ old('jenis_layanan', $penyediaLayanans->jenis_layanan) }}">
                    @error('jenis_layanan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <a href="{{ route('penyediaLayanan.index') }}" class="btn btn-danger">Batalkan</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection