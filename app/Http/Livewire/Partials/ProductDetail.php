<?php

namespace App\Http\Livewire\Partials;

use App\Address;
use App\CartProduct;
use App\Mail\OrderSent;
use App\Mail\OrderShipped;
use App\OrderStatus;
use App\Product;
use App\ProductColor;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Mail;

class ProductDetail extends Component
{

  protected $listeners = ['imagechange' => 'imagechange'];



  public $product;
  public $subtotal = 0;
  public $discount = 0;
  public $total = 0;
  public $discount_message = "";
  public $frame_message = "", $color_message = "";
  public $has_frame = "false";
  public $agree_term = false;

  public $frame_price = 0;
  public $color_price = 0;

  public $color_no = 0;

  public $quantity_xs = 0, $quantity_s = 0, $quantity_m = 0,$quantity_l=0, $quantity_xl = 0, $quantity_2xl = 0, $quantity_3xl = 0;
  public $total_item = 0;
  public $total_quantity = 0;
  public $imagename = "";

  public $size_message = '';
  public $color_no_message = '';


  public $interest_logo = false;
  public $front = true, $back = false, $pocket = false;

  public $product_color = "";


  public $first_name, $last_name, $email, $phone, $address, $address2, $city, $zone, $district, $state, $area, $postcode, $country = 1, $order_note;

  public $lat, $lon;

  public $quantity=0;

  public $color;

  public function getTotalQuantity()
  {
    if ($this->product->disable_size) {
      return $this->quantity;
    }
    if ($this->total_quantity == 0) {
      return intval($this->quantity_xs) + intval($this->quantity_s) + intval($this->quantity_m) + intval($this->quantity_xl) + intval($this->quantity_2xl) + intval($this->quantity_3xl);
    } else {
      return $this->total_quantity;
    }
  }

  public function getDiscountMessage()
  {
    $discount = getDiscount($this->getTotalQuantity());
    $this->discount = $this->subtotal * $discount / 100;
    if ($discount == 5) {
      return "(5% discount)";
    }
    if ($discount == 8) {
      return "(8% discount)";
    }
    if ($discount == 12) {
      return "(12% discount)";
    } else {
      return "";
    }
  }


  public function mount($product)
  {
    $this->product = $product;
    $this->product_color = ProductColor::where('product_id', $this->product->id)->get();

  }

  public function render()
  {
    $this->size_message = '';
    if ($this->interest_logo) {
      if ($this->color_no != 0 && $this->getTotalQuantity() != 0) {
        $side_count = 0;
        if ($this->front) {
          $side_count++;
        }
        if ($this->back) {
          $side_count++;
        }
        if ($this->pocket) {
          $side_count++;
        }


        $frame_rate = getFrameRate($this->getTotalQuantity(), $this->color_no);
        $this->color_price = $this->color_no * $side_count * getPerColorPrice() * $this->getTotalQuantity();
        $this->frame_price = $frame_rate;

        if ($this->has_frame == "true") {
          $this->frame_price = 0;
        }
        $this->color_message = $this->color_no . " * " . $side_count . " * " . getPerColorPrice() . " * " . $this->getTotalQuantity() . " = " . $this->color_price;
        $this->frame_message = getPerFramePrice() . " * " . $this->color_no . " = " . $this->frame_price . "(Per frame price = 400, no of color = " . $this->color_no . ")";
        if ($frame_rate == 0)
          $this->frame_message = "Frame Rate is free ( only if item is above or equal to 200)";
        if ($this->has_frame == "true") {
          $this->frame_message = "Frame Rate is free because of old user but it is reviewed from our Admin";
        }
        if ($this->color_price != 0)
          $this->color_message .= " (No. of color = " . $this->color_no . " No. of side to print = " . $side_count . ", Per color price = " . getPerColorPrice() . " and Item = " . $this->getTotalQuantity() . ")";

        if ($side_count == 0) {
          $this->size_message = "<i class=\"fa fa-exclamation-circle\"></i> Please Choose 'Front, Back or Pocket' where you want to print logo.";
        }
      } else {
        $this->color_price = 0;
        $this->frame_price = 0;
        $this->color_message = "";
        $this->frame_message = "";
      }

      if ($this->getTotalQuantity() == 0) {
        $this->size_message = "<i class=\"fa fa-exclamation-circle\"></i> Please write quantity from 'Select size'";
      }
      if ($this->color_no == 0) {
        $this->color_no_message = "<i class=\"fa fa-exclamation-circle\"></i> You haven't select Color number yet";
        $this->frame_price = 0;
        $this->color_price = 0;
      } else {
        $this->color_no_message = "";
      }
    } else {
      $this->has_frame = "false";
      $this->front = false;
      $this->back = false;
      $this->pocket = false;
      $this->color_no = 0;
      $this->color_message = "";
      $this->color_no_message = "";
      $this->frame_message = "";
      $this->frame_price = 0;
      $this->color_price = 0;
    }
    $this->subtotal = $this->getTotalQuantity() * $this->product->getPrice();
    $this->discount_message = $this->getDiscountMessage();
    $this->total = $this->subtotal - $this->discount + $this->frame_price + $this->color_price;
    return view('livewire.partials.product-detail');
  }

//  public function test()
//  {
//    dd($this->has_frame);
//  }

