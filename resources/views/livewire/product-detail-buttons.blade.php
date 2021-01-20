<div>
  @if(Auth::check())
    <button type="button" class="btn_add_to_cart" wire:ignore data-toggle="modal" data-target="#myModal">
      Buy Now
    </button>
    <button href="javascript:void(0);" wire:ignore class="button pro-add-to-cart " wire:click="addtocart"
            data-product="{{ $product->id }}" title="Add to Cart" type="button"><span><i
            class="fa fa-shopping-cart"></i> Add to Cart</span></button>
  @else
    <button type="button" class="btn_add_to_cart" data-toggle="modal" data-target="#demoModal36699">
      Order
      Now
    </button>
    <button type="button" class="btn_add_to_cart" data-toggle="modal" data-target="#demoModal36699">
      Add to Cart
    </button>
  @endif
</div>
