<div class="product-plr-1">
  @php
    $image = $product->getImageAttribute();
    $categories = $product->categories;

    $link = route('product.show', $product->slug);
    if($is_category){
      if($categories->count()>0){
        $slug = $categories[0]->slug;
        $link = route('shop.category',$slug);
      }

    }


  @endphp
  <div class="single-product-wrap">
    <div
        class="product-img product-img-zoom mb-20"
        style=" margin: 0px auto"
    >
      <a href="{{ $link }}">
        <img src="{{ $image->mediumUrl }}" alt=" {{$product->name}}"/>
      </a>

    </div>
    <div
        class="product-content-categories-2 text-center pb-1 pt-1"
    >
      <h5><a href="{{ $link }}">{{$product->name}}</a></h5>
    </div>

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






