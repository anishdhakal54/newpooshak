<?php

namespace App\Http\Livewire\Components;

use App\OrderProduct;
use Livewire\Component;

class BestsellingProducts extends Component
{
  public $best_selling_products;

  public function render()
  {
    $this->best_selling_products = OrderProduct::selectRaw('product_id, count(product_id) AS count')
      ->groupBy('product_id')
      ->with('product')
      ->orderBy('count', 'DESC')
      ->get();
    return view('livewire.components.bestselling-products');
  }
}
