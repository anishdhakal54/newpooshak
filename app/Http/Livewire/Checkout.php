<?php

namespace App\Http\Livewire;

use App\Address;
use App\Country;
use App\Mail\Order;
use App\Mail\OrderSent;
use App\Mail\OrderShipped;
use App\OrderStatus;
use App\Product;
use App\State;
use Auth;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Mail;

class Checkout extends Component
{
  public $user, $address, $countries, $states;
  public $error_message = [];


  public $first_name, $last_name, $email, $phone, $address1, $address2, $city, $state, $postcode, $country = 1, $order_note;

  public function updated($field)
  {
    $this->validateOnly($field, [
      'first_name' => 'required|max:255',
      'last_name' => 'required|max:255',
      'email' => 'required|max:255|email',
      'phone' => 'required|max:255',
      'address1' => 'required|max:255',
      'city' => 'required|max:255',
      'state' => 'required|max:255',
      'country' => 'required|max:255'
    ]);
  }

  public function mount()
  {
    $this->user = Auth::user();
    $this->getUserAddress($this->user);
    $this->countries = Country::pluck('name', 'id')->toArray();
    $this->states = array('' => 'Enter your state here..') + State::pluck('name', 'id')->toArray();
  }

  public function render()
  {
    return view('livewire.checkout');
  }

  public function orderNow()
  {
    if ($this->first_name == '' || $this->last_name == '' || $this->email == '' || $this->phone == '' || $this->address1 == '' || $this->city == '' || $this->state == '' || $this->country == '') {
      $notify = json_notification('error', 'Validation Error', 'Please fill all the field', 'linecons-pen');
      $this->emit('notification', $notify);
    }
    $this->validate([
      'first_name' => 'required|max:255',
      'last_name' => 'required|max:255',
      'email' => 'required|max:255|email',
      'phone' => 'required|max:255',
      'address1' => 'required|max:255',
      'city' => 'required|max:255',
      'state' => 'required|max:255',
      'country' => 'required|max:255'
    ]);
    $cartContents = Cart::content();
    $this->error_message = [];
    foreach ($cartContents as $cartContent) {
      $inStock = Product::where('id', $cartContent->id)->first();
      if ($inStock->in_stock == 0) {
        $this->error_message[] = json_encode([
          'product_name' => $inStock->name,
          'quantity' => 0
        ]);
      }

    }
    if (!empty($this->error_message)) {
      $notify = json_notification('error', 'Out of order', 'Sorry we are out of stock try update product');
      $this->emit('notification', $notify);
      session()->flash('error_message', $this->error_message);
      return false;
    }


    //create order from frontend
    $order = $this->createFrontendOrder();

    $data = [

      'name' => $this->first_name . '  ' . $this->last_name,
      'products' => $cartContents,
      'email' => $this->email,
      'phone' => $this->phone,
      'city' => $this->city,
      'address1' => $this->address1,
      'address2' => $this->address2,


    ];
    $data2 = [
      'name' => $this->first_name . '  ' . $this->last_name,
      'products' => $cartContents,
      'subject' => 'Order Received'

    ];
    Mail::to(getConfiguration('order_email'))->send(new OrderShipped($data));

    Mail::to($this->email)->send(new OrderSent($data2));

    $notify = json_notification('success', 'Success!!!', 'Order Successfully recieved. we will contact you as soon as possible.','linecons-like');
    $this->emit('notification', $notify);
    session()->flash('order', " Thank you. Your order has been received.");
    $this->emit('rerenderHeader');

  }

  public function getUserAddress($user)
  {
    $address = $user->addresses->first->toArray();
    if ($address) {
      $this->first_name = $address->first_name;
      $this->last_name = $address->last_name;
      $this->email = $address->email;
      $this->phone = $address->phone;
      $this->address1 = $address->address1;
      $this->address2 = $address->address2;
      $this->postcode = $address->postcode;
      $this->city = $address->city;
      $this->state = $address->state_id->id;
      $this->country = $address->country_id;

    }

  }

  protected function createFrontendOrder()
  {
    $addressData = [
      'type' => 'SHIPPING',
      'user_id' => auth()->id(),
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'email' => $this->email,
      'phone' => $this->phone,
      'address1' => $this->address1,
      'address2' => $this->address2,
      'country_id' => isset($this->country) ? $this->country : 1,
      'state_id' => $this->state,
      'city' => $this->city,
      'postcode' => $this->postcode,
    ];

    $address = Address::updateOrCreate(['user_id' => auth()->id()], $addressData);


    $orderStatus = OrderStatus::whereIsDefault(1)->get()->first();

    // Create new order
    $order = \App\Order::create([
      'billing_address_id' => $address->id,
      'shipping_address_id' => $address->id,
      'user_id' => auth()->id(),
      'enable_tax' => getConfiguration('enable_tax'),
      'tax_percentage' => (int)getConfiguration('tax_percentage'),
      'order_status_id' => $orderStatus->id,
      'order_note' => $this->order_note,
      'order_date' => Carbon::now()->toDateTimeString(),
    ]);

    // Attach products
    $cartContents = Cart::content();
    if ($cartContents) {


      foreach ($cartContents as $cartContent) {

        $order->products()->attach($cartContent->id,
          [
            'qty' => $cartContent->qty,
            'price' => $cartContent->price,
            'discount' => 0.00,
            'tax_amount' => 0.00

          ]
        );

      }
    }
    // Destory cart
    Cart::destroy();

    return $order;
  }


}
