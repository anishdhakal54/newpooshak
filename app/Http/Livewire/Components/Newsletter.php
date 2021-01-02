<?php

namespace App\Http\Livewire\Components;

use App\Suscriber;
use Livewire\Component;

class Newsletter extends Component
{
  public $email;

  public function render()
  {
    return view('livewire.components.newsletter');
  }

  public function updated($field)
  {
    $this->validateOnly($field, [
      'email' => 'required|email'
    ]);
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
