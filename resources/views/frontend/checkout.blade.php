@extends('layouts.app')

@section('title', 'Checkout - Elegant Shop')

{{-- No @section('styles') needed as all specific CSS is in app.blade.php --}}

@section('content')

    <section class="breadcrumb-section py-4">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('cart') }}">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="checkout-section py-5">
        <div class="container">
            <div class="checkout-header text-center mb-5">
                <h1 class="page-title mb-2">Secure Checkout</h1>
                <p class="page-subtitle">Complete your order in just a few steps</p>
            </div>

            <div class="checkout-steps mb-5">
                <div class="step active" data-step="1">
                    <div class="step-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="step-label">Information</div>
                </div>
                <div class="step-line active"></div>
                <div class="step" data-step="2">
                    <div class="step-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="step-label">Shipping</div>
                </div>
                <div class="step-line"></div>
                <div class="step" data-step="3">
                    <div class="step-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="step-label">Payment</div>
                </div>
                <div class="step-line"></div>
                <div class="step" data-step="4">
                    <div class="step-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="step-label">Review</div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-8">
                    {{-- The form wraps all steps --}}
                    <form id="checkoutForm" class="checkout-form" method="POST" action="{{ url('order/place') }}">
                        @csrf
                        
                        <div class="checkout-step-content active" id="step1">
                            <div class="step-card glass-card p-4 mb-4">
                                <h5 class="step-title mb-4">
                                    <i class="fas fa-user me-2 text-primary"></i>Customer Information
                                </h5>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="hasAccount">
                                    <label class="form-check-label" for="hasAccount">
                                        Already have an account? <a href="{{ url('login') }}" class="text-primary">Sign in</a>
                                    </label>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="firstName" name="first_name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="lastName" name="last_name" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                        <small class="form-text text-muted">Order confirmation will be sent to this email</small>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" id="phone" name="phone" required>
                                    </div>
                                </div>

                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        Keep me updated on exclusive offers and promotions
                                    </label>
                                </div>
                            </div>

                            <div class="step-actions">
                                <button type="button" class="btn btn-primary btn-lg" onclick="nextStep(2)">
                                    Continue to Shipping <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <div class="checkout-step-content" id="step2">
                            <div class="step-card glass-card p-4 mb-4">
                                <h5 class="step-title mb-4">
                                    <i class="fas fa-map-marker-alt me-2 text-primary"></i>Shipping Address
                                </h5>

                                {{-- Saved Addresses (Dynamic placeholder, will require loops for real data) --}}
                                <div class="saved-addresses mb-4" id="savedAddresses">
                                    <div class="saved-address-item" onclick="selectAddress(this)">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="savedAddress" id="address1" value="1" checked>
                                            <label class="form-check-label w-100" for="address1">
                                                <div class="address-details">
                                                    <strong>Home</strong>
                                                    <p class="mb-0">123 Fashion Street, Apt 4B<br>New York, NY 10001<br>United States</p>
                                                </div>
                                            </label>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="editAddress(event)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>

                                    <div class="saved-address-item" onclick="selectAddress(this)">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="savedAddress" id="address2" value="2">
                                            <label class="form-check-label w-100" for="address2">
                                                <div class="address-details">
                                                    <strong>Office</strong>
                                                    <p class="mb-0">456 Business Ave, Suite 200<br>New York, NY 10002<br>United States</p>
                                                </div>
                                            </label>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="editAddress(event)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-outline-primary mb-4" onclick="toggleNewAddress()">
                                    <i class="fas fa-plus me-2"></i>Add New Address
                                </button>

                                <div id="newAddressForm" style="display: none;">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="address1Input" name="address_line1">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Address Line 2</label>
                                            <input type="text" class="form-control" id="address2Input" name="address_line2" placeholder="Apartment, suite, etc. (optional)">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">City <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="city" name="city">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">State/Province <span class="text-danger">*</span></label>
                                            <select class="form-select" id="state" name="state">
                                                <option value="">Select State</option>
                                                <option value="NY">New York</option>
                                                <option value="CA">California</option>
                                                <option value="TX">Texas</option>
                                                <option value="FL">Florida</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">ZIP/Postal Code <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="zip" name="zip">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Country <span class="text-danger">*</span></label>
                                            <select class="form-select" id="country" name="country">
                                                <option value="US" selected>United States</option>
                                                <option value="CA">Canada</option>
                                                <option value="UK">United Kingdom</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" id="saveAddress" name="save_address">
                                        <label class="form-check-label" for="saveAddress">
                                            Save this address for future orders
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="step-card glass-card p-4 mb-4">
                                <h5 class="step-title mb-4">
                                    <i class="fas fa-truck me-2 text-primary"></i>Shipping Method
                                </h5>

                                <div class="shipping-methods">
                                    <div class="shipping-method-item" onclick="selectShipping(this)">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="shippingMethod" id="standard" value="standard" checked data-price="0">
                                            <label class="form-check-label w-100" for="standard">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <strong>Standard Shipping</strong>
                                                        <p class="mb-0 text-muted small">5-7 business days</p>
                                                    </div>
                                                    <strong class="text-success">FREE</strong>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="shipping-method-item" onclick="selectShipping(this)">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="shippingMethod" id="express" value="express" data-price="9.99">
                                            <label class="form-check-label w-100" for="express">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <strong>Express Shipping</strong>
                                                        <p class="mb-0 text-muted small">2-3 business days</p>
                                                    </div>
                                                    <strong>$9.99</strong>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="shipping-method-item" onclick="selectShipping(this)">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="shippingMethod" id="overnight" value="overnight" data-price="19.99">
                                            <label class="form-check-label w-100" for="overnight">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <strong>Next Day Delivery</strong>
                                                        <p class="mb-0 text-muted small">Order before 2 PM</p>
                                                    </div>
                                                    <strong>$19.99</strong>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="step-actions d-flex gap-3">
                                <button type="button" class="btn btn-outline-primary btn-lg" onclick="prevStep(1)">
                                    <i class="fas fa-arrow-left me-2"></i>Back
                                </button>
                                <button type="button" class="btn btn-primary btn-lg flex-grow-1" onclick="nextStep(3)">
                                    Continue to Payment <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <div class="checkout-step-content" id="step3">
                            <div class="step-card glass-card p-4 mb-4">
                                <h5 class="step-title mb-4">
                                    <i class="fas fa-credit-card me-2 text-primary"></i>Payment Method
                                </h5>

                                <div class="payment-methods">
                                    <div class="payment-method-item active" onclick="selectPayment(this, 'card')">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" value="card" checked>
                                            <label class="form-check-label" for="creditCard">
                                                <i class="fas fa-credit-card me-2"></i>Credit/Debit Card
                                            </label>
                                        </div>
                                        <div class="payment-icons">
                                            <img src="https://via.placeholder.com/40x25/CCCCCC/666666?text=VISA" alt="Visa">
                                            <img src="https://via.placeholder.com/40x25/CCCCCC/666666?text=MC" alt="Mastercard">
                                            <img src="https://via.placeholder.com/40x25/CCCCCC/666666?text=AMEX" alt="Amex">
                                        </div>
                                    </div>

                                    <div class="payment-method-item" onclick="selectPayment(this, 'paypal')">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="paypal">
                                            <label class="form-check-label" for="paypal">
                                                <i class="fab fa-paypal me-2"></i>PayPal
                                            </label>
                                        </div>
                                    </div>

                                    <div class="payment-method-item" onclick="selectPayment(this, 'cod')">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paymentMethod" id="cod" value="cod">
                                            <label class="form-check-label" for="cod">
                                                <i class="fas fa-money-bill-wave me-2"></i>Cash on Delivery
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="cardDetailsForm" class="payment-details-form">
                                    <div class="row g-3 mt-3">
                                        <div class="col-12">
                                            <label class="form-label">Card Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19" name="card_number">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Cardholder Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="cardName" placeholder="John Doe" name="card_name">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Expiry Date <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="cardExpiry" placeholder="MM/YY" maxlength="5" name="card_expiry">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">CVV <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="cardCVV" placeholder="123" maxlength="4" name="card_cvv">
                                        </div>
                                    </div>

                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" id="saveCard" name="save_card">
                                        <label class="form-check-label" for="saveCard">
                                            Save card for future purchases
                                        </label>
                                    </div>
                                </div>

                                <div id="paypalInfo" class="payment-details-form" style="display: none;">
                                    <div class="alert alert-info mt-3">
                                        <i class="fab fa-paypal me-2"></i>
                                        You will be redirected to PayPal to complete your purchase securely.
                                    </div>
                                </div>

                                <div id="codInfo" class="payment-details-form" style="display: none;">
                                    <div class="alert alert-warning mt-3">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Pay with cash when your order is delivered. A small COD fee may apply.
                                    </div>
                                </div>
                            </div>

                            <div class="step-actions d-flex gap-3">
                                <button type="button" class="btn btn-outline-primary btn-lg" onclick="prevStep(2)">
                                    <i class="fas fa-arrow-left me-2"></i>Back
                                </button>
                                <button type="button" class="btn btn-primary btn-lg flex-grow-1" onclick="nextStep(4)">
                                    Review Order <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <div class="checkout-step-content" id="step4">
                            <div class="step-card glass-card p-4 mb-4">
                                <h5 class="step-title mb-4">
                                    <i class="fas fa-check-circle me-2 text-primary"></i>Review Your Order
                                </h5>

                                <div class="review-section mb-4">
                                    <h6 class="review-section-title">Order Items</h6>
                                    <div class="review-items">
                                        {{-- Use @foreach ($cartItems as $item) here --}}
                                        <div class="review-item">
                                            <img src="https://picsum.photos/80/80?random=50" alt="Product">
                                            <div class="review-item-details">
                                                <strong>Premium Cotton T-Shirt</strong>
                                                <p class="mb-0 text-muted small">Color: Black | Size: M | Qty: 2</p>
                                            </div>
                                            <strong>$99.98</strong>
                                        </div>
                                        <div class="review-item">
                                            <img src="https://picsum.photos/80/80?random=51" alt="Product">
                                            <div class="review-item-details">
                                                <strong>Wireless Headphones</strong>
                                                <p class="mb-0 text-muted small">Color: Black | Qty: 1</p>
                                            </div>
                                            <strong>$149.99</strong>
                                        </div>
                                        <div class="review-item">
                                            <img src="https://picsum.photos/80/80?random=52" alt="Product">
                                            <div class="review-item-details">
                                                <strong>Leather Handbag</strong>
                                                <p class="mb-0 text-muted small">Color: Brown | Qty: 1</p>
                                            </div>
                                            <strong>$199.99</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="review-section mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="review-section-title mb-0">Shipping Address</h6>
                                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="prevStep(2)">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                    </div>
                                    <div class="review-address">
                                        <p class="mb-0">
                                            <strong>John Doe</strong><br>
                                            123 Fashion Street, Apt 4B<br>
                                            New York, NY 10001<br>
                                            United States
                                        </p>
                                    </div>
                                </div>

                                <div class="review-section mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="review-section-title mb-0">Shipping Method</h6>
                                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="prevStep(2)">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                    </div>
                                    <p class="mb-0">
                                        <strong>Standard Shipping</strong> - FREE<br>
                                        <span class="text-muted small">Estimated delivery: 5-7 business days</span>
                                    </p>
                                </div>

                                <div class="review-section mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="review-section-title mb-0">Payment Method</h6>
                                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="prevStep(3)">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                    </div>
                                    <p class="mb-0">
                                        <i class="fas fa-credit-card me-2"></i>
                                        <strong>Credit Card</strong> ending in ****3456
                                    </p>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                    <label class="form-check-label" for="agreeTerms">
                                        I agree to the <a href="{{ url('terms-conditions') }}" target="_blank">Terms & Conditions</a> and <a href="{{ url('privacy-policy') }}" target="_blank">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>

                            <div class="step-actions d-flex gap-3">
                                <button type="button" class="btn btn-outline-primary btn-lg" onclick="prevStep(3)">
                                    <i class="fas fa-arrow-left me-2"></i>Back
                                </button>
                                <button type="submit" class="btn btn-success btn-lg flex-grow-1" id="placeOrderBtn">
                                    <i class="fas fa-lock me-2"></i>Place Order
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="order-summary-sidebar glass-card p-4 sticky-summary">
                        <h5 class="summary-title mb-4">Order Summary</h5>

                        <div class="summary-items mb-4">
                            <div class="summary-item-row">
                                <img src="https://picsum.photos/60/60?random=50" alt="Product">
                                <div class="summary-item-info">
                                    <strong>Premium Cotton T-Shirt</strong>
                                    <p class="mb-0 text-muted small">Qty: 2</p>
                                </div>
                                <strong>$99.98</strong>
                            </div>
                            <div class="summary-item-row">
                                <img src="https://picsum.photos/60/60?random=51" alt="Product">
                                <div class="summary-item-info">
                                    <strong>Wireless Headphones</strong>
                                    <p class="mb-0 text-muted small">Qty: 1</p>
                                </div>
                                <strong>$149.99</strong>
                            </div>
                            <div class="summary-item-row">
                                <img src="https://picsum.photos/60/60?random=52" alt="Product">
                                <div class="summary-item-info">
                                    <strong>Leather Handbag</strong>
                                    <p class="mb-0 text-muted small">Qty: 1</p>
                                </div>
                                <strong>$199.99</strong>
                            </div>
                        </div>

                        <div class="summary-divider"></div>

                        <div class="summary-breakdown">
                            <div class="summary-row">
                                <span>Subtotal</span>
                                <strong id="summarySubtotal">$449.96</strong>
                            </div>
                            <div class="summary-row">
                                <span>Shipping</span>
                                <strong id="summaryShipping" class="text-success">FREE</strong>
                            </div>
                            <div class="summary-row">
                                <span>Tax (10%)</span>
                                <strong id="summaryTax">$45.00</strong>
                            </div>
                            <div class="summary-row discount-row" id="discountRow" style="display: none;">
                                <span class="text-success">Discount</span>
                                <strong class="text-success" id="summaryDiscount">-$0.00</strong>
                            </div>
                        </div>

                        <div class="summary-divider"></div>

                        <div class="summary-total">
                            <span>Total</span>
                            <strong id="summaryTotal">$494.96</strong>
                        </div>

                        <div class="trust-badges-checkout mt-4">
                            <div class="trust-badge-item">
                                <i class="fas fa-shield-alt text-success"></i>
                                <small>Secure Checkout</small>
                            </div>
                            <div class="trust-badge-item">
                                <i class="fas fa-lock text-primary"></i>
                                <small>SSL Encrypted</small>
                            </div>
                            <div class="trust-badge-item">
                                <i class="fas fa-undo text-info"></i>
                                <small>Easy Returns</small>
                            </div>
                        </div>

                        <div class="checkout-support mt-4">
                            <div class="support-card">
                                <i class="fas fa-headset"></i>
                                <div>
                                    <strong>Need Help?</strong>
                                    <p class="mb-0 small">Call us: +1 234 567 8900</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

