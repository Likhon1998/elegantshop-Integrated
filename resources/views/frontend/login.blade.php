<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login - Elegant Shop</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

    {{-- Animated Background --}}
    <div class="animated-bg">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        <div class="floating-shape shape-4"></div>
    </div>

    {{-- Login Section --}}
    <section class="auth-section py-5">
        <div class="container">
            {{-- Oval Glass Card --}}
            <div class="glass-card mx-auto p-4 p-md-5"
                 style="max-width: 420px; animation: fadeIn 0.8s ease; border-radius: 50px;">
                
                {{-- Website Name (with hover effect same as header) --}}
                <div class="text-center mb-4">
                    <a href="{{ url('/customer/dashboard') }}" class="brand-text text-decoration-none d-inline-block">
                        Elegant<span class="brand-accent">Shop</span>
                    </a>
                </div>

                <h3 class="text-center mb-2 auth-title">Sign In</h3>
                <p class="text-center auth-subtitle text-muted mb-4">Enter your credentials to continue</p>

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

                {{-- Login Form --}}
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
                        <button type="button" class="password-toggle"
                                style="position:absolute; top:50%; right:15px; transform:translateY(-50%);
                                       border:none; background:none;"
                                onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-lg mb-3" id="submitBtn">
                        <i class="fas fa-sign-in-alt me-2"></i>Sign In
                    </button>

                    <div class="text-center auth-footer">
                        <p class="mb-0">Don’t have an account?
                            <a href="{{ route('customer.register') }}" class="text-gradient fw-semibold">Sign Up</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- JS for Password Toggle + Button Loading --}}
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

    document.getElementById('loginForm').addEventListener('submit', function() {
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Signing In...';
    });
    </script>

</body>
</html>
