@extends('layouts.app')

@section('title', 'Blog - Elegant Shop')

{{-- No @section('styles') or @section('scripts') needed as they are handled in app.blade.php --}}

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Our Blog</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-section">
        <div class="container">
            <div class="row">
                {{-- ===== BLOG GRID (MAIN CONTENT) ===== --}}
                <div class="col-lg-8">
                    <div class="row g-4">
                        {{-- Use @foreach($posts as $post) in a dynamic application --}}
                        
                        <div class="col-md-6">
                            <div class="blog-card glass-card">
                                <a href="{{ url('blog/post-slug-1') }}">
                                    <img src="https://picsum.photos/400/250?random=50" class="blog-card-img" alt="Blog Post 1">
                                </a>
                                <div class="blog-card-body">
                                    <div class="blog-card-meta">
                                        <span class="meta-item"><i class="fas fa-user"></i> By Admin</span>
                                        <span class="meta-item"><i class="fas fa-calendar-alt"></i> Oct 25, 2025</span>
                                    </div>
                                    <h5 class="blog-card-title">
                                        <a href="{{ url('blog/post-slug-1') }}">The Top 10 Fashion Trends to Watch in 2026</a>
                                    </h5>
                                    <p class="blog-card-excerpt">Discover the upcoming styles that will dominate the fashion world next year, from bold colors to sustainable materials...</p>
                                    <div class="blog-card-footer">
                                        <a href="{{ url('blog/post-slug-1') }}">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="blog-card glass-card">
                                <a href="{{ url('blog/post-slug-2') }}">
                                    <img src="https://picsum.photos/400/250?random=51" class="blog-card-img" alt="Blog Post 2">
                                </a>
                                <div class="blog-card-body">
                                    <div class="blog-card-meta">
                                        <span class="meta-item"><i class="fas fa-user"></i> By Jane Doe</span>
                                        <span class="meta-item"><i class="fas fa-calendar-alt"></i> Oct 22, 2025</span>
                                    </div>
                                    <h5 class="blog-card-title">
                                        <a href="{{ url('blog/post-slug-2') }}">5 Ways to Style Your Home Office for Productivity</a>
                                    </h5>
                                    <p class="blog-card-excerpt">Working from home? Make your space both beautiful and functional with these simple interior design tips...</p>
                                    <div class="blog-card-footer">
                                        <a href="{{ url('blog/post-slug-2') }}">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="blog-card glass-card">
                                <a href="{{ url('blog/post-slug-3') }}">
                                    <img src="https://picsum.photos/400/250?random=52" class="blog-card-img" alt="Blog Post 3">
                                </a>
                                <div class="blog-card-body">
                                    <div class="blog-card-meta">
                                        <span class="meta-item"><i class="fas fa-user"></i> By Admin</span>
                                        <span class="meta-item"><i class="fas fa-calendar-alt"></i> Oct 20, 2025</span>
                                    </div>
                                    <h5 class="blog-card-title">
                                        <a href="{{ url('blog/post-slug-3') }}">The Ultimate Guide to Skincare Routines</a>
                                    </h5>
                                    <p class="blog-card-excerpt">From cleansing to moisturizing, we break down the essential steps for a healthy, glowing complexion...</p>
                                    <div class="blog-card-footer">
                                        <a href="{{ url('blog/post-slug-3') }}">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="blog-card glass-card">
                                <a href="{{ url('blog/post-slug-4') }}">
                                    <img src="https://picsum.photos/400/250?random=53" class="blog-card-img" alt="Blog Post 4">
                                </a>
                                <div class="blog-card-body">
                                    <div class="blog-card-meta">
                                        <span class="meta-item"><i class="fas fa-user"></i> By John Smith</span>
                                        <span class="meta-item"><i class="fas fa-calendar-alt"></i> Oct 18, 2025</span>
                                    </div>
                                    <h5 class="blog-card-title">
                                        <a href="{{ url('blog/post-slug-4') }}">Smart Home Gadgets That Are Worth the Investment</a>
                                    </h5>
                                    <p class="blog-card-excerpt">Explore the latest in-home technology that can save you time, energy, and make your life easier... </p>
                                    <div class="blog-card-footer">
                                        <a href="{{ url('blog/post-slug-4') }}">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Pagination (Replace with Laravel's {{ $posts->links() }} when dynamic) --}}
                    <nav aria-label="Page navigation" class="mt-5 d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-arrow-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
                
                {{-- ===== BLOG SIDEBAR ===== --}}
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget glass-card sidebar-search">
                            <h5 class="widget-title">Search</h5>
                            <form class="input-group">
                                <input type="text" class="form-control" placeholder="Search blog...">
                                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        
                        <div class="sidebar-widget glass-card sidebar-categories">
                            <h5 class="widget-title">Categories</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#">Fashion</a>
                                    <span class="badge rounded-pill">12</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#">Home Decor</a>
                                    <span class="badge rounded-pill">8</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#">Technology</a>
                                    <span class="badge rounded-pill">5</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#">Beauty & Wellness</a>
                                    <span class="badge rounded-pill">9</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="sidebar-widget glass-card">
                            <h5 class="widget-title">Recent Posts</h5>
                            <div class="recent-post">
                                <img src="https://picsum.photos/100/100?random=50" alt="Recent Post 1">
                                <div class="recent-post-info">
                                    <h6 class="recent-post-title"><a href="{{ url('blog/post-slug-1') }}">The Top 10 Fashion Trends</a></h6>
                                    <div class="recent-post-meta">Oct 25, 2025</div>
                                </div>
                            </div>
                            <div class="recent-post">
                                <img src="https://picsum.photos/100/100?random=51" alt="Recent Post 2">
                                <div class="recent-post-info">
                                    <h6 class="recent-post-title"><a href="{{ url('blog/post-slug-2') }}">5 Ways to Style Your Home Office</a></h6>
                                    <div class="recent-post-meta">Oct 22, 2025</div>
                                </div>
                            </div>
                            <div class="recent-post">
                                <img src="https://picsum.photos/100/100?random=52" alt="Recent Post 3">
                                <div class="recent-post-info">
                                    <h6 class="recent-post-title"><a href="{{ url('blog/post-slug-3') }}">The Ultimate Guide to Skincare</a></h6>
                                    <div class="recent-post-meta">Oct 20, 2025</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="sidebar-widget glass-card">
                            <h5 class="widget-title">Tags</h5>
                            <div class="tag-cloud">
                                <a href="#" class="tag">Fashion</a>
                                <a href="#" class="tag">Style</a>
                                <a href="#" class="tag">Electronics</a>
                                <a href="#" class="tag">Home</a>
                                <a href="#" class="tag">Decor</a>
                                <a href="#" class="tag">Beauty</a>
                                <a href="#" class="tag">Trends</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- Note: No custom JS needed here as it relies on common scripts in app.blade.php --}}