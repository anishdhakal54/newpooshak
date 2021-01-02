<?php

namespace App\Http\Livewire\Components;

use App\Product;
use Livewire\Component;

class FeaturedProducts extends Component
{
  public $featured_products;

  public function render()
  {
    $this->featured_products = Product::where('is_featured', 1)->orderby('id', 'DESC')->take(15)->get();
    return view('livewire.components.featured-products');
  }
}
