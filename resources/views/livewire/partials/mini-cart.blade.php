<div class="cart-info-wrap">
  <div class="cart-info d-flex home-9">
    <style>
      .count-cart.heart:after {
        content: '{{$wishlist}}';
      }

      .count-cart:after {
        content: '{{ count($cartContents) }}';
      }
    </style>
    <a href="{{route('wishlist')}}" class="count-cart heart"></a>
    <div class="mini-cart-warp">
      <a href="javascript:void(0);" class="count-cart"><span>{{trans('app.money_symbol')}} {{ $cartTotal }}</span></a>
      <div class="mini-cart-content">
        @if(count($cartContents))
          <ul class="cart-list">
            @foreach($cartContents as $cartContent)
              <li class="single-shopping-cart">
                <div class="shopping-cart-img">
                  <a href="{{ route('product.show', getProductSlug($cartContent->id)) }}">
                    <img src="{{ asset(getProductImage($cartContent->id, 'small')) }}"
                         alt="{{ $cartContent->name }}">
                    <span class="product-quantity">{{ $cartContent->qty }}</span>
                  </a>
                </div>
                <div class="shopping-cart-title">
                  <h4><a href="single-product.html">{{ $cartContent->name }}</a></h4>
                  <span>{{trans('app.money_symbol')}} {{ $cartContent->price }}</span>
                  <div class="shopping-cart-delete">
                    <a href="javascript:void(0);" wire:click="deleteCartItem('{{$cartContent->rowId}}')"><i class="ion-android-cancel"></i></a>
                  </div>
                </div>
              </li>
            @endforeach

          </ul>
          <div class="shopping-cart-total">
            <h4 class="shop-total">Total : <span>{{trans('app.money_symbol')}} {{ $cartTotal }}</span></h4>
          </div>
          <div class="shopping-cart-btn text-center">
            <a href="{{ route('cart.index') }}" class="default-btn">View
              Cart</a>
            <br/>
            <a href="{{ route('checkout') }}"
               class="default-btn">Checkout</a>
          </div>
        @else
          <div class="single-shopping-cart">
            <p class="mb-none">No products in cart.</p>
          </div>
        @endif

      </div>
    </div>
  </div>
</div>
