<div class="shop-list-wrap mb-30px scroll-zoom">
  <div class="row list-product m-0px">
    <div class="col-md-12">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="left-img">
            <div class="img-block mt-28">
              <a href="{{ route('product.show', $product->slug) }}" class="thumbnail">
                @php
                  $photos = '';
                  $photos = $product->getProductGallery();
                 $image = $product->getImageAttribute()
                @endphp
                @if(count($photos)>1)
                  <img class="first-img" src="{{ $image->mediumUrl }}"
                       alt="{{ $product->name }}">
                  @if($image->mediumUrl == $photos[0]->mediumUrl)
                    <img class="second-img" src="{{ isset($photos[1])?$photos[1]->mediumUrl:'' }}"
                         alt="{{ $product->name }}">
                  @else
                    <img class="second-img" src="{{ isset($photos[0])?$photos[0]->mediumUrl:'' }}"
                         alt="{{ $product->name }}">
                  @endif
                @else
                  <img class="first-img" src="{{ $image->mediumUrl }}"
                       alt="{{ $product->name }}">
                @endif
              </a>
             {{-- <div class="quick-view">
                <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                   data-toggle="modal" data-target="#exampleModal">
                  <i class="ion-ios-search-strong"></i>
                </a>
              </div>--}}
            </div>
            @if($product->getDiscountPercentage() != 0)
              <ul class="product-flag">

                <li class="new">Save {{ $product->getDiscountPercentage() }}%</li>
              </ul>

            @endif
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <div class="product-desc-wrap">
            <div class="product-decs">
              <h2><a href="{{ route('product.show', $product->slug) }}" class="product-link">{{$product->name}}</a>
              </h2>
              <div class="rating-product">
                @if(null ==$product->getAverageRating())
                  <i class="ion-android-star"></i>
                  <i class="ion-android-star"></i>
                  <i class="ion-android-star"></i>
                  <i class="ion-android-star"></i>
                  <i class="ion-android-star"></i>
                @else
                  @for($i = 1; $i<=5; $i++ )
                    <i class="ion-android-star{{ $i <= $product->getAverageRating()?'':'-outline'  }}"></i>
                  @endfor
                @endif

              </div>

                  @unless($product->disable_price)
                <div class="pricing-meta">
                  <ul>
                      @if(null !== $product->getSalePriceAttribute())
                        <li class="old-price">{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</li>
                        <li class="current-price">{{trans('app.money_symbol')}} {{ $product->getSalePriceAttribute() }}</li>
                      @else
                        <li class="current-price">{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</li>
                      @endif
                  </ul>
                </div>
                  @endunless



                @if($product->short_description)
                <div class="product-intro-info">
                    {!! $product->short_description !!}
                  </div>
                @endif
              <div class="in-stock">Availability: <span>{{ $product->in_stock != 0 ? 'In Stock' : 'Out Of Stock' }}</span></div>
            </div>
            <div class="add-to-link">
              <ul>
                <li class="cart">
                  <a class="cart-btn" href="javascript:void(0);" title="Add to Cart" wire:click="add_to_cart" wire:loading.class="disabled">
                    <i class="ion-bag" wire:loading.class="hidden"></i>&nbsp;&nbsp; <span><i wire:loading wire:target="add_to_cart" class="fas fa-spinner fa-spin"></i> Add To Cart</span>

                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);" title="Add to Wishlist" wire:click="add_to_wishlist" wire:loading.class="disabled">
                    <span><i wire:loading wire:target="add_to_wishlist" class="fas fa-spinner fa-spin"></i> </span>
                    <i class="ion-heart" wire:loading.class="hidden"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

