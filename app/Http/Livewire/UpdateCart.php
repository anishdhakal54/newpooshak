<?php

namespace App\Http\Livewire;

use App\CartProduct;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCart extends Component
{
    protected $listeners = ['rerenderCart' => '$refresh'];

    public function render()
    {
        $usercart = CartProduct::where('user_id', Auth::id())->get();

        return view('livewire.update-cart', compact('usercart'));
    }

    // public function mount(){


    // }

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


    public function checkout()
    {

        return redirect()->to('/checkout');


    }

}
