@extends('layouts.app')

@section('title', 'Support Tickets - Elegant Shop')

{{-- No @section('styles') needed as account.css is in app.blade.php --}}

@section('content')

    <!-- ===== BREADCRUMB / PAGE HEADER (Manually added since it was commented out in the HTML) ===== -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">My Account</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Support Tickets</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== ACCOUNT CONTENT SECTION (Support Tickets) ===== -->
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
                        {{-- Account Navigation (Highlighting Support Tickets) --}}
                        <nav class="account-nav nav flex-column">
                            <a class="nav-link" href="{{ url('account/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                            <a class="nav-link" href="{{ url('account/orders') }}"><i class="fas fa-box-open"></i> My Orders</a>
                            <a class="nav-link" href="{{ url('account/profile') }}"><i class="fas fa-user-edit"></i> Profile Settings</a>
                            <a class="nav-link" href="{{ url('account/addresses') }}"><i class="fas fa-map-marker-alt"></i> My Addresses</a>
                            <a class="nav-link" href="{{ url('wishlist') }}"><i class="fas fa-heart"></i> Wishlist</a>
                            <a class="nav-link active" href="{{ url('support-tickets') }}"><i class="fas fa-headset"></i> Support Tickets</a>
                            <a class="nav-link logout" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </nav>
                    </div>
                </div>
                
                {{-- ===== TICKETS CONTENT ===== --}}
                <div class="col-lg-9">
                    <div class="account-content glass-card">
                        <div class="account-content-header">
                            <h3>Support Tickets</h3>
                            {{-- This link should go to a form to create a new ticket --}}
                            <a href="{{ url('support/create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus me-1"></i> Create New Ticket
                            </a>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover align-middle tickets-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Ticket ID</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Last Updated</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Use @foreach($tickets as $ticket) here in a dynamic application --}}
                                    <tr>
                                        <th scope="row">#TKT-201</th>
                                        <td>
                                            <a href="{{ url('support/ticket/TKT-201') }}" class="ticket-subject">
                                                Issue with Order #E8171
                                            </a>
                                        </td>
                                        {{-- Dynamic badge classes based on status --}}
                                        <td><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Pending</span></td>
                                        <td>Nov 02, 2025</td>
                                        <td><a href="{{ url('support/ticket/TKT-201') }}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#TKT-200</th>
                                        <td>
                                            <a href="{{ url('support/ticket/TKT-200') }}" class="ticket-subject">
                                                Question about return policy
                                            </a>
                                        </td>
                                        <td><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Closed</span></td>
                                        <td>Oct 30, 2025</td>
                                        <td><a href="{{ url('support/ticket/TKT-200') }}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#TKT-199</th>
                                        <td>
                                            <a href="{{ url('support/ticket/TKT-199') }}" class="ticket-subject">
                                                Payment failed
                                            </a>
                                        </td>
                                        <td><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Closed</span></td>
                                        <td>Oct 29, 2025</td>
                                        <td><a href="{{ url('support/ticket/TKT-199') }}" class="btn btn-primary btn-sm">View</a></td>
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

{{-- No custom JS needed here --}}