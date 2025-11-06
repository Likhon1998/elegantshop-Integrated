@extends('layouts.app')

@section('content')
    <section class="hero-section">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                {{-- Slide 1 --}}
                <div class="carousel-item active">
                    <div class="hero-slide hero-gradient-1">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="hero-content slide-in-left">
                                        <span class="hero-subtitle">New Collection 2024</span>
                                        <h1 class="hero-title gradient-text">Discover Your Perfect Style</h1>
                                        <p class="hero-description">Explore our curated selection of premium products with exclusive offers</p>
                                        <a href="{{ url('shop') }}" class="btn btn-primary btn-lg mt-3 btn-3d">
                                            Shop Now <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="hero-image-wrapper">
                                        <div class="image-glow"></div>
                                        <img src="https://picsum.photos/600/500?random=1" alt="Hero" class="hero-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Slide 2 --}}
                <div class="carousel-item">
                    <div class="hero-slide hero-gradient-2">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="hero-content slide-in-left">
                                        <span class="hero-subtitle">Summer Sale</span>
                                        <h1 class="hero-title gradient-text">Up to 50% Off</h1>
                                        <p class="hero-description">Limited time offer on selected items. Don't miss out!</p>
                                        <a href="{{ url('campaigns') }}" class="btn btn-primary btn-lg mt-3 btn-3d">
                                            View Offers <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="hero-image-wrapper">
                                        <div class="image-glow"></div>
                                        <img src="https://picsum.photos/600/500?random=2" alt="Hero" class="hero-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Slide 3 --}}
                <div class="carousel-item">
                    <div class="hero-slide hero-gradient-3">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="hero-content slide-in-left">
                                        <span class="hero-subtitle">Premium Quality</span>
                                        <h1 class="hero-title gradient-text">Elegance Meets Comfort</h1>
                                        <p class="hero-description">Handpicked products that combine style with functionality</p>
                                        <a href="{{ url('shop') }}" class="btn btn-primary btn-lg mt-3 btn-3d">
                                            Explore <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="hero-image-wrapper">
                                        <div class="image-glow"></div>
                                        <img src="https://picsum.photos/600/500?random=3" alt="Hero" class="hero-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon modern-carousel-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon modern-carousel-icon"></span>
            </button>
        </div>
    </section>

    ---

    <section class="features-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card glass-card" data-tilt>
                        <div class="feature-icon">
                            <i class="fas fa-shipping-fast"></i>
                            <div class="icon-ripple"></div>
                        </div>
                        <h5 class="feature-title">Free Shipping</h5>
                        <p class="feature-text">On orders over $50</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card glass-card" data-tilt>
                        <div class="feature-icon">
                            <i class="fas fa-undo-alt"></i>
                            <div class="icon-ripple"></div>
                        </div>
                        <h5 class="feature-title">Easy Returns</h5>
                        <p class="feature-text">30-day return policy</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card glass-card" data-tilt>
                        <div class="feature-icon">
                            <i class="fas fa-lock"></i>
                            <div class="icon-ripple"></div>
                        </div>
                        <h5 class="feature-title">Secure Payment</h5>
                        <p class="feature-text">100% secure transactions</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="feature-card glass-card" data-tilt>
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                            <div class="icon-ripple"></div>
                        </div>
                        <h5 class="feature-title">24/7 Support</h5>
                        <p class="feature-text">Dedicated customer care</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    ---

    <section class="products-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-subtitle reveal-text">Trending Now</span>
                <h2 class="section-title reveal-text">Featured Products</h2>
                <p class="section-description reveal-text">Discover our handpicked selection of premium items</p>
            </div>
            <div class="row g-4">
                {{-- Product Card 1 --}}
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-badge badge-new">New</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=10" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Fashion</span>
                            <h5 class="product-title">Elegant Summer Dress</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                <span>(48)</span>
                            </div>
                            <div class="product-price">
                                <span class="price">$89.99</span>
                                <span class="old-price">$129.99</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                {{-- Product Card 2 --}}
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-badge badge-sale">Sale</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=11" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Electronics</span>
                            <h5 class="product-title">Wireless Headphones</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                <span>(127)</span>
                            </div>
                            <div class="product-price">
                                <span class="price">$149.99</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                {{-- Product Card 3 --}}
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=12" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Home & Garden</span>
                            <h5 class="product-title">Ceramic Vase Set</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                <span>(34)</span>
                            </div>
                            <div class="product-price">
                                <span class="price">$59.99</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                {{-- Product Card 4 --}}
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-badge badge-hot">Hot</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=13" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Beauty</span>
                            <h5 class="product-title">Organic Skincare Kit</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                <span>(89)</span>
                            </div>
                            <div class="product-price">
                                <span class="price">$79.99</span>
                                <span class="old-price">$99.99</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                {{-- Product Card 5 --}}
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=14" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Fashion</span>
                            <h5 class="product-title">Leather Handbag</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                <span>(62)</span>
                            </div>
                            <div class="product-price">
                                <span class="price">$199.99</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                {{-- Product Card 6 --}}
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-badge badge-sale">-30%</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=15" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Electronics</span>
                            <h5 class="product-title">Smart Watch Pro</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                <span>(156)</span>
                            </div>
                            <div class="product-price">
                                <span class="price">$279.99</span>
                                <span class="old-price">$399.99</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                {{-- Product Card 7 --}}
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=16" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Home & Garden</span>
                            <h5 class="product-title">Scented Candle Set</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                <span>(41)</span>
                            </div>
                            <div class="product-price">
                                <span class="price">$39.99</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                {{-- Product Card 8 --}}
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-badge badge-new">New</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=17" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Beauty</span>
                            <h5 class="product-title">Perfume Collection</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                <span>(73)</span>
                            </div>
                            <div class="product-price">
                                <span class="price">$129.99</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ url('shop') }}" class="btn btn-outline-primary btn-lg btn-glow-outline">View All Products</a>
            </div>
        </div>
    </section>

    ---

    <section class="banner-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="promo-banner glass-card promo-gradient-1">
                        <div class="promo-content">
                            <span class="promo-subtitle">Limited Offer</span>
                            <h3 class="promo-title">Summer Collection</h3>
                            <p class="promo-text">Get up to 40% off on selected items</p>
                            <a href="{{ url('campaigns') }}" class="btn btn-dark btn-sm mt-2 btn-3d">Shop Now</a>
                        </div>
                        <img src="https://picsum.photos/250/250?random=20" alt="Promo" class="promo-image">
                        <div class="promo-glow"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="promo-banner glass-card promo-gradient-2">
                        <div class="promo-content">
                            <span class="promo-subtitle">New Arrivals</span>
                            <h3 class="promo-title">Trending Styles</h3>
                            <p class="promo-text">Discover the latest fashion trends</p>
                            <a href="{{ url('shop') }}" class="btn btn-dark btn-sm mt-2 btn-3d">Explore</a>
                        </div>
                        <img src="https://picsum.photos/250/250?random=21" alt="Promo" class="promo-image">
                        <div class="promo-glow"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    ---

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
                        <form class="newsletter-form">
                            <div class="input-group modern-input">
                                <input type="email" class="form-control" placeholder="Enter your email address">
                                <button class="btn btn-primary" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection