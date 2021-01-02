<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;

class OrderView extends Component
{
  public $order;

  public function mount($id)
  {
    $this->order = \App\Order::find($id);
  }

  public function render()
  {
    return view('livewire.account.order-view');
  }
}
