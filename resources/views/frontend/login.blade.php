@extends('layouts.app')

@section('title', 'Customer Login')

@section('content')
<section class="auth-section py-5"> 
    <div class="container">
        <div class="auth-card glass-card mx-auto"> 
            <div class="auth-logo text-center mb-3">
                <h2>Sub<span class="brand-accent">Pilot</span></h2>
                <p>Welcome back! Please login to your account.</p>
            </div>

            <h3 class="auth-title">Sign In</h3>
            <p class="auth-subtitle">Enter your credentials to continue</p>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error Message --}}
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    Invalid email or password. Please try again.
                </div>
            @endif

            <form method="POST" action="{{ route('customer.login.submit') }}" id="loginForm">
                @csrf
                
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                    <label for="email">Email Address</label>
                </div>

                <div class="form-floating mb-3 position-relative">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        <i class="fas fa-eye" id="toggleIcon"></i>
                    </button>
                </div>

                <button type="submit" class="btn btn-primary w-100 btn-lg mb-3" id="submitBtn">
                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                </button>

                <div class="auth-footer text-center">
                    Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@parent
<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

document.getElementById('loginForm').addEventListener('submit', function(e) {
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Signing In...';
});
</script>
@endsection
