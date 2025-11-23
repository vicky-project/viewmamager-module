@extends('viewmanager::layouts.auth')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card mb-4 mx-4">
      <div class="card-body p-4">
        <h1>Register</h1>
        <p class="text-body-secondary">Create your account</p>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="input-group mb-3">
            <span class="input-group-text">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
              </svg>
            </span>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your full name">
          </div>
          @error('name')
            <div class="invalid-feedback d-block">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-warning"></use>
                </svg>{{ $message }}
            </div>
          @enderror
          <div class="input-group mb-3">
            <span class="input-group-text">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
              </svg>
            </span>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
          </div>
          @error('email')
            <div class="invalid-feedback d-block">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-warning"></use>
                </svg>
                {{ $message }}
            </div>
          @enderror
          <div class="input-group mb-3">
            <span class="input-group-text">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
              </svg>
            </span>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="Create a password">
          </div>
          @error('password')
            <div class="invalid-feedback d-block">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-warning"></use>
                </svg>{{ $message }}
            </div>
          @enderror
          <div class="input-group mb-4">
            <span class="input-group-text">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
              </svg>
            </span>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
          </div>
          <button class="btn btn-block btn-success" type="submit">Create Account</button>
          <div class="row mt-2">
            <div class="col">
              <p>
                Have an account ?
                <a href="{{ route('login') }}" class="btn btn-link mx-0"><svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-left"></use>
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