@extends('layouts.app')

@section('title', 'Shopping Cart - Elegant Shop')

@section('content')

    <section class="breadcrumb-section py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="cart-section ">
        <div class="container">

            <div class="empty-cart-state text-center" id="emptyCartState" style="display: none;">
                <div class="empty-cart-icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <h3 class="empty-cart-title">Your Cart is Empty</h3>
                <p class="empty-cart-text">Looks like you haven't added anything to your cart yet.</p>
                <a href="{{ url('shop') }}" class="btn btn-primary btn-lg mt-3">
                    <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                </a>
            </div>

            <div class="cart-content" id="cartContent">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="cart-items-wrapper glass-card p-4">
                            <div class="cart-items-header mb-4">
                                {{-- Replace 3 with dynamic cart item count --}}
                                <h5 class="mb-0">Cart Items (<span id="itemCount">3</span>)</h5> 
                            </div>

                            {{-- ===== CART ITEM LIST (Use @foreach($cartItems as $item) here) ===== --}}

                            <div class="cart-item glass-card p-3 mb-3" data-item-id="1">
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-3">
                                        <div class="cart-item-image">
                                            <img src="https://picsum.photos/150/150?random=50" alt="Product">
                                            <span class="item-badge badge-sale">-30%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-9">
                                        <div class="cart-item-info">
                                            <h6 class="cart-item-title">Premium Cotton T-Shirt</h6>
                                            <p class="cart-item-meta">
                                                <span class="item-attr">Color: Black</span>
                                                <span class="item-attr">Size: M</span>
                                            </p>
                                            <div class="cart-item-actions d-md-none mt-2">
                                                <button class="btn-wishlist" onclick="moveToWishlist(1)">
                                                    <i class="far fa-heart me-1"></i> Wishlist
                                                </button>
                                                <button class="btn-remove" onclick="removeItem(1)">
                                                    <i class="fas fa-trash me-1"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="cart-item-price">
                                            <span class="current-price">$49.99</span>
                                            <span class="original-price">$69.99</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="cart-item-quantity">
                                            <div class="quantity-selector">
                                                <button class="qty-btn minus" onclick="updateQuantity(1, 'decrease')">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="number" class="qty-input" value="2" min="1" max="10" data-price="49.99">
                                                <button class="qty-btn plus" onclick="updateQuantity(1, 'increase')">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 mt-3 mt-md-0">
                                        <div class="cart-item-subtotal text-center">
                                            <strong class="subtotal-amount">$99.98</strong>
                                        </div>
                                        <div class="cart-item-actions d-none d-md-flex mt-2">
                                            <button class="btn-wishlist" onclick="moveToWishlist(1)">
                                                <i class="far fa-heart"></i>
                                            </button>
                                            <button class="btn-remove" onclick="removeItem(1)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cart-item glass-card p-3 mb-3" data-item-id="2">
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-3">
                                        <div class="cart-item-image">
                                            <img src="https://picsum.photos/150/150?random=51" alt="Product">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-9">
                                        <div class="cart-item-info">
                                            <h6 class="cart-item-title">Wireless Headphones</h6>
                                            <p class="cart-item-meta">
                                                <span class="item-attr">Color: Black</span>
                                            </p>
                                            <div class="cart-item-actions d-md-none mt-2">
                                                <button class="btn-wishlist" onclick="moveToWishlist(2)">
                                                    <i class="far fa-heart me-1"></i> Wishlist
                                                </button>
                                                <button class="btn-remove" onclick="removeItem(2)">
                                                    <i class="fas fa-trash me-1"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="cart-item-price">
                                            <span class="current-price">$149.99</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="cart-item-quantity">
                                            <div class="quantity-selector">
                                                <button class="qty-btn minus" onclick="updateQuantity(2, 'decrease')">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="number" class="qty-input" value="1" min="1" max="10" data-price="149.99">
                                                <button class="qty-btn plus" onclick="updateQuantity(2, 'increase')">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 mt-3 mt-md-0">
                                        <div class="cart-item-subtotal text-center">
                                            <strong class="subtotal-amount">$149.99</strong>
                                        </div>
                                        <div class="cart-item-actions d-none d-md-flex mt-2">
                                            <button class="btn-wishlist" onclick="moveToWishlist(2)">
                                                <i class="far fa-heart"></i>
                                            </button>
                                            <button class="btn-remove" onclick="removeItem(2)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cart-item glass-card p-3 mb-3" data-item-id="3">
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-3">
                                        <div class="cart-item-image">
                                            <img src="https://picsum.photos/150/150?random=52" alt="Product">
                                            <span class="item-badge badge-new">New</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-9">
                                        <div class="cart-item-info">
                                            <h6 class="cart-item-title">Leather Handbag</h6>
                                            <p class="cart-item-meta">
                                                <span class="item-attr">Color: Brown</span>
                                            </p>
                                            <div class="cart-item-actions d-md-none mt-2">
                                                <button class="btn-wishlist" onclick="moveToWishlist(3)">
                                                    <i class="far fa-heart me-1"></i> Wishlist
                                                </button>
                                                <button class="btn-remove" onclick="removeItem(3)">
                                                    <i class="fas fa-trash me-1"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="cart-item-price">
                                            <span class="current-price">$199.99</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="cart-item-quantity">
                                            <div class="quantity-selector">
                                                <button class="qty-btn minus" onclick="updateQuantity(3, 'decrease')">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="number" class="qty-input" value="1" min="1" max="10" data-price="199.99">
                                                <button class="qty-btn plus" onclick="updateQuantity(3, 'increase')">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 mt-3 mt-md-0">
                                        <div class="cart-item-subtotal text-center">
                                            <strong class="subtotal-amount">$199.99</strong>
                                        </div>
                                        <div class="cart-item-actions d-none d-md-flex mt-2">
                                            <button class="btn-wishlist" onclick="moveToWishlist(3)">
                                                <i class="far fa-heart"></i>
                                            </button>
                                            <button class="btn-remove" onclick="removeItem(3)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- End of Cart Item List --}}

                            <div class="cart-actions-footer d-flex justify-content-between flex-wrap gap-3 mt-4">
                                <a href="{{ url('shop') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                                </a>
                                <button class="btn btn-outline-danger" onclick="clearCart()">
                                    <i class="fas fa-trash me-2"></i>Clear Cart
                                </button>
                            </div>
                        </div>

                        <div class="coupon-section glass-card p-4 mt-4">
                            <h5 class="mb-3">
                                <i class="fas fa-tag me-2 text-primary"></i>Have a Coupon Code?
                            </h5>
                            {{-- Coupon form. Use POST method with @csrf in a real app --}}
                            <form class="coupon-form" onsubmit="applyCoupon(event)">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter coupon code" id="couponCode">
                                    <button class="btn btn-primary" type="submit">Apply</button>
                                </div>
                            </form>
                            <div class="applied-coupon mt-3" id="appliedCoupon" style="display: none;">
                                <div class="alert alert-success d-flex justify-content-between align-items-center mb-0">
                                    <span><i class="fas fa-check-circle me-2"></i>Coupon "<strong id="couponName"></strong>" applied!</span>
                                    <button class="btn-close-coupon" onclick="removeCoupon()">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="order-summary glass-card p-4 sticky-summary">
                            <h5 class="summary-title mb-4">Order Summary</h5>

                            <div class="summary-item">
                                <span>Subtotal (<span id="summaryItemCount">4</span> items)</span>
                                <strong id="summarySubtotal">$449.96</strong>
                            </div>

                            <div class="summary-item">
                                <span>Shipping</span>
                                <strong class="text-success" id="summaryShipping">FREE</strong>
                            </div>

                            <div class="summary-item discount-item" id="discountItem" style="display: none;">
                                <span class="text-success">Discount</span>
                                <strong class="text-success" id="summaryDiscount">-$0.00</strong>
                            </div>

                            <div class="summary-item">
                                <span>Tax (10%)</span>
                                <strong id="summaryTax">$45.00</strong>
                            </div>

                            <div class="summary-divider"></div>

                            <div class="summary-total">
                                <span>Total</span>
                                <strong id="summaryTotal">$494.96</strong>
                            </div>

                            <div class="summary-savings" id="summarySavings">
                                <i class="fas fa-piggy-bank me-2"></i>
                                You're saving <strong>$20.00</strong>
                            </div>

                            <a href="{{ url('checkout') }}" class="btn btn-primary w-100 btn-checkout" onclick="proceedToCheckout()">
                                <i class="fas fa-lock me-2"></i>Proceed to Checkout
                            </a>

                            <div class="secure-checkout text-center mt-3">
                                <i class="fas fa-shield-alt me-2"></i>
                                <small>Secure Checkout</small>
                            </div>

                            <div class="accepted-payments mt-4">
                                <p class="text-center mb-2"><small>We Accept:</small></p>
                                <div class="payment-icons d-flex justify-content-center gap-2">
                                    <img src="https://via.placeholder.com/40x25/CCCCCC/666666?text=VISA" alt="Visa">
                                    <img src="https://via.placeholder.com/40x25/CCCCCC/666666?text=MC" alt="Mastercard">
                                    <img src="https://via.placeholder.com/40x25/CCCCCC/666666?text=AMEX" alt="Amex">
                                    <img src="https://via.placeholder.com/40x25/CCCCCC/666666?text=PP" alt="PayPal">
                                </div>
                            </div>

                          
                            <div class="trust-badges mt-4">
                                <div class="trust-item">
                                    <i class="fas fa-truck text-primary"></i>
                                    <span>Free shipping on orders over $50</span>
                                </div>
                                <div class="trust-item">
                                    <i class="fas fa-undo text-primary"></i>
                                    <span>30-day easy returns</span>
                                </div>
                                <div class="trust-item">
                                    <i class="fas fa-shield-alt text-primary"></i>
                                    <span>100% secure payments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="recommended-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-subtitle">Complete Your Look</span>
                <h2 class="section-title">You May Also Like</h2>
            </div>

            <div class="row g-4">
                {{-- Use @foreach($recommendedProducts as $product) here in a dynamic application --}}
             
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-badge badge-hot">Hot</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=60" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product/casual-polo-shirt') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Fashion</span>
                            <h5 class="product-title">Casual Polo Shirt</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span>(89)</span>
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

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-badge badge-sale">-20%</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=61" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product/designer-sunglasses') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Fashion</span>
                            <h5 class="product-title">Designer Sunglasses</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(142)</span>
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

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=62" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product/leather-watch') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Accessories</span>
                            <h5 class="product-title">Leather Watch</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(267)</span>
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

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card">
                        <div class="product-badge badge-new">New</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=63" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product/canvas-sneakers') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Fashion</span>
                            <h5 class="product-title">Canvas Sneakers</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(198)</span>
                            </div>
                            <div class="product-price">
                                <span class="price">$69.99</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Assuming newsletter is handled by the main content structure or is not included globally --}}
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

