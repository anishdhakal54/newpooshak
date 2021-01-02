<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;

class Order extends Component
{
  public $orders;

  protected $listeners = ['rerenderWishlist' => '$refresh'];

  public function mount()
  {
    $this->orders = \App\Order::where([
      'user_id' => auth()->id()
    ])->orderBy('id','DESC')->get();

  }

  public function render()
  {
    return view('livewire.account.order');
  }
}
