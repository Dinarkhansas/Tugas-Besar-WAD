@extends('layouts.app')

@section('title', 'History Pembayaran')

@section('content')
    <div class="container mt-4">
        <h1>History Pembayaran</h1>

        @if ($pembayarans->isEmpty())
            <div class="alert alert-info" role="alert">
                Belum ada history pembayaran.
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Kode Pembayaran</th>
                        <th>Kode Pesanan</th>
                        <th>Nama Layanan</th>
                        <th>Status Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayarans as $pembayaran)
                        <tr>
                            <td>{{ $pembayaran->kode_pembayaran }}</td>
                            <td>{{ $pembayaran->pesanan->kode_pesanan }}</td>
                            <td>{{ $pembayaran->pesanan->layanan->nama_layanan }}</td>
                            <td>{{ ucfirst($pembayaran->status) }}</td>
                            <td>{{ $pembayaran->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
