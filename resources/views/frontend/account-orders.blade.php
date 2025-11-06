@extends('layouts.app')

@section('title', 'My Orders - Elegant Shop')

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
                            <li class="breadcrumb-item active" aria-current="page">My Orders</li>
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
                
                {{-- ===== ORDERS CONTENT ===== --}}
                <div class="col-lg-9">
                    <div class="account-content glass-card">
                        <h3>My Orders</h3>
                        
                        <div class="table-responsive">
                            <table class="table table-hover align-middle orders-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Items</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Use @foreach($orders as $order) here in a dynamic application --}}
                                    <tr>
                                        <th scope="row">#E8172</th>
                                        <td>Nov 03, 2025</td>
                                        <td>2</td>
                                        <td>$120.50</td>
                                        <td><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Delivered</span></td>
                                        <td><a href="{{ url('account/orders/E8172') }}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#E8171</th>
                                        <td>Oct 28, 2025</td>
                                        <td>1</td>
                                        <td>$89.99</td>
                                        <td><span class="badge bg-info-subtle text-info-emphasis rounded-pill">Shipped</span></td>
                                        <td><a href="{{ url('account/orders/E8171') }}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#E8170</th>
                                        <td>Oct 25, 2025</td>
                                        <td>5</td>
                                        <td>$250.00</td>
                                        <td><span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">Cancelled</span></td>
                                        <td><a href="{{ url('account/orders/E8170') }}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#E8169</th>
                                        <td>Oct 22, 2025</td>
                                        <td>3</td>
                                        <td>$45.00</td>
                                        <td><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Delivered</span></td>
                                        <td><a href="{{ url('account/orders/E8169') }}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                     <tr>
                                        <th scope="row">#E8168</th>
                                        <td>Oct 19, 2025</td>
                                        <td>1</td>
                                        <td>$199.99</td>
                                        <td><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Pending</span></td>
                                        <td><a href="{{ url('account/orders/E8168') }}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                    {{-- ... more orders will be added here via loop ... --}}
                                </tbody>
                            </table>
                        </div>
                        
                        {{-- Pagination (Placeholder for Laravel Pagination Links) --}}
                        <nav aria-label="Page navigation" class="mt-4 d-flex justify-content-center">
                            {{-- This section should be replaced by: {{ $orders->links() }} --}}
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-arrow-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-arrow-right"></i></a></li>
                            </ul>
                        </nav>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- No custom JS needed here --}}