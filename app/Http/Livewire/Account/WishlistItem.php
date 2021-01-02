<?php

namespace App\Http\Livewire\Account;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishlistItem extends Component
{
  public $product;
  public $quantity = 1;
  public $subtotal;

  public function mount($product)
  {
    $this->product = $product;
    $this->updated();
  }

  public function updated()
  {
    if (null !== $this->product->getSalePriceAttribute()) {
      $this->subtotal = floatval($this->product->getSalePriceAttribute()) * floatval($this->quantity);
    } else {
      $this->subtotal = floatval($this->product->getRegularPriceAttribute()) * floatval($this->quantity);
    }
  }

  public function render()
  {
    return view('livewire.account.wishlist-item');
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

  public function remove_item()
  {
    $product = Product::findOrFail( $this->product->id );

    \App\Wishlist::where( [
      'user_id'    => auth()->id(),
      'product_id' => $product->id,
    ] )->delete();
    return redirect()->to('/wishlist');
  }
}
