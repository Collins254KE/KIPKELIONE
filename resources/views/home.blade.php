@extends('layouts.app')

@section('content')
<div class="container py-5">

    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Kipkelion East Bursary Portal</h1>
        <p class="lead text-muted">
            Welcome, {{ trim(auth()->user()->firstName . ' ' . auth()->user()->middleName . ' ' . auth()->user()->lastName) }}
        </p>
    </div>

    <!-- Navigation Cards -->
    <div class="row justify-content-center g-3">
        <div class="col-md-2 col-6">
            <a href="{{ url('/contact') }}" class="card shadow-sm text-center text-decoration-none py-3 hover-card">
                <div class="card-body">
                    <i class="bi bi-envelope-fill fs-3 mb-2"></i>
                    <div>Contact</div>
                </div>
            </a>
        </div>
        <div class="col-md-2 col-6">
            <a href="{{ url('/about') }}" class="card shadow-sm text-center text-decoration-none py-3 hover-card">
                <div class="card-body">
                    <i class="bi bi-info-circle-fill fs-3 mb-2"></i>
                    <div>About</div>
                </div>
            </a>
        </div>
        <div class="col-md-2 col-6">
            <a href="{{ route('scholarship.form') }}" class="card shadow-sm text-center text-decoration-none py-3 hover-card">
                <div class="card-body">
                    <i class="bi bi-mortarboard-fill fs-3 mb-2"></i>
                    <div>University/College</div>
                </div>
            </a>
        </div>
        <div class="col-md-2 col-6">
            <a href="{{ route('apply') }}" class="card shadow-sm text-center text-decoration-none py-3 hover-card">
                <div class="card-body">
                    <i class="bi bi-pencil-fill fs-3 mb-2"></i>
                    <div>High school</div>
                </div>
            </a>
        </div>
        <div class="col-md-2 col-6">
            <a href="{{ route('status') }}" class="card shadow-sm text-center text-decoration-none py-3 hover-card">
                <div class="card-body">
                    <i class="bi bi-file-text-fill fs-3 mb-2"></i>
                    <div>Application Status</div>
                </div>
            </a>
        </div>
    </div>

</div>

<style>
.hover-card {
    transition: transform 0.3s, box-shadow 0.3s;
}
.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}
</style>
@endsection
