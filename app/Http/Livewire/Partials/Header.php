<?php

namespace App\Http\Livewire\Partials;

use App\CartProduct;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Header extends Component
{
  protected $listeners = ['rerenderHeader' => '$refresh'];

  public function render()
  {
    $cart = CartProduct::where('user_id', auth()->user()->id)->get();
    return view('livewire.partials.header', compact('cart'));
  }

  public function getquote()
  {
    return redirect()->to('/get-quote');
  }

  public $login_email, $password;
  public $enable = true;
  public $count = 5;

  public function updated($field)
  {
    $this->validateOnly($field, [
      'login_email' => 'required|max:255|email',
      'password' => 'required|max:255',

    ]);
  }


  public function login()
  {
    $this->validate([
      'login_email' => 'required|max:255|email',
      'password' => 'required|max:255',
    ]);


    if (auth()->attempt(['email' => $this->login_email, 'password' => $this->password]) == false) {
      $notify = json_notification('error', 'Validation Error', 'Please check your credentials', 'linecons-exit');
      $this->emit('notification', $notify);
      $this->emit('rerenderHeader');

    } else {
      $this->count = 5;
      $this->emit('login_success');
      return redirect()->to('/');
    }


  }

  public function countdown()
  {
    --$this->count;
  }

  public function destroyRow($rowId)
  {
    dd($rowId);
    Cart::remove($rowId);

    // $notify = json_notification('Success', 'Item Removed', 'Item Removed from Cart', 'linecons-like');
    // $this->emit('notification', $notify);
    // $this->emit('rerenderHeader');

    return response()->json([
      'status' => 'success',
      'message' => 'Product successfully removed from cart.'
    ], 200);
  }


}
