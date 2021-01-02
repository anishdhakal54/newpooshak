<?php

namespace App\Http\Livewire\Auth;

use App\User;
use Auth;
use Hash;
use Livewire\Component;

class Register extends Component
{
  public $first_name, $last_name, $phone, $email, $password, $password_confirmation;

  public function updated($field)
  {
    $this->validateOnly($field, [
      'first_name' => 'required|max:255',
      'last_name' => 'required|max:255',
      'phone' => 'required|max:255',
      'email' => 'required|max:255|email',
      'password' => 'required|max:255',
      'password_confirmation' => 'required|max:255',

    ]);
  }

  public function render()
  {
    return view('livewire.auth.register');
  }

  public function register()
  {
    $this->validate([
      'first_name' => 'required|max:255',
      'last_name' => 'required|max:255',
      'phone' => 'required|max:255',
      'email' => 'required|max:255|email',
      'password' => 'required|max:255'
    ]);
    $user = User::create([
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'email' => $this->email,
      'phone' => $this->phone,
      'password' => Hash::make($this->password),
    ]);

    Auth::login($user);
    session()->flash('success', 'Registeration Success. We are Redirecting...');
    $this->emit('login_success');

  }
}
