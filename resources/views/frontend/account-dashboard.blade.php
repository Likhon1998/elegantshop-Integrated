@extends('layouts.app')

@section('title', 'My Account - Elegant Shop')

{{-- No @section('styles') needed since all specific CSS (style.css, account.css) is in app.blade.php --}}

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">My Account</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Account Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="account-section">
        <div class="container">
            <div class="row">
                {{-- ===== SIDEBAR ===== --}}
                <div class="col-lg-3">
                    <div class="account-sidebar glass-card">
                        {{-- User Profile Data (Placeholder for Dynamic Data) --}}
                        <div class="user-profile">
                            <img src="https://picsum.photos/100/100?random=1" alt="User Avatar" class="user-avatar">
                            {{-- Placeholder: Use Auth facade to display user info --}}
                            <h5 class="user-name">{{ Auth::user()->name ?? 'Md. Shahidul Islam' }}</h5>
                            <p class="user-email">{{ Auth::user()->email ?? 'shahidul@example.com' }}</p>
                        </div>
                        {{-- Account Navigation (Uses 'account/route' paths) --}}
                        <nav class="account-nav nav flex-column">
                            <a class="nav-link active" href="{{ url('account/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                            <a class="nav-link" href="{{ url('account/orders') }}"><i class="fas fa-box-open"></i> My Orders</a>
                            <a class="nav-link" href="{{ url('account/profile') }}"><i class="fas fa-user-edit"></i> Profile Settings</a>
                            <a class="nav-link" href="{{ url('account/addresses') }}"><i class="fas fa-map-marker-alt"></i> My Addresses</a>
                            <a class="nav-link" href="{{ url('wishlist') }}"><i class="fas fa-heart"></i> Wishlist</a>
                            <a class="nav-link" href="{{ url('support-tickets') }}"><i class="fas fa-headset"></i> Support Tickets</a>
                            {{-- Logout link --}}
                            <a class="nav-link logout" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </nav>
                    </div>
                </div>
                
                {{-- ===== DASHBOARD CONTENT ===== --}}
                <div class="col-lg-9">
                    <div class="account-content glass-card">
                        <h3>Dashboard</h3>
                        <p class="mb-4">Hello <strong class="text-primary">{{ Auth::user()->name ?? 'Md. Shahidul Islam' }}</strong>! From your dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                        
                        {{-- Stats Cards (Placeholder for Dynamic Data) --}}
                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <div class="dashboard-card bg-card-1">
                                    <div class="card-icon"><i class="fas fa-box-open"></i></div>
                                    <div class="card-title">Total Orders</div>
                                    <div class="card-value">{{ $totalOrders ?? '15' }}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-card bg-card-2">
                                    <div class="card-icon"><i class="fas fa-heart"></i></div>
                                    <div class="card-title">Wishlist Items</div>
                                    <div class="card-value">{{ $wishlistCount ?? '3' }}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-card bg-card-3">
                                    <div class="card-icon"><i class="fas fa-headset"></i></div>
                                    <div class="card-title">Support Tickets</div>
                                    <div class="card-value">{{ $activeTickets ?? '2' }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <h4 class="h5 mb-3">Recent Orders</h4>
                        {{-- Recent Orders Table (Placeholder for Dynamic Data/Loop) --}}
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Example row. In a real application, you would use @foreach($recentOrders as $order) --}}
                                    <tr>
                                        <th scope="row">#E8172</th>
                                        <td>Nov 03, 2025</td>
                                        <td>$120.50</td>
                                        <td><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Delivered</span></td>
                                        <td><a href="{{ url('account/orders/E8172') }}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#E8171</th>
                                        <td>Oct 28, 2025</td>
                                        <td>$89.99</td>
                                        <td><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Pending</span></td>
                                        <td><a href="{{ url('account/orders/E8171') }}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#E8170</th>
                                        <td>Oct 25, 2025</td>
                                        <td>$250.00</td>
                                        <td><span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">Cancelled</span></td>
                                        <td><a href="{{ url('account/orders/E8170') }}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- No custom JS needed here since the scroll-to-top logic is now ideally handled by a script linked in app.blade.php (assets/js/main.js or similar) --}}