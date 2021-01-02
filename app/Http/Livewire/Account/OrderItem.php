<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;

class OrderItem extends Component
{
  public $order;

  public function mount($order)
  {
    $this->order = $order;
  }

  public function render()
  {
    return view('livewire.account.order-item');
  }


}
