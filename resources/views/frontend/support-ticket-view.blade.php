@extends('layouts.app')

{{-- Assume $ticket variable is passed from the controller, e.g., $ticket->id = 'TKT-201' --}}
@section('title', 'View Ticket #' . ($ticket->id ?? 'TKT-201') . ' - Elegant Shop')

@section('content')

    <!-- ===== BREADCRUMB / PAGE HEADER ===== -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">My Account</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('account/dashboard') }}">Account</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('support-tickets') }}">Support Tickets</a></li>
                            <li class="breadcrumb-item active" aria-current="page">#{{ $ticket->id ?? 'TKT-201' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== ACCOUNT CONTENT SECTION (Ticket View) ===== -->
    <section class="account-section">
        <div class="container">
            <div class="row">
                {{-- ===== SIDEBAR ===== --}}
                <div class="col-lg-3">
                    <div class="account-sidebar glass-card">
                        {{-- User Profile Data (Placeholder) --}}
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
                
                {{-- ===== TICKET CHAT CONTENT ===== --}}
                <div class="col-lg-9">
                    <div class="account-content glass-card">
                        <div class="account-content-header">
                            <h3>Ticket #{{ $ticket->id ?? 'TKT-201' }}: {{ $ticket->subject ?? 'Issue with Order #E8171' }}</h3>
                            {{-- Dynamic Status Badge --}}
                            <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">{{ $ticket->status ?? 'Pending' }}</span>
                        </div>
                        
                        <div class="ticket-chat-box">
                            {{-- Use @foreach($ticket->messages as $message) here --}}
                            
                            <!-- User's Initial Message -->
                            <div class="ticket-message user">
                                <div class="message-content">
                                    <div class="message-header">
                                        <span class="name">Md. Shahidul Islam</span>
                                        <span class="time">Nov 02, 2025, 10:30 AM</span>
                                    </div>
                                    <p class="message-text">
                                        Hello, my order #E8171 is marked as "Shipped" but the tracking number doesn't seem to be working. Can you please check on this?
                                    </p>
                                </div>
                                <img src="https://picsum.photos/100/100?random=1" alt="User Avatar" class="avatar">
                            </div>
                            
                            <!-- Staff Reply -->
                            <div class="ticket-message staff">
                                <img src="https://picsum.photos/100/100?random=2" alt="Staff Avatar" class="avatar">
                                <div class="message-content">
                                    <div class="message-header">
                                        <span class="name">Jane Doe (Support Staff)</span>
                                        <span class="time">Nov 02, 2025, 10:45 AM</span>
                                    </div>
                                    <p class="message-text">
                                        Hi Shahidul, thank you for reaching out. I'm sorry for the trouble with the tracking. Let me investigate this for you right away. Please give me a few moments.
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                        
                        {{-- Reply Form --}}
                        <form class="reply-form" method="POST" action="{{ url('support/ticket/' . ($ticket->id ?? 'TKT-201') . '/reply') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="replyMessage" class="form-label h5">Your Reply</label>
                                <textarea class="form-control" id="replyMessage" name="message" rows="5" placeholder="Type your message here..." required></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane me-2"></i>Send Reply</button>
                                <button type="button" class="btn btn-outline-primary" onclick="alert('Ticket resolution logic would be handled by the server.')">Mark as Resolved</button>
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
    <script>
        // Simple client-side form validation for reply
        document.querySelector('.reply-form').addEventListener('submit', function(e) {
            const message = document.getElementById('replyMessage').value;
            if (message.trim() === '') {
                alert('Please enter a message before sending your reply.');
                e.preventDefault();
            }
            
            // Note: The form submits to the server after this point for actual processing.
        });
    </script>
@endsection