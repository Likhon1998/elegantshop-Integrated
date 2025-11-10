<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top glass-effect shadow-sm">
    <div class="container">

        {{-- Brand / Logo --}}
        <a class="navbar-brand pulse-animation" href="{{ url('/customer/dashboard') }}">
            <span class="brand-text">Elegant<span class="brand-accent">Shop</span></span>
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Collapsible Menu --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="{{ url('/customer/dashboard') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('shop') }}">Shop</a></li>

                {{-- Categories Dropdown --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Categories
                    </a>
                    <ul class="dropdown-menu glass-dropdown rounded-4 border-0 shadow-sm">
                        <li><a class="dropdown-item" href="{{ url('category/fashion') }}"><i class="fas fa-tshirt me-2"></i>Fashion</a></li>
                        <li><a class="dropdown-item" href="{{ url('category/electronics') }}"><i class="fas fa-laptop me-2"></i>Electronics</a></li>
                        <li><a class="dropdown-item" href="{{ url('category/home-garden') }}"><i class="fas fa-home me-2"></i>Home & Garden</a></li>
                        <li><a class="dropdown-item" href="{{ url('category/beauty') }}"><i class="fas fa-spa me-2"></i>Beauty</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="{{ url('campaigns') }}">Campaigns</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('blog') }}">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Contact</a></li>
            </ul>

            {{-- Right Section --}}
            <div class="navbar-actions d-flex align-items-center gap-3">

                {{-- Search --}}
                <div class="search-box position-relative d-none d-lg-block">
                    <input type="text" class="form-control search-input rounded-pill px-4" placeholder="Search products...">
                    <i class="fas fa-search search-icon"></i>
                </div>

                {{-- Cart --}}
                <a href="{{ url('cart') }}" class="btn-icon position-relative me-2 cart-icon-wrapper">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-badge pulse-badge">3</span>
                </a>

                {{-- Authentication --}}
                @if(Auth::guard('customer')->check())
                    @php 
                        $customer = Auth::guard('customer')->user();

                        // Use uploaded avatar, or a random online avatar
                        $avatarPath = !empty($customer->avatar)
                            ? asset('storage/avatars/' . $customer->avatar)
                            : 'https://api.dicebear.com/9.x/avataaars/svg?seed=' . urlencode($customer->name ?? 'Guest');
                    @endphp

                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center dropdown-toggle user-dropdown" id="userDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">

                            {{-- Avatar --}}
                            <div class="user-avatar me-2">
                                <img src="{{ $avatarPath }}" alt="Avatar" class="rounded-circle shadow-sm" width="35" height="35">
                            </div>

                            {{-- Greeting --}}
                            <span class="user-name text-dark fw-semibold">Hi, {{ Str::limit($customer->name, 10, '') }}</span>
                        </a>

                        {{-- Dropdown Menu --}}
                        <ul class="dropdown-menu dropdown-menu-end glass-dropdown border-0 shadow-sm rounded-4 p-2" aria-labelledby="userDropdown">
                            <li class="dropdown-header small text-primary fw-semibold">{{ $customer->email }}</li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="{{ url('customer/dashboard') }}" class="dropdown-item rounded-3"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
                            <li><a href="{{ url('customer/profile') }}" class="dropdown-item rounded-3"><i class="fas fa-user me-2"></i> Profile</a></li>
                            <li><a href="{{ url('account-orders') }}" class="dropdown-item rounded-3"><i class="fas fa-box me-2"></i> My Orders</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a href="{{ url('customer/logout') }}" class="dropdown-item text-danger rounded-3"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ url('customer/logout') }}" method="POST" class="d-none">@csrf</form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ url('auth/login') }}" class="btn btn-primary btn-sm btn-glow">Login</a>
                @endif
            </div>
        </div>
    </div>
</nav>