@section('scripts')
    @parent
    {{-- Note: The original HTML included both cart.js and main.js. --}}
    {{-- Since main.js is in app.blade.php, we only need to include cart.js explicitly if it wasn't in the app layout: --}}
    {{-- <script src="{{ asset('assets/js/cart.js') }}"></script> --}}

    <script>
        // Placeholder JavaScript functions for cart actions (originally in cart.js)
        function updateQuantity(itemId, action) {
            console.log(`Item ${itemId} quantity updated via ${action}`);
            // This is where AJAX logic would update the server cart data
            // Then recalculateSummary();
        }

        function removeItem(itemId) {
            console.log(`Item ${itemId} removed.`);
            // This is where AJAX logic would update the server cart data
            // Then recalculateSummary();
        }
        
        function moveToWishlist(itemId) {
            console.log(`Item ${itemId} moved to wishlist.`);
            // This is where AJAX logic would move the item
            // Then recalculateSummary();
        }

        function clearCart() {
            console.log('Cart cleared.');
            // This is where AJAX logic would clear the cart
            // Then hide cartContent and show emptyCartState
        }
        
        function applyCoupon(e) {
            e.preventDefault();
            const code = document.getElementById('couponCode').value;
            console.log(`Attempting to apply coupon: ${code}`);
            // This is where AJAX logic would validate and apply the coupon
            document.getElementById('couponName').textContent = code;
            document.getElementById('discountItem').style.display = 'flex';
            document.getElementById('appliedCoupon').style.display = 'block';
            // Then recalculateSummary();
        }

        function removeCoupon() {
            console.log('Coupon removed.');
            document.getElementById('discountItem').style.display = 'none';
            document.getElementById('appliedCoupon').style.display = 'none';
            // Then recalculateSummary();
        }

        function proceedToCheckout() {
             console.log('Redirecting to checkout...');
             // In a real app, the <a> tag handles navigation to {{ url('checkout') }}
        }
    </script>
@endsection