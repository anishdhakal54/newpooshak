<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class UpdateCartQuantity extends Component
{
  public $cartContent;
  public $subtotal;
  public $rowId;
  public $quantity;

  public $quantity_xs = 0, $quantity_s = 0, $quantity_m = 0, $quantity_xl = 0, $quantity_2xl = 0, $quantity_3xl = 0;

  public function mount($cartContent)
  {
    $this->cartContent = $cartContent->toArray();
    $this->subtotal = $cartContent->total;
    $this->rowId = $cartContent->rowId;
    $this->quantity = $cartContent->qty;

  }

  public function render()
  {
    return view('livewire.update-cart-quantity');
  }

  public function incrementQty()
  {
    $this->quantity++;
    $this->updateQuantity();
  }

  public function decrementQty()
  {
    $this->quantity--;
    $this->updateQuantity();
  }

  public function updateQuantity()
  {
    /*$rowId = $this->rowId;
    $quantity = $this->quantity;
    $p_arr = [
      'name' => $product->name,
      'qty' => $quantity,
      'price' => $price,
      'options' => [
        'quantity_xl' => $quantity_xl,
        'quantity_2xl' => $quantity_2xl,
        'quantity_3xl' => $quantity_3xl,
        'quantity_m' => $quantity_m,
        'quantity_s' => $quantity_s,
        'quantity_xs' => $quantity_xs,
        'has_frame' => $has_frame,
        'place' => $place,
        'color_no'=>$color_no,
        'imagename'=>$imagename,


      ]

    Cart::add([
      'id' => $product->id,
      'name' => $product->name,
      'qty' => $quantity,
      'price' => $price,
      'options' => [
        'quantity_xl' => $quantity_xl,
        'quantity_2xl' => $quantity_2xl,
        'quantity_3xl' => $quantity_3xl,
        'quantity_m' => $quantity_m,
        'quantity_s' => $quantity_s,
        'quantity_xs' => $quantity_xs,
        'has_frame' => $has_frame,
        'place' => $place,
        'color_no'=>$color_no,
        'imagename'=>$imagename,


      ]
    ]);*/

    // Update the quantity
//    Cart::update($rowId, $quantity);
    $this->emit('rerenderCart');
  }
}
