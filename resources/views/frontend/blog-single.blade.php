@extends('layouts.app')

{{-- Assume $post variable is passed from the controller --}}
@section('title', $post->title ?? 'The Top 10 Fashion Trends to Watch in 2026 - Elegant Shop') 

{{-- No @section('styles') or @section('scripts') needed as they are handled in app.blade.php --}}

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Blog Post</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('blog') }}">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($post->title ?? 'The Top 10 Fashion Trends...', 30) }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-section">
        <div class="container">
            <div class="row">
                {{-- ===== POST CONTENT ===== --}}
                <div class="col-lg-8">
                    <div class="blog-post-content glass-card">
                        <h2 class="blog-post-title">{{ $post->title ?? 'The Top 10 Fashion Trends to Watch in 2026' }}</h2>
                        <div class="blog-post-meta">
                            <span class="meta-item"><i class="fas fa-user"></i> By {{ $post->author ?? 'Admin' }}</span>
                            <span class="meta-item"><i class="fas fa-calendar-alt"></i> {{ $post->date ?? 'Oct 25, 2025' }}</span>
                            <span class="meta-item"><i class="fas fa-tag"></i> 
                                <a href="#" class="text-primary">{{ $post->category ?? 'Fashion' }}</a>, 
                                <a href="#" class="text-primary">Trends</a>
                            </span>
                        </div>
                        
                        <img src="{{ $post->image_url ?? 'https://picsum.photos/800/450?random=50' }}" class="blog-post-image" alt="Blog Post Image">
                        
                        <div class="blog-post-body">
                            {{-- Post Content (Placeholder for $post->body) --}}
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
                            
                            <p>Integer egestas, orci in pellentesque Mollis, massa lacus commodo Masha, in pellentesqueMassa. Curabitur posuere, Masha eget Mollis, massa lacus commodo Masha, in pellentesque.</p>
                            
                            <blockquote>
                                "Fashion is what you buy. Style is what you do with it. We believe in providing the pieces that let your unique style shine."
                            </blockquote>
                            
                            <h3>Sustainable Fabrics are Here to Stay</h3>
                            <p>Nullam vel sem. Pellentesque dapibus hendrerit tortor. Praesent egestas tristique nibh. Sed a libero. Cras varius. Nulla facilisi. Ut non enim eleifend felis pretium feugiat. Vivamus quis mi.</p>
                            
                            <ul>
                                <li><strong>Bold Colors:</strong> Expect to see vibrant magentas and electric blues.</li>
                                <li><strong>Utility Wear:</strong> Cargo pants and utility vests are making a huge comeback.</li>
                                <li><strong>Sustainable Materials:</strong> Look for organic cotton, hemp, and recycled fabrics.</li>
                            </ul>
                            
                            <p>Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede.</p>
                            {{-- End of Post Content --}}
                        </div>
                        
                        <div class="blog-post-footer">
                            <div class="post-tags">
                                @foreach (explode(',', $post->tags ?? 'Fashion,Trends,Style') as $tag)
                                    <a href="#" class="tag">{{ trim($tag) }}</a>
                                @endforeach
                            </div>
                            <div class="post-share">
                                <span>Share:</span>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Comments Section --}}
                    <div class="comments-section glass-card">
                        <h3 class="comments-title">{{ $post->comment_count ?? '2' }} Comments</h3>
                        
                        {{-- Use @foreach($post->comments as $comment) in a dynamic application --}}
                        <div class="comment">
                            <img src="https://picsum.photos/100/100?random=2" alt="Commenter Avatar" class="comment-avatar">
                            <div class="comment-body">
                                <div class="comment-header">
                                    <span class="comment-name">Jane Doe</span>
                                    <span class="comment-time">Oct 26, 2025</span>
                                </div>
                                <p class="comment-text">Great article! I'm really excited about the move towards sustainable materials. It's so important for the industry.</p>
                            </div>
                        </div>
                        
                        <div class="comment">
                            <img src="https://picsum.photos/100/100?random=3" alt="Commenter Avatar" class="comment-avatar">
                            <div class="comment-body">
                                <div class="comment-header">
                                    <span class="comment-name">John Smith</span>
                                    <span class="comment-time">Oct 27, 2025</span>
                                </div>
                                <p class="comment-text">Not sure about utility vests, but I'm here for the bold colors! Thanks for the insights.</p>
                            </div>
                        </div>
                        
                        {{-- Leave a Reply Form --}}
                        <form class="comment-form mt-5" method="POST" action="{{ url('comments/store') }}">
                            @csrf
                            <h3 class="comment-form-title">Leave a Reply</h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="commentName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="commentName" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="commentEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="commentEmail" name="email" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="commentMessage" class="form-label">Your Comment</label>
                                    <textarea class="form-control" id="commentMessage" name="message" rows="5" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                {{-- ===== BLOG SIDEBAR (REPEATED FROM BLOG.BLADE.PHP) ===== --}}
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
                            {{-- Note: URLs link to the current post's structure (blog-single) --}}
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
                                <a href="#" class="tag">Trends</a>
                                <a href="#" class="tag">Style</a>
                                <a href="#" class="tag">Electronics</a>
                                <a href="#" class="tag">Home</a>
                                <a href="#" class="tag">Decor</a>
                                <a href="#" class="tag">Beauty</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- No custom JS needed here, relying on common scripts in app.blade.php --}}