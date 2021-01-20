<?php

namespace App\Repositories\Order;

use App\OrderProduct;
use App\User;
use Mail;
use App\Order;
use App\Address;
use App\Product;
use Carbon\Carbon;
use App\OrderStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;


class EloquentOrder implements OrderRepository
{

  /**
   * @var Order
   */
  private $model;

  public function __construct(Order $model)
  {
    $this->model = $model;
  }

  public function getAll()
  {
    return $this->model->all()->sortByDesc("id");
  }

  public function getById($id)
  {
    return $this->model->findOrFail($id);
  }

  public function create(array $attributes)
  {
    if (isset($attributes['customer']) && $this->checkUserAddress(['user_id' => $attributes['customer']])) {
      $address = $this->UpdateUserAddress([
        'user_id' => $attributes['customer'],
        'type' => 'SHIPPING',
        'first_name' => $attributes['first_name'],
        'last_name' => $attributes['last_name'],
        'email' => $attributes['email'],
        'phone' => $attributes['phone'],
        'address1' => $attributes['address1'],
        'address2' => $attributes['address2'],
        'country_id' => isset($attributes['country']) ? $attributes['country'] : 1,
        'state_id' => $attributes['state'],
        'city' => $attributes['city'],
        'postcode' => $attributes['postcode'],
      ]);

      $attributes['user_id'] = $address->user_id;
      $attributes['billing_address_id'] = $address->id;
      $attributes['shipping_address_id'] = $address->id;
    } else {
      $address = $this->createUserAddress([
        'type' => 'SHIPPING',
        'first_name' => $attributes['first_name'],
        'last_name' => $attributes['last_name'],
        'email' => $attributes['email'],
        'phone' => $attributes['phone'],
        'address1' => $attributes['address1'],
        'address2' => $attributes['address2'],
        'postcode' => $attributes['postcode'],
        'city' => $attributes['city'],
        'state_id' => $attributes['state'],
        'country_id' => $attributes['country'],
      ]);

      $attributes['billing_address_id'] = $address->id;
      $attributes['shipping_address_id'] = $address->id;
    }

    $order = $this->model->create([
      'billing_address_id' => $attributes['billing_address_id'],
      'shipping_address_id' => $attributes['shipping_address_id'],
      'user_id' => isset($attributes['user_id']) ? $attributes['user_id'] : null,
      'enable_tax' => $attributes['tax_percentage'] > 0 ? 1 : 0,
      'tax_percentage' => $attributes['tax_percentage'],
      'order_status_id' => $attributes['order_status'],
      'order_note' => $attributes['order_note'],
      'order_date' => $attributes['order_date'],
    ]);

    foreach ($attributes['products'] as $orderProduct) {
      DB::table('order_product')->insert(
        [
          'product_id' => $orderProduct['id'],
          'order_id' => $order->id,
          'qty' => $orderProduct['qty'],
          'price' => $orderProduct['price'],
          'discount' => $orderProduct['discount'],

        ]
      );
    }
    Cart::destroy();

    return $order;
  }

