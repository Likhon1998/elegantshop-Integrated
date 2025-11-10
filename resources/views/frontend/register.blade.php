<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Register - Elegant Shop</title>

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

    {{-- Registration Section --}}
    <section class="auth-section py-5">
        <div class="container">
            {{-- Oval Glass Card --}}
            <div class="glass-card mx-auto p-4 p-md-5"
                 style="max-width: 450px; animation: fadeIn 0.8s ease; border-radius: 50px;">
                
                {{-- Website Name (hover gradient like header) --}}
                <div class="text-center mb-4">
                    <a href="{{ url('/') }}" class="brand-text text-decoration-none d-inline-block">
                        Elegant<span class="brand-accent">Shop</span>
                    </a>
                </div>

                <h3 class="text-center mb-2 auth-title">Sign Up</h3>
                <p class="text-center auth-subtitle text-muted mb-4">It's quick and easy!</p>

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Whoops!</strong> Please fix the errors and try again.
                    </div>
                @endif

                {{-- Register Form --}}
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
                        <button type="button" class="password-toggle"
                                style="position:absolute; top:50%; right:15px; transform:translateY(-50%);
                                       border:none; background:none;"
                                onclick="togglePasswordVisibility('password', 'toggleIcon1')">
                            <i class="fas fa-eye" id="toggleIcon1"></i>
                        </button>
                    </div>
                    
                    <div class="form-floating mb-3 position-relative">
                        <input type="password" class="form-control" id="password_confirmation"
                               name="password_confirmation" placeholder="Confirm Password" required>
                        <label for="password_confirmation">Confirm Password</label>
                        <button type="button" class="password-toggle"
                                style="position:absolute; top:50%; right:15px; transform:translateY(-50%);
                                       border:none; background:none;"
                                onclick="togglePasswordVisibility('password_confirmation', 'toggleIcon2')">
                            <i class="fas fa-eye" id="toggleIcon2"></i>
                        </button>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-lg mb-3" id="submitBtn">
                        <i class="fas fa-user-plus me-2"></i>Sign Up
                    </button>

                    <div class="text-center auth-footer">
                        <p class="mb-0">Already have an account? 
                            <a href="{{ route('customer.login') }}" class="text-gradient fw-semibold">Sign In</a>
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

    document.getElementById('registerForm').addEventListener('submit', function() {
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Account...';
    });
    </script>

</body>
</html>
