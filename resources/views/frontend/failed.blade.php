@extends('layouts.app')

{{-- Assume $order and $error are passed from the controller --}}
@section('title', 'Payment Failed - Elegant Shop')

@section('content')

    <section class="failed-section py-5">
        <div class="container">
            <div class="failed-card glass-card text-center p-5">
                <div class="failed-icon">
                    <i class="fas fa-times"></i>
                </div>

                <h1 class="failed-title">Payment Failed</h1>
                <p class="failed-message">
                    Unfortunately, we couldn't process your payment. Don't worry, no charges were made to your account.
                </p>

                <div class="error-box my-4">
                    <div class="error-code">Error Code: {{ $error->code ?? 'PAYMENT_DECLINED_001' }}</div>
                    <p class="error-message">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $error->message ?? 'Your payment was declined by your card issuer.' }}
                    </p>
                </div>

                <div class="alert alert-info d-flex align-items-center justify-content-center my-4">
                    <i class="fas fa-info-circle me-2"></i>
                    <span>Your cart items are still saved. You can try again when ready.</span>
                </div>

                {{-- Order Summary --}}
                <div class="order-summary p-3 my-4">
                    <h6><i class="fas fa-receipt me-2"></i>Order Summary</h6>
                    <div class="summary-row d-flex justify-content-between">
                        <span class="label">Subtotal:</span>
                        <span class="value">${{ number_format($order->subtotal ?? 319.97, 2) }}</span>
                    </div>
                    <div class="summary-row d-flex justify-content-between">
                        <span class="label">Shipping:</span>
                        <span class="value">${{ number_format($order->shipping ?? 15.00, 2) }}</span>
                    </div>
                    <div class="summary-row d-flex justify-content-between">
                        <span class="label">Tax:</span>
                        <span class="value">${{ number_format($order->tax ?? 12.99, 2) }}</span>
                    </div>
                    <div class="summary-row d-flex justify-content-between total-row">
                        <span class="label">Total:</span>
                        <span class="value">${{ number_format($order->total ?? 347.96, 2) }}</span>
                    </div>
                </div>

                {{-- Troubleshooting Guide --}}
                <div class="troubleshooting mt-5 mb-4 text-start">
                    <h5>
                        <i class="fas fa-lightbulb me-2"></i>
                        Common Reasons for Payment Failure
                    </h5>
                    <ul class="reasons-list list-unstyled">
                        <li>
                            <i class="fas fa-circle small me-2"></i>
                            <span>Insufficient funds in your account</span>
                        </li>
                        <li>
                            <i class="fas fa-circle small me-2"></i>
                            <span>Incorrect card details (number, CVV, or expiration date)</span>
                        </li>
                        <li>
                            <i class="fas fa-circle small me-2"></i>
                            <span>Card has expired or been cancelled</span>
                        </li>
                        <li>
                            <i class="fas fa-circle small me-2"></i>
                            <span>Billing address doesn't match card records</span>
                        </li>
                        <li>
                            <i class="fas fa-circle small me-2"></i>
                            <span>Daily transaction limit exceeded</span>
                        </li>
                        <li>
                            <i class="fas fa-circle small me-2"></i>
                            <span>Card not enabled for online transactions</span>
                        </li>
                    </ul>
                </div>

                {{-- Action Buttons --}}
                <div class="action-buttons d-flex justify-content-center gap-3 mt-4">
                    <a href="{{ url('checkout') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-redo me-2"></i> Try Again
                    </a>
                    <a href="{{ url('cart') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-shopping-cart me-2"></i> Back to Cart
                    </a>
                </div>

                {{-- Help Section --}}
                <div class="help-section mt-5">
                    <h5>Need Help?</h5>
                    <div class="help-options d-flex justify-content-center gap-3">
                        <a href="{{ url('support-tickets') }}" class="help-option glass-card p-3 text-decoration-none">
                            <i class="fas fa-headset text-primary"></i>
                            <h6>Contact Support</h6>
                            <p class="mb-0 small text-muted">Get help from our team</p>
                        </a>
                        <a href="{{ url('faq') }}" class="help-option glass-card p-3 text-decoration-none">
                            <i class="fas fa-question-circle text-primary"></i>
                            <h6>Payment FAQ</h6>
                            <p class="mb-0 small text-muted">Find answers quickly</p>
                        </a>
                        <a href="tel:+12345678900" class="help-option glass-card p-3 text-decoration-none">
                            <i class="fas fa-phone-alt text-primary"></i>
                            <h6>Call Us</h6>
                            <p class="mb-0 small text-muted">+1 234 567 8900</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- No custom JS needed here --}}