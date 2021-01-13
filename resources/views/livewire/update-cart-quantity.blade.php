<td class="product-quantity">
    <!--  <div class="cart-plus-minus">
        <div class="dec qtybutton" wire:click="decrementQty" wire:loading.class="disabled">-</div>
        <input class="cart-plus-minus-box" type="text" name="qtybutton" wire:model="quantity"
               wire:change="updateQuantity">
        <span class="qty-loading" wire:loading wire:target="incrementQty"><i class="fa fa-spinner fa-spin"></i> </span>
        <span class="qty-loading" wire:loading wire:target="decrementQty"><i class="fa fa-spinner fa-spin"></i> </span>
        <div class="inc qtybutton" wire:click="incrementQty" wire:loading.class="disabled">+</div>
      </div>-->
    <div class="row">
        @if(!$disable_size)
            <div class="size_flex">
                <div class="first_seventh">
                    <h6>XS</h6>
                    <input type="number" id="quantity_xs" wire:model="quantity_xs" min="0" value="0">
                </div>
                <div class="first_seventh">
                    <h6>S</h6>
                    <input type="number" id="quantity_s" wire:model="quantity_s" min="0" value="0">
                </div>
                <div class="first_seventh">
                    <h6>M</h6>
                    <input type="number" id="quantity_m" wire:model="quantity_m" min="0" value="0">
                </div>
            </div>
            <div class="size_flex">
                <div class="first_seventh">
                    <h6>XL</h6>
                    <input type="number" id="quantity_xl" wire:model="quantity_xl" min="0" value="0">
                </div>
                <div class="first_seventh">
                    <h6>2XL</h6>
                    <input type="number" id="quantity_2xl" wire:model="quantity_2xl" min="0" value="0">
                </div>
                <div class="first_seventh">
                    <h6>3XL</h6>
                    <input type="number" id="quantity_3xl" wire:model="quantity_3xl" min="0" value="0">
                </div>

            </div>
        @else
            <div class="size_flex">
                <div class="first_seventh">
                    <h4>Quantity</h4>
                    <input type="number" id="quantity" wire:model="quantity" min="0" value="0">

                </div>

            </div>
        @endif
        <div class="size_flex">
            <button type="button" class="updatebtn btn btn-success" wire:click="updatecart"
                    wire:loading.class="disabled">
                <span><i wire:loading wire:target="updatecart()" class="fa fa-spinner fa-spin"></i> Update Cart</span>

            </button>
            <a href="javascript:void(0);"
               wire:click="">

                <img width="15px" src="{{asset('assets/images/trash.svg')}}"></a>
        </div>
    </div>


</td>
