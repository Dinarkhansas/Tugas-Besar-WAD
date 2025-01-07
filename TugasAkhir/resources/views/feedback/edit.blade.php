@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Edit Feedback</h1>
        <form action="{{ route('feedback.update', $feedback) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="review" class="form-label">Review:</label>
                <textarea name="review" id="review" class="form-control" required>{{ $feedback->review }}</textarea>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating:</label>
                <select name="rating" id="rating" class="form-select" required>
                    <option value="">Pilih Rating</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ $feedback->rating == $i ? 'selected' : '' }}>
                            {{ $i }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Feedback</button>
        </form>
    </div>
@endsection
