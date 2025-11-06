@extends('layouts.app')

{{-- Assume $order variable is passed from the controller, e.g., $order->id = 'E8172' --}}
@section('title', 'Order Details - Elegant Shop') 

{{-- No @section('styles') needed as account.css is in app.blade.php --}}

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Order Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('account/dashboard') }}">Account</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('account/orders') }}">My Orders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order #{{ $order->id ?? 'E8172' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="account-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="account-sidebar glass-card">
                        {{-- User Profile Data (Placeholder) --}}
                        <div class="user-profile">
                            <img src="https://picsum.photos/100/100?random=1" alt="User Avatar" class="user-avatar">
                            <h5 class="user-name">{{ Auth::user()->name ?? 'Md. Shahidul Islam' }}</h5>
                            <p class="user-email">{{ Auth::user()->email ?? 'shahidul@example.com' }}</p>
                        </div>
                        {{-- Account Navigation (Highlighting Orders section) --}}
                        <nav class="account-nav nav flex-column">
                            <a class="nav-link" href="{{ url('account/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                            <a class="nav-link active" href="{{ url('account/orders') }}"><i class="fas fa-box-open"></i> My Orders</a>
                            <a class="nav-link" href="{{ url('account/profile') }}"><i class="fas fa-user-edit"></i> Profile Settings</a>
                            <a class="nav-link" href="{{ url('account/addresses') }}"><i class="fas fa-map-marker-alt"></i> My Addresses</a>
                            <a class="nav-link" href="{{ url('wishlist') }}"><i class="fas fa-heart"></i> Wishlist</a>
                            <a class="nav-link" href="{{ url('support-tickets') }}"><i class="fas fa-headset"></i> Support Tickets</a>
                            <a class="nav-link logout" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </nav>
                    </div>
                </div>
                
                <div class="col-lg-9">
                    <div class="account-content glass-card">
                        <div class="account-content-header">
                            <h3>Order #{{ $order->id ?? 'E8172' }}</h3>
                            {{-- Dynamic Status Badge --}}
                            <span class="badge bg-success-subtle text-success-emphasis rounded-pill">{{ $order->status ?? 'Delivered' }}</span>
                        </div>
                        
                        <p class="text-muted">Order placed on {{ $order->date ?? 'November 03, 2025' }}</p>

                        {{-- Order Tracking Timeline (Dynamic based on order status) --}}
                        <div class="order-tracker glass-card p-4">
                            {{-- The 'completed' class would be dynamically applied --}}
                            <div class="order-tracker-step {{ ($order->status ?? 'Delivered') == 'Delivered' ? 'completed' : '' }}">
                                <div class="order-tracker-step-icon"><i class="fas fa-check"></i></div>
                                <div class="order-tracker-step-label">Order Placed</div>
                            </div>
                            <div class="order-tracker-step {{ ($order->status ?? 'Delivered') == 'Delivered' ? 'completed' : '' }}">
                                <div class="order-tracker-step-icon"><i class="fas fa-box"></i></div>
                                <div class="order-tracker-step-label">Processing</div>
                            </div>
                            <div class="order-tracker-step {{ ($order->status ?? 'Delivered') == 'Delivered' ? 'completed' : '' }}">
                                <div class="order-tracker-step-icon"><i class="fas fa-truck"></i></div>
                                <div class="order-tracker-step-label">Shipped</div>
                            </div>
                            <div class="order-tracker-step {{ ($order->status ?? 'Delivered') == 'Delivered' ? 'completed' : '' }}">
                                <div class="order-tracker-step-icon"><i class="fas fa-home"></i></div>
                                <div class="order-tracker-step-label">Delivered</div>
                            </div>
                        </div>

                        {{-- Shipping and Billing Addresses --}}
                        <div class="row g-4 my-4">
                            <div class="col-md-6">
                                <div class="address-card glass-card">
                                    <h5>Shipping Address</h5>
                                    <p>
                                        {{-- Placeholder for dynamic data --}}
                                        <strong>{{ $order->shipping_address->name ?? 'Md. Shahidul Islam' }}</strong><br>
                                        {{ $order->shipping_address->line1 ?? '456 Elegance Ave, Suite 100' }}<br>
                                        {{ $order->shipping_address->city_state_zip ?? 'Los Angeles, CA 90001' }}<br>
                                        {{ $order->shipping_address->country ?? 'United States' }}<br>
                                        <i class="fas fa-phone-alt me-2 mt-2"></i> {{ $order->shipping_address->phone ?? '+1 987 654 3210' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="address-card glass-card">
                                    <h5>Billing Address</h5>
                                    <p>
                                        {{-- Placeholder for dynamic data --}}
                                        <strong>{{ $order->billing_address->name ?? 'Md. Shahidul Islam' }}</strong><br>
                                        {{ $order->billing_address->line1 ?? '123 Fashion Street, Apt 4B' }}<br>
                                        {{ $order->billing_address->city_state_zip ?? 'New York, NY 10001' }}<br>
                                        {{ $order->billing_address->country ?? 'United States' }}<br>
                                        <i class="fas fa-phone-alt me-2 mt-2"></i> {{ $order->billing_address->phone ?? '+1 234 567 8900' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Order Items Table --}}
                        <h4 class="h5 mb-3">Order Items</h4>
                        <div class="table-responsive">
                            <table class="table align-middle order-items-table">
                                <tbody>
                                    {{-- Use @foreach($order->items as $item) in a real application --}}
                                    <tr>
                                        <td><img src="https://picsum.photos/100/100?random=10" alt="Product"></td>
                                        <td>
                                            <a href="{{ url('product/slug') }}" class="product-title">Elegant Summer Dress</a>
                                            <div class="text-muted small">Qty: 1</div>
                                        </td>
                                        <td class="text-end fw-bold">$89.99</td>
                                    </tr>
                                    <tr>
                                        <td><img src="https://picsum.photos/100/100?random=16" alt="Product"></td>
                                        <td>
                                            <a href="{{ url('product/slug') }}" class="product-title">Scented Candle Set</a>
                                            <div class="text-muted small">Qty: 1</div>
                                        </td>
                                        <td class="text-end fw-bold">$30.51</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        {{-- Order Summary --}}
                        <div class="row justify-content-end mt-4">
                            <div class="col-md-6">
                                <h4 class="h5 mb-3">Order Summary</h4>
                                <ul class="order-summary">
                                    <li><span>Subtotal</span> <span>${{ number_format($order->subtotal ?? 120.50, 2) }}</span></li>
                                    <li><span>Shipping</span> <span>${{ number_format($order->shipping ?? 0.00, 2) }}</span></li>
                                    <li><span>Tax</span> <span>${{ number_format($order->tax ?? 10.00, 2) }}</span></li>
                                    <li class="total"><span>Total</span> <span>${{ number_format($order->total ?? 130.50, 2) }}</span></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- No custom JS needed here, relying on app.blade.php for common scripts --}}