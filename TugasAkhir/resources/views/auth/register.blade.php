@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <div class="text-center">
        <img src="{{ asset('img/linkup-logo.png') }}" alt="Logo" class="img-fluid" style="height: 14vh">
    </div>
    <h1 class="mt-5">Register</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
@endsection
