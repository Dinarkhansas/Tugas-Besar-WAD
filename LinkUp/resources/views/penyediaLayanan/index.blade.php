@extends('layouts.layout')
@section('content')
    {{-- Button Tambah Dosen --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
        <a href="{{ route('penyediaLayanan.create') }}" class="btn btn-primary" style="background-color: #3C76B4">
            <div class=""><span class="material-symbols-rounded fs-6"></span></div> Tambah Penyedia Layanan
        </a>
    </div>

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Tabel Dosen --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kontak</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Jenis Layanan</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($penyediaLayanan as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $row->id}}</td>
                            <td>{{ $row->nama}}</td>
                            <td>{{ $row->jenis_kelamin}}</td>
                            <td>{{ $row->umur}}</td>
                            <td>{{ $row->alamat}}</td>
                            <td>{{ $row->kontak}}</td>
                            <td>{{ $row->deskripsi}}</td>
                            <td>{{ $row->jenis_layanan}}</td>
                            <td>
                                <a href="{{ route('penyediaLayanan.show', $row->id) }}" class="btn btn-info">Detail</a>
                                <form action="{{ route('penyediaLayanan.destroy', $row->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection