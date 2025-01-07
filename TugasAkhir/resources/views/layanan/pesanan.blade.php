@extends('layouts.app')

@section('title', 'Pesanan untuk ' . $layanan->nama_layanan)

@section('content')
    <div class="container mt-4">
        <h1>Pesanan untuk {{ $layanan->nama_layanan }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Kode Pesanan</th>
                    <th>Nama Pemesan</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($layanan->pesanan as $pesanan)
                    <tr>
                        <td>{{ $pesanan->kode_pesanan }}</td>
                        <td>{{ $pesanan->user->name }}</td>
                        <td>{{ ucfirst($pesanan->pembayaran->first()->status ?? 'N/A') }}</td>
                        <td>
                            @if ($pesanan->pembayaran->isNotEmpty() && $pesanan->pembayaran->first()->status === 'pending')
                                <a href="{{ asset('storage/' . $pesanan->pembayaran->first()->bukti_transfer) }}"
                                    class="btn btn-info" target="_blank">Lihat Bukti Transfer</a>
                                <form action="{{ route('pembayaran.updateStatus', $pesanan->pembayaran->first()->id) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="success">
                                    <button type="submit" class="btn btn-success">Setujui</button>
                                </form>
                                <form action="{{ route('pembayaran.updateStatus', $pesanan->pembayaran->first()->id) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="failed">
                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                </form>
                            @else
                                <span class="text-muted">Tidak ada tindakan</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
