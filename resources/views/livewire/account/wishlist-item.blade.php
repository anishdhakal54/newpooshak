<tr>
  <td class="product-thumbnail">
    @php(
            $image = $product->getImageAttribute()
            )

    <a href="#"><img class="first-img" src="{{ $image->smallUrl }}"
                     alt="{{ $product->name }}"></a>
  </td>
  <td class="product-name"><a href="#">{{$product->name}} </a></td>
  <td class="product-price-cart">
    @unless($product->disable_price)
      <div class="product-price-box">
        <ul class="product-price">
          @if(null !== $product->getSalePriceAttribute())
            <li class="old-price">{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</li>
            <li class="current-price">{{trans('app.money_symbol')}} {{ $product->getSalePriceAttribute() }}</li>
          @else
            <li class="current-price">{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</li>
          @endif
        </ul>
      </div>
    @endunless
  </td>
  <td class="product-quantity product-quantity pro-details-quality">
    <a href="{{ route('product.show', $product->slug) }}" ><button class="btn-danger">Customize </button></a>
  </td>

  <td class="product-wishlist-cart">
    <a href="javascript:void(0);" wire:click="remove_item" wire:loading.class="disabled" class="danger-btn"><i
          wire:loading wire:target="remove_item" class="fas fa-spinner fa-spin"></i> Remove</a>
    {{--<a href="javascript:void(0);" type="button" wire:click="add_to_cart"
       wire:loading.class="disabled">
      <span><i wire:loading="" wire:target="add_to_cart" class="fas fa-spinner fa-spin"></i> Add to Cart</span>

    </a>--}}
  </td>
</tr>