<?php

namespace App\Http\Livewire\Partials;

use App\CartProduct;
use App\Order;
use Auth;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Header extends Component
{
    protected $listeners = ['rerenderHeader' => '$refresh'];
    public $order_id;

    public function render()
    {
//        dd(Session('applocale'));
        $cart = "";
        if (Auth::check()) {

            $cart = CartProduct::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        }

        return view('livewire.partials.header', compact('cart'));
    }

    public function getquote()
    {
        return redirect()->to('/get-quotess');
    }

    public $login_email, $password;
    public $enable = true;
    public $count = 5;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'login_email' => 'required|max:255|email',
            'password' => 'required|max:255',

        ]);
    }


    public function login()
    {
        $this->validate([
            'login_email' => 'required|max:255|email',
            'password' => 'required|max:255',
        ]);


        if (auth()->attempt(['email' => $this->login_email, 'password' => $this->password]) == false) {
            $notify = json_notification('error', 'Validation Error', 'Please check your credentials', 'linecons-exit');
            $this->emit('notification', $notify);
            $this->emit('rerenderHeader');

        } else {
            $this->count = 5;
            $this->emit('login_success');
            return redirect()->to('/');
        }


    }

    public function countdown()
    {
        --$this->count;
    }

    public function destroyRow($rowId)
    {
        $cart = CartProduct::find($rowId);
        $cart->delete();

        $notify = json_notification('Success', 'Item Removed', 'Item Removed from Cart', 'linecons-like');
        $this->emit('notification', $notify);
        $this->emit('rerenderHeader');


    }

    public function exchangeOrder()
    {

        $foundorder = Order::where('id', $this->order_id)->first();
        $foundorder->order_status_id = 4;
        $foundorder->save();
        $notify = json_notification('success', 'Success!!!', 'Please Proceed to buy products', 'linecons-like');
        $this->emit('notification', $notify);
        $this->emit('rerenderHeader');
        $this->order_id = '';

    }


}
