@extends('template.app')

@section('content')
<div class="page-header">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ __('Verify Your Email Address') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Section -->
<section id="dashboard" class="sign">
    <div class="container">
        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </div>
    </div>
</section>
@endsection
