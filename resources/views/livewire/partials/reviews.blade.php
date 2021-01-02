<div class="col-lg-6">
  @if(count($reviews) >0)
    <div class="review-wrapper">
      @foreach($reviews as $review)
        <div class="single-review">
          {{-- <div class="review-img">
             <img src="assets/images/testimonial-image/1.png" alt=""/>
           </div>--}}
          <div class="review-content">
            <div class="review-top-wrap">
              <div class="review-left">
                <span><img src="{{asset('assets/images/avatar.png')}}" style="height: 50px;" alt=""></span>
                <div class="review-name" style="padding-left: 20px">
                  <h4>{{$review->user->getFullNameAttribute() }}</h4>
                  <div class="rating-product">
                    @if(null ==$review->star)
                      <i class="ion-android-star"></i>
                      <i class="ion-android-star"></i>
                      <i class="ion-android-star"></i>
                      <i class="ion-android-star"></i>
                      <i class="ion-android-star"></i>
                    @else
                      @for($i = 1; $i<=5; $i++ )
                        <i class="ion-android-star{{ $i <= $review->star?'':'-outline'  }}"></i>
                      @endfor
                    @endif
                  </div>
                  <p>
                    {{ $review->comment }}
                  </p>
                </div>

              </div>
            </div>

          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="col-md-12">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Reviews</h4>
        <p>Be the first to review this product</p>
        <hr>
        <p class="mb-0">Admin will verify your review</p>
      </div>
    </div>

  @endif

</div>