  public function update($id, array $attributes)
  {

    // Update address
    $addressDetails = [
      'type' => 'SHIPPING',
      'first_name' => $attributes['first_name'],
      'last_name' => $attributes['last_name'],
      'email' => $attributes['email'],
      'phone' => $attributes['phone'],
      'address1' => $attributes['address1'],
      'address2' => $attributes['address2'],
      'country_id' => isset($attributes['country']) ? $attributes['country'] : 1,
      'state_id' => $attributes['state'],
      'city' => $attributes['city'],
      'postcode' => $attributes['postcode'],
    ];

    if (isset($attributes['customer']) && $this->checkUserAddress(['user_id' => $attributes['customer']])) {
      $addressDetails['user_id'] = $attributes['customer'];
      $address = $this->UpdateUserAddress($addressDetails);
    } elseif (isset($attributes['address_id']) && $this->checkUserAddress(['address_id' => $attributes['address_id']])) {
      $address = Address::findOrFail($attributes['address_id']);
      $address->update($addressDetails);
    } else {
      $address = $this->createUserAddress($addressDetails);
    }


    $attributes['user_id'] = $address->user_id;
    $attributes['billing_address_id'] = $address->id;
    $attributes['shipping_address_id'] = $address->id;

    // Update order
    $id1 = auth()->id();
    //  dd($id1);
    $order = $this->getById($id);

    $user = User::where('id', $order->user_id)->first();
//        dd($order->rewards,$user->rewards);
    if ($order->isGiven == 1 && $attributes['order_status'] == 6) {
      $deducted_reward = $user->rewards - $order->rewards;
      $user->update([
        $user->rewards = $deducted_reward
      ]);
      $order->update([
        $order->isGiven = false
      ]);
    }
    if ($order->isGiven == 1 && ($attributes['order_status'] == 2 || $attributes['order_status'] == 5 || $attributes['order_status'] == 6)) {
      $deducted_reward = $user->rewards - $order->rewards;
      $user->update([
        $user->rewards = $deducted_reward
      ]);
      $order->update([
        $order->isGiven = false
      ]);
    }
    if ($attributes['order_status'] == 5 || $attributes['order_status'] == 6) {
      $orderedProduct = OrderProduct::where('order_id', $order->id)->get();
//            dd($orderedProduct);
      foreach ($orderedProduct as $orderproduct) {
        $product_found = Product::where('id', $orderproduct->product_id)->first();
        if (($orderproduct->product_id == $product_found->id) && ($orderproduct->isStockDeducted == 0)) {
          $product_found->quantity_xs = $product_found->quantity_xs + $orderproduct->quantity_xs;
          $product_found->quantity_s = $product_found->quantity_s + $orderproduct->quantity_s;
          $product_found->quantity_m = $product_found->quantity_m + $orderproduct->quantity_m;
          $product_found->quantity_l = $product_found->quantity_l + $orderproduct->quantity_l;
          $product_found->quantity_xl = $product_found->quantity_xl + $orderproduct->quantity_xl;
          $product_found->quantity_xxl = $product_found->quantity_xxl + $orderproduct->quantity_2xl;
          $product_found->quantity_xxxl = $product_found->quantity_xxxl + $orderproduct->quantity_3xl;
          $product_found->quantity = $product_found->quantity + $orderproduct->stock_qty;
          $product_found->save();
          $orderproduct->isStockDeducted = true;
          $orderproduct->save();

        }

      }

    }
    if ($attributes['order_status'] == 1 || $attributes['order_status'] == 2 || $attributes['order_status'] == 3 || $attributes['order_status'] == 4) {
      $orderedProduct = OrderProduct::where('order_id', $order->id)->get();
      foreach ($orderedProduct as $orderproduct) {
        $product_found = Product::where('id', $orderproduct->product_id)->first();

        if ($orderproduct->isStockDeducted == 1 && ($orderproduct->product_id == $product_found->id)) {
          $product_found->quantity_xs = $product_found->quantity_xs - $orderproduct->quantity_xs;
          $product_found->quantity_s = $product_found->quantity_s - $orderproduct->quantity_s;
          $product_found->quantity_m = $product_found->quantity_m - $orderproduct->quantity_m;
          $product_found->quantity_l = $product_found->quantity_l - $orderproduct->quantity_l;
          $product_found->quantity_xl = $product_found->quantity_xl - $orderproduct->quantity_xl;
          $product_found->quantity_xxl = $product_found->quantity_xxl - $orderproduct->quantity_2xl;
          $product_found->quantity_xxxl = $product_found->quantity_xxxl - $orderproduct->quantity_3xl;
          $product_found->quantity = $product_found->quantity - $orderproduct->stock_qty;

          $product_found->save();
          $orderproduct->isStockDeducted = false;
          $orderproduct->save();
        }
      }

    }


    if ($order->isGiven == 0 && $attributes['order_status'] == 3) {
      // $order_isGiven = 1;

      $order->update([
        $order->isGiven = true
      ]);


//            dd($user->rewards);
//            $user =  Auth::user();
      $user_rewards = $user->rewards;
//             dd($user_rewards);
      $order_reward = $order->rewards;
//            dd($order_reward);
      $total_reward = $user_rewards + $order_reward;
//             dd($total_reward);

      $user->update([
        $user->rewards = $total_reward,

      ]);

      //   dd($userOrder->reward_given);

      //     if ($userOrder->isGiven == 'true'){
      //         User::where('id', $id1)->update(['rewards' => $total_reward]);
      //         //  dd('test');
      //         Order::where('id',$id)->update(
      //             array(
      //                 'isGiven' => 'false',
      //             )
      //         );
      //     }
      // }
    }


    $order->update([
      'billing_address_id' => $attributes['billing_address_id'],
      'shipping_address_id' => $attributes['shipping_address_id'],
      'user_id' => isset($attributes['user_id']) ? $attributes['user_id'] : null,
      // 'enable_tax'      	  => $attributes['tax_percentage'] > 0 ? 1 : 0,
      // 'tax_percentage'      => $attributes['tax_percentage'],
      'order_status_id' => $attributes['order_status'],
      'order_note' => $attributes['order_note'],
      'order_date' => $attributes['order_date'],
//             'isGiven' => $order_isGiven

    ]);


    // if ($attributes['order_status'] == 2) {
    //     foreach ( $attributes['products'] as $orderProduct ) {
    //         $pid=$orderProduct['id'];
    //         $qty=$orderProduct['qty'];


    //         $product = Product::where('id', $pid)->first();

    //         $product->stock_qty =(int)($product->stock_qty) - (int)($qty);
    //         $product->update();

    //     }
    // }
    // if ($attributes['order_status'] == 6 && $order->order_status_id != 1) {

    //     // foreach ( $attributes['products'] as $orderProduct ) {
    //     //     $pid=$orderProduct['id'];
    //     //     $qty=$orderProduct['qty'];
    //     //     // $product = Product::where('id', $pid)->first();
    //     //     // $product->stock_quantity =(int)($product->stock_quantity) + (int)($qty);
    //     //     $product->update();
    //     //     if(isset($product->additionals) && $product->additionals->isNotEmpty())
    //     //     {
    //     //         // $size = OrderProduct::where('order_id', $order->id)->where('product_id', $pid)->first()->size;
    //     //         // $additional = ProductAdditional::where('product_id', $pid)->where('size', $size)->first();
    //     //         // $additional->quantity = (int)($additional->quantity) + (int)($qty);
    //     //         // $additional->update();
    //     //     }
    //     // }
    //     $userOrder= Order::find($id);
    //     $id1 = auth()->id();
    //     $user =  Auth::user();
    //     $user_rewards = $user->rewards;
    //     $order_reward = $userOrder->rewards;
    //     $total_reward = $user_reward - $order_reward;
    //     //   dd($userOrder->reward_given);

    //     if ($userOrder->isGiven == 'true'){
    //         User::where('id', $id1)->update(['rewards' => $total_reward]);
    //         //  dd('test');
    //         Order::where('id',$id)->update(
    //             array(
    //                 'isGiven' => 'false',
    //             )
    //         );
    //     }
    // }
    // if ($attributes['order_status'] == 5) {
    //     foreach ( $attributes['products'] as $orderProduct ) {
    //         $pid=$orderProduct['id'];
    //         $qty=$orderProduct['qty'];


    //         $product = Product::where('id', $pid)->first();

    //         $product->stock_qty =(int)($product->stock_qty) + (int)($qty);
    //         $product->update();

    //     }
    // }


    // $orderedProducts = [];

    // foreach ( $attributes['products'] as $orderProduct ) {


    //     $orderedProducts[ $orderProduct['id'] ] = [
    //         'qty'      => $orderProduct['qty'],
    //         'price'    => $orderProduct['price'],
    //         'discount' => $orderProduct['discount']
    //     ];
    // }

    // $order->products()->sync( $orderedProducts );


    return $order;
  }

