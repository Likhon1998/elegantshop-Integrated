@extends('layouts.app')

{{-- Static title reflecting the example search term --}}
@section('title', 'Search Results for "Summer Dress" - Elegant Shop')

@section('content')

    <!-- ===== BREADCRUMB / PAGE HEADER ===== -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Search Results</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ===== SEARCH HEADER / CONTROLS ===== -->
    <section class="shop-header">
        <div class="container">
            <div class="row align-items-center g-3">
                <div class="col-lg-6">
                    {{-- Static result count and query, as requested --}}
                    <p class="page-subtitle mb-0">Showing 6 results for "<strong>Summer Dress</strong>"</p>
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
                        <option selected>Sort by relevance</option>
                        <option value="1">Sort by average rating</option>
                        <option value="2">Sort by latest</option>
                        <option value="3">Sort by price: low to high</option>
                        <option value="4">Sort by price: high to low</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SHOP CONTENT (SIDEBAR + PRODUCTS) ===== -->
    <section class="shop-section pb-5">
        <div class="container">
            <div class="row">
                {{-- ===== SIDEBAR FILTERS (STATIC PLACEHOLDERS) ===== --}}
                <div class="col-lg-3">
                    <div class="shop-sidebar" id="shop-sidebar">
                        <div class="filter-widget glass-card">
                            <h4 class="filter-title"><i class="fas fa-tags me-2"></i>Categories</h4>
                            <div class="filter-content">
                                <ul class="list-unstyled footer-links">
                                    <li class="category-item">
                                        <a href="{{ url('category') }}" class="d-flex justify-content-between">
                                            <span>Dresses</span> <span class="count">(12)</span>
                                        </a>
                                    </li>
                                    <li class="category-item">
                                        <a href="{{ url('category') }}" class="d-flex justify-content-between">
                                            <span>Outerwear</span> <span class="count">(8)</span>
                                        </a>
                                    </li>
                                    <li class="category-item">
                                        <a href="{{ url('category') }}" class="d-flex justify-content-between">
                                            <span>Accessories</span> <span class="count">(22)</span>
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

                <div class="col-lg-9">
                    <div class="active-filters mb-3">
                        <span class="filter-badge glass-card">
                            Size: S
                            <button class="btn-close-filter"><i class="fas fa-times"></i></button>
                        </span>
                        <a href="#" class="btn-link" style="font-size: 12px; margin-left: auto;">Clear All</a>
                    </div>

                    {{-- Products Grid (Static Content based on search-results.html) --}}
                    <div class="row g-4 products-grid" id="products-grid">
                        
                        <!-- Product 1 -->
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
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
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
                        
                        <!-- Product 2 -->
                        <div class="col-lg-4 col-md-6">
                             <div class="product-card modern-card glass-card">
                                <div class="product-badge badge-new">New</div>
                                <div class="product-image">
                                    <div class="image-overlay-gradient"></div>
                                    <img src="https://picsum.photos/300/300?random=11" alt="Product">
                                    <div class="product-overlay">
                                        <a href="{{ url('product/product-details') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                        <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="product-category">Fashion</span>
                                    <h5 class="product-title">Floral Print Sundress</h5>
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <span>(127)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="price">$75.00</span>
                                    </div>
                                    <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                        <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 3 -->
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
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i>
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
                        
                        </div>
                    
                    {{-- Empty State (Visibility is handled by JS placeholder) --}}
                    <div class="empty-state glass-card mt-4" style="display: none;">
                        <i class="fas fa-search"></i>
                        <h3>No Results Found</h3>
                        <p>We couldn't find any products matching your search. Try a different term!</p>
                        <a href="{{ url('shop') }}" class="btn btn-primary">
                            <i class="fas fa-store me-2"></i>Back to Shop
                        </a>
                    </div>

                    {{-- Pagination (Static links) --}}
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
            // --- Core Functions (Simplified placeholders for AddToCart) ---
            function handleAddToCart(event) {
                event.preventDefault();
                const button = event.currentTarget;
                const originalText = button.innerHTML;
                button.disabled = true;
                button.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Adding...';
                
                setTimeout(() => {
                    const cartBadge = document.querySelector('.cart-badge');
                    if (cartBadge) {
                        cartBadge.textContent = parseInt(cartBadge.textContent || '0') + 1;
                    }
                    
                    button.innerHTML = '<i class="fas fa-check me-1"></i> Added!';
                    setTimeout(() => {
                        button.innerHTML = originalText;
                        button.disabled = false;
                    }, 1000);
                }, 500);
            }
            
            // --- Element Initialization and Event Listeners ---
            
            // 1. Add to Cart
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', handleAddToCart);
            });

            // 2. Mobile Filter Sidebar Toggle
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

            // 3. Grid/List View Switcher
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

            // 4. Price Range Slider Functionality (Placeholder Logic)
            const priceRangeSlider = document.getElementById('price-range');
            const priceMinDisplay = document.querySelector('.price-min');
            const priceMaxDisplay = document.querySelector('.price-max');
            
            if (priceRangeSlider && priceMinDisplay && priceMaxDisplay) {
                const minVal = priceRangeSlider.getAttribute('min');
                priceMinDisplay.textContent = `$${minVal}`;
                priceMaxDisplay.textContent = `$${priceRangeSlider.value}`;

                priceRangeSlider.addEventListener('input', function() {
                    priceMaxDisplay.textContent = `$${this.value}`;
                });
            }
            
            // 5. Size Option Toggling (Placeholder Logic)
            const sizeOptions = document.querySelectorAll('.size-option');
            sizeOptions.forEach(option => {
                option.addEventListener('click', function() {
                    sizeOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // 6. Tooltip initialization (Placeholder)
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
@endsection