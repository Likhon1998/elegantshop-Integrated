<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Elegant Shop</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    {{-- Local CSS files using asset() helper --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
<body>
    <div class="animated-bg">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        <div class="floating-shape shape-4"></div>
    </div>

    <section class="auth-section">
        <div class="container">
            <div class="auth-card glass-card">
                <div class="auth-logo">
                    <h2>Elegant<span class="brand-accent">Shop</span></h2>
                </div>

                <h3 class="auth-title">Set a New Password</h3>
                <p class="auth-subtitle">
                    Create a new, strong password for your account.
                </p>

                {{-- Laravel Status Message (for success/failure responses from server) --}}
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div id="statusMessage" class="alert d-none" role="alert"></div>

                {{-- Password Reset Form (Using Laravel's standard reset route) --}}
                <form method="POST" action="" id="resetPasswordForm">
                    @csrf
                    
                    {{-- This hidden input is required by Laravel to identify the token --}}
                    {{-- <input type="hidden" name="token" value="{{ $request->route('token') }}"> --}}

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ $email ?? old('email') }}" required>
                        <label for="email">Email Address</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3 position-relative">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="New Password" required>
                        <label for="password">New Password</label>
                        <button type="button" class="password-toggle" onclick="togglePasswordVisibility('password', 'toggleIcon1')">
                            <i class="fas fa-eye" id="toggleIcon1"></i>
                        </button>
                        @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    
                    <div class="form-floating mb-3 position-relative">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm New Password" required>
                        <label for="password_confirmation">Confirm New Password</label>
                        <button type="button" class="password-toggle" onclick="togglePasswordVisibility('password_confirmation', 'toggleIcon2')">
                            <i class="fas fa-eye" id="toggleIcon2"></i>
                        </button>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-lg mb-3" id="submitBtn">
                        <i class="fas fa-save me-2"></i>Save New Password
                    </button>
                </form>

                <div class="auth-footer">
                    Remembered your password? <a href="{{ url('auth/login') }}">Sign In</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Password Visibility (Reusable)
        function togglePasswordVisibility(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Form Submission (Custom loading state and basic client-side checks)
        document.getElementById('resetPasswordForm').addEventListener('submit', function(e) {
            
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const statusMessage = document.getElementById('statusMessage');
            
            // 1. Client-side Validation (Passes to Laravel server-side check)
            if (password !== confirmPassword) {
                statusMessage.textContent = 'Passwords do not match.';
                statusMessage.classList.remove('d-none', 'alert-success');
                statusMessage.classList.add('alert-danger');
                e.preventDefault();
                return;
            }
            
            // 2. Show Loading State
            statusMessage.classList.add('d-none');
            const btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
            
            // Note: If client-side validation passes, the form submits to the Laravel route('password.update').
            // Laravel handles the actual password reset logic and redirection.
        });
    </script>
</body>
</html>