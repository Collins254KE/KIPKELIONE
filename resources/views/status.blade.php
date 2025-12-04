@extends('layouts.app')

@section('content')
<div class="grad col-md-12 pb-3">

    <!-- Header -->
    <div class="text-center pt-4 baza">
        <h3 class="fw-bold">KIPKELION EAST E-BURSARY</h3>
        <p class="text-muted">Bursary Portal</p>
    </div>

    <!-- Back Button -->
    <div class="text-center pt-2 mb-4">
        <a href="{{ url('/') }}">
            <button class="btn btn-success">
                <i class="fa fa-hand-point-left"></i> Back to Home
            </button>
        </a>
    </div>

    <!-- Status Section -->
    <div class="container mt-4">
        <h4 class="fw-bold mb-3 text-center">Your Application Status</h4>

        @if(isset($applications) && count($applications) > 0)
            <div class="row justify-content-center">
                @foreach($applications as $app)
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $app->institution_name }}</h5>
                                <p class="card-text mb-2">
                                    <strong>Serial Number:</strong> {{ $app->serial_number }} <br>
                                    <strong>Year:</strong> {{ $app->application_year }} <br>
                                    <strong>Status:</strong> 
                                    @if($app->status === 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($app->status === 'approved')
                                        <span class="badge bg-success">Approved</span>
                                    @elseif($app->status === 'rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($app->status) }}</span>
                                    @endif
                                </p>
                                <a href="{{ route('scholarship.view', $app->id) }}" class="btn btn-sm btn-info">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted fs-5 mt-4">You have no applications yet.</p>
        @endif
    </div>

</div>
@endsection