  public function delete($id)
  {
    $this->getById($id)->delete();

    return true;
  }

  protected function checkUserAddress(array $id)
  {
    if (!isset($id['address_id'])) {
      return DB::table('addresses')->where('user_id', '=', $id['user_id'])->exists();
    }

    return DB::table('addresses')->where('id', '=', $id['address_id'])->exists();
  }

  protected function createUserAddress(array $attributes)
  {
    return Address::create($attributes);
  }

  protected function updateUserAddress(array $attributes)
  {
    $address = Address::where('user_id', $attributes['user_id'])->firstOrFail();
    $address->update($attributes);

    return $address;
  }

  public function getOrdersJson(array $attributes)
  {
    $orders = $this->getAll();

    return datatables($orders)->toJson();
  }

  public function createFrontendOrder(array $attributes)
  {
    // dd((int) getConfiguration('tax_percentage'));
    // Update address
    $addressData = [
      'type' => 'SHIPPING',
      'user_id' => auth()->id(),
      'first_name' => $attributes['first_name'],
      'last_name' => $attributes['last_name'],
      'email' => $attributes['email'],
      'phone' => $attributes['phone'],
      'address1' => $attributes['address1'],
      'address2' => $attributes['address2'],
      'country_id' => isset($attributes['country']) ? $attributes['country'] : 1,
      'state_id' => $attributes['state'],
      'city' => $attributes['city'],
      'postcode' => $attributes['postcode'],
    ];

    $address = Address::updateOrCreate(['user_id' => auth()->id()], $addressData);

    $attributes['billing_address_id'] = $address->id;
    $attributes['shipping_address_id'] = $address->id;

    $orderStatus = OrderStatus::whereIsDefault(1)->get()->first();

    // Create new order
    $order = $this->model->create([
      'billing_address_id' => $attributes['billing_address_id'],
      'shipping_address_id' => $attributes['shipping_address_id'],
      'user_id' => auth()->id(),
      'enable_tax' => getConfiguration('enable_tax'),
      'tax_percentage' => (int)getConfiguration('tax_percentage'),
      'order_status_id' => $orderStatus->id,
      'order_note' => $attributes['order_note'],
      'order_date' => Carbon::now()->toDateTimeString(),
    ]);

    // Attach products
    $cartContents = Cart::content();
    if ($cartContents) {


      foreach ($cartContents as $cartContent) {

        $order->products()->attach(
          $cartContent->id,
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

  public function updateFrontendOrder($id, array $attributes)
  {
  }

  /**
   * List user orders
   *
   * @param $id
   */
  public function getUserOrders($id)
  {
    $orders = Order::where('user_id', '=', $id)->orderBy('id', 'DESC')->get();
    return $orders;
  }
}
