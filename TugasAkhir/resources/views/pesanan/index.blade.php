@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
    <div class="container mt-4">
        <h1>Daftar Pesanan</h1>
        @if ($pesanans->isEmpty())
            <div class="alert alert-info" role="alert">
                Belum ada pesanan.
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Kode Pesanan</th>
                        <th>Layanan</th>
                        <th>Durasi Sewa (Jam)</th>
                        <th>Kontak Layanan</th>
                        <th>Status Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanans as $pesanan)
                        <tr>
                            <td>{{ $pesanan->kode_pesanan }}</td>
                            <td>{{ $pesanan->layanan->nama_layanan }}</td>
                            <td>{{ $pesanan->sewa_jam }}</td>
                            <td>{{ $pesanan->layanan->kontak }}</td>
                            <td>
                                @if ($pesanan->pembayaran->isNotEmpty())
                                    {{ ucfirst($pesanan->pembayaran->first()->status) }}
                                @else
                                    Belum Dibayar
                                @endif
                            </td>
                            <td>
                                @if ($pesanan->pembayaran->isEmpty())
                                    <a href="{{ route('pembayaran.create', ['pesanan_id' => $pesanan->id]) }}"
                                        class="btn btn-success">Bayar</a>
                                    <a href="{{ route('pesanan.edit', $pesanan) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('pesanan.destroy', $pesanan) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">Batal</button>
                                    </form>
                                @elseif ($pesanan->pembayaran->first()->status === 'pending')
                                    <a href="{{ route('pembayaran.edit', ['pembayaran' => $pesanan->pembayaran->first()->id]) }}"
                                        class="btn btn-warning">Edit Bayar</a>
                                @elseif ($pesanan->pembayaran->first()->status === 'failed')
                                    <a href="{{ route('pembayaran.edit', ['pembayaran' => $pesanan->pembayaran->first()->id]) }}"
                                        class="btn btn-warning">Upload Ulang</a>
                                @elseif ($pesanan->pembayaran->first()->status === 'success')
                                    @if ($pesanan->feedback->where('pesanan.user_id', auth()->id())->isEmpty())
                                        <a href="{{ route('feedback.create', ['pesanan_id' => $pesanan->id]) }}"
                                            class="btn btn-info">Review</a>
                                    @else
                                        <a href="{{ route('feedback.show', ['feedback' => $pesanan->layanan->id]) }}"
                                            class="btn btn-primary">Lihat Detail Layanan</a>
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
