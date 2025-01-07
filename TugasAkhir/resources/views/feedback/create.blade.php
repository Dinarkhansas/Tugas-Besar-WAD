@extends('layouts.app')

@section('title', 'Buat Review')

@section('content')
    <div class="container mt-4">
        <h1>Buat Review untuk Pesanan {{ $pesanan->kode_pesanan }}</h1>
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="rating">Rating</label>
                <select class="form-control" id="rating" name="rating" required>
                    <option value="">Pilih Rating</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">
            <div class="form-group mb-3">
                <label for="review">Review</label>
                <textarea class="form-control" id="review" name="review" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Review</button>
        </form>
    </div>
@endsection
