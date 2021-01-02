<?php

namespace App\Http\Livewire\Partials;

use App\Product;
use App\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class RelatedProduct extends Component
{
  public $product;
  public $quantity = 1;

  public function mount($product)
  {
    $this->product = $product;
  }

  public function render()
  {
    return view('livewire.partials.related-product');
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


  public function add_to_wishlist()
  {
    if (auth()->guest()) {
      $notify = json_notification('error', 'Sorry!!!', 'Please login to add this product in your wishlist!!', 'linecons-key');
      $this->emit('notification', $notify);
      return false;
    }

    $wishlist = new Wishlist();

    if ($wishlist->isInWishlist($this->product->id)) {
      $notify = json_notification('success', 'Success!!!', 'Product added into your wishlist!!', 'linecons-key');
      $this->emit('notification', $notify);
      return true;
    }

    $wishlist->create([
      'user_id' => auth()->id(),
      'product_id' => $this->product->id,
    ]);

    $notify = json_notification('success', 'Success!!!', 'Product added into your wishlist!!', 'linecons-key');
    $this->emit('notification', $notify);
    $this->emit('rerenderHeader');

    return true;
  }
}
