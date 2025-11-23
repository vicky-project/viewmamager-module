@extends('viewmanager::layouts.auth')

@section('title', 'Forgot Password')

@section('content')
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card mb-4 mx-4">
      <div class="card-body p-4">
        <h1>Forgot Your Password?</h1>
        <p class="text-body-secondary">Enter your email address and we'll send you a link to reset your password.</p>
        <form method="POST" action="{{ route('password.email') }}">
          @csrf
          <div class="input-group mb-3">
            <span class="input-group-text">
              <svg class="icon">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}"></use>
              </svg>
            </span>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email address">
          </div>
          @error('email')
            <div class="invalid-feedback d-block">
                <svg class="icon">
                  <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-warning') }}"></use>
                </svg>{{ $message }}
            </div>
          @enderror
          <button class="btn btn-block btn-success" type="submit">Send Password Reset Link</button>
          <div class="row mt-2">
            <div class="col">
              <p class="mx-0">
                <a href="{{ route('login') }}" class="btn btn-link"><svg class="icon">
                  <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-arrow-left') }}"></use>
                </svg>Back to Login</a>
              </p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection