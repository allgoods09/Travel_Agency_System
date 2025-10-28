@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-5" style="min-height: 60vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 15px;">
        <h3 class="text-center mb-4 text-primary fw-bold">Register</h3>

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Register</button>

            <p class="text-center mt-3 mb-0">
                Already have an account? <a href="{{ url('/login') }}" class="text-decoration-none fw-semibold text-primary">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection
