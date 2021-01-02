<?php

namespace App\Http\Livewire\Partials;

use App\Product;
use App\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductItem extends Component
{
  public $product;
  public $quantity = 1;
  public $is_category;

  public function mount($product, $is_category = false)
  {
    $this->product = $product;
    $this->is_category = $is_category;

  }

  public function render()
  {
    return view('livewire.partials.product-item');
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
      $notify = json_notification('success', 'Success!!!', 'Product added into your wishlist!!', 'linecons-heart');
      $this->emit('notification', $notify);
      return true;
    }

    $wishlist->create([
      'user_id' => auth()->id(),
      'product_id' => $this->product->id,
    ]);

    $notify = json_notification('success', 'Success!!!', 'Product added into your wishlist!!', 'linecons-heart');
    $this->emit('notification', $notify);
    $this->emit('rerenderHeader');

    return true;
  }
}
