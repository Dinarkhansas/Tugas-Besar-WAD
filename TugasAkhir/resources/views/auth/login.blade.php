@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="text-center">
        <img src="{{ asset('img/linkup-logo.png') }}" alt="Logo" class="img-fluid" style="height: 14vh">
    </div>
    <h1 class="mt-5">Login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p class="mt-3">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
@endsection
