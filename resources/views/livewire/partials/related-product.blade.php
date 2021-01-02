<article class="list-product">
  <div class="img-block">
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
    {{--<div class="quick-view">
      <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal"
         data-target="#exampleModal">
        <i class="ion-ios-search-strong"></i>
      </a>
    </div>--}}
  </div>
  @if($product->getDiscountPercentage() != 0)
    <ul class="product-flag">

      <li class="new">Save {{ $product->getDiscountPercentage() }}%</li>
    </ul>

  @endif
  <div class="product-decs">
    <h2><a href="{{ route('product.show', $product->slug) }}" class="product-link">{{$product->name}}</a></h2>
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
    <div class="pricing-meta">
      <ul>
        @unless($product->disable_price)
          <div class="product-price-box">
            @if(null !== $product->getSalePriceAttribute())
              <li class="old-price">{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</li>
              <li class="current-price">{{trans('app.money_symbol')}} {{ $product->getSalePriceAttribute() }}</li>
            @else
              <li class="current-price">{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</li>
            @endif
          </div>
        @endunless

      </ul>
    </div>
  </div>
  <div class="add-to-link">
    <ul>
      <li class="cart">
        <a class="cart-btn" href="javascript:void(0);" title="Add to Cart" wire:click="add_to_cart" wire:loading.class="disabled">
          <span><i wire:loading wire:target="add_to_cart" class="fas fa-spinner fa-spin"></i> </span>
          <span  wire:loading.class="hidden">ADD TO CART </span>
        </a>
      <li>
        <a href="javascript:void(0);" title="Add to Wishlist" wire:click="add_to_wishlist" wire:loading.class="disabled">
          <span><i wire:loading wire:target="add_to_wishlist" class="fas fa-spinner fa-spin"></i> </span>
          <i class="ion-heart" wire:loading.class="hidden"></i>
        </a>

      </li>
      {{--<li>
        <a href="compare.html"><i class="ion-ios-shuffle-strong"></i></a>
      </li>--}}
    </ul>
  </div>
</article>