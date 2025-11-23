@extends('viewmanager::layouts.auth')

@section('title', 'Verify Email')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card mb-4 mx-4">
      <div class="card-body p-4">
        <svg class="icon">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-closed"></use>
        </svg>
        <h1>Verify</h1>
        <p class="text-body-secondary">Verify Your Email Address</p>
        @if (session('resent'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
          <svg class="flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-check-circle"/></svg>
          <div>
            A fresh verification link has been sent to your email address.
          </div>
          <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <p class="mb-3">Before proceeding, please check your email for a verification link.</p>
        <p class="mb-4">If you did not receive the email,</p>
        <form method="POST" action="{{ route('verification.resend') }}">
          @csrf
          <button type="submit" class="btn btn-auth w-100">
            <svg class="icon me-2">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-paper-plane"></use>
            </svg>Click here to request another
          </button>
        </form>
      </div>
      <div class="card-footer">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
          <a class="auth-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg class="icon me-1">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
            </svg>Logout
          </a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection