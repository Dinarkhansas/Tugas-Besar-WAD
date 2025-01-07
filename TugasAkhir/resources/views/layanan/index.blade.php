@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Layanan</h1>
        <a href="{{ route('layanan.create') }}" class="btn btn-success mb-3">Tambah Layanan</a>

        @if ($userLayanan->isNotEmpty())
            <h2>Layanan Anda</h2>
            <div class="row">
                @foreach ($userLayanan as $item)
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
                            </div>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('layanan.user.index') }}" class="btn btn-info mb-3">Kelola Jasa Saya</a>
            </div>
        @endif

        <h2>Layanan Lainnya</h2>
        <div class="row">
            @foreach ($otherLayanan as $item)
                <div class="col-md-4">
                    <div class="card mb-4" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_layanan }}</h5>
                            <p class="card-text">Kode Layanan: {{ $item->kode_layanan }}</p>
                            <p class="card-text">Nama Pelayan: {{ $item->user->name }}</p>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <p class="card-text">Harga Per Jam: Rp {{ number_format($item->harga_per_jam, 2, ',', '.') }}
                            </p>
                            <a href="{{ route('feedback.show', ['feedback' => $item->id]) }}" class="btn btn-primary">
                                Lihat Detail Layanan
                            </a>

                            <a href="{{ route('pesanan.create', ['layanan_id' => $item->id]) }}"
                                class="btn btn-success">Pesan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
