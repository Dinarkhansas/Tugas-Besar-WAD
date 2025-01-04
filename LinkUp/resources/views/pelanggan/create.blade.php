@extends('layouts.layout')

@section('content')
    {{-- Back Button --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3" >
        <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-custom d-md-flex gap-2" style="background-color: #3C76B4">
            <div class="" >
            </div> Daftar Pelanggan
        </a>
    </div>

    {{-- Form Create Dosen --}}
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pelanggan.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="id" class="form-label">ID Pelanggan</label>
                    <input type="text" class="form-control @error('id') is-invalid @enderror" id="id"
                        name="id" placeholder="Masukkan Kode Dosen" value="{{ old('id') }}" style="background-color: #D0BFFF">
                    @error('id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_dosen" class="form-label">Username</label>
                    <textarea class="form-control @error('nama_dosen') is-invalid @enderror" id="nama_dosen" name="nama_dosen"
                        placeholder="Masukkan Nama Dosen" style="background-color: #D0BFFF" >{{ old('nama_dosen') }}</textarea >
                    @error('nama_dosen')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                        name="nip" placeholder="Masukkan NIP" value="{{ old('nip') }}" style="background-color: #D0BFFF">
                    @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Masukkan email" value="{{ old('email') }}" style="background-color: #D0BFFF">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon"
                        name="no_telepon" placeholder="Masukkan No Telepon" value="{{ old('no_telepon') }}" style="background-color: #D0BFFF">
                    @error('no_telepon')
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