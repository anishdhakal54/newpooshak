<?php

namespace App\Http\Livewire\Components;

use App\Category;
use Livewire\Component;

class PopularCategories extends Component
{
  public $categories;

  public function render()
  {
    $this->categories = Category::all();
    return view('livewire.components.popular-categories');
  }
}
