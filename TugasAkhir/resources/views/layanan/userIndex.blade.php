@extends('layouts.app')

@section('title', 'Layanan Saya')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Layanan Saya</h1>
        <a href="{{ route('layanan.create') }}" class="btn btn-success mb-3">Tambah Layanan</a>
        <div class="row">
            @foreach ($layanan as $item)
                <div class="col-md-4">
                    <div class="card mb-4" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_layanan }}</h5>
                            <p class="card-text">Kode Layanan: {{ $item->kode_layanan }}</p>
                            <p class="card-text">Nama Pelayan: {{ $item->user->name }}</p>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <a href="{{ route('layanan.pesanan', $item->id) }}" class="btn btn-info">Pesanan</a>
                            <a href="{{ route('layanan.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('layanan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
