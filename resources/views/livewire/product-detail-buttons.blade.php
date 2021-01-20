<div>

    <button type="button" class="btn_add_to_cart" wire:click="ordernow" >
      Buy Now
    </button>
    <button href="javascript:void(0);" wire:ignore class="button pro-add-to-cart " wire:click="addtocart"
            data-product="{{ $product->id }}" title="Add to Cart" type="button"><span><i
            class="fa fa-shopping-cart"></i> Add to Cart</span></button>

</div>
