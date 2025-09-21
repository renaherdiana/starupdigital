@extends('layouts.auth.login') 

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        background-color: #111827;
    }
</style>

<div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card shadow-lg border-0 rounded-3" style="width: 400px; background-color: #1f2937; color: #fff;">
        <div class="card-body p-4">
            <!-- Logo & Judul -->
            <div class="text-center mb-4">
                <h3 class="fw-bold text-danger">
                    <i class="fas fa-user me-2"></i> NeoWeb
                </h3>
                <h5 class="fw-bold">Sign In</h5>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email address" required autofocus>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                </div>

                <!-- Tombol Sign In di tengah -->
                <div class="d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-danger btn-lg">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
