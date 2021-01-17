<?php

namespace App\Http\Livewire;

use App\Address;
use App\CartProduct;
use App\Country;
use App\Mail\Order;
use App\Mail\OrderSent;
use App\Mail\OrderShipped;
use App\OrderStatus;
use App\Product;
use App\User;
use Auth;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Mail;
use Illuminate\Http\Request;

class Checkout extends Component
{
    public $user, $address, $countries;
    public $error_message = [];


    public $first_name, $last_name, $email, $phone, $zone, $lat, $lon, $district, $area, $address1, $address2, $postcode, $country = 1, $order_note;

    public $pan, $billing_name;
    public $usercart;
    public $rewards;
    public $grandTotal;
    public $subTotal = 0;
    public $subTotal_;
    public $discount = 0;
    public $has_bulk_discount;
    public $discountPrice;
    public $tax_amount;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'phone' => 'required|max:255',
            'zone' => 'required',
            'district' => 'required',
            'area' => 'required',
            'address1' => 'required',
            'pan' => 'digits:9|integer'

//      'address1' => 'required|max:255',


//      'country' => 'required|max:255'
        ]);
    }

    public function mount()
    {

        $this->has_bulk_discount = false;
//    $this->user = Auth::user();
//    $this->getUserAddress($this->user);
        $this->user = Auth::user();
        $usercart = CartProduct::where('user_id', Auth::id())->get();

//        dd($this->user->first_name);

//      $this->shippingBillingAddress = User::where('id', $this->user->id)->first();

//        dd($this->allstate);

//        foreach ($this->allstate as $all)
//        {
//            dd($all->name);
//        }
        foreach ($usercart as $cartContent) {
            $this->subTotal_ = getSubtotal($cartContent);
            $this->subTotal += getSubtotal($cartContent);
            $this->discount_ = getDiscount(cartQty($cartContent));
            $this->discount += $this->subTotal_ * $this->discount_ / 100;
            if (cartQty($cartContent) > 4) {
                $has_bulk_discount = true;
            }


            if (!$this->has_bulk_discount) {
                $discount_item = getMitemDiscount($usercart);
                $discount = $this->subTotal * $discount_item / 100;
            }

            $tax = 0;
            if (getConfiguration('enable_tax')) {
                $tax = ($this->subTotal * getConfiguration('tax_percentage')) / 100;
            }
            $this->grandTotal = $this->subTotal + $tax - $discount;


        }


        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;
        $this->countries = Country::pluck('name', 'id')->toArray();
        $cartContents = cartContent();
        if ($cartContents->count() == 0) {
            return $this->redirect('/');

        }
    }

    public function render()
    {
        $this->usercart = CartProduct::where('user_id', Auth::id())->get();
        return view('livewire.checkout');
    }

    public function orderNow($discountPrice, $tax_amounts)
    {
//        dd($tax_amounts);
        $this->discountPrice = $discountPrice;
        $this->tax_amount = $tax_amounts;
//        dd($this->tax_amount);

//        dd($this->discountPrice);
        //   $validatedData = $this->validate([
        //     'first_name' => 'required|max:255',
        //     'last_name' => 'required|max:255',
        //     'email' => 'required|max:255|email',
        //     'phone' => 'required|max:255',
        //     'zone' => 'required',
        //     'district' => 'required',
        //     'area' => 'required',
        //     'address1' => 'required',
        //     'pan' => 'digits:9|integer'
        //   ]);
//        dd($this->grandTotal);

//        dd($this->quantity_l);


        if ($this->lat == null && $this->lon == null) {

            $this->lat = 27.69029236;
            $this->lon = 85.33630908;
        }

        if ($this->first_name == '' || $this->last_name == '' || $this->email == '' || $this->phone == '' || $this->address1 == '' || $this->country == '' || $this->zone == '' || $this->district == '' || $this->area == '') {
            $notify = json_notification('error', 'Validation Error', 'Please fill all the field', 'linecons-pen');
            $this->emit('notification', $notify);
            return false;
        }
// //       dd($this);
//         $this->validate([
//             'first_name' => 'required|max:255',
//             'last_name' => 'required|max:255',
//             'email' => 'required|max:255|email',
//             'phone' => 'required|max:255',
//             'address1' => 'required|max:255',
//             'district' => 'required|max:255',
//             'zone' => 'required|max:255',
//             'pan' => 'digits:9|integer',

// //            'country' => 'required|max:255'
//         ]);
//        dd('here');
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

//        $data = [
//
//            'name' => $this->first_name . '  ' . $this->last_name,
//            'products' => $cartContents,
//            'email' => $this->email,
//            'phone' => $this->phone,
//            'district' => $this->district,
//            'address1' => $this->address1,
//            'address2' => $this->address2,
//            'area' => $this->area,
//
//
//        ];
//        $data2 = [
//            'name' => $this->first_name . '  ' . $this->last_name,
//            'products' => $cartContents,
//            'subject' => 'Order Received'
//
//        ];
//        Mail::to(getConfiguration('order_email'))->send(new OrderShipped($data));
//
//        Mail::to($this->email)->send(new OrderSent($data2));

        $notify = json_notification('success', 'Success!!!', 'Order Successfully recieved. we will contact you as soon as possible.', 'linecons-like');
        $this->emit('notification', $notify);
        session()->flash('order', " Thank you. Your order has been received.");
        $this->emit('rerenderHeader');
        $this->emit('reload');

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
            $this->zone = $address->zone;
            $this->country = $address->country_id;
            $this->area = $address->area;
            $this->lat = $address->lat;
            $this->lon = $address->lon;
            $this->billing_name = $address->billing_name;
            $this->pan = $address->pan;

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
            'zone' => $this->zone,
            'district' => $this->district,
            'postcode' => $this->postcode,
            'area' => $this->area,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'billing_name' => $this->billing_name,
            'pan' => $this->pan,

        ];

        $rewards_inpercent = getConfiguration('rewards');
