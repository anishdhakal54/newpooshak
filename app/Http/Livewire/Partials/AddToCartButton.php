<?php

namespace App\Http\Livewire\Partials;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCartButton extends Component
{
  public $quantity = 1;
  public $product;

  public function mount($product)
  {
    $this->product = $product;
  }

  public function render()
  {
    return view('livewire.partials.add-to-cart-button');
  }

  public function add_to_cart()
  {
    $productId = $this->product->id;
    $quantity = $this->quantity;

    $product = Product::find($productId);
    $price = getProductPrice($product);

    //Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'options' => ['size' => 'large']]);

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

  public function incrementQty()
  {
    $this->quantity++;
  }

  public function decrementQty()
  {
    $this->quantity--;
  }

}
