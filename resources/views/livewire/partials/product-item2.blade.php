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
    <div class="quick-view">

      <a class="quick_view" href="javascript:void(0);" title="Add to cart" wire:click="add_to_cart" wire:loading.class="disabled">
        <i class="ion-bag"></i>
      </a>
    </div>
  </div>
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
          @if(null !== $product->getSalePriceAttribute())
            <li class="old-price">{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</li>
            <li class="current-price">{{trans('app.money_symbol')}} {{ $product->getSalePriceAttribute() }}</li>
          @else
            <li class="current-price">{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</li>
          @endif
        @endunless
      </ul>
    </div>
  </div>
</article>
