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
    $rowId = $this->rowId;
    $quantity = $this->quantity;

    // Update the quantity
    Cart::update($rowId, $quantity);
    $this->emit('rerenderCart');
  }
}
