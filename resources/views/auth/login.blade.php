@extends('viewmanager::layouts.auth')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card-group d-block d-md-flex row">
      <div class="card col-md-7 p-4 mb-0">
        <div class="card-body">
          <h1>Login</h1>
          <p class="text-body-secondary">Sign In to your account</p>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group mb-3">
              <span class="input-group-text">
                <svg class="icon">
                  <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-closed') }}"></use>
                </svg>
              </span>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
            </div>
            @error('email')
            <div class="invalid-feedback d-block mb-3">
                <svg class="icon">
                  <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-warning') }}"></use>
                </svg>
                {{ $message }}
            </div>
            @enderror
            <div class="input-group mb-4">
              <span class="input-group-text">
                <svg class="icon">
                  <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}">
                  </use>
                </svg>
              </span>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
              <button type="button" class="btn btn-outline-primary" onclick="seekPassword()">
                <svg class="icon">
                  <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-low-vision') }}">
                  </use>
                </svg>
              </button>
            </div>
            @error('password')
            <div class="invalid-feedback d-block mb-3">
                <svg class="icon">
                  <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-warning') }}"></use>
                </svg>{{ $message }}
            </div>
            @enderror
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <button type="submit" class="btn btn-primary px-4">Login</button>
              </div>
              @if (Route::has('password.request'))
              <div class="col-6 text-end">
                <a href="{{ route('password.request')}}" class="btn btn-link px-0" type="button">Forgot password?</a>
              </div>
              @endif
            </div>
          </form>
        </div>
      </div>
    <div class="card col-md-5 text-white bg-primary py-5">
          <div class="card-body text-center">
            <div>
              <h2>Sign up</h2>
              <p>Create an account to get more our feature.</p>
              <a href="{{ route('register') }}" class="btn btn-lg btn-outline-light mt-3" type="button">Register Now!</a>
            </div>
          </div>
        </div>
  </div>
</div>
@endsection

@section("scripts")
<script>
  function seekPassword() {
    const passwordInput = 
    document.getElementById("password");
    if(passwordInput.getAttribute("type") == "text") {
      passwordInput.setAttribute("type", "password");
    } else {
      passwordInput.setAttribute("type", "text");
    }
  }
</script>
@endsection