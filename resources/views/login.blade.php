@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-5" style="min-height: 60vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 15px;">
        <h3 class="text-center mb-4 text-primary fw-bold">Login</h3>
        
        @if (session('error'))
            <div class="bg-red-600/80 text-black text-center py-2 rounded-lg shadow-md animate-pulse">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-600/80 text-black text-center py-2 rounded-lg shadow-md animate-pulse">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Log In</button>

            <p class="text-center mt-3 mb-0">
                Don't have an account? <a href="{{ url('/register') }}" class="text-decoration-none fw-semibold text-primary">Register</a>
            </p>
        </form>
    </div>
</div>
@endsection
