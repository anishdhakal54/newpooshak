<?php

namespace App\Http\Livewire\Partials;

use App\Review;
use Livewire\Component;

class AddRating extends Component
{
  public $product_id, $user_rating=5,$user_comment;
  public function mount($product_id)
  {
    $this->product_id = $product_id;
  }

  public function render()
  {
    return view('livewire.partials.add-rating');
  }

  public function setRating($star)
  {
    $this->user_rating = $star;
  }

  public function storeReview()
  {
    $this->validate([
      'user_rating' => 'required',
      'user_comment' => 'required',
    ]);

    $review = new Review();
    $review->user_id = auth()->id();
    $review->product_id = $this->product_id;
    $review->star = $this->user_rating;
    $review->comment = $this->user_comment;

    $review->save();

    $notify = json_notification('success', 'Success!!!', 'Your review successfully posted', 'linecons-like');
    $this->emit('notification', $notify);
    $this->user_comment = "";
    $this->user_rating = 5;

  }


}
