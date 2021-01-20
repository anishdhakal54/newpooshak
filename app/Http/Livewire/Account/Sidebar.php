<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    public $order_id;
    public function render()
    {
        return view('livewire.account.sidebar');
    }
    public function exchangeOrder()
    {
        $user_id = Auth::user()->id;


        $foundorder = \App\Order::where('user_id', $user_id)->where('id', $this->order_id)->first();
      $day=(Carbon::now()->diffInDays(Carbon::parse($foundorder->order_date)));
      if($day>getConfiguration('expiry_time')){
//        dd('here');
        $notify = json_notification('error', 'Error!!!', 'Couldnot Exchange order because the order has already exceeded '.getConfiguration('expiry_time').' days', 'linecons-pen');
        $this->emit('notification', $notify);
        $this->emit('rerenderHeader');
        return;
      }
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
