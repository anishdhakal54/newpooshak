<?php

namespace App\Http\Livewire\Account;

use Auth;
use Hash;
use Livewire\Component;

class ChangePassword extends Component
{
  public $password;
  public $current_password;
  public $password_confirmation;


  public function render()
  {
    return view('livewire.account.change-password');
  }

  public function changePassword()
  {
    if ($this->current_password == "" || $this->password == "" || $this->password == "") {
      $notify = json_notification('error', 'Validation error!!!', 'Please fill all the fields');
      $this->emit('notification', $notify);
    }
    if ($this->password != $this->password_confirmation) {
      $notify = json_notification('error', 'Validation error!!!', 'Confirmation password doesnot match');
      $this->emit('notification', $notify);
    }

    $this->validate([
      'current_password' => 'required|max:255',
      'password' => 'required|max:255|confirmed'
    ]);
    $user = Auth::user();


    if (Hash::check($this->current_password, $user->password)) {
      $user->update(['password' => bcrypt($this->password)]);

      $notify = json_notification('success', 'Success!!!', 'Password successfully changed');
      $this->emit('notification', $notify);
    } else {
      $notify = json_notification('error', 'Sorry!!!', 'Your current password is wrong!');
      $this->emit('notification', $notify);
    }
  }
}
