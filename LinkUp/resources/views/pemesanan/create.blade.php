@extends('layouts.layout')

@section('content')
    {{-- Back Button --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
        <a href="{{ route('pemesanan.index') }}" class="btn btn-outline-custom d-flex gap-2" style="background-color: #3C76B4" >
            <div class="">
            </div> Daftar Pemesanan
        </a>
    </div>

    {{-- Form Create Dosen --}}
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pemesanan.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="id" class="form-label">id</label>
                    <input type="text" class="form-control @error('id') is-invalid @enderror" id="id"
                        name="id" placeholder="Masukkan ID" value="{{ old('id') }}">
                    @error('id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                    <textarea class="form-control @error('jenis_layanan') is-invalid @enderror" id="jenis_layanan" name="jenis_layanan"
                        placeholder="Masukkan Jenis Layanan">{{ old('jenis_layanan"') }}</textarea>
                    @error('jenis_layanan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        name="harga" placeholder="Masukkan Harga" value="{{ old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="id_penyedia_layanan" class="form-label">ID Penyedia Layanan</label>
                    <select class="form-control @error('id') is-invalid @enderror" id="id" name="id" required>
                        <option value=''>Pilih Dosen</option>
                        @foreach ($penyediaLayanans as $row)
                            <option value="{{ $row->id }}" {{ old('id') == $row->id ? 'selected' : '' }}>
                                {{ $row->id }} - {{ $row->nama }} 
                            </option>
                        @endforeach
                    </select>
                    @error('id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div><div class="mb-3">
                            <label for="id" class="form-label">Penyedia Layanan</label>
                            <select class="form-control @error('id') is-invalid @enderror" id="id" name="id" required>
                                <option value=''>Pilih Penyedia Layanan</option>
                                @foreach ($penyediaLayanans as $row)
                                    <option value="{{ $row->id }}" {{ old('id') == $row->id ? 'selected' : '' }}>
                                        {{ $row->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>                        
                    @enderror
                </div>                            
                <button type="submit" class="btn btn-primary" style="background-color: #3C76B4">Simpan</button>
            </form>
        </div>
    </div>
@endsection