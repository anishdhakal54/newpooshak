<div class="pro-details-quality">
  <div class="cart-plus-minus">
    <div class="dec qtybutton" wire:click="decrementQty" wire:loading.class="disabled">-</div>
    <input class="cart-plus-minus-box" type="text" wire:model="quantity">
    <div class="inc qtybutton" wire:click="incrementQty" wire:loading.class="disabled">+</div>
  </div>
  <div class="pro-details-cart btn-hover">
    <a href="javascript:void(0);" type="button" wire:click="add_to_cart" wire:loading.class="disabled">
      <span><i wire:loading wire:target="add_to_cart" class="fas fa-spinner fa-spin"></i> Add to Cart</span>

    </a>
  </div>
</div>