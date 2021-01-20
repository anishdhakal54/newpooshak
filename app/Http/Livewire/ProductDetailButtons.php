<?php

namespace App\Http\Livewire;

use App\CartProduct;
use App\Product;
use Livewire\Component;

class ProductDetailButtons extends Component
{
  public $product;
  protected $listeners = ['rerenderProductDetail' => '$refresh'];




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

  public function render()
  {
    return view('livewire.product-detail-buttons');
  }

  public function mount($product)
  {
    $this->product = $product;

  }
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



}
