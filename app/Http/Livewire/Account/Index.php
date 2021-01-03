<?php

namespace App\Http\Livewire\Account;

use App\Address;
use App\State;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $user;
    public $first_name, $last_name, $email, $phone;
    public $shippingBillingAddress,$address1, $zone,$district,$address2,$postcode,$state,$allstate;
    public function mount()
    {
        $this->user = Auth::user();

        $this->shippingBillingAddress= Address::where('user_id',$this->user->id)->first();
        $this->allstate=State::all();
//        dd($this->allstate);

//        foreach ($this->allstate as $all)
//        {
//            dd($all->name);
//        }

        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;
        $this->address1=$this->shippingBillingAddress->address1;
        $this->address2=$this->shippingBillingAddress->adress2;
        $this->postcode=$this->shippingBillingAddress->postcode;
        $this->state=$this->shippingBillingAddress->state_id;


    }

    public function render()
    {
        return view('livewire.account.index');
    }
    public function editinfo()
    {
//        dd($this);
        $user = Auth::user();

        $user->first_name = $this->first_name;
        $user->last_name  = $this->last_name;
        $user->email      = $this->email;
        $user->phone      = $this->phone;
        $user->save();
    }
}
