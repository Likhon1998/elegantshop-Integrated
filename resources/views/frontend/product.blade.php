@extends('layouts.app')

{{-- Assume $product variable is passed from the controller --}}
@section('title', $product->title ?? 'Premium Cotton T-Shirt - Elegant Shop')

@section('content')

    <section class="breadcrumb-section py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('shop') }}">Shop</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('category/fashion') }}">Fashion</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->title ?? 'Premium Cotton T-Shirt' }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="product-details-section py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="product-gallery">
                        <div class="main-image-wrapper">
                            <span class="product-badge-large">-30% OFF</span>
                            <div class="wishlist-btn-large">
                                <button class="btn btn-light btn-wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <img src="{{ $product->main_image ?? 'https://picsum.photos/600/600?random=100' }}" alt="Product" class="main-image" id="mainImage">
                            <div class="zoom-indicator">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                        
                        <div class="thumbnail-gallery">
                            <div class="thumbnail-item active">
                                <img src="https://picsum.photos/100/100?random=100" alt="Thumbnail 1">
                            </div>
                            <div class="thumbnail-item">
                                <img src="https://picsum.photos/100/100?random=101" alt="Thumbnail 2">
                            </div>
                            <div class="thumbnail-item">
                                <img src="https://picsum.photos/100/100?random=102" alt="Thumbnail 3">
                            </div>
                            <div class="thumbnail-item">
                                <img src="https://picsum.photos/100/100?random=103" alt="Thumbnail 4">
                            </div>
                            <div class="thumbnail-item">
                                <img src="https://picsum.photos/100/100?random=104" alt="Thumbnail 5">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="product-info-wrapper">
                        <div class="product-meta mb-3">
                            <span class="product-category-badge">
                                <i class="fas fa-tag me-1"></i> {{ $product->category ?? 'Fashion' }}
                            </span>
                            <span class="product-sku">SKU: {{ $product->sku ?? 'TSH-001-BLK-M' }}</span>
                        </div>

                        <h1 class="product-detail-title">{{ $product->title ?? 'Premium Cotton T-Shirt' }}</h1>

                        <div class="product-rating-section mb-3">
                            <div class="rating-stars">
                                {{-- Use Blade loops to generate stars based on $product->rating --}}
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="rating-number">{{ $product->rating ?? '4.5' }}</span>
                            </div>
                            <span class="review-count">({{ $product->review_count ?? '156' }} Reviews)</span>
                            <a href="#reviews-section" class="write-review-link">Write a Review</a>
                        </div>

                        <div class="product-pricing mb-4">
                            <span class="current-price">${{ $product->price ?? '49.99' }}</span>
                            <span class="original-price">${{ $product->old_price ?? '69.99' }}</span>
                            <span class="discount-badge">Save 30%</span>
                        </div>

                        <div class="stock-status mb-4">
                            <span class="in-stock">
                                <i class="fas fa-check-circle me-1"></i> In Stock ({{ $product->stock_qty ?? '237' }} items available)
                            </span>
                        </div>

                        <div class="product-short-desc mb-4">
                            <p>{{ $product->short_description ?? 'Experience ultimate comfort with our premium cotton t-shirt. Made from 100% organic cotton, this soft and breathable fabric ensures all-day comfort. Perfect for casual wear and everyday style.' }}</p>
                        </div>

                        <div class="product-option-group mb-4">
                            <label class="option-label">Color: <strong id="selectedColor">Black</strong></label>
                            <div class="color-selector">
                                {{-- Use @foreach ($product->colors as $color) --}}
                                <button class="color-btn active" data-color="Black" style="background: #000000;" title="Black"></button>
                                <button class="color-btn" data-color="White" style="background: #FFFFFF; border: 2px solid #ddd;" title="White"></button>
                                <button class="color-btn" data-color="Navy" style="background: #001F3F;" title="Navy"></button>
                                <button class="color-btn" data-color="Gray" style="background: #808080;" title="Gray"></button>
                                <button class="color-btn" data-color="Red" style="background: #FF0000;" title="Red"></button>
                            </div>
                        </div>

                        <div class="product-option-group mb-4">
                            <label class="option-label">Size: <strong id="selectedSize">M</strong></label>
                            <div class="size-selector">
                                {{-- Use @foreach ($product->sizes as $size) --}}
                                <button class="size-btn" data-size="XS">XS</button>
                                <button class="size-btn" data-size="S">S</button>
                                <button class="size-btn active" data-size="M">M</button>
                                <button class="size-btn" data-size="L">L</button>
                                <button class="size-btn" data-size="XL">XL</button>
                                <button class="size-btn" data-size="XXL">XXL</button>
                            </div>
                            <a href="#size-guide" class="size-guide-link" data-bs-toggle="modal" data-bs-target="#sizeGuideModal">
                                <i class="fas fa-ruler me-1"></i> Size Guide
                            </a>
                        </div>

                        <div class="product-option-group mb-4">
                            <label class="option-label">Quantity:</label>
                            <div class="quantity-selector">
                                <button class="qty-btn minus" id="qtyMinus">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" class="qty-input" id="quantityInput" value="1" min="1" max="10">
                                <button class="qty-btn plus" id="qtyPlus">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="product-actions mb-4">
                            <button class="btn btn-primary btn-lg btn-add-to-cart" id="addToCartBtn">
                                <i class="fas fa-shopping-bag me-2"></i> Add to Cart
                            </button>
                            <button class="btn btn-outline-primary btn-lg btn-buy-now">
                                <i class="fas fa-bolt me-2"></i> Buy Now
                            </button>
                        </div>

                        <div class="additional-actions mb-4">
                            <button class="action-btn">
                                <i class="far fa-heart me-2"></i> Add to Wishlist
                            </button>
                            <button class="action-btn">
                                <i class="fas fa-balance-scale me-2"></i> Compare
                            </button>
                            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i class="fas fa-share-alt me-2"></i> Share
                            </button>
                        </div>

                        <div class="product-features glass-card p-3">
                            <div class="feature-item">
                                <i class="fas fa-truck"></i>
                                <div>
                                    <strong>Free Shipping</strong>
                                    <p>On orders over $50</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-undo"></i>
                                <div>
                                    <strong>Easy Returns</strong>
                                    <p>30-day return policy</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-shield-alt"></i>
                                <div>
                                    <strong>Secure Payment</strong>
                                    <p>100% secure checkout</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-tabs-section py-5">
        <div class="container">
            <div class="product-tabs-wrapper glass-card">
                <ul class="nav nav-tabs product-nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button">
                            <i class="fas fa-align-left me-2"></i> Description
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button">
                            <i class="fas fa-list-ul me-2"></i> Specifications
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">
                            <i class="fas fa-star me-2"></i> Reviews ({{ $product->review_count ?? '156' }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button">
                            <i class="fas fa-shipping-fast me-2"></i> Shipping Info
                        </button>
                    </li>
                </ul>

                <div class="tab-content product-tab-content">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="description-content">
                            {!! $product->long_description ?? '
                                <h3>Product Description</h3>
                                <p>Discover the perfect blend of comfort and style with our Premium Cotton T-Shirt. Crafted from 100% organic cotton, this versatile piece offers exceptional softness and breathability, making it ideal for everyday wear.</p>
                                
                                <h4>Key Features:</h4>
                                <ul>
                                    <li><strong>Premium Quality:</strong> Made from 100% organic cotton for superior comfort</li>
                                    <li><strong>Breathable Fabric:</strong> Keeps you cool and comfortable all day long</li>
                                    <li><strong>Perfect Fit:</strong> Classic cut with modern tailoring for a flattering silhouette</li>
                                    <li><strong>Versatile Style:</strong> Pairs perfectly with jeans, shorts, or layered under jackets</li>
                                    <li><strong>Easy Care:</strong> Machine washable and maintains shape after multiple washes</li>
                                    <li><strong>Eco-Friendly:</strong> Sustainably sourced materials and ethical manufacturing</li>
                                </ul>
                            ' !!}
                        </div>
                    </div>

                    <div class="tab-pane fade" id="specifications" role="tabpanel">
                        <div class="specifications-content">
                            <h3>Product Specifications</h3>
                            <table class="specifications-table">
                                <tr><td><strong>Material</strong></td><td>100% Organic Cotton</td></tr>
                                <tr><td><strong>Fabric Weight</strong></td><td>180 GSM</td></tr>
                                <tr><td><strong>Fit Type</strong></td><td>Regular Fit</td></tr>
                                <tr><td><strong>Neck Style</strong></td><td>Crew Neck</td></tr>
                                <tr><td><strong>Sleeve Length</strong></td><td>Short Sleeve</td></tr>
                                <tr><td><strong>Pattern</strong></td><td>Solid</td></tr>
                                <tr><td><strong>Available Colors</strong></td><td>Black, White, Navy, Gray, Red</td></tr>
                                <tr><td><strong>Available Sizes</strong></td><td>XS, S, M, L, XL, XXL</td></tr>
                                <tr><td><strong>Country of Origin</strong></td><td>Made in USA</td></tr>
                                <tr><td><strong>Care Label</strong></td><td>Machine Washable</td></tr>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="reviews-content" id="reviews-section">
                            <div class="reviews-summary glass-card p-4 mb-4">
                                <div class="row align-items-center">
                                    <div class="col-md-4 text-center">
                                        <div class="average-rating">
                                            <h2 class="rating-number">{{ $product->rating ?? '4.5' }}</h2>
                                            <div class="rating-stars mb-2">
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <p class="mb-0">Based on {{ $product->review_count ?? '156' }} reviews</p>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        {{-- Dynamic rating breakdown logic would go here --}}
                                        <div class="rating-breakdown">
                                            <div class="rating-bar-item"><span>5 <i class="fas fa-star"></i></span><div class="progress"><div class="progress-bar" style="width: 75%"></div></div><span>117</span></div>
                                            <div class="rating-bar-item"><span>4 <i class="fas fa-star"></i></span><div class="progress"><div class="progress-bar" style="width: 15%"></div></div><span>24</span></div>
                                            <div class="rating-bar-item"><span>3 <i class="fas fa-star"></i></span><div class="progress"><div class="progress-bar" style="width: 7%"></div></div><span>11</span></div>
                                            <div class="rating-bar-item"><span>2 <i class="fas fa-star"></i></span><div class="progress"><div class="progress-bar" style="width: 2%"></div></div><span>3</span></div>
                                            <div class="rating-bar-item"><span>1 <i class="fas fa-star"></i></span><div class="progress"><div class="progress-bar" style="width: 1%"></div></div><span>1</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mb-4">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal">
                                    <i class="fas fa-edit me-2"></i> Write a Review
                                </button>
                            </div>

                            <div class="reviews-list">
                                <div class="review-item glass-card p-4 mb-3">
                                    <div class="review-header">
                                        <div class="reviewer-info">
                                            <div class="reviewer-avatar"><img src="https://ui-avatars.com/api/?name=John+Doe&background=9370DB&color=fff" alt="John Doe"></div>
                                            <div>
                                                <h5 class="reviewer-name">John Doe</h5>
                                                <div class="review-meta">
                                                    <span class="review-date">2 days ago</span>
                                                    <span class="verified-badge"><i class="fas fa-check-circle"></i> Verified Purchase</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                    </div>
                                    <div class="review-body"><h6 class="review-title">Excellent Quality!</h6><p class="review-text">This t-shirt exceeded my expectations! The fabric is incredibly soft and the fit is perfect. I've washed it several times and it still looks brand new. Highly recommend!</p></div>
                                    <div class="review-footer">
                                        <button class="review-action-btn"><i class="far fa-thumbs-up me-1"></i> Helpful (24)</button>
                                        <button class="review-action-btn"><i class="far fa-comment me-1"></i> Reply</button>
                                    </div>
                                </div>

                                <div class="review-item glass-card p-4 mb-3">
                                    <div class="review-header">
                                        <div class="reviewer-info">
                                            <div class="reviewer-avatar"><img src="https://ui-avatars.com/api/?name=Sarah+Smith&background=DDA0DD&color=fff" alt="Sarah Smith"></div>
                                            <div>
                                                <h5 class="reviewer-name">Sarah Smith</h5>
                                                <div class="review-meta">
                                                    <span class="review-date">5 days ago</span>
                                                    <span class="verified-badge"><i class="fas fa-check-circle"></i> Verified Purchase</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                                    </div>
                                    <div class="review-body"><h6 class="review-title">Very Comfortable</h6><p class="review-text">Love the material and the fit. It's perfect for everyday wear. The only reason I didn't give 5 stars is because I wish there were more color options.</p></div>
                                    <div class="review-footer">
                                        <button class="review-action-btn"><i class="far fa-thumbs-up me-1"></i> Helpful (18)</button>
                                        <button class="review-action-btn"><i class="far fa-comment me-1"></i> Reply</button>
                                    </div>
                                </div>
                                {{-- End of Reviews List --}}
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-outline-primary">Load More Reviews</button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="shipping" role="tabpanel">
                        <div class="shipping-content">
                            <h3>Shipping & Delivery Information</h3>
                            
                            <div class="shipping-option glass-card p-3 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-shipping-fast shipping-icon"></i>
                                    <div>
                                        <h5>Standard Shipping</h5>
                                        <p class="mb-1">Delivery within 5-7 business days</p>
                                        <p class="text-primary mb-0"><strong>FREE on orders over $50</strong></p>
                                    </div>
                                </div>
                            </div>

                            <div class="shipping-option glass-card p-3 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-rocket shipping-icon"></i>
                                    <div>
                                        <h5>Express Shipping</h5>
                                        <p class="mb-1">Delivery within 2-3 business days</p>
                                        <p class="text-primary mb-0"><strong>$9.99</strong></p>
                                    </div>
                                </div>
                            </div>
                            
                            <h4>Return Policy</h4>
                            <ul>
                                <li>30-day return policy on all items</li>
                                <li>Items must be unused and in original packaging</li>
                                <li>Free returns on all orders</li>
                                <li>Refunds processed within 5-7 business days</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related-products-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-subtitle">You May Also Like</span>
                <h2 class="section-title">Related Products</h2>
            </div>

            <div class="row g-4">
                {{-- Use @foreach ($relatedProducts as $related) here --}}
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-badge badge-new">New</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=110" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product/related-product-1') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Fashion</span>
                            <h5 class="product-title">Casual Polo Shirt</h5>
                            <div class="product-rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><span>(89)</span></div>
                            <div class="product-price"><span class="price">$39.99</span></div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple"><i class="fas fa-shopping-bag me-1"></i> Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-badge badge-sale">-20%</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=111" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product/related-product-2') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Fashion</span>
                            <h5 class="product-title">Classic Hoodie</h5>
                            <div class="product-rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><span>(142)</span></div>
                            <div class="product-price"><span class="price">$59.99</span><span class="old-price">$74.99</span></div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple"><i class="fas fa-shopping-bag me-1"></i> Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=112" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product/related-product-3') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Fashion</span>
                            <h5 class="product-title">V-Neck Tee</h5>
                            <div class="product-rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><span>(267)</span></div>
                            <div class="product-price"><span class="price">$44.99</span></div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple"><i class="fas fa-shopping-bag me-1"></i> Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-badge badge-hot">Hot</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=113" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product/related-product-4') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Fashion</span>
                            <h5 class="product-title">Long Sleeve Shirt</h5>
                            <div class="product-rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><span>(198)</span></div>
                            <div class="product-price"><span class="price">$54.99</span></div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple"><i class="fas fa-shopping-bag me-1"></i> Add to Cart</button>
                        </div>
                    </div>
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

    {{-- Size Guide Modal --}}
    <div class="modal fade" id="sizeGuideModal" tabindex="-1" aria-labelledby="sizeGuideModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content glass-card">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="sizeGuideModalLabel">Size Guide</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr><th>Size</th><th>Chest (inches)</th><th>Waist (inches)</th><th>Length (inches)</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>XS</strong></td><td>34-36</td><td>28-30</td><td>27</td></tr>
                            <tr><td><strong>S</strong></td><td>36-38</td><td>30-32</td><td>28</td></tr>
                            <tr><td><strong>M</strong></td><td>38-40</td><td>32-34</td><td>29</td></tr>
                            <tr><td><strong>L</strong></td><td>40-42</td><td>34-36</td><td>30</td></tr>
                            <tr><td><strong>XL</strong></td><td>42-44</td><td>36-38</td><td>31</td></tr>
                            <tr><td><strong>XXL</strong></td><td>44-46</td><td>38-40</td><td>32</td></tr>
                        </tbody>
                    </table>
                    <p class="text-muted mb-0"><small><i class="fas fa-info-circle me-1"></i> All measurements are approximate. Please allow 1-2cm difference.</small></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content glass-card">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="shareModalLabel">Share this Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="share-buttons">
                        <a href="#" class="share-btn facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                        <a href="#" class="share-btn twitter"><i class="fab fa-twitter"></i> Twitter</a>
                        <a href="#" class="share-btn pinterest"><i class="fab fa-pinterest"></i> Pinterest</a>
                        <a href="#" class="share-btn whatsapp"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                        <a href="#" class="share-btn email"><i class="fas fa-envelope"></i> Email</a>
                    </div>
                    <div class="copy-link mt-3">
                        <label class="form-label">Copy Link</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ url('product/premium-cotton-tshirt') }}" readonly>
                            <button class="btn btn-primary" type="button" id="copyLinkBtn">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content glass-card">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="reviewModalLabel">Write a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="reviewForm" method="POST" action="{{ url('product/submit-review') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Your Rating *</label>
                            <div class="star-rating-input">
                                <i class="far fa-star" data-rating="1"></i>
                                <i class="far fa-star" data-rating="2"></i>
                                <i class="far fa-star" data-rating="3"></i>
                                <i class="far fa-star" data-rating="4"></i>
                                <i class="far fa-star" data-rating="5"></i>
                                <input type="hidden" name="rating" id="reviewRatingInput" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Review Title *</label>
                            <input type="text" class="form-control" name="title" placeholder="Give your review a title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Your Review *</label>
                            <textarea class="form-control" name="review_text" rows="5" placeholder="Share your experience with this product" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Your Name *</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Your Email *</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="verifiedPurchase" name="verified">
                            <label class="form-check-label" for="verifiedPurchase">
                                This is a verified purchase
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

