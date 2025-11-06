@extends('layouts.app')

{{-- Assume $campaign variable is passed from the controller, e.g., $campaign->name = 'Summer Fashion Sale' --}}
@section('title', $campaign->name ?? 'Summer Fashion Sale - Elegant Shop') 

{{-- No @section('styles') or @section('scripts') needed as they are handled in app.blade.php --}}

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Campaign Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('campaigns') }}">Campaigns</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $campaign->name ?? 'Summer Fashion Sale' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-3">
        <div class="container">
            {{-- Campaign header uses inline style for background image, should use asset helper --}}
            <div class="campaign-header glass-card" style="background-image: url('{{ asset($campaign->header_image_url ?? 'https://picsum.photos/1200/400?random=60') }}');">
                <div class="campaign-header-content">
                    <h1 class="campaign-header-title">{{ $campaign->name ?? 'Summer Fashion Sale' }}</h1>
                    <p class="campaign-header-desc">{{ $campaign->description ?? 'Get up to 50% off on selected items. Get ready for the sun with our hottest deals on dresses, swimwear, and accessories.' }}</p>
                    <div class="campaign-header-timer">
                        <i class="fas fa-clock"></i> {{ $campaign->time_left ?? '5 Days Left' }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="campaign-products-section">
        <div class="container">
            <div class="row g-4 products-grid">
                {{-- Use @foreach($campaign->products as $product) here in a dynamic application --}}
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card glass-card">
                        <div class="product-badge badge-sale">-50%</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=10" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product/product-slug-1') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
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
                                <span class="price">$64.99</span>
                                <span class="old-price">$129.99</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card glass-card">
                        <div class="product-badge badge-sale">-20%</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=11" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product/product-slug-2') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-light btn-float"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">Fashion</span>
                            <h5 class="product-title">Floral Print Sundress</h5>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(127)</span>
                            </div>
                            <div class="product-price">
                                <span class="price">$60.00</span>
                                <span class="old-price">$75.00</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card glass-card">
                        <div class="product-badge badge-sale">-10%</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=14" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product/product-slug-3') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
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
                                <span class="price">$179.99</span>
                                <span class="old-price">$199.99</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-card modern-card glass-card">
                        <div class="product-badge badge-sale">-30%</div>
                        <div class="product-image">
                            <div class="image-overlay-gradient"></div>
                            <img src="https://picsum.photos/300/300?random=12" alt="Product">
                            <div class="product-overlay">
                                <a href="{{ url('product/product-slug-4') }}" class="btn btn-sm btn-light me-2 btn-float"><i class="fas fa-eye"></i></a>
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
                                <span class="price">$63.00</span>
                                <span class="old-price">$90.00</span>
                            </div>
                            <button class="btn btn-primary btn-sm w-100 mt-2 add-to-cart btn-ripple">
                                <i class="fas fa-shopping-bag me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                {{-- Add more products here if necessary to fill the rows --}}
                
            </div>
            
            {{-- Pagination (Placeholder for Laravel Pagination Links) --}}
            <nav aria-label="Page navigation" class="mt-5 d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-arrow-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-arrow-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </section>

@endsection

{{-- No custom JS needed here --}}