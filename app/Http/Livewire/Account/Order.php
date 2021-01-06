<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Order extends Component
{
    public $orders;
    public $order_id;

    protected $listeners = ['rerenderWishlist' => '$refresh'];

    public function mount()
    {
        $this->orders = \App\Order::where([
            'user_id' => auth()->id()
        ])->orderBy('id', 'DESC')->get();

    }

    public function render()
    {
        return view('livewire.account.order');
    }

//    public function exchangeOrder(){
//        dd($this->order_id);
//
//
//    }

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
