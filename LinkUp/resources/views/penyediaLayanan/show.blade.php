@extends('layouts.layout')
@section('content')

    {{-- Back Button --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
        <a href="{{ route('penyediaLayanan.index') }}"class="btn btn-primary" style="background-color: #3C76B4">
            <div class="">
            </div> Daftar Penyedia Layanan
        </a>
        <a href="{{ route('penyediaLayanan.edit', $dosen->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('penyediaLayanan.destroy', $dosen->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-danger">Hapus</button>
        </form>
    </div>

    <div class="card" >
        <div class="card-body">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $penyediaLayanans->id}}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $penyediaLayanans->nama}}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $penyediaLayanans->jenis_kelamin}}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="text" class="form-control" id="umur" name="umur" value="{{ $penyediaLayanans->umur}}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $penyediaLayanans->alamat}}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $penyediaLayanans->kontak}}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $penyediaLayanans->deskripsi}}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                <input type="text" class="form-control" id="jenis_layanan" name="jenis_layanan" value="{{ $penyediaLayanans->jenis_layanan}}"
                    disabled>
            </div>
        </div>
    </div>
@endsection