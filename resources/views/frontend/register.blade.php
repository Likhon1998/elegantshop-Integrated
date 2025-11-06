@extends('layouts.app')

@section('title', 'Customer Register')

@section('content')
<section class="auth-section py-5">
    <div class="container">
        <div class="auth-card glass-card mx-auto">
            <div class="auth-logo text-center mb-3">
                <h2>Sub<span class="brand-accent">Pilot</span></h2>
                <p>Create your account to manage subscriptions easily.</p>
            </div>

            <h3 class="auth-title">Sign Up</h3>
            <p class="auth-subtitle">It's quick and easy!</p>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Whoops!</strong> Please fix the errors and try again.
                </div>
            @endif

            <form method="POST" action="{{ route('customer.register.submit') }}" id="registerForm">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name"
                           placeholder="John Doe" value="{{ old('name') }}" required>
                    <label for="name">Full Name</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="name@example.com" value="{{ old('email') }}" required>
                    <label for="email">Email Address</label>
                </div>

                <div class="form-floating mb-3 position-relative">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    <button type="button" class="password-toggle" onclick="togglePasswordVisibility('password', 'toggleIcon1')">
                        <i class="fas fa-eye" id="toggleIcon1"></i>
                    </button>
                </div>
                
                <div class="form-floating mb-3 position-relative">
                    <input type="password" class="form-control" id="password_confirmation"
                           name="password_confirmation" placeholder="Confirm your password" required>
                    <label for="password_confirmation">Confirm Password</label>
                    <button type="button" class="password-toggle" onclick="togglePasswordVisibility('password_confirmation', 'toggleIcon2')">
                        <i class="fas fa-eye" id="toggleIcon2"></i>
                    </button>
                </div>

                <button type="submit" class="btn btn-primary w-100 btn-lg mb-3" id="submitBtn">
                    <i class="fas fa-user-plus me-2"></i>Sign Up
                </button>

                <div class="auth-footer text-center">
                    Already have an account? <a href="{{ route('customer.login') }}">Sign In</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@parent
<script>
function togglePasswordVisibility(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

document.getElementById('registerForm').addEventListener('submit', function(e) {
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Account...';
});
</script>
@endsection
