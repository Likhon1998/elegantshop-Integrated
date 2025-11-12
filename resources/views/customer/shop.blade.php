@extends('layouts.app')

@section('title', 'Shop - Elegant Shop')

{{-- The content of this section replaces the @yield('content') in layouts/app.blade.php --}}
@section('content')
    <section class="breadcrumb-section py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="shop-header py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="page-title mb-2">Our Collection</h1>
                    {{-- Note: '247 amazing products' can be made dynamic later (e.g., {{ $products->total() }} ) --}}
                    <p class="page-subtitle mb-0">Discover <span class="text-gradient">247 amazing products</span></p>
                </div>
                <div class="col-lg-6 text-lg-end mt-3 mt-lg-0">
                    <div class="shop-controls d-flex justify-content-lg-end align-items-center flex-wrap gap-2">
                        <button class="btn btn-outline-primary btn-sm" id="filterToggle">
                            <i class="fas fa-filter me-2"></i>Filters
                        </button>
                        <div class="view-switcher glass-card px-3 py-2">
                            <button class="view-btn active" data-view="grid"><i class="fas fa-th"></i></button>
                            <button class="view-btn ms-2" data-view="list"><i class="fas fa-list"></i></button>
                        </div>
                        <select class="form-select form-select-sm sort-select glass-card" style="width: auto;">
                            <option>Sort by: Default</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest First</option>
                            <option>Best Selling</option>
                            <option>Top Rated</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop-sidebar" id="shopSidebar">
                        <div class="filter-widget glass-card mb-4">
                            <h5 class="filter-title">
                                <i class="fas fa-layer-group me-2"></i>Categories
                            </h5>
                            <div class="filter-content">
                                <div class="category-list">
                                    <div class="category-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cat1">
                                            <label class="form-check-label" for="cat1">
                                                Fashion <span class="count">(68)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="category-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cat2">
                                            <label class="form-check-label" for="cat2">
                                                Electronics <span class="count">(52)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="category-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cat3">
                                            <label class="form-check-label" for="cat3">
                                                Home & Garden <span class="count">(43)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="category-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cat4">
                                            <label class="form-check-label" for="cat4">
                                                Beauty <span class="count">(39)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="category-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cat5">
                                            <label class="form-check-label" for="cat5">
                                                Sports <span class="count">(27)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="category-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cat6">
                                            <label class="form-check-label" for="cat6">
                                                Books <span class="count">(18)</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="filter-widget glass-card mb-4">
                            <h5 class="filter-title">
                                <i class="fas fa-dollar-sign me-2"></i>Price Range
                            </h5>
                            <div class="filter-content">
                                <div class="price-range-slider mb-3">
                                    <input type="range" class="form-range" min="0" max="500" value="250" id="priceRange">
                                </div>
                                <div class="price-inputs d-flex gap-2">
                                    <input type="number" class="form-control form-control-sm" placeholder="Min" value="0">
                                    <span class="align-self-center">-</span>
                                    <input type="number" class="form-control form-control-sm" placeholder="Max" value="250">
                                </div>
                                <button class="btn btn-primary btn-sm w-100 mt-3">Apply</button>
                            </div>
                        </div>

                        <div class="filter-widget glass-card mb-4">
                            <h5 class="filter-title">
                                <i class="fas fa-star me-2"></i>Rating
                            </h5>
                            <div class="filter-content">
                                <div class="rating-filter">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rate5">
                                        <label class="form-check-label" for="rate5">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <span class="ms-2 count">(89)</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rate4">
                                        <label class="form-check-label" for="rate4">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                            <span class="ms-2">& Up <span class="count">(124)</span></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rate3">
                                        <label class="form-check-label" for="rate3">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                            <span class="ms-2">& Up <span class="count">(187)</span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="filter-widget glass-card mb-4">
                            <h5 class="filter-title">
                                <i class="fas fa-tags me-2"></i>Brands
                            </h5>
                            <div class="filter-content">
                                <div class="brand-search mb-3">
                                    <input type="text" class="form-control form-control-sm" placeholder="Search brands...">
                                </div>
                                <div class="brand-list">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="brand1">
                                        <label class="form-check-label" for="brand1">Nike <span class="count">(24)</span></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="brand2">
                                        <label class="form-check-label" for="brand2">Adidas <span class="count">(19)</span></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="brand3">
                                        <label class="form-check-label" for="brand3">Samsung <span class="count">(31)</span></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="brand4">
                                        <label class="form-check-label" for="brand4">Apple <span class="count">(15)</span></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="brand5">
                                        <label class="form-check-label" for="brand5">Zara <span class="count">(27)</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="filter-widget glass-card mb-4">
                            <h5 class="filter-title">
                                <i class="fas fa-palette me-2"></i>Colors
                            </h5>
                            <div class="filter-content">
                                <div class="color-options d-flex flex-wrap gap-2">
                                    <button class="color-option" style="background: #000000;" title="Black"></button>
                                    <button class="color-option" style="background: #FFFFFF; border: 1px solid #ddd;" title="White"></button>
                                    <button class="color-option" style="background: #FF0000;" title="Red"></button>
                                    <button class="color-option" style="background: #0000FF;" title="Blue"></button>
                                    <button class="color-option" style="background: #00FF00;" title="Green"></button>
                                    <button class="color-option" style="background: #FFFF00;" title="Yellow"></button>
                                    <button class="color-option" style="background: #FFC0CB;" title="Pink"></button>
                                    <button class="color-option" style="background: #800080;" title="Purple"></button>
                                    <button class="color-option" style="background: #FFA500;" title="Orange"></button>
                                    <button class="color-option" style="background: #A52A2A;" title="Brown"></button>
                                    <button class="color-option" style="background: #808080;" title="Gray"></button>
                                    <button class="color-option" style="background: #FFD700;" title="Gold"></button>
                                </div>
                            </div>
                        </div>

                        <div class="filter-widget glass-card mb-4">
                            <h5 class="filter-title">
                                <i class="fas fa-ruler me-2"></i>Sizes
                            </h5>
                            <div class="filter-content">
                                <div class="size-options d-flex flex-wrap gap-2">
                                    <button class="size-option">XS</button>
                                    <button class="size-option">S</button>
                                    <button class="size-option active">M</button>
                                    <button class="size-option">L</button>
                                    <button class="size-option">XL</button>
                                    <button class="size-option">XXL</button>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-outline-primary w-100 btn-float">
                            <i class="fas fa-redo me-2"></i>Reset All Filters
                        </button>

                        <div class="sidebar-promo glass-card mt-4 text-center p-4">
                            <i class="fas fa-gift text-gradient" style="font-size: 48px;"></i>
                            <h5 class="mt-3 mb-2">Special Offer!</h5>
                            <p class="small mb-3">Get 20% off on your first order</p>
                            <a href="{{ url('campaigns') }}" class="btn btn-primary btn-sm">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="active-filters mb-4">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <span class="filter-badge glass-card">
                                Fashion <button class="btn-close-filter"><i class="fas fa-times"></i></button>
                            </span>
                            <span class="filter-badge glass-card">
                                $50 - $200 <button class="btn-close-filter"><i class="fas fa-times"></i></button>
                            </span>
                            <button class="btn btn-link btn-sm text-danger">Clear All</button>
                        </div>
                    </div>

                    <div class="products-grid row g-4" id="productsGrid">
                        {{-- 
                            **NOTE FOR DYNAMIC IMPLEMENTATION:**
                            1. Remove the surrounding 'col-lg-4 col-md-6' div.
                            2. Use a Blade loop here like: @foreach ($products as $product)
                            3. Inside the loop, enclose the product card content in: 
                                <div class="col-lg-4 col-md-6">... PRODUCT CARD ...</div>
                            4. Replace static data (e.g., $49.99, Premium Cotton T-Shirt, etc.) with {{ $product->price }}, {{ $product->name }}, etc.
                            5. End the loop with: @endforeach
                        --}}
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="product-card modern-card">
                                <div class="product-badge badge-new">New</div>
                                <div class="quick-view-btn">
                                    <button class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="product-image">
                                    <div class="image-overlay-gradient"></div>
                                    <img src="https://picsum.photos/300/300?random=20" alt="Product">
                                    <div class="product-overlay">
                                        <a href="{{ url('product') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-shopping-bag"></i></a>
                                        <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="product-category">Fashion</span>
                                    <h5 class="product-title">Premium Cotton T-Shirt</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(156)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="price">$49.99</span>
                                        <span class="old-price">$69.99</span>
                                    </div>
                                    <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                        <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <nav aria-label="Product pagination" class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

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

    <div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content glass-card">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="quickViewModalLabel">Quick View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="https://picsum.photos/400/400?random=50" alt="Product" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <span class="product-category">Fashion</span>
                            <h3 class="product-title mb-3">Premium Cotton T-Shirt</h3>
                            <div class="product-rating mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(156 reviews)</span>
                            </div>
                            <div class="product-price mb-4">
                                <span class="price" style="font-size: 28px;">$49.99</span>
                                <span class="old-price" style="font-size: 20px;">$69.99</span>
                            </div>
                            <p class="mb-4">Premium quality cotton t-shirt with modern design. Perfect for casual wear and everyday comfort.</p>
                            <div class="mb-4">
                                <label class="form-label"><strong>Size:</strong></label>
                                <div class="size-options d-flex gap-2">
                                    <button class="size-option">S</button>
                                    <button class="size-option active">M</button>
                                    <button class="size-option">L</button>
                                    <button class="size-option">XL</button>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label"><strong>Color:</strong></label>
                                <div class="color-options d-flex gap-2">
                                    <button class="color-option active" style="background: #000000;"></button>
                                    <button class="color-option" style="background: #FFFFFF; border: 1px solid #ddd;"></button>
                                    <button class="color-option" style="background: #0000FF;"></button>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ url('product') }}" class="btn btn-primary flex-grow-1">View Details</a>
                                <button class="btn btn-outline-primary"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Add the specific shop.js script if it exists, otherwise remove this. --}}
@section('scripts')
    <script src="{{ asset('assets/js/shop.js') }}"></script>
@endsection