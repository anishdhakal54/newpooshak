<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class UpdateCart extends Component
{
  protected $listeners = ['rerenderCart' => '$refresh'];
  public function render()
  {
    return view('livewire.update-cart');
  }

  public function deleteCartItem($rowId)
  {
    Cart::remove($rowId);
    $notify = json_notification('success', 'Success!!!', 'Product successfully remove to cart.', 'linecons-trash');
    $this->emit('notification', $notify);
    $this->emit('rerenderHeader');
  }

  public function deleteAllCartItem()
  {
    Cart::destroy();
    $notify = json_notification('success', 'Success!!!', 'Products are successfully removed from cart.', 'linecons-trash');
    $this->emit('notification', $notify);
    $this->emit('rerenderHeader');
    
  }
}
