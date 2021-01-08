<?php

namespace App\Http\Livewire\Account;

use App\DeliveryCharge;
use Livewire\Component;

class OrderView extends Component
{
    public $order;
    public $zone;
    public $district;
    public $area;

    public function mount($id)
    {
        $this->order = \App\Order::find($id);
        $this->zone = DeliveryCharge::where('id', $this->order->getShippingAddressAttribute()->zone)->pluck('name')->toArray();
        $this->district = DeliveryCharge::where('id', $this->order->getShippingAddressAttribute()->district)->pluck('name')->toArray();
        $this->area = DeliveryCharge::where('id', $this->order->getShippingAddressAttribute()->area)->pluck('name')->toArray();

//    foreach ($zone as $z ){
//        dd($z->name);
//    }

    }

    public function render()
    {
        return view('livewire.account.order-view');
    }

}
