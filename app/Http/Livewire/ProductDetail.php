<?php

namespace App\Http\Livewire;

use App\OrderProduct;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductDetail extends Component
{
  public $cats, $product, $relatedProducts;

  public $quantity = 1;
  public $best_selling_products;

  public function mount($slug)
  {

    $this->product = Product::where('slug', $slug)->first();

    /*    // Previous product
        $previousProduct = Product::where('id', '<', $product->id)->first();
        // Next product
        $nextProduct = Product::where('id', '>', $product->id)->first();*/

    $categories = $this->product->categories()->get()->pluck('id')->toArray();
    // Related products
    $this->relatedProducts = Product::whereHas('categories', function ($query) use ($categories) {
      $query->whereIn('categories.id', $categories);
    })->whereNotIn('name', [$this->product->name])->take(10)->get();
    $this->cats = $this->product->categories()->take(5)->get();
  }

  public function render()
  {
    $this->best_selling_products = OrderProduct::selectRaw('product_id, count(product_id) AS count')
      ->groupBy('product_id')
      ->with('product')
      ->orderBy('count', 'DESC')
      ->get();
    return view('livewire.product-detail');
  }


}
