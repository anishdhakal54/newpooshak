<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;

class Wishlist extends Component
{


  protected $listeners = ['rerenderWishlist' => '$refresh'];


  public function render()
  {
    $wishlists = \App\Wishlist::where([
      'user_id' => auth()->id()
    ])->get();
    return view('livewire.account.wishlist',['wishlists' => $wishlists]);
  }
}
