@extends('layouts.app')

@section('title', 'Our Vendors - Elegant Shop')

@section('content')

    <!-- ===== BREADCRUMB / PAGE HEADER ===== -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Our Vendors</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Vendors</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== VENDORS GRID SECTION ===== -->
    <section class="vendors-section">
        <div class="container">
            <div class="row g-4">
                {{-- Use @foreach ($vendors as $vendor) here in a dynamic application --}}
                
                <!-- Vendor Card 1: Chic Boutique -->
                <div class="col-lg-3 col-md-6">
                    <div class="vendor-card glass-card">
                        <div class="vendor-banner" style="background-image: url('https://picsum.photos/400/150?random=70');">
                            <div class="vendor-logo">
                                <img src="https://picsum.photos/80/80?random=80" alt="Vendor Logo">
                            </div>
                        </div>
                        <div class="vendor-card-body">
                            <h5 class="vendor-title"><a href="{{ url('vendor/chic-boutique') }}">Chic Boutique</a></h5>
                            <div class="vendor-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="text-muted ms-1">(120)</span>
                            </div>
                            <p class="vendor-description">Premium women's fashion and accessories.</p>
                            <div class="vendor-card-footer">
                                <a href="{{ url('vendor/chic-boutique') }}" class="btn btn-primary btn-sm">Visit Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Vendor Card 2: Tech Innovators -->
                <div class="col-lg-3 col-md-6">
                    <div class="vendor-card glass-card">
                        <div class="vendor-banner" style="background-image: url('https://picsum.photos/400/150?random=71');">
                            <div class="vendor-logo">
                                <img src="https://picsum.photos/80/80?random=81" alt="Vendor Logo">
                            </div>
                        </div>
                        <div class="vendor-card-body">
                            <h5 class="vendor-title"><a href="{{ url('vendor/tech-innovators') }}">Tech Innovators</a></h5>
                            <div class="vendor-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="text-muted ms-1">(250)</span>
                            </div>
                            <p class="vendor-description">The latest gadgets and electronics.</p>
                            <div class="vendor-card-footer">
                                <a href="{{ url('vendor/tech-innovators') }}" class="btn btn-primary btn-sm">Visit Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Vendor Card 3: Home Harmony -->
                <div class="col-lg-3 col-md-6">
                    <div class="vendor-card glass-card">
                        <div class="vendor-banner" style="background-image: url('https://picsum.photos/400/150?random=72');">
                            <div class="vendor-logo">
                                <img src="https://picsum.photos/80/80?random=82" alt="Vendor Logo">
                            </div>
                        </div>
                        <div class="vendor-card-body">
                            <h5 class="vendor-title"><a href="{{ url('vendor/home-harmony') }}">Home Harmony</a></h5>
                            <div class="vendor-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="text-muted ms-1">(98)</span>
                            </div>
                            <p class="vendor-description">Elegant decor for your living space.</p>
                            <div class="vendor-card-footer">
                                <a href="{{ url('vendor/home-harmony') }}" class="btn btn-primary btn-sm">Visit Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Vendor Card 4: Pure Glow Beauty -->
                <div class="col-lg-3 col-md-6">
                    <div class="vendor-card glass-card">
                        <div class="vendor-banner" style="background-image: url('https://picsum.photos/400/150?random=73');">
                            <div class="vendor-logo">
                                <img src="https://picsum.photos/80/80?random=83" alt="Vendor Logo">
                            </div>
                        </div>
                        <div class="vendor-card-body">
                            <h5 class="vendor-title"><a href="{{ url('vendor/pure-glow-beauty') }}">Pure Glow Beauty</a></h5>
                            <div class="vendor-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="text-muted ms-1">(150)</span>
                            </div>
                            <p class="vendor-description">Organic and natural skincare products.</p>
                            <div class="vendor-card-footer">
                                <a href="{{ url('vendor/pure-glow-beauty') }}" class="btn btn-primary btn-sm">Visit Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- End of vendor list --}}
            </div>
            
            {{-- Pagination (Static links) --}}
            <nav aria-label="Page navigation" class="mt-5 d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-arrow-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-arrow-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </section>

@endsection

{{-- No custom JS needed here --}}