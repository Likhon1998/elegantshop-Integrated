<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Elegant Shop</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    {{-- Local CSS files using asset() helper --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
<body>
    
    {{-- Animated Background --}}
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

                <h3 class="auth-title">Forgot Your Password?</h3>
                <p class="auth-subtitle">
                    No problem! Enter your email below and we'll send you a link to reset it.
                </p>

                {{-- Laravel's session status message placeholder --}}
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div id="statusMessage" class="alert d-none" role="alert"></div>

                {{-- Laravel uses the route('password.email') for forgot password submission --}}
                <form method="POST" action="" id="forgotPasswordForm">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email Address</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-lg mb-3">
                        <i class="fas fa-paper-plane me-2"></i>Send Reset Link
                    </button>
                </form>

                <div class="auth-footer">
                    Remembered your password? <a href="{{ url('auth/login') }}">Sign In</a>
                </div>
            </div>
        </div>
    </section>

    {{-- SCRIPTS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Custom JS for form behavior (combined with Laravel logic for simplicity) --}}
    <script>
        document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
            
            const email = document.getElementById('email').value;
            const statusMessage = document.getElementById('statusMessage');
            
            // --- Frontend Simulation/Validation ---
            if (!email) {
                // If the email field is empty (Bootstrap HTML5 validation should catch this first)
                statusMessage.textContent = 'Please enter your email address.';
                statusMessage.classList.remove('d-none', 'alert-success');
                statusMessage.classList.add('alert-danger');
                e.preventDefault(); // Prevent submission if JS catches it
                return;
            }
            
            const btn = this.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
            
            // In a live Laravel app, you rely on the server response (session('status')) 
            // after the redirect, but the loading simulation can be triggered here.
            
            // For pure frontend simulation (remove if using Laravel's default submission/redirect):
            /*
            e.preventDefault();
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
                
                statusMessage.innerHTML = '<strong>Success!</strong> A password reset link has been sent to your email address.';
                statusMessage.classList.remove('d-none', 'alert-danger');
                statusMessage.classList.add('alert-success');
                
                document.getElementById('forgotPasswordForm').reset();
            }, 1500);
            */
        });
    </script>
</body>
</html>