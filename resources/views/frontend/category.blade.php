@extends('layouts.app')

{{-- Assume $category variable is passed from the controller, e.g., $category->name = 'Fashion' --}}
@section('title', $category->name ?? 'Fashion - Elegant Shop')

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">{{ $category->name ?? 'Fashion' }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('shop') }}">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $category->name ?? 'Fashion' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    
    <section class="shop-header">
        <div class="container">
            <div class="row align-items-center g-3">
                <div class="col-lg-6">
                    {{-- Placeholder for dynamic result count: Showing X-Y of Z results --}}
                    <p class="page-subtitle mb-0">Showing 1–9 of 12 results</p> 
                </div>
                <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-center shop-controls">
                    <button class="btn btn-primary d-lg-none me-2" id="filter-toggle-btn">
                        <i class="fas fa-filter me-1"></i> Filters
                    </button>
                    
                    <div class="view-switcher me-2">
                        <button class="view-btn active" id="grid-view-btn"><i class="fas fa-th-large"></i></button>
                        <button class="view-btn" id="list-view-btn"><i class="fas fa-list"></i></button>
                    </div>
                    <select class="form-select sort-select glass-card" style="width: auto;">
                        <option selected>Sort by popularity</option>
                        <option value="1">Sort by average rating</option>
                        <option value="2">Sort by latest</option>
                        <option value="3">Sort by price: low to high</option>
                        <option value="4">Sort by price: high to low</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <section class="shop-section pb-5">
        <div class="container">
            <div class="row">
                {{-- ===== SIDEBAR FILTERS ===== --}}
                <div class="col-lg-3">
                    <div class="shop-sidebar" id="shop-sidebar">
                        <div class="filter-widget glass-card">
                            <h4 class="filter-title"><i class="fas fa-tags me-2"></i>Categories</h4>
                            <div class="filter-content">
                                <ul class="list-unstyled footer-links">
                                    {{-- Use @foreach ($categories as $cat) for dynamic list --}}
                                    <li class="category-item">
                                        <a href="{{ url('category/fashion') }}" class="d-flex justify-content-between">
                                            <span>Fashion</span> <span class="count">(12)</span>
                                        </a>
                                    </li>
                                    <li class="category-item">
                                        <a href="{{ url('category/electronics') }}" class="d-flex justify-content-between">
                                            <span>Electronics</span> <span class="count">(8)</span>
                                        </a>
                                    </li>
                                    <li class="category-item">
                                        <a href="{{ url('category/home-garden') }}" class="d-flex justify-content-between">
                                            <span>Home & Garden</span> <span class="count">(22)</span>
                                        </a>
                                    </li>
                                    <li class="category-item">
                                        <a href="{{ url('category/beauty') }}" class="d-flex justify-content-between">
                                            <span>Beauty</span> <span class="count">(15)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="filter-widget glass-card">
                            <h4 class="filter-title"><i class="fas fa-dollar-sign me-2"></i>Filter by Price</h4>
                            <div class="filter-content">
                                <input type="range" class="form-range price-range-slider" min="0" max="500" step="10" id="price-range">
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="price-min" style="font-size: 13px;">$0</span>
                                    <span class="price-max" style="font-size: 13px;">$500</span>
                                </div>
                            </div>
                        </div>

                        <div class="filter-widget glass-card">
                            <h4 class="filter-title"><i class="fas fa-ruler-horizontal me-2"></i>Sizes</h4>
                            <div class="filter-content">
                                <div class="size-options">
                                    <span class="size-option">XS</span>
                                    <span class="size-option active">S</span>
                                    <span class="size-option">M</span>
                                    <span class="size-option">L</span>
                                    <span class="size-option">XL</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===== PRODUCTS GRID ===== --}}
                <div class="col-lg-9">
                    <div class="active-filters mb-3">
                        <span class="filter-badge glass-card">
                            {{ $category->name ?? 'Fashion' }}
                            <button class="btn-close-filter"><i class="fas fa-times"></i></button>
                        </span>
                        <span class="filter-badge glass-card">
                            Size: S
                            <button class="btn-close-filter"><i class="fas fa-times"></i></button>
                        </span>
                        <a href="#" class="btn-link" style="font-size: 12px; margin-left: auto;">Clear All</a>
                    </div>

                    <div class="row g-4 products-grid" id="products-grid">
                        {{-- Use @foreach ($products as $product) here --}}
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="product-card modern-card glass-card">
                                <div class="product-badge badge-sale">-15%</div>
                                <div class="product-image">
                                    <div class="image-overlay-gradient"></div>
                                    <img src="https://picsum.photos/300/300?random=10" alt="Product">
                                    <div class="product-overlay">
                                        <a href="{{ url('product/product-details') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                        <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="product-category">Fashion</span>
                                    <h5 class="product-title">Elegant Summer Dress</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(48)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="price">$89.99</span>
                                        <span class="old-price">$129.99</span>
                                    </div>
                                    <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                        <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                             <div class="product-card modern-card glass-card">
                                <div class="product-image">
                                    <div class="image-overlay-gradient"></div>
                                    <img src="https://picsum.photos/300/300?random=14" alt="Product">
                                    <div class="product-overlay">
                                        <a href="{{ url('product/product-details') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                        <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="product-category">Fashion</span>
                                    <h5 class="product-title">Leather Handbag</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(62)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="price">$199.99</span>
                                    </div>
                                    <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                        <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                             <div class="product-card modern-card glass-card">
                                <div class="product-image">
                                    <div class="image-overlay-gradient"></div>
                                    <img src="https://picsum.photos/300/300?random=12" alt="Product">
                                    <div class="product-overlay">
                                        <a href="{{ url('product/product-details') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                        <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="product-category">Fashion</span>
                                    <h5 class="product-title">Casual Linen Shirt Dress</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                        <span>(34)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="price">$90.00</span>
                                    </div>
                                    <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                        <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Add more products here to complete the loop --}}
                        
                    </div>

                    {{-- Pagination (Replace with Laravel's {{ $products->links() }} when dynamic) --}}
                    <nav aria-label="Page navigation" class="mt-5 d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-arrow-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    
    <div class="filter-overlay" id="filter-overlay"></div>

@endsection

@section('scripts')
    @parent
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // --- Core Functions and Handlers ---

            // Function to handle Add to Cart button click
            function handleAddToCart(event) {
                event.preventDefault(); // Stop default button action if any
                const button = event.currentTarget;
                const card = button.closest('.product-card');
                
                // 1. Extract Product Info 
                const productTitle = card.querySelector('.product-title').textContent;
                
                // 2. Visual Feedback 
                const originalText = button.innerHTML;
                button.disabled = true;
                button.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Adding...';

                // 3. Simulate Cart Update
                setTimeout(() => {
                    // Update Cart Badge Count
                    const cartBadge = document.querySelector('.cart-badge');
                    if (cartBadge) {
                        let currentCount = parseInt(cartBadge.textContent || '0');
                        currentCount += 1;
                        cartBadge.textContent = currentCount;
                        cartBadge.classList.add('animate__tada'); // Optional animation
                    }

                    // Reset button state
                    button.innerHTML = '<i class="fas fa-check me-1"></i> Added!';
                    
                    // Revert text after a short delay
                    setTimeout(() => {
                        button.innerHTML = originalText;
                        button.disabled = false;
                    }, 1000);

                    console.log(`Product added to cart: ${productTitle}`);
                }, 500); // 500ms delay to simulate network latency
            }

            // --- Element Initialization and Event Listeners ---
            
            // Attach event listener to all "Add to Cart" buttons
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', handleAddToCart);
            });

            // 1. Tooltip initialization
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // 2. Scroll to Top (Assumed to be in main.js/app.blade.php, but kept here for robustness)
            const scrollToTopBtn = document.getElementById('scrollToTop');
            if (scrollToTopBtn) {
                window.onscroll = function() {
                    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                        scrollToTopBtn.classList.add('show');
                    } else {
                        scrollToTopBtn.classList.remove('show');
                    }
                };
                scrollToTopBtn.onclick = function() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                };
            }

            // 3. Mobile Filter Sidebar Toggle
            const filterToggleBtn = document.getElementById('filter-toggle-btn');
            const shopSidebar = document.getElementById('shop-sidebar');
            const filterOverlay = document.getElementById('filter-overlay');

            if (filterToggleBtn && shopSidebar && filterOverlay) {
                function toggleSidebar() {
                    shopSidebar.classList.toggle('show');
                    filterOverlay.classList.toggle('show');
                    document.body.classList.toggle('no-scroll');
                }

                filterToggleBtn.addEventListener('click', toggleSidebar);
                filterOverlay.addEventListener('click', toggleSidebar);
                
                window.addEventListener('resize', () => {
                    if (window.innerWidth >= 992) {
                        shopSidebar.classList.remove('show');
                        filterOverlay.classList.remove('show');
                        document.body.classList.remove('no-scroll');
                    }
                });
            }

            // 4. Grid/List View Switcher
            const gridViewBtn = document.getElementById('grid-view-btn');
            const listViewBtn = document.getElementById('list-view-btn');
            const productsGrid = document.getElementById('products-grid');

            if (gridViewBtn && listViewBtn && productsGrid) {
                gridViewBtn.addEventListener('click', () => {
                    gridViewBtn.classList.add('active');
                    listViewBtn.classList.remove('active');
                    productsGrid.classList.remove('list-view');
                });
                
                listViewBtn.addEventListener('click', () => {
                    listViewBtn.classList.add('active');
                    gridViewBtn.classList.remove('active');
                    productsGrid.classList.add('list-view');
                });
            }

            // 5. Price Range Slider Functionality
            const priceRangeSlider = document.getElementById('price-range');
            const priceMinDisplay = document.querySelector('.price-min');
            const priceMaxDisplay = document.querySelector('.price-max');
            
            if (priceRangeSlider && priceMinDisplay && priceMaxDisplay) {
                const minVal = priceRangeSlider.getAttribute('min');
                priceMinDisplay.textContent = `$${minVal}`;
                
                priceRangeSlider.addEventListener('input', function() {
                    priceMaxDisplay.textContent = `$${this.value}`;
                });
            }
            
            // 6. Size Option Toggling
            const sizeOptions = document.querySelectorAll('.size-option');
            sizeOptions.forEach(option => {
                option.addEventListener('click', function() {
                    sizeOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
@endsection