@extends('layouts.layout')
@section('content')
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
        <a href="{{ route('pemesanans.create') }}" class="btn btn-primary" style="background-color: #3C76B4">
            <div class="" ><span class="material-symbols-rounded fs-6"></span></div> Tambah Pesanan
        </a>
    </div>

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">id</th>
                        <th scope="col">Jenis Layanan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">ID Penyedia Layanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemesanans as $row)
                        <tr>
                            <th scope="pemesanans">{{ $loop->iteration }}</th>
                            <td>{{ $row->nim}}</td>
                            <td>{{ $row->jenis_layanan}}</td>
                            <td>{{ $row->harga}}</td>
                            <td>{{ $row->id}}</td>
                            <td>
                                <a href="{{ route('pemesanans.show', $pemesanans->id) }}" class="btn btn-info">Detail</a>
                                <form action="{{ route('mahasiswa.destroy', $pemesanans->id) }}" method="post" class="d-inline">
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