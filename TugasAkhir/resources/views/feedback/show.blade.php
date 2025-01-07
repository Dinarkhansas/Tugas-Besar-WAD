@extends('layouts.app')

@section('title', 'Detail ' . $layanan->nama_layanan)

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">{{ $layanan->nama }}</h1>

        <!-- Card for Service Details -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Deskripsi Layanan</h5>
                <p class="card-text">{{ $layanan->nama_layanan }}</p>
                <p class="card-text">{{ $layanan->kode_layanan }}</p>
                <p class="card-text">Harga Per Jam: Rp {{ number_format($layanan->harga_per_jam, 2, ',', '.') }}
                </p>
                <p class="card-text">{{ $layanan->deskripsi }}</p>
            </div>
        </div>

        <h2>Feedback</h2>
        @if ($feedbacks->isEmpty())
            <div class="alert alert-info" role="alert">
                Tidak ada feedback untuk layanan ini.
            </div>
        @else
            @foreach ($feedbacks as $feedback)
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $feedback->pesanan->user->name }}</h5>
                        <p class="card-text">{{ $feedback->review }}</p>
                        <p class="card-text"><strong>Rating:</strong> {{ $feedback->rating }}</p>

                        @if (auth()->user()->id === $feedback->pesanan->user->id)
                            <!-- Check if the logged-in user is the owner -->
                            <a href="{{ route('feedback.edit', $feedback) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('feedback.destroy', $feedback) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus feedback ini?')">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
