<?php

namespace App\Http\Livewire\Account;

use Auth;
use Livewire\Component;

class AccountInformation extends Component
{
  public $user;
  public $first_name, $last_name, $email, $phone;


  public function mount()
  {
    $this->user = Auth::user();
    $this->first_name = $this->user->first_name;
    $this->last_name = $this->user->last_name;
    $this->phone = $this->user->phone;
    $this->email = $this->user->email;

  }

  public function render()
  {
    $this->user = Auth::user();

    return view('livewire.account.account-information');
  }

  public function editinfo()
  {
    $user = Auth::user();

    $user->first_name = $this->first_name;
    $user->last_name  = $this->last_name;
    $user->email      = $this->email;
    $user->phone      = $this->phone;
    $user->save();
  }



}
