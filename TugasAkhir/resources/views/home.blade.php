@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <style>
        .search {
            background-color: #4250ef;
            color: white;
            padding: 20px 30%;
        }
    </style>
    <div class="w-100 search text-center">
        <form class="d-flex justify-content-center" method="GET" action="{{ route('home') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Cari..." aria-label="Search">
            <button class="btn btn-light" type="submit">Cari</button>
        </form>
    </div>

    <div class="container mt-4">
        <div class="row">
            @if ($layanans->isEmpty())
                <div class="alert alert-info" role="alert">
                    Tidak ada layanan yang ditemukan.
                </div>
            @else
                @foreach ($layanans as $item)
                    <div class="col-md-4">
                        <div class="card mb-4" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_layanan }}</h5>
                                <p class="card-text">Kode Layanan: {{ $item->kode_layanan }}</p>
                                <p class="card-text">Nama Pelayan: {{ $item->user->name }}</p>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <p class="card-text">Harga Per Jam: Rp
                                    {{ number_format($item->harga_per_jam, 2, ',', '.') }}</p>
                                <a href="{{ route('feedback.show', ['feedback' => $item->id]) }}" class="btn btn-primary">
                                    Lihat Detail Layanan
                                </a>
                                <a href="{{ route('pesanan.create', ['layanan_id' => $item->id]) }}"
                                    class="btn btn-success">Pesan</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
