<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - E-commerce Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --color-primary: #9370DB;
            --color-secondary: #DDA0DD;
            --color-dark: #2C3E50;
            --color-text: #4A5568;
            --color-light-text: #718096;
            --color-border: #E2E8F0;
            --font-primary: 'Poppins', sans-serif;
            --font-display: 'Playfair Display', serif;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.1);
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-primary);
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--color-text);
        }

        .container {
            width: 100%;
            max-width: 1100px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-section {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            bottom: -50px;
            left: -50px;
        }

        .logo {
            font-family: var(--font-display);
            font-size: 48px;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .tagline {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 40px;
            font-weight: 300;
            position: relative;
            z-index: 1;
            line-height: 1.6;
        }

        .illustration {
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            position: relative;
            z-index: 1;
            margin-top: 20px;
        }

        .form-section {
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 40px;
        }

        .form-title {
            font-family: var(--font-display);
            font-size: 32px;
            font-weight: 700;
            color: var(--color-dark);
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-size: 15px;
            color: var(--color-light-text);
        }

        .status-message {
            padding: 12px 16px;
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--color-dark);
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--color-border);
            border-radius: 10px;
            font-size: 15px;
            font-family: var(--font-primary);
            color: var(--color-dark);
            transition: var(--transition);
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(147, 112, 219, 0.1);
        }

        .form-input::placeholder {
            color: var(--color-light-text);
        }

        .error-message {
            color: #e53e3e;
            font-size: 13px;
            margin-top: 6px;
            display: block;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }

        .checkbox-input {
            width: 18px;
            height: 18px;
            border: 2px solid var(--color-border);
            border-radius: 4px;
            cursor: pointer;
            accent-color: var(--color-primary);
        }

        .checkbox-label {
            font-size: 14px;
            color: var(--color-text);
            cursor: pointer;
            user-select: none;
        }

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .forgot-link {
            color: var(--color-primary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: var(--transition);
        }

        .forgot-link:hover {
            color: #8060c9;
            text-decoration: underline;
        }

        .btn-primary {
            padding: 12px 32px;
            background: var(--color-primary);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            font-family: var(--font-primary);
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            background: #8060c9;
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 30px 0;
            color: var(--color-light-text);
            font-size: 14px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--color-border);
        }

        .divider span {
            padding: 0 15px;
        }

        .register-text {
            text-align: center;
            font-size: 14px;
            color: var(--color-light-text);
        }

        .register-text a {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        @media (max-width: 968px) {
            .container {
                grid-template-columns: 1fr;
            }

            .hero-section {
                padding: 40px 30px;
            }

            .form-section {
                padding: 40px 30px;
            }

            .logo {
                font-size: 36px;
            }

            .form-title {
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .hero-section,
            .form-section {
                padding: 30px 20px;
            }

            .logo {
                font-size: 32px;
            }

            .tagline {
                font-size: 16px;
            }

            .form-title {
                font-size: 24px;
            }

            .form-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-primary {
                width: 100%;
            }

            .illustration {
                width: 150px;
                height: 150px;
                font-size: 60px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="hero-section">
            <div class="logo">Elegance</div>
            <p class="tagline">Admin Portal<br>Manage your e-commerce empire</p>
            <div class="illustration">🛍️</div>
        </div>

        <div class="form-section">
            <div class="form-header">
                <h1 class="form-title">Welcome Back</h1>
                <p class="form-subtitle">Sign in to access your dashboard</p>
            </div>
            @if (session('status'))
                            <div class="status-message">
                                    {{ session('status') }}
                                </div>
                        @endif

                                    <form method="POST" action="{{ route('login') }}">
                                @csrf
                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" class="form-input" type="email" name="email" placeholder="admin@elegance.com"
                        required autofocus autocomplete="username" />
                    <!-- Error message shown when validation fails -->
                    <!-- <span class="error-message">The email field is required.</span> -->
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-input" type="password" name="password"
                        placeholder="Enter your password" required autocomplete="current-password" />
                    <!-- Error message shown when validation fails -->
                    <!-- <span class="error-message">The password field is required.</span> -->
                </div>

                <!-- Remember Me -->
                <div class="checkbox-group">
                    <input id="remember_me" type="checkbox" class="checkbox-input" name="remember" />
                    <label for="remember_me" class="checkbox-label">Remember me</label>
                </div>

                <div class="form-footer">
                    <a href="/forgot-password" class="forgot-link">Forgot password?</a>
                    <button type="submit" class="btn-primary">Sign In</button>
                </div>
            </form>

            <div class="divider">
                <span>or</span>
            </div>

            <div class="register-text">
                Don't have an account? <a href="/register">Create one now</a>
            </div>
        </div>
    </div>
</body>

</html>