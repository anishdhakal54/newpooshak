<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
  public $email, $password;
  public $enable = true;
  public $count = 5;

  public function updated($field)
  {
    $this->validateOnly($field, [
      'email' => 'required|max:255|email',
      'password' => 'required|max:255',

    ]);
  }

  public function render()
  {
    return view('livewire.auth.login');
  }

  public function login()
  {
    $this->validate([
      'email' => 'required|max:255|email',
      'password' => 'required|max:255',
    ]);


    if (auth()->attempt(['email' => $this->email, 'password' => $this->password]) == false) {
      session()->flash('error', 'Login Failed. Credentials do not match');

    } else {
      $this->count = 5;
      session()->flash('success', 'Now We are Redirecting...');
      $this->emit('login_success');
    }


  }

  public function countdown()
  {
    --$this->count;
  }

}
