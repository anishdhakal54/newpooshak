<?php

namespace App\Http\Livewire\Partials;

use App\Slideshow;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Slideshows extends Component
{
  public $slideshows;

  public function render()
  {
    $this->slideshows = Slideshow::orderBy(DB::raw('LENGTH(priority), priority'))->where('page','home')->where('active', '=', 1)->get();
    return view('livewire.partials.slideshows');
  }
}
