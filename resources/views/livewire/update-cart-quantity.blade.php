<td class="product-quantity">
  <div class="cart-plus-minus">
    <div class="dec qtybutton" wire:click="decrementQty" wire:loading.class="disabled">-</div>
    <input class="cart-plus-minus-box" type="text" name="qtybutton" wire:model="quantity"
           wire:change="updateQuantity">
    <span class="qty-loading" wire:loading wire:target="incrementQty"><i class="fa fa-spinner fa-spin"></i> </span>
    <span class="qty-loading" wire:loading wire:target="decrementQty"><i class="fa fa-spinner fa-spin"></i> </span>
    <div class="inc qtybutton" wire:click="incrementQty" wire:loading.class="disabled">+</div>
  </div>

</td>
