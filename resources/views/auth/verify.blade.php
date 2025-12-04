@extends('layouts.app')

@section('content')
<div class="about-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                        <p>
                            {{ __("If you did not receive the email") }}, 
                            <a href="{{ route('verification.resend') }}" class="text-primary font-weight-bold">
                                {{ __('click here to request another') }}
                            </a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
