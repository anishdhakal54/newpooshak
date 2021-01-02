<?php

namespace App\Http\Livewire\Account;

use App\Address;
use Livewire\Component;

class AddressBook extends Component
{
  public $shippingAddress;
  public function mount()
  {
    $this->shippingAddress = Address::where('user_id', auth()->id())->where('type', 'SHIPPING')->first();
  }

  public function render()
  {
    return view('livewire.account.address-book');
  }
}
