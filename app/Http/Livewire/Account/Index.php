<?php

namespace App\Http\Livewire\Account;

use App\Address;

use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Order;

class Index extends Component
{
    public $user;
    public $first_name, $last_name, $email, $phone;
    public $shippingBillingAddress, $address1, $zone, $district, $address2, $postcode, $state;
    public $order_id;


    public function mount()
    {
        $this->user = Auth::user();
//        dd($this->user->first_name);

        $this->shippingBillingAddress = User::where('id', $this->user->id)->first();

//        dd($this->allstate);

//        foreach ($this->allstate as $all)
//        {
//            dd($all->name);
//        }


        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;
        if ($this->shippingBillingAddress != null) {
            $this->address1 = $this->shippingBillingAddress->address1;
            $this->address2 = $this->shippingBillingAddress->address2;
            $this->postcode = $this->shippingBillingAddress->postcode;
            $this->state = $this->shippingBillingAddress->state_id;
        }


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
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->phone = $this->phone;




        $user->save();

        $notify = json_notification('success', 'Success!!!', 'Profile Updated Successfully', 'linecons-like');
        $this->emit('notification', $notify);
        $this->emit('rerenderHeader');
    }

    public function exchangeOrder()
    {
        $user_id = Auth::user()->id;


        $foundorder = \App\Order::where('user_id', $user_id)->where('id', $this->order_id)->first();
        if ($foundorder == null) {
            $notify = json_notification('error', 'Error!!!', 'Couldnot find order from your given Order Id', 'linecons-pen');
            $this->emit('notification', $notify);
            $this->emit('rerenderHeader');
            return;
        } elseif ($foundorder->order_status_id == 6) {
            $notify = json_notification('error', 'Error!!!', 'This order has already been keept in exchange request, Please proceed to buy other products', 'linecons-pen');
            $this->emit('notification', $notify);
            $this->emit('rerenderHeader');
            return;
        }

        $foundorder->order_status_id = 6;
        $foundorder->save();
        $notify = json_notification('success', 'Success!!!', 'Please Proceed to buy other products, We will get back to you shortly!', 'linecons-like');
        $this->emit('notification', $notify);
        $this->emit('rerenderHeader');
        $this->order_id = '';


    }


}
