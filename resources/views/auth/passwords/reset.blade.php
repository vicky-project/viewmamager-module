@extends('viewmanager::layouts.auth')

@section('title', 'Reset Password')

@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="mb-4 text-center">
        <i class="fas fa-lock fa-3x text-primary mb-3"></i>
        <h4>Reset Your Password</h4>
        <p class="text-muted">Create a new password for your account.</p>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   id="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                   placeholder="Enter your email">
        </div>
        @error('email')
            <div class="invalid-feedback d-block">
                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">New Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                   id="password" name="password" required autocomplete="new-password"
                   placeholder="Enter new password">
        </div>
        @error('password')
            <div class="invalid-feedback d-block">
                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="password-confirm" class="form-label">Confirm New Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" 
                   id="password-confirm" name="password_confirmation" required autocomplete="new-password"
                   placeholder="Confirm new password">
        </div>
    </div>
    
    <button type="submit" class="btn btn-auth w-100 mb-3">
        <i class="fas fa-sync-alt me-2"></i>Reset Password
    </button>
</form>

<div class="auth-footer">
    <p class="mb-0">
        <a class="auth-link" href="{{ route('login') }}">
            <i class="fas fa-arrow-left me-1"></i>Back to Login
        </a>
    </p>
</div>
@endsection