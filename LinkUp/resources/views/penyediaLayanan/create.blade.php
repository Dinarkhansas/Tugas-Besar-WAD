@extends('layouts.layout')

@section('content')
    {{-- Back Button --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3" >
        <a href="{{ route('penyediaLayanan.index') }}" class="btn btn-outline-custom d-md-flex gap-2" style="background-color: #3C76B4">
            <div class="" >
            </div> Daftar Penyedia Layanan
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('penyediaLayanan.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="id" class="form-label">Id</label>
                    <input type="text" class="form-control @error('id') is-invalid @enderror" id="id"
                        name="id" placeholder="Masukkan ID Penyedia Layanan" value="{{ old('id') }}" style="background-color: #D0BFFF">
                    @error('id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Penyedia Layanan</label>
                    <textarea class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        placeholder="Masukkan Nama Penyedia Layanan" style="background-color: #D0BFFF" >{{ old('nama') }}</textarea >
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                        name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin" value="{{ old('jenis_kelamin') }}" style="background-color: #D0BFFF">
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur"
                        name="umur" placeholder="Masukkan Umur" value="{{ old('umur') }}" style="background-color: #D0BFFF">
                    @error('umur')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}" style="background-color: #D0BFFF">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak"
                        name="kontak" placeholder="Masukkan Kontak" value="{{ old('kontak') }}" style="background-color: #D0BFFF">
                    @error('kontak')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                        name="deskripsi" placeholder="Masukkan Deskripsi" value="{{ old('deskripsi') }}" style="background-color: #D0BFFF">
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                    <input type="text" class="form-control @error('jenis_layanan') is-invalid @enderror" id="jenis_layanan"
                        name="jenis_layanan" placeholder="Masukkan Jenis Layanan" value="{{ old('jenis_layanan') }}" style="background-color: #D0BFFF">
                    @error('jenis_layanan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-custom" style="background-color: #FFF8C9">Simpan</button>
            </form>
        </div>
    </div>
@endsection