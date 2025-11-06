@extends('layouts.app')

@section('title', 'My Wishlist - Elegant Shop')

{{-- No @section('styles') needed as account.css is in app.blade.php --}}

@section('content')

    <!-- ===== BREADCRUMB / PAGE HEADER ===== -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">My Wishlist</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== WISHLIST SECTION ===== -->
    <section class="wishlist-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wishlist-table-wrapper">
                        <div class="table-responsive glass-card wishlist-table">
                            <table class="table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-start" style="width: 45%;">Product</th>
                                        <th scope="col" class="text-center" style="width: 15%;">Price</th>
                                        <th scope="col" class="text-center" style="width: 20%;">Stock Status</th>
                                        <th scope="col" class="text-center" style="width: 15%;">Action</th>
                                        <th scope="col" class="text-center" style="width: 5%;"></th>
                                    </tr>
                                </thead>
                                <tbody id="wishlist-body">
                                    {{-- Use @foreach($wishlistItems as $item) here in a dynamic application --}}
                                    
                                    <!-- Item 1: In Stock -->
                                    <tr class="wishlist-item">
                                        <td data-label="Product">
                                            <div class="product-item d-flex align-items-center">
                                                <img src="https://picsum.photos/100/100?random=10" alt="Product Image">
                                                <div class="product-info ms-3">
                                                    <a href="{{ url('product') }}" class="product-title">Elegant Summer Dress</a>
                                                    <span class="product-category d-block">Fashion</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Price" class="text-center">
                                            <span class="product-price">$89.99</span>
                                        </td>
                                        <td data-label="Stock Status" class="text-center">
                                            <span class="stock-status in-stock">
                                                <i class="fas fa-check-circle me-1"></i>In Stock
                                            </span>
                                        </td>
                                        <td data-label="Action" class="text-center">
                                            <a href="{{ url('cart') }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-shopping-bag me-1"></i>Add to Cart
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn-remove" data-item-id="1">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Item 2: In Stock -->
                                    <tr class="wishlist-item">
                                        <td data-label="Product">
                                            <div class="product-item d-flex align-items-center">
                                                <img src="https://picsum.photos/100/100?random=11" alt="Product Image">
                                                <div class="product-info ms-3">
                                                    <a href="{{ url('product') }}" class="product-title">Wireless Headphones</a>
                                                    <span class="product-category d-block">Electronics</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Price" class="text-center">
                                            <span class="product-price">$149.99</span>
                                        </td>
                                        <td data-label="Stock Status" class="text-center">
                                            <span class="stock-status in-stock">
                                                <i class="fas fa-check-circle me-1"></i>In Stock
                                            </span>
                                        </td>
                                        <td data-label="Action" class="text-center">
                                            <a href="{{ url('cart') }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-shopping-bag me-1"></i>Add to Cart
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn-remove" data-item-id="2">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- Item 3: Out of Stock -->
                                    <tr class="wishlist-item">
                                        <td data-label="Product">
                                            <div class="product-item d-flex align-items-center">
                                                <img src="https://picsum.photos/100/100?random=15" alt="Product Image">
                                                <div class="product-info ms-3">
                                                    <a href="{{ url('product') }}" class="product-title">Smart Watch Pro</a>
                                                    <span class="product-category d-block">Electronics</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Price" class="text-center">
                                            <span class="product-price">$279.99</span>
                                        </td>
                                        <td data-label="Stock Status" class="text-center">
                                            <span class="stock-status out-of-stock text-danger">
                                                <i class="fas fa-times-circle me-1"></i>Out of Stock
                                            </span>
                                        </td>
                                        <td data-label="Action" class="text-center">
                                            <button class="btn btn-primary btn-sm" disabled>
                                                Notify Me
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn-remove" data-item-id="3">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    {{-- Empty State Message --}}
                    <div id="empty-wishlist-message" class="empty-state glass-card mt-4" style="display: none;">
                        <i class="fas fa-heart-broken"></i>
                        <h3>Your Wishlist is Empty</h3>
                        <p>You haven't added any items to your wishlist yet. Start browsing to find products you love!</p>
                        <a href="{{ url('shop') }}" class="btn btn-primary">
                            <i class="fas fa-store me-2"></i>Continue Shopping
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    @parent
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wishlistBody = document.getElementById('wishlist-body');
            const emptyWishlistMessage = document.getElementById('empty-wishlist-message');
            const wishlistTableWrapper = document.querySelector('.wishlist-table-wrapper');

            if (wishlistBody) {
                wishlistBody.addEventListener('click', function(e) {
                    const removeButton = e.target.closest('.btn-remove');
                    
                    if (removeButton) {
                        const itemToRemove = removeButton.closest('.wishlist-item');
                        
                        // Prevent the removal logic from triggering when clicking on the icon inside the button
                        e.preventDefault(); 

                        // 1. Simulate removal animation
                        itemToRemove.style.transition = 'opacity 0.3s ease, max-height 0.3s ease';
                        itemToRemove.style.opacity = '0';
                        itemToRemove.style.maxHeight = '0'; // Collapse row visually

                        setTimeout(() => {
                            // 2. Remove from DOM
                            itemToRemove.remove();
                            
                            // 3. Check if wishlist is now empty
                            const remainingItems = wishlistBody.querySelectorAll('.wishlist-item');
                            if (remainingItems.length === 0) {
                                if(wishlistTableWrapper) wishlistTableWrapper.style.display = 'none';
                                if(emptyWishlistMessage) emptyWishlistMessage.style.display = 'block';
                            }
                            
                            // In a real application, an AJAX call would update the server here.
                            alert('Item removed from wishlist! (Simulation)');
                        }, 300);
                    }
                });
            }
        });
    </script>
@endsection