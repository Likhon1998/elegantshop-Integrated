<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Elegant Shop - Modern E-Commerce')</title>
    
    {{-- Static Assets & External Links --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    {{-- Local CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">

    
    {{-- Dynamic styles if needed --}}
    @yield('styles')
</head>
<body>
    
    {{-- Animated Background (Can be an include or stay here) --}}
    <div class="animated-bg">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
        <div class="floating-shape shape-4"></div>
    </div>

    {{-- Header/Navbar Components --}}
    @include('includes.customer.header')
    @include('includes.customer.navbar')

    {{-- ===== MAIN CONTENT SECTION ===== --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer Component --}}
    @include('includes.customer.footer')

    {{-- Scroll to Top Button --}}
    <button class="scroll-to-top" id="scrollToTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    {{-- ===== SCRIPTS ===== --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Local JS --}}
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/checkout.js') }}"></script>
    <script src="{{ asset('assets/js/shop.js') }}"></script>
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script src="{{ asset('assets/js/product.js') }}"></script>

    {{-- Dynamic scripts if needed --}}
    @yield('scripts')
</body>
</html>