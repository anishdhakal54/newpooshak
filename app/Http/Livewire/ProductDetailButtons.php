<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductDetailButtons extends Component
{
  protected $listeners = ['rerenderProductDetail' => '$refresh'];

  public function render()
  {
    return view('livewire.product-detail-buttons');
  }
}
