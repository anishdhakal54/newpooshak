<?php

namespace App\Http\Livewire\Partials;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductItem2 extends Component
{
  public $product;
  public $quantity = 1;
  public function mount($product)
  {
    $this->product = $product;
  }

  public function render()
  {
    return view('livewire.partials.product-item2');
  }

  public function add_to_cart()
  {
    $productId = $this->product->id;
    $quantity = $this->quantity;

    $product = Product::find($productId);
    $price = getProductPrice($product);

    Cart::add([
      'id' => $product->id,
      'name' => $product->name,
      'qty' => $quantity,
      'price' => $price
    ]);

    $notify = json_notification('success', 'Success!!!', 'Product successfully added to cart.', 'linecons-like');
    $this->emit('notification', $notify);
    $this->emit('rerenderHeader');

  }
}