  public function addtocart()
  {
    if ($this->has_frame == "false") {
      $has_frame_ = 0;
    } else {
      $has_frame_ = 1;
    }

    if (!$this->agree_term) {
      $notify = json_notification('error', 'Sorry!!!', 'Please agree our Terms and Conditions', 'linecons-pen');
      $this->emit('notification', $notify);
      return false;
    }
    if ($this->product->colors->count() > 0) {
      if ($this->color == "") {
        $notify = json_notification('error', 'Sorry!!!', 'Please choose color', 'linecons-pen');
        $this->emit('notification', $notify);
        return false;
      }
    }

    if ($this->getTotalQuantity() != 0) {
      $cart_product = CartProduct::create([
        'user_id' => auth()->user()->id,
        'product_id' => $this->product->id,
        'qty' => $this->getTotalQuantity(),
        'name' => $this->product->name,
        'front' => $this->front ? 1 : 0,
        'back' => $this->back ? 1 : 0,
        'pocket' => $this->pocket ? 1 : 0,
        'hasframe' => $has_frame_,
        'color_no' => $this->color_no,
        'xs' => $this->quantity_xs,
        's' => $this->quantity_s,
        'm' => $this->quantity_m,
        'l'=>$this->quantity_l,
        'xl' => $this->quantity_xl,
        'xxl' => $this->quantity_2xl,
        'xxxl' => $this->quantity_3xl,
        'interest_logo' => $this->interest_logo,
        'price' => $this->total,
        'imagename' => $this->imagename,
        'color' => $this->color
      ]);
      $notify = json_notification('success', 'Success!!!', 'Successfully Added to cart!!!', 'linecons-like');
      $this->emit('notification', $notify);
      session()->flash('order', " Thank you. Your order has been received.");
      $this->emit('rerenderHeader');
      $this->emit('order_success');
    } else {
      $notify = json_notification('error', 'Sorry!!!', 'Please write quantity', 'linecons-pen');
      $this->emit('notification', $notify);
      return false;
    }


    //$quantity_xs = 0, $quantity_s = 0, $quantity_m = 0, $quantity_xl = 0, $quantity_2xl = 0, $quantity_3xl = 0;
  }

