<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email - Elegant Shop</title>
    
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
                
                <div class="auth-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>

                <h3 class="auth-title">Verify Your Email Address</h3>
                <p class="auth-subtitle">
                    Thanks for signing up! We've sent a verification link to your email address. 
                    Please click the link in that email to complete your registration.
                </p>

                {{-- Laravel Status Message (e.g., if resend was successful) --}}
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success" role="alert">
                        A new verification link has been sent to the email address you provided during registration.
                    </div>
                @endif
                <div id="statusMessage" class="alert d-none" role="alert"></div>

                {{-- Resend Form --}}
                <form id="resendForm" class="d-inline" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-2"></i>Resend Verification Email
                    </button>
                </form>
                
                {{-- Logout Form (Uses POST method for security) --}}
                <form id="logoutForm" class="d-inline ms-2" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link">
                        Log Out
                    </button>
                </form>


                <div class="auth-footer">
                    Wrong email? <a href="{{ url('register') }}">Register with a different email</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form Submission (Custom loading state for visual feedback)
        document.getElementById('resendForm').addEventListener('submit', function(e) {
            
            const statusMessage = document.getElementById('statusMessage');
            
            // Show loading state
            const btn = this.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
            
            // If using AJAX/fetch instead of full server POST:
            /*
            e.preventDefault();
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
                
                statusMessage.innerHTML = '<strong>Success!</strong> A new verification link has been sent to your email address.';
                statusMessage.classList.remove('d-none', 'alert-danger');
                statusMessage.classList.add('alert-success');
            }, 1500);
            */
            // Since we use the Laravel route, we rely on the server redirect and session('status') message above.
        });
    </script>
</body>
</html>