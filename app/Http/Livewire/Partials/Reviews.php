<?php

namespace App\Http\Livewire\Partials;

use App\Product;
use App\Review;
use Livewire\Component;

class Reviews extends Component
{
  public $user_comment, $user_rating=5;
  public $product_id;
  public $reviews;

  public function mount($product_id)
  {
    $this->product_id = $product_id;
    $this->reviews = Product::find($product_id)->getReviews();
  }

  public function render()
  {
    return view('livewire.partials.reviews');
  }

}
