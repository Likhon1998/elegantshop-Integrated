@extends('layouts.app')

@section('title', 'Campaigns - Elegant Shop')

{{-- No @section('styles') or @section('scripts') needed as they are handled in app.blade.php --}}

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Active Campaigns</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Campaigns</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="campaign-section">
        <div class="container">
            <div class="row g-4">
                {{-- Use @foreach($campaigns as $campaign) here in a dynamic application --}}
                
                <div class="col-lg-4 col-md-6">
                    <div class="campaign-card glass-card">
                        <a href="{{ url('campaign/summer-fashion-sale') }}">
                            <img src="https://picsum.photos/400/225?random=60" class="campaign-card-img" alt="Campaign 1">
                        </a>
                        <div class="campaign-card-body">
                            <h5 class="campaign-card-title">
                                <a href="{{ url('campaign/summer-fashion-sale') }}">Summer Fashion Sale - Up to 50% Off</a>
                            </h5>
                            <p class="campaign-card-text">Get ready for the sun with our hottest deals on dresses, swimwear, and accessories.</p>
                            <div class="campaign-card-footer">
                                <span class="campaign-timer"><i class="fas fa-clock"></i> 5 Days Left</span>
                                <a href="{{ url('campaign/summer-fashion-sale') }}" class="btn btn-primary btn-sm">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="campaign-card glass-card">
                        <a href="{{ url('campaign/tech-refresh') }}">
                            <img src="https://picsum.photos/400/225?random=61" class="campaign-card-img" alt="Campaign 2">
                        </a>
                        <div class="campaign-card-body">
                            <h5 class="campaign-card-title">
                                <a href="{{ url('campaign/tech-refresh') }}">Tech Refresh: 20% Off Electronics</a>
                            </h5>
                            <p class="campaign-card-text">Upgrade your gadgets. Save big on headphones, smartwatches, and more.</p>
                            <div class="campaign-card-footer">
                                <span class="campaign-timer"><i class="fas fa-clock"></i> 3 Days Left</span>
                                <a href="{{ url('campaign/tech-refresh') }}" class="btn btn-primary btn-sm">View Deals</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="campaign-card glass-card">
                        <a href="{{ url('campaign/home-garden-essentials') }}">
                            <img src="https://picsum.photos/400/225?random=62" class="campaign-card-img" alt="Campaign 3">
                        </a>
                        <div class="campaign-card-body">
                            <h5 class="campaign-card-title">
                                <a href="{{ url('campaign/home-garden-essentials') }}">Home & Garden Essentials</a>
                            </h5>
                            <p class="campaign-card-text">Beautify your space with new decor, furniture, and garden tools. Deals from $19.99.</p>
                            <div class="campaign-card-footer">
                                <span class="campaign-timer"><i class="fas fa-clock"></i> 10 Days Left</span>
                                <a href="{{ url('campaign/home-garden-essentials') }}" class="btn btn-primary btn-sm">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="campaign-card glass-card opacity-75">
                        <a href="{{ url('campaign/winter-clearance-sale') }}">
                            <img src="https://picsum.photos/400/225?random=63" class="campaign-card-img" alt="Campaign 4">
                        </a>
                        <div class="campaign-card-body">
                            <h5 class="campaign-card-title">
                                <a href="{{ url('campaign/winter-clearance-sale') }}">Winter Clearance Sale</a>
                            </h5>
                            <p class="campaign-card-text">Massive markdowns on all winter coats, boots, and accessories. Final sale.</p>
                            <div class="campaign-card-footer">
                                <span class="campaign-timer text-danger"><i class="fas fa-times-circle"></i> Ended</span>
                                <a href="{{ url('campaign/winter-clearance-sale') }}" class="btn btn-dark btn-sm disabled">Expired</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- End of campaign list --}}
            </div>
        </div>
    </section>

@endsection

{{-- No custom JS needed here --}}