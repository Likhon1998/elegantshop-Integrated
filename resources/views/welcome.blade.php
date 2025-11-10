<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-commerce Admin Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
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
            max-width: 1200px;
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
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
            font-size: 15px;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .auth-section {
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-header {
            margin-bottom: 40px;
        }

        .auth-title {
            font-family: var(--font-display);
            font-size: 36px;
            font-weight: 700;
            color: var(--color-dark);
            margin-bottom: 10px;
        }

        .auth-subtitle {
            font-size: 15px;
            color: var(--color-light-text);
        }

        .auth-buttons {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .btn {
            padding: 16px 32px;
            border-radius: var(--border-radius);
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
            border: 2px solid transparent;
            font-family: var(--font-primary);
        }

        .btn-primary {
            background: var(--color-primary);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            background: #8060c9;
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: white;
            color: var(--color-primary);
            border-color: var(--color-border);
        }

        .btn-secondary:hover {
            border-color: var(--color-primary);
            background: #f8f5ff;
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

        .info-text {
            text-align: center;
            font-size: 14px;
            color: var(--color-light-text);
            margin-top: 30px;
        }

        .info-text a {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 500;
        }

        .info-text a:hover {
            text-decoration: underline;
        }

        @media (max-width: 968px) {
            .container {
                grid-template-columns: 1fr;
            }

            .hero-section {
                padding: 40px 30px;
            }

            .auth-section {
                padding: 40px 30px;
            }

            .logo {
                font-size: 36px;
            }

            .auth-title {
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .hero-section,
            .auth-section {
                padding: 30px 20px;
            }

            .logo {
                font-size: 32px;
            }

            .tagline {
                font-size: 16px;
            }

            .auth-title {
                font-size: 24px;
            }

            .btn {
                padding: 14px 24px;
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hero-section">
            <div class="logo">Elegance</div>
            <p class="tagline">Powerful E-commerce Management System</p>
            
            <div class="features">
                <div class="feature">
                    <div class="feature-icon">📊</div>
                    <div>Comprehensive Analytics Dashboard</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">🛍️</div>
                    <div>Advanced Inventory Management</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">👥</div>
                    <div>Customer Relationship Tools</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">🔒</div>
                    <div>Secure & Reliable Platform</div>
                </div>
            </div>
        </div>

        <div class="auth-section">
            <div class="auth-header">
                <h1 class="auth-title">Welcome Back</h1>
                <p class="auth-subtitle">Access your admin dashboard to manage your store</p>
            </div>

            <div class="auth-buttons">
                <a href="/login" class="btn btn-primary">Sign In to Dashboard</a>
                
                <div class="divider">
                    <span>or</span>
                </div>
                
                <a href="/register" class="btn btn-secondary">Create New Account</a>
            </div>

            <p class="info-text">
                Need help? <a href="#">Contact Support</a>
            </p>
        </div>
    </div>
</body>
</html>