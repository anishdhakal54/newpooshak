<?php

namespace App\Http\Livewire\Partials;

use App\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class MiniCart extends Component
{
  private $user_cartContents;
  private $user_cartTotal;
  public $wishlist;
  protected $listeners = ['rerenderHeader' => '$refresh'];

  public function render()
  {
    $this->wishlist = Wishlist::where([
      'user_id' => auth()->id()
    ])->get()->count();
    $this->user_cartContents = Cart::content();
    $this->user_cartTotal = Cart::total();


    return view('livewire.partials.mini-cart', ['cartContents' => $this->user_cartContents, 'cartTotal' => $this->user_cartTotal]);
  }

  public function deleteCartItem($rowId)
  {
    Cart::remove( $rowId );
    $notify = json_notification('success', 'Success!!!', 'Product successfully remove to cart.', 'linecons-trash');
    $this->emit('notification', $notify);
    $this->emit('rerenderHeader');
  }
}
