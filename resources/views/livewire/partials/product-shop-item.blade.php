<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">
  <div class="single-product-wrap mb-35">
    <div class="product-img product-img-zoom mb-15 albmum-preview">
      @php
        $photos = '';
        $photos = $product->getProductGallery();
        $data_gallery = [];
        foreach($photos as $gallery){
        $data_gallery[] = $gallery->mediumUrl;

        }
       $image = $product->getImageAttribute()
      @endphp
      <a href="{{ route('product.show', $product->slug) }}" data-images="<?php echo implode('|', $data_gallery)?>"
         class="album">

        <img src="{{ $image->mediumUrl }}"
             alt="{{ $product->name }}"/>

      </a>
      @if($product->getDiscountPercentage() != 0)
        <span class="pro-badge left bg-red">Save {{ $product->getDiscountPercentage() }}%</span>
      @endif

      {{--@livewire('partials.wishlist-button',['product'=>$product])--}}
      <img class="robologo" src="{{asset('assets/images/robho.png')}}" alt="">
    </div>
    <div class="product-content-wrap-2 text-center">

      <h3>
        <a href="{{ route('product.show', $product->slug) }}"
        >{{$product->name}}</a
        >

      </h3>

      <div class="product-price-2">

        @unless($product->disable_price)
          <div class="product-price text-center">
            @if(null !== $product->getSalePriceAttribute())
              <span class="new-price">{{trans('app.money_symbol')}} {{ $product->getSalePriceAttribute() }}</span>
              <span class="old-price">{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</span>
            @else
              <span class="new-price">{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</span>
            @endif
          </div>
        @endunless
      </div>
    </div>
    <div
        class="product-content-wrap-2 product-content-position text-center"
    >

      <h3>
        <a href="{{ route('product.show', $product->slug) }}"
        >{{$product->name}}</a
        >
      </h3>
      <div class="product-price-2">
        @unless($product->disable_price)
          <div class="product-price text-center">
            @if(null !== $product->getSalePriceAttribute())
              <span class="new-price">{{trans('app.money_symbol')}} {{ $product->getSalePriceAttribute() }}</span>
              <span class="old-price">{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</span>
            @else
              <span class="new-price">{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</span>
            @endif
          </div>
        @endunless
      </div>
      <div class="pro-add-to-cart">
        <a href="{{ route('product.show', $product->slug) }}">
          <button title="Add to Cart">Customize</button>
        </a>
      </div>
    </div>
  </div>
</div>
@push('styles')
  <style>
    .product-price-2 {
      margin-top: 0;
    }
  </style>
@endpush