//dd($rewards_inpercent );
//        dd($this->grandTotal);
        $this->rewards = ($rewards_inpercent / 100) * $this->grandTotal;
//
//        dd($this->rewards);
        $address = Address::updateOrCreate(['user_id' => auth()->id()], $addressData);


        $orderStatus = OrderStatus::whereIsDefault(1)->get()->first();

        // Create new order
        $order = \App\Order::create([
            'billing_address_id' => $address->id,
            'shipping_address_id' => $address->id,
            'user_id' => auth()->id(),
            'enable_tax' => getConfiguration('enable_tax'),
            'order_status_id' => $orderStatus->id,
            'order_note' => $this->order_note,
            'tax_amount'=>$this->tax_amount,
            'order_date' => Carbon::now()->toDateTimeString(),
            'rewards' => $this->rewards,
            'discount' => $this->discountPrice,

        ]);

        // Attach products
        $cartContents = cartContent();


        if ($cartContents->count() > 0) {
            //    dd($cartContents);


            foreach ($cartContents as $cartContent) {
                // dd($cartContent);
                $product = Product::find($cartContent->product_id);

                $product->quantity_xs = $product->quantity_xs - $cartContent->xs;
                $product->quantity_s = $product->quantity_s - $cartContent->s;
                $product->quantity_m = $product->quantity_m - $cartContent->m;
                $product->quantity_l = $product->quantity_l - $cartContent->l;
                $product->quantity_xl = $product->quantity_xl - $cartContent->xl;
                $product->quantity_xxl = $product->quantity_xxl - $cartContent->xxl;
                $product->quantity_xxxl = $product->quantity_xxxl - $cartContent->xxxl;
                $product->save();

                notifyStock($cartContent->product_id);

                $order->products()->attach($cartContent->product_id,
                    [
                        'qty' => cartQty($cartContent),
                        'price' => $cartContent->price,
                        'image_name' => $cartContent->image_name,
//                      'total_color_price' => $cartContent->,
//                      'total_frame_price' => $cartContent->,
                        'front' => $cartContent->front,
                        'back' => $cartContent->back,
                        'pocket' => $cartContent->pocket,
                        'color_no' => $cartContent->color_no,
                        'quantity_xs' => $cartContent->xs,
                        'quantity_s' => $cartContent->s,
                        'quantity_m' => $cartContent->m,
                        'quantity_l' => $cartContent->l,
                        'quantity_xl' => $cartContent->xl,
                        'quantity_2xl' => $cartContent->xxl,
                        'quantity_3xl' => $cartContent->xxxl,
                        'interest_logo' => 1,
                        'discount' => 0


                    ]
                );
                $this->deleteCart($cartContent);

            }
        }
        // Destory cart
        Cart::destroy();

        return $order;
    }

    public function deleteCart($cartContent)
    {
        $cart = CartProduct::find($cartContent->id);
        $cart->delete();
    }


}
