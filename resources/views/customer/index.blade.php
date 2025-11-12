@extends('layouts.customer.app')

@section('content')
    {{-- 🟣 HERO / SLIDER SECTION --}}
    <section class="hero-section">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            @foreach ($sliders as $index => $slider)
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" 
                    class="{{ $index === 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            @forelse ($sliders as $index => $slider)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    
                    <!-- Hero Slide with background image + gradient -->
                    <div class="hero-slide" style="
                        background: linear-gradient(135deg, {{ $slider->color_1 ?? 'rgba(0,0,0,0.3)' }}, {{ $slider->color_2 ?? 'rgba(0,0,0,0.3)' }}), 
                                    url('{{ asset('storage/' . $slider->image) }}');
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                    ">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-lg-6">
                                    <div class="hero-content slide-in-left">
                                        @if($slider->subtitle)
                                            <span class="hero-subtitle">{{ $slider->subtitle }}</span>
                                        @endif
                                        @if($slider->title)
                                            <h1 class="hero-title gradient-text">{{ $slider->title }}</h1>
                                        @endif
                                        @if($slider->description)
                                            <p class="hero-description">{{ $slider->description }}</p>
                                        @endif
                                        @if($slider->button_link)
                                            <a href="{{ url($slider->button_link) }}" class="btn btn-primary btn-lg mt-3 btn-3d">
                                                {{ $slider->button_text ?? 'Shop Now' }} <i class="fas fa-arrow-right ms-2"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <div class="carousel-item active">
                    <div class="hero-slide text-center py-5" style="background: #ddd;">
                        <h2>No sliders found.</h2>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon modern-carousel-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon modern-carousel-icon"></span>
        </button>
    </div>
</section>


    {{-- 🟣 FEATURE SECTION --}}
    <section class="features-section py-5">
        <div class="container">
            <div class="row g-4">
                @forelse ($features as $feature)
                    <div class="col-md-3 col-sm-6">
                        <div class="feature-card glass-card" data-tilt>
                            <div class="feature-icon">
                                <i class="{{ $feature->icon ?? 'fas fa-star' }}"></i>
                                <div class="icon-ripple"></div>
                            </div>
                            <h5 class="feature-title">{{ $feature->title }}</h5>
                            <p class="feature-text">{{ $feature->description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted">No features found.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- 🟣 PRODUCT SECTION --}}
    <section class="products-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-subtitle reveal-text">Trending Now</span>
                <h2 class="section-title reveal-text">Featured Products</h2>
                <p class="section-description reveal-text">Discover our handpicked selection of premium items</p>
            </div>

            <div class="row g-4">
                @forelse($featuredProducts as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product-card modern-card">
                            @if($product->discount_price)
                                <div class="product-badge badge-sale">Sale</div>
                            @elseif($product->is_featured)
                                <div class="product-badge badge-hot">Hot</div>
                            @endif

                            <div class="product-image">
                                <div class="image-overlay-gradient"></div>
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                    alt="{{ $product->name }}" 
                                    class="img-fluid rounded">
                                <div class="product-overlay">
                                    <a href="{{ url('product/'.$product->slug) }}" class="btn btn-sm btn-light me-2 btn-float">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                                </div>
                            </div>

                            <div class="product-info">
                                <span class="product-category">{{ $product->category->name ?? 'Uncategorized' }}</span>
                                <h5 class="product-title">{{ $product->name }}</h5>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i><i class="far fa-star"></i>
                                    <span>(12)</span>
                                </div>
                                <div class="product-price">
                                    <span class="price">${{ $product->discount_price ?? $product->price }}</span>
                                    @if($product->discount_price)
                                        <span class="old-price">${{ $product->price }}</span>
                                    @endif
                                </div>
                                <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                    <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No products available at the moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-5">
                <a href="{{ url('shop') }}" class="btn btn-outline-primary btn-lg btn-glow-outline">View All Products</a>
            </div>
        </div>
    </section>

    {{-- 🟣 BANNER SECTION --}}
    <section class="banner-section py-5">
        <div class="container">
            <div class="row g-4">
                @forelse ($banners as $banner)
                    <div class="col-md-6">
                        <div class="promo-banner glass-card" 
                             style="background: linear-gradient(135deg, {{ $banner->color_1 ?? '#fbc2eb' }}, {{ $banner->color_2 ?? '#a6c1ee' }});">
                            <div class="promo-content">
                                <span class="promo-subtitle">{{ $banner->subtitle }}</span>
                                <h3 class="promo-title">{{ $banner->title }}</h3>
                                <p class="promo-text">{{ $banner->description }}</p>
                                @if($banner->button_link)
                                    <a href="{{ url($banner->button_link) }}" class="btn btn-dark btn-sm mt-2 btn-3d">
                                        {{ $banner->button_text ?? 'Shop Now' }}
                                    </a>
                                @endif
                            </div>
                            @if($banner->image)
                                <img src="{{ asset('storage/' . $banner->image) }}" alt="Promo" class="promo-image">
                            @endif
                            <div class="promo-glow"></div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted">No banners found.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- 🟣 NEWSLETTER SECTION --}}
<section class="newsletter-section py-5">
    <div class="container">
        <div class="newsletter-box glass-card">
            <div class="newsletter-glow"></div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="newsletter-content">
                        <i class="fas fa-envelope-open newsletter-icon"></i>
                        <h3 class="newsletter-title">Subscribe to Our Newsletter</h3>
                        <p class="newsletter-text">Get the latest updates on new products and exclusive offers</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form">
                        @csrf
                        <div class="input-group modern-input">
                            <input 
                                type="email" 
                                name="email" 
                                class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                placeholder="Enter your email address" 
                                value="{{ old('email') }}" {{-- Keep old input value on failed validation --}}
                                required
                            >
                            <button class="btn btn-primary px-4" type="submit">Subscribe</button>
                            
                            {{-- ⚠️ LOCALIZED VALIDATION ERROR (Better UX) --}}
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div> 
                                {{-- 'd-block' is often needed to show the feedback outside of Bootstrap's default handling --}}
                            @enderror
                        </div>
                    </form>

                    {{-- ✅ SUCCESS MESSAGE --}}
                    @if(session('success'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- ❌ ERROR MESSAGE --}}
                    @if(session('error'))
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
