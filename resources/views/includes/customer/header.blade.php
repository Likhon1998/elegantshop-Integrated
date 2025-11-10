<header class="header-top">
    <div class="container">
        <div class="row align-items-center py-2">
            <div class="col-md-6">
                <div class="top-info">
                    <span class="me-3 animate-fade-in"><i class="fas fa-phone-alt me-1"></i> +1 234 567 8900</span>
                    <span class="animate-fade-in" style="animation-delay: 0.1s;"><i class="fas fa-envelope me-1"></i> info@elegantshop.com</span>
                </div>
            </div>

            <div class="col-md-6 text-end">
                <div class="top-links">
                    @if(Auth::guard('customer')->check())
                        @php $customer = Auth::guard('customer')->user(); @endphp

                        <a href="{{ url('account-orders') }}" class="me-3 animate-fade-in" style="animation-delay: 0.3s;">
                            <i class="fas fa-box me-1"></i> Orders
                        </a>
                        <a href="{{ url('wishlist') }}" class="me-3 animate-fade-in" style="animation-delay: 0.4s;">
                            <i class="fas fa-heart me-1"></i> Wishlist
                        </a>
                    @else
                        <a href="{{ url('auth/login') }}" class="me-3 animate-fade-in" style="animation-delay: 0.2s;"><i class="fas fa-user me-1"></i> Login</a>
                        <a href="{{ url('auth/register') }}" class="animate-fade-in" style="animation-delay: 0.3s;"><i class="fas fa-user-plus me-1"></i> Register</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
