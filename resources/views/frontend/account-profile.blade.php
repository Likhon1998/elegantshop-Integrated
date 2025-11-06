@extends('layouts.app')

@section('title', 'Profile Settings - Elegant Shop')

{{-- No @section('styles') needed as all specific CSS is in app.blade.php --}}

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">My Account</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
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
                        {{-- Account Navigation (Highlighting Profile Settings) --}}
                        <nav class="account-nav nav flex-column">
                            <a class="nav-link" href="{{ url('account/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                            <a class="nav-link" href="{{ url('account/orders') }}"><i class="fas fa-box-open"></i> My Orders</a>
                            <a class="nav-link active" href="{{ url('account/profile') }}"><i class="fas fa-user-edit"></i> Profile Settings</a>
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
                
                {{-- ===== PROFILE CONTENT ===== --}}
                <div class="col-lg-9">
                    <div class="account-content glass-card">
                        <h3>Profile Settings</h3>
                        
                        {{-- Profile Information Form --}}
                        <form id="profileForm" method="POST" action="{{ url('account/profile') }}">
                            @csrf
                            @method('PUT') {{-- Assuming you use a PUT method to update profile --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    {{-- Placeholder value using Auth facade --}}
                                    <input type="text" class="form-control" id="fullName" name="name" value="{{ Auth::user()->name ?? 'Md. Shahidul Islam' }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    {{-- Placeholder value using Auth facade --}}
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email ?? 'shahidul@example.com' }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    {{-- Placeholder value --}}
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone ?? '+1 234 567 8900' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    {{-- Placeholder value --}}
                                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ Auth::user()->birthday ?? '' }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Save Changes</button>
                        </form>
                        
                        <hr class="my-4">
                        
                        {{-- Change Password Form --}}
                        <h4 class="h5 mb-3">Change Password</h4>
                        <form id="passwordForm" method="POST" action="{{ url('account/password') }}">
                            @csrf
                            @method('PUT') {{-- Assuming you use a PUT method to update password --}}
                            <div class="mb-3">
                                <label for="currentPassword" class="form-label">Current Password</label>
                                <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="newPassword" name="new_password" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="new_password_confirmation" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-key me-2"></i>Update Password</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    @parent
    <script>
        // Form submission simulation (kept for frontend behavior matching original HTML)
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            // In a real Laravel app, this prevents default action only if form validation fails.
            // We keep it here for the HTML simulation.
            // e.preventDefault(); 
            // alert('Profile updated successfully! (Simulation)');
        });
        
        document.getElementById('passwordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const newPass = document.getElementById('newPassword').value;
            const confirmPass = document.getElementById('confirmPassword').value;
            
            if (newPass !== confirmPass) {
                alert('New passwords do not match!');
                // Prevent Laravel submission
            } else {
                // If using Laravel to handle submission, remove the e.preventDefault() above
                // and the alert below. For simulation:
                alert('Password update initiated. Check server response. (Simulation)');
                // this.submit(); // Uncomment if you use the e.preventDefault() above
                this.reset();
            }
        });
        
        // Note: The Scroll to Top script is assumed to be in the master layout (app.blade.php) or main.js.
    </script>
@endsection