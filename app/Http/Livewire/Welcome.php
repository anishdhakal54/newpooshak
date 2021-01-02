<?php

namespace App\Http\Livewire;

use App\Category;
use App\Post;
use App\Product;
use App\Suscriber;
use Livewire\Component;

class Welcome extends Component
{

  public $categories;
  public $latestPosts;
  public $featuredProducts;
  public $latestProducts;

  public $email;

  public function render()
  {
    return view('livewire.welcome');
  }

  public function addSuscriber()
  {
    $this->validate([
      'email' => 'required|max:255|email'
    ]);

    $suscribe = new Suscriber();
    $suscribe->email = $this->email;
    $suscribe->save();
    $this->emit('subscriber_added');
    $this->email = "";
  }
}
