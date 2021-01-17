<?php

namespace App\Http\Livewire;

use App\CartProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class UpdateCartQuantity extends Component
{
  public $cartContent;
  public $subtotal;
  public $rowId;
  public $quantity;
  public $cartId;
  public $disable_size = false;
  public $discount;

  public $quantity_xs = 0, $quantity_s = 0, $quantity_m = 0,$quantity_l = 0, $quantity_xl = 0, $quantity_2xl = 0, $quantity_3xl = 0;

  public function mount($cartContent,$discount)
  {
//      dd($this->discount=$discount);
    $this->disable_size = $cartContent->product->disable_size;
    $this->cartId = $cartContent->id;
    $this->cartContent = $cartContent->toArray();
    $this->subtotal = $cartContent->total;
    $this->rowId = $cartContent->rowId;
    $this->quantity = $cartContent->qty;
    $this->quantity_xs = $this->cartContent['xs'];
    $this->quantity_s = $this->cartContent['s'];
    $this->quantity_m = $this->cartContent['m'];
      $this->quantity_l = $this->cartContent['l'];
    $this->quantity_xl = $this->cartContent['xl'];
    $this->quantity_2xl = $this->cartContent['xxl'];
    $this->quantity_3xl = $this->cartContent['xxxl'];


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

  public function updatecart()
  {
    $cartProduct = CartProduct::find($this->cartId);
    $cartProduct->qty = $this->quantity;
    $cartProduct->xs = $this->quantity_xs;
    $cartProduct->s = $this->quantity_s;
    $cartProduct->m = $this->quantity_m;
    $cartProduct->l = $this->quantity_l;
    $cartProduct->xl = $this->quantity_xl;
    $cartProduct->xxl = $this->quantity_2xl;
    $cartProduct->xxxl = $this->quantity_3xl;
    $cartProduct->price = getTotal($cartProduct,$cartProduct->hasframe);
    $cartProduct->save();
    $notify = json_notification('success', 'Success!!!', 'Cart Updated Successfully!!!', 'linecons-like');
    $this->emit('notification', $notify);
    $this->emit('reload_current');

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