  public function ordernow()
  {
    if ($this->has_frame == "false") {
      $has_frame_ = 0;
    } else {
      $has_frame_ = 1;
    }

    if (!$this->agree_term) {
      $notify = json_notification('error', 'Sorry!!!', 'Please agree our Terms and Conditions', 'linecons-pen');
      $this->emit('notification', $notify);
      return false;
    }
    if ($this->product->colors->count() > 0) {
      if ($this->color == "") {
        $notify = json_notification('error', 'Sorry!!!', 'Please choose color', 'linecons-pen');
        $this->emit('notification', $notify);
        return false;
      }
    }

    if ($this->getTotalQuantity() != 0) {
      $cart_product = CartProduct::create([
        'user_id' => auth()->user()->id,
        'product_id' => $this->product->id,
        'qty' => $this->getTotalQuantity(),
        'name' => $this->product->name,
        'front' => $this->front ? 1 : 0,
        'back' => $this->back ? 1 : 0,
        'pocket' => $this->pocket ? 1 : 0,
        'hasframe' => $has_frame_,
        'color_no' => $this->color_no,
        'xs' => $this->quantity_xs,
        's' => $this->quantity_s,
        'm' => $this->quantity_m,
        'xl' => $this->quantity_xl,
        'xxl' => $this->quantity_2xl,
        'xxxl' => $this->quantity_3xl,
        'interest_logo' => $this->interest_logo,
        'price' => $this->total,
        'imagename' => $this->imagename,
        'color' => $this->color
      ]);
      $notify = json_notification('success', 'Success!!!', 'Successfully Added to cart!!!', 'linecons-like');
      $this->emit('notification', $notify);
      session()->flash('order', " Thank you. Your order has been received.");
      $this->emit('rerenderHeader');
      $this->emit('order_success');
    } else {
      $notify = json_notification('error', 'Sorry!!!', 'Please write quantity', 'linecons-pen');
      $this->emit('notification', $notify);
      return false;
    }

    return redirect()->to('/checkout');

    //$quantity_xs = 0, $quantity_s = 0, $quantity_m = 0, $quantity_xl = 0, $quantity_2xl = 0, $quantity_3xl = 0;
  }


  public function handleCheckout()
  {
    // dd($this);

    if ($this->first_name == '' || $this->last_name == '' || $this->email == '' || $this->phone == '' || $this->address == '' || $this->city == '' || $this->country == '') {
      $notify = json_notification('error', 'Validation Error', 'Please fill all the field', 'linecons-pen');
      $this->emit('notification', $notify);
      return false;
    }


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
      'address' => $this->address,
      'address2' => $this->address2,


    ];
    $data2 = [
      'name' => $this->first_name . '  ' . $this->last_name,
      'products' => $cartContents,
      'subject' => 'Order Received'

    ];
    Mail::to(getConfiguration('order_email'))->send(new OrderShipped($data));

    Mail::to($this->email)->send(new OrderSent($data2));

    $notify = json_notification('success', 'Success!!!', 'Order Successfully recieved. we will contact you as soon as possible.', 'linecons-like');
    $this->emit('notification', $notify);
    session()->flash('order', " Thank you. Your order has been received.");
    $this->emit('rerenderHeader');
    $this->emit('order_success');
  }

  public function loginfirst()
  {
    $notify = json_notification('error', 'Sorry!!!', 'Please login to order this product!!', 'linecons-key');
    $this->emit('notification', $notify);
    return false;
  }

  public function imagechange($image_name)
  {
    $this->imagename = $image_name;
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
      'address' => $this->address,
      'address2' => $this->address2,
      'country_id' => isset($this->country) ? $this->country : 1,
      'state_id' => $this->state,
      'city' => $this->city,
      'postcode' => $this->postcode,
      'zone' => $this->zone,
      'district' => $this->postcode,
      'area' => $this->area,
      'lat' => $this->lat,
      'lon' => $this->lon
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

    $order->products()->attach(
      $this->product->id,
      [
        'image_name' => $this->imagename,
        'front' => $this->front ? 1 : 0,
        'back' => $this->back ? 1 : 0,
        'pocket' => $this->pocket ? 1 : 0,
        'total_color_price' => $this->color_price,
        'total_frame_price' => getFrameRate($this->getTotalQuantity(), $this->color_no),
        'color_no' => $this->color_no,
        'quantity_xs' => $this->quantity_xs,
        'quantity_s' => $this->quantity_s,
        'quantity_m' => $this->quantity_m,
        'quantity_l' => $this->quantity_l,
        'quantity_xl' => $this->quantity_xl,
        'quantity_2xl' => $this->quantity_2xl,
        'quantity_3xl' => $this->quantity_3xl,
        'interest_logo' => $this->interest_logo,
        'color' => $this->color,
        'qty' => $this->getTotalQuantity(),
        'price' => $this->product->getPrice(),
        'discount' => getDiscount($this->getTotalQuantity()),
        'tax_amount' => 0.00

      ]
    );


    return $order;
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


  public function loginfromProductDetail()
  {
//      dd('here');
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
        $this->emit('rerenderHeader');
        $this->emit('rerenderProductDetail');
        $this->dispatchBrowserEvent('closeModal');

    }


  }

  public function countdown()
  {
    --$this->count;
  }
}
