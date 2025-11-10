<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top glass-effect">
    <div class="container">
        <a class="navbar-brand pulse-animation" href="{{ url('/') }}">
            <span class="brand-text">Elegant<span class="brand-accent">Shop</span></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('shop') }}">Shop</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Categories
                    </a>
                    <ul class="dropdown-menu glass-dropdown">
                        <li><a class="dropdown-item" href="{{ url('category/fashion') }}"><i class="fas fa-tshirt me-2"></i>Fashion</a></li>
                        <li><a class="dropdown-item" href="{{ url('category/electronics') }}"><i class="fas fa-laptop me-2"></i>Electronics</a></li>
                        <li><a class="dropdown-item" href="{{ url('category/home-garden') }}"><i class="fas fa-home me-2"></i>Home & Garden</a></li>
                        <li><a class="dropdown-item" href="{{ url('category/beauty') }}"><i class="fas fa-spa me-2"></i>Beauty</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('campaigns') }}">Campaigns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                </li>
            </ul>
            <div class="navbar-actions">
                <div class="search-box me-3">
                    <input type="text" class="form-control search-input" placeholder="Search products...">
                    <i class="fas fa-search search-icon"></i>
                </div>
                <a href="{{ url('cart') }}" class="btn-icon position-relative me-2 cart-icon-wrapper">
                    <i class="fas fa-shopping-bag"></i>
                    {{-- Replace static '3' with a dynamic cart item count --}}
                    <span class="cart-badge pulse-badge">3</span>
                </a>
                <a href="{{ url('customer/login') }}" class="btn btn-primary btn-sm btn-glow">Login</a>
            </div>
        </div>
    </div>
</nav>