@extends('layouts.app')

{{-- Assume $order variable is passed from the controller --}}
@section('title', 'Order Placed Successfully! - Elegant Shop')

@section('content')

    <!-- ===== SUCCESS SECTION ===== -->
    <section class="success-section py-5">
        <div class="container">
            <div class="success-card glass-card">
                {{-- Confetti container is filled via JavaScript --}}
                <div class="confetti-container" id="confettiContainer"></div>
                
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>

                <h1 class="success-title">Order Placed Successfully!</h1>
                <p class="success-message">
                    Thank you for your purchase. Your order has been received and is being processed.
                </p>

                <div class="email-notification">
                    <i class="fas fa-envelope-circle-check"></i>
                    <span>Confirmation email sent to your inbox</span>
                </div>

                <div class="order-info-box">
                    <div class="order-number">Your Order Number</div>
                    {{-- Placeholder for dynamic Order ID --}}
                    <div class="order-id">#{{ $order->number ?? 'ORD-2024-8A3F9B' }}</div> 

                    <div class="order-details">
                        <div class="detail-item">
                            <div class="detail-label">Order Date</div>
                            <div class="detail-value">{{ $order->date ?? 'Nov 4, 2025' }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Total Amount</div>
                            <div class="detail-value">${{ number_format($order->total ?? 347.96, 2) }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Payment Method</div>
                            <div class="detail-value">{{ $order->payment_method ?? 'Credit Card' }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Est. Delivery</div>
                            <div class="detail-value">{{ $order->estimated_delivery ?? 'Nov 8-10' }}</div>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="{{ url('account/orders/' . ($order->id ?? 'A3F9B')) }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-receipt me-2"></i> View Order Details
                    </a>
                    <a href="{{ url('shop') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-shopping-bag me-2"></i> Continue Shopping
                    </a>
                </div>

                <div class="next-steps">
                    <h5><i class="fas fa-info-circle me-2"></i> What Happens Next?</h5>
                    <ul class="steps-list">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>You'll receive an order confirmation email with your order details</span>
                        </li>
                        <li>
                            <i class="fas fa-box"></i>
                            <span>We'll send you a shipping confirmation with tracking information once your order ships</span>
                        </li>
                        <li>
                            <i class="fas fa-truck"></i>
                            <span>Track your order status anytime from your account dashboard</span>
                        </li>
                        <li>
                            <i class="fas fa-headset"></i>
                            <span>Need help? Our customer support team is available 24/7</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    @parent
    <script>
        // Confetti animation script (Copied from original HTML)
        function createConfetti() {
            const container = document.getElementById('confettiContainer');
            const colors = ['#9370DB', '#DDA0DD', '#FFB6C1', '#87CEEB', '#98FB98', '#FFD700'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + '%';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDelay = Math.random() * 2 + 's';
                confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
                container.appendChild(confetti);
            }
        }

        // Trigger confetti on page load and clear cart badge
        window.addEventListener('load', () => {
            createConfetti();
            
            // Assuming your cart badge uses the class/selector below:
            const cartBadge = document.querySelector('.cart-badge');
            if (cartBadge) {
                cartBadge.textContent = '0';
            }
        });
    </script>
@endsection