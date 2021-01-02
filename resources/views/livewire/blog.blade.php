<div>
    <!-- Breadcrumb Area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-hrading">Blog Post</h1>
                        <ul class="breadcrumb-links">
                            <li><a href="/">Home</a></li>
                            <li>Blog Page</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->
    <!-- Shop Category Area End -->
    <div class="shop-category-area blog-grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12" style="margin: 0 auto;">
                    <div class="blog-posts">
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-md-6">
                                    <div class="single-blog-post blog-grid-post">
                                        <div class="blog-post-media">
                                            <div class="blog-gallery">
                                                <div class="gallery-item">
                                                    <a href="{{ route('blog.show', $post->slug) }}"><img
                                                                src="{{ optional($post->getImage())->mediumBlogUrl }}"
                                                                alt="{{ $post->title }}"></a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="blog-post-content-inner mt-30">
                                            <h4 class="blog-title"><a
                                                        href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                            </h4>
                                            <ul class="blog-page-meta">
                                                <li>
                                                    <a href="#"><i class="icon-user"></i> {{ $post->user->full_name }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon-clock"></i
                                                        > {{ Carbon\Carbon::parse($post->created_at)->format('d M, Y') }}
                                                    </a>
                                                </li>
                                            </ul>
                                            <p>
                                                {{excerpt($post->content,50)}}
                                            </p>
                                            <a class="read-more-btn" href="{{ route('blog.show', $post->slug) }}"> Read
                                                More <i class="ion-android-arrow-dropright-circle"></i></a>
                                        </div>
                                    </div>
                                    <!-- single blog post -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--  Pagination Area Start -->
                    <div class="pro-pagination-style text-center">
                        {{$posts->links()}}
                    </div>
                    <!--  Pagination Area End -->
                </div>

            </div>
        </div>
    </div>
    <!-- Shop Category Area End -->
</div>
