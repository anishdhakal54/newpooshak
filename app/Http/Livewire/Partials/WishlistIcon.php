<?php

namespace App\Http\Livewire\Partials;

use App\Wishlist;
use Livewire\Component;

class WishlistIcon extends Component
{
  public function render()
  {
    return view('livewire.partials.wishlist-icon');
  }

  public $product;

  public function mount($product)
  {
    $this->product = $product;
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
