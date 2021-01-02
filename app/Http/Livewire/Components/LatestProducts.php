<?php

namespace App\Http\Livewire\Components;

use App\Product;
use Livewire\Component;

class LatestProducts extends Component
{
  public $latestProducts;

  public function mount(){
    $this->latestProducts = Product::orderby('id', 'DESC')->take(15)->get();
  }

  public function render()
  {

    return view('livewire.components.latest-products');
  }
}
