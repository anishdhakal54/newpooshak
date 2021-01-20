<tr class="tableleft">
  <td scope="row"><a href="{{ route('order.view',$order->id )}}"> #{{ $order->id }}</a></td>
  <td>{{ \Carbon\Carbon::parse($order->order_date)->format('F j, Y')}}</td>
  <td> <span class="label label-{{ getOrderStatusClass($order->orderStatus->name) }}">
                                        {{ $order->orderStatus->name }}
                                    </span></td>
  <td>    @php
      use Illuminate\Support\Carbon;$priceTotal = 0.00;
      $actualPrice = 0;
      foreach ($order->products as $product){
          $actualPrice += $product->pivot->price;
      }

      $subTotal = $actualPrice;
      $tax = 0;

          $tax = $subTotal + $order->tax_amount;


      $grandTotal = $subTotal +$order->tax_amount+ $order->shipping_amount-$order->discount;
      $day = (Carbon::now()->diffInDays(Carbon::parse($order->order_date)));





    @endphp
    RS <span class="label label-default">{{ number_format($grandTotal, 2) }}</span> for
    <strong>{{ count($order->products) }}</strong> Products
  </td>


  <td class="eyetrash">

    @if($day<getConfiguration('expiry_time') )
      @if($order->orderStatus->name == 'Pending')
        <a href="{{ route('my-account.order.cancel',$order->id )}}"
           onclick="return confirm('Are you sure you want to cancel this order?');"><i class="fa fa-times"></i></a>
      @endif
    @endif
    <a href="{{ route('order.view',$order->id )}}"
    > <i class="fa fa-eye"></i></a>

  </td>

</tr>


{{--<td><a href="{{ route('order.view',$order->id )}}">#{{ $order->id }}</a></td>--}}
{{--<td>{{ \Carbon\Carbon::parse($order->order_date)->format('F j, Y')}}</td>--}}
{{--<td>--}}
{{--                                    <span class="label label-{{ getOrderStatusClass($order->orderStatus->name) }}">--}}
{{--                                        {{ $order->orderStatus->name }}--}}
{{--                                    </span>--}}
{{--</td>--}}
{{--<td>--}}
{{--    @php--}}
{{--        $priceTotal = 0.00;--}}
{{--        foreach ($order->products as $product){--}}
{{--            $discount = $product->pivot->discount;--}}
{{--            $actualPrice = $product->pivot->price * $product->pivot->qty;--}}
{{--            $frame_rate = $product->pivot->total_frame_price;--}}
{{--            $color_rate = $product->pivot->total_color_price;--}}

{{--            $discountAmount = $actualPrice * ( $discount / 100 );--}}
{{--            $productSubTotal = $actualPrice - ( $discountAmount );--}}
{{--            $priceTotal += ($actualPrice - ( $discountAmount )+$frame_rate+$color_rate);--}}
{{--        }--}}

{{--        $subTotal = $priceTotal;--}}
{{--        $tax = 0;--}}
{{--        if ($order->enable_tax) {--}}
{{--            $tax = ($subTotal * $order->tax_percentage) / 100;--}}
{{--        }--}}

{{--        $grandTotal = $subTotal + $tax;--}}
{{--    @endphp--}}
{{--    RS <span class="label label-default">{{ number_format($grandTotal, 2) }}</span> for--}}
{{--    <strong>{{ count($order->products) }}</strong> Products--}}
{{--</td>--}}
{{--<td class="product-wishlist-cart">--}}
{{--    @if($order->orderStatus->name == 'Pending')--}}
{{--        <a href="{{ route('my-account.order.cancel',$order->id )}}"--}}
{{--           class="danger-btn"--}}
{{--           onclick="return confirm('Are you sure you want to cancel this order?');">Cancel</a>--}}
{{--    @endif--}}
{{--    <a href="{{ route('order.view',$order->id )}}"--}}
{{--       class="btn btn-sm btn-primary p-6-12">View</a>--}}
{{--</td>--}}
{{--</tr>--}}