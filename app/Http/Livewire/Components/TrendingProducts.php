<?php

namespace App\Http\Livewire\Components;

use App\Product;
use Livewire\Component;

class TrendingProducts extends Component
{
  public $trending_products;

  public function render()
  {
    $this->trending_products = Product::where('is_trending', 1)->orderby('id', 'DESC')->take(15)->get();
    return view('livewire.components.trending-products');
  }
}
