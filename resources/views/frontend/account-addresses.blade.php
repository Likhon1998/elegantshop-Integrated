@extends('layouts.app')

@section('title', 'My Addresses - Elegant Shop')

{{-- Include account-specific CSS file if it's not in style.css --}}
@section('styles')
    @parent
@endsection

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">My Account</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Addresses</li>
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
                        {{-- User Profile Data (Can be dynamic later) --}}
                        <div class="user-profile">
                            <img src="https://picsum.photos/100/100?random=1" alt="User Avatar" class="user-avatar">
                            <h5 class="user-name">Md. Shahidul Islam</h5>
                            <p class="user-email">shahidul@example.com</p>
                        </div>
                        {{-- Account Navigation (Converted to Blade URLs) --}}
                        <nav class="account-nav nav flex-column">
                            <a class="nav-link" href="{{ url('account/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                            <a class="nav-link" href="{{ url('account/orders') }}"><i class="fas fa-box-open"></i> My Orders</a>
                            <a class="nav-link" href="{{ url('account/profile') }}"><i class="fas fa-user-edit"></i> Profile Settings</a>
                            <a class="nav-link active" href="{{ url('account/addresses') }}"><i class="fas fa-map-marker-alt"></i> My Addresses</a>
                            <a class="nav-link" href="{{ url('wishlist') }}"><i class="fas fa-heart"></i> Wishlist</a>
                            <a class="nav-link" href="{{ url('support-tickets') }}"><i class="fas fa-headset"></i> Support Tickets</a>
                            <a class="nav-link logout" href="{{ url('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </nav>
                    </div>
                </div>
                
                <div class="col-lg-9">
                    <div class="account-content glass-card">
                        <div class="account-content-header">
                            <h3>My Addresses</h3>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                                <i class="fas fa-plus me-1"></i> Add New Address
                            </button>
                        </div>
                        
                        <div class="row g-4">
                            {{-- Address Card 1 (Default Billing) --}}
                            <div class="col-md-6">
                                <div class="address-card glass-card">
                                    <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill">Default Billing</span>
                                    <h5>Md. Shahidul Islam</h5>
                                    <p>
                                        123 Fashion Street<br>
                                        Apt 4B<br>
                                        New York, NY 10001<br>
                                        United States
                                    </p>
                                    <p><i class="fas fa-phone-alt me-2"></i> +1 234 567 8900</p>
                                    <div class="address-actions">
                                        <a href="#" class="btn-link" data-bs-toggle="modal" data-bs-target="#addAddressModal"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="#" class="btn-link text-danger"><i class="fas fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Address Card 2 (Default Shipping) --}}
                            <div class="col-md-6">
                                <div class="address-card glass-card">
                                    <span class="badge bg-success-subtle text-success-emphasis rounded-pill">Default Shipping</span>
                                    <h5>Md. Shahidul Islam</h5>
                                    <p>
                                        456 Elegance Ave<br>
                                        Suite 100<br>
                                        Los Angeles, CA 90001<br>
                                        United States
                                    </p>
                                    <p><i class="fas fa-phone-alt me-2"></i> +1 987 654 3210</p>
                                    <div class="address-actions">
                                        <a href="#" class="btn-link" data-bs-toggle="modal" data-bs-target="#addAddressModal"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="#" class="btn-link text-danger"><i class="fas fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== ADD ADDRESS MODAL (Must be outside the main content section for visibility) ===== --}}
    <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content glass-card">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAddressModalLabel">Add New Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addressForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="addrFullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="addrFullName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="addrPhone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="addrPhone" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="addrLine1" class="form-label">Address Line 1</label>
                                <input type="text" class="form-control" id="addrLine1" placeholder="Street address, P.O. box, etc." required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="addrLine2" class="form-label">Address Line 2 (Optional)</label>
                                <input type="text" class="form-control" id="addrLine2" placeholder="Apartment, suite, unit, building, floor, etc.">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="addrCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="addrCity" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="addrState" class="form-label">State/Province/Region</label>
                                <input type="text" class="form-control" id="addrState" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="addrZip" class="form-label">ZIP / Postal Code</label>
                                <input type="text" class="form-control" id="addrZip" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="addrCountry" class="form-label">Country</label>
                                <select id="addrCountry" class="form-select">
                                    <option selected>United States</option>
                                    <option>Canada</option>
                                    <option>United Kingdom</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="makeDefaultShipping">
                                    <label class="form-check-label" for="makeDefaultShipping">
                                        Make this my default shipping address
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="addressForm" class="btn btn-primary">Save Address</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        // Form submission simulation
        document.getElementById('addressForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // In a real app, you'd use Laravel/AJAX to send this data
            alert('Address saved successfully! (Simulation)');
            
            // Get the modal instance and hide it
            var addAddressModal = bootstrap.Modal.getInstance(document.getElementById('addAddressModal'));
            addAddressModal.hide();
            this.reset();
        });
        
        // Note: The Scroll to Top script should ideally live in the master layout (app.blade.php).
        // If it's not there, you should copy the generic scroll script here, or better yet, move it to main.js.
    </script>
@endsection