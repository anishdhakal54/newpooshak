<div>
  <!-- Breadcrumb Area start -->
  <section class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-content">
            <h1 class="breadcrumb-hrading">Blog Post</h1>
            <ul class="breadcrumb-links">
              <li><a href="index.html">Home</a></li>
              <li>{{$post->title}}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Area End -->
  <!-- Shop Category Area End -->
  <div class="shop-category-area single-blog">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-12" style="margin: 0 auto">
          <div class="blog-posts">
            <div class="single-blog-post blog-grid-post">
              <div class="blog-post-media">
                <div class="blog-image single-blog">
                  <a href="{{ optional($post->getImage())->largeUrl }}" target="_blank"><img
                        style="width:100%;margin-bottom:20px;"
                        src="{{ optional($post->getImage())->largeUrl }}" alt="blog"/></a>
                </div>
              </div>
              <div class="blog-post-content-inner">
                <h4 class="blog-title"><a href="javascript:void(0);">{{$post->title}}</a>
                </h4>
                <ul class="blog-page-meta">
                  <li>
                    <a href="javascript:void(0);"><i
                          class="icon-user"></i> {{$post->user->first_name.' '.$post->user->last_name}} </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);"><i class="icon-clock"></i> {{$post->created_at}}</a>
                  </li>
                  <li><a href="javascript:void(0);">{{$post->tags}}</a></li>
                </ul>

              </div>
              <div class="single-post-content">
                {!! $post->content !!}
              </div>
            </div>
            <!-- single blog post -->
          </div>


          <div class="comment-area">
            <h2 class="comment-heading">{{ $this->comments->count() }} Comments</h2>
            <div class="review-wrapper">
              @if($this->comments->count() > 0)
                @foreach($this->comments as $comment)
                  <div class="single-review">
                    <div class="review-img">
                      <img class="avatar" alt=""
                           src="{{ null !== $comment->user->getImage() ? $comment->user->getImage()->smallUrl : url('/uploads/avatar.jpg') }}">
                    </div>
                    <div class="review-content">
                      <div class="review-top-wrap">
                        <div class="review-left">
                          <div class="review-name">
                            <h4>{{ $comment->user->full_name }}</h4>
                            <span
                                class="date">{{ Carbon\Carbon::parse($comment->created_at)->format('F j, Y g:i a') }}</span>
                          </div>
                        </div>

                      </div>
                      <div class="review-bottom">
                        <p>
                          {{ $comment->comment }}
                        </p>
                      </div>
                    </div>
                  </div>
                @endforeach
              @else
                <div class="col-md-12">
                  <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Comments</h4>
                    <p>Be the first one to comment.</p>
                    <hr>
                    <p class="mb-0">Comment of non-volience and agressive will not be tolerated.</p>
                  </div>
                </div>
              @endif


            </div>
          </div>
          <div class="blog-comment-form">
            <h2 class="comment-heading">Leave a Reply</h2>
            <p>Your email address will not be published. Required fields are marked *</p>
            <div class="row">
              <div class="col-md-12">
                @if (Session::has('success'))
                  <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><i class="fa fa-thumbs-o-up"></i> Success!</strong>
                    {!! session('success') !!}<span><i
                          class="fas fa-spinner fa-spin"></i> </span>
                  </div>
                @endif
                @if (Session::has('error'))
                  <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><i class="fa fa-warning"></i>Oh snap!</strong>
                    {!! session('error') !!}
                  </div>
                @endif


                <div class="single-form">
                  <label>Your Review:</label>
                  <textarea class=" @if ($errors->has('user_comment')) is-invalid @endif"
                            placeholder="Write a review" wire:model="user_comment"></textarea>
                  @if ($errors->has('user_comment'))
                    <span class="error invalid-feedback ">{{ $errors->first('user_comment') }}</span>
                  @endif
                </div>
              </div>

              <div class="col-md-12">
                <div class="single-form">
                  <button type="submit" class="submit" value="Submit" wire:click="postComment"
                          wire:loading.class="disabled"><i wire:loading wire:target="postComment"
                                                           class="fas fa-spinner fa-spin"></i>
                    Submit
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Shop Category Area End -->
</div>
@push('styles')
  <style>
    .avatar {
      border-radius: 50%;
      width: 85px;
    }

    .comment-area .review-content {
      width: 100%;
    }

    .submit {
      border: none;
      background-color: #4fb68d;
      color: #fff;
      font-size: 14px;
      font-weight: 700;
      text-transform: uppercase;
      line-height: 1;
      padding: 15px 52px;
      margin-top: 0px;
      outline: none;
      -webkit-transition: all .3s ease 0s;
      -o-transition: all .3s ease 0s;
      transition: all .3s ease 0s;
      border-radius: 30px;
      margin-bottom: 15px;
    }

  </style>

@endpush