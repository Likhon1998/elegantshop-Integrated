@extends('layouts.app')

@section('title', 'About Us - Elegant Shop')

{{-- Note: If you included 'css/auth.css' separately in the original HTML, --}}
{{-- you should add it to your master layout or here: --}}
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section pt-0">
        <div class="container">
            <div class="about-hero glass-card">
                <div class="row align-items-center g-4 p-4 p-md-5">
                    <div class="col-lg-6">
                        <span class="section-subtitle">Who We Are</span>
                        <h2 class="section-title">Bringing <span class="text-gradient">Elegance</span> to Your Everyday Life</h2>
                        <p class="lead">ElegantShop was born from a simple idea: that everyone deserves access to beautiful, high-quality products that inspire and elevate daily life. We are more than just a store; we are curators of style and quality.</p>
                        <a href="{{ url('shop') }}" class="btn btn-primary btn-lg mt-3">Shop Our Collection</a>
                    </div>
                    <div class="col-lg-6">
                        <img src="https://picsum.photos/600/400?random=30" alt="About Us" class="img-fluid about-story-img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="about-section pt-0">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-lg-2">
                    <span class="section-subtitle">Our Story</span>
                    <h2 class="section-title">How We Started</h2>
                    <p>Founded in 2023, ElegantShop began as a small passion project in a humble studio. Our founder, Jane Doe, envisioned a place where fashion-forward individuals could find unique pieces without compromising on quality or service. What started with a small, curated collection of accessories has grown into a full-fledged e-commerce destination for fashion, electronics, and home goods.</p>
                    <p>Our commitment to excellence and a keen eye for emerging trends has set us apart. We believe in building lasting relationships with our customers by providing an unparalleled shopping experience.</p>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <img src="https://picsum.photos/600/450?random=31" alt="Our Story" class="img-fluid about-story-img">
                </div>
            </div>
        </div>
    </section>
    
    <section class="about-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <span class="section-subtitle">Why Choose Us</span>
                    <h2 class="section-title">Our Commitment to You</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="counter-card glass-card">
                        <div class="counter-icon"><i class="fas fa-box-open"></i></div>
                        <h3 class="counter-value">10,000+</h3>
                        <p class="counter-label">Products Shipped</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="counter-card glass-card">
                        <div class="counter-icon"><i class="fas fa-smile"></i></div>
                        <h3 class="counter-value">5,000+</h3>
                        <p class="counter-label">Happy Customers</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="counter-card glass-card">
                        <div class="counter-icon"><i class="fas fa-award"></i></div>
                        <h3 class="counter-value">50+</h3>
                        <p class="counter-label">Brands Partnered</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="counter-card glass-card">
                        <div class="counter-icon"><i class="fas fa-headset"></i></div>
                        <h3 class="counter-value">24/7</h3>
                        <p class="counter-label">Support Available</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <span class="section-subtitle">Our Team</span>
                    <h2 class="section-title">The People Behind the Elegance</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="team-card glass-card">
                        <img src="https://picsum.photos/300/300?random=40" alt="Team Member 1" class="team-card-img">
                        <div class="team-card-body">
                            <h5 class="team-card-title">Jane Doe</h5>
                            <p class="team-card-role">Founder & CEO</p>
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-card glass-card">
                        <img src="https://picsum.photos/300/300?random=41" alt="Team Member 2" class="team-card-img">
                        <div class="team-card-body">
                            <h5 class="team-card-title">John Smith</h5>
                            <p class="team-card-role">Head of Marketing</p>
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-card glass-card">
                        <img src="https://picsum.photos/300/300?random=42" alt="Team Member 3" class="team-card-img">
                        <div class="team-card-body">
                            <h5 class="team-card-title">Emily White</h5>
                            <p class="team-card-role">Lead Designer</p>
                            <div class="team-social">
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-card glass-card">
                        <img src="https://picsum.photos/300/300?random=43" alt="Team Member 4" class="team-card-img">
                        <div class="team-card-body">
                            <h5 class="team-card-title">Michael Brown</h5>
                            <p class="team-card-role">CTO</p>
                            <div class="team-social">
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- The custom JavaScript function from the original HTML is placed here --}}
@section('scripts')
    @parent {{-- Keep the default scripts from app.blade.php --}}
    <script>
        // Scroll to Top (moved from original HTML to scripts section)
        const scrollToTopBtn = document.getElementById('scrollToTop');
        window.onscroll = function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        };
        scrollToTopBtn.onclick = function() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        };
    </script>
@endsection