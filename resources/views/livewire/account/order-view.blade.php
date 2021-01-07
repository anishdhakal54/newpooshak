<div>
  <!-- Breadcrumb Area start -->
  <section class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-content">
            <h1 class="breadcrumb-hrading">View Order</h1>
            <ul class="breadcrumb-links">
              <li><a href="/">Home</a></li>
              <li>View Order</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Area End -->
  <!-- cart area start -->
  <div class="cart-main-area mtb-60px">
    <div class="container">
      <div class="row">

        <div class="col-md-4">


          <div class="address-details">
            <h2>Address Details</h2>
            <address class="mb-none">
              {{ $order->getShippingAddressAttribute()->first_name . ' ' . $order->getShippingAddressAttribute()->last_name }}
              <br>
              {{ $order->getShippingAddressAttribute()->address1 . ' ,' . $order->getShippingAddressAttribute()->address2 }}
              <br>
{{--              @php--}}
{{--              \App\DeliveryCharge::all()->where('id',$order->getShippingAddressAttribute()->zone);--}}

{{--              @endphp--}}
              {!! isset($zone ) ? $zone[0]  .'<br/>' : '' !!}
              {!! isset($district ) ? $district[0]  . '<br/>' : '' !!}
              {!! isset($area ) ? $area[0]  . '<br/>' : '' !!}

              {{ $order->getShippingAddressAttribute()->postcode }}
            </address>
          </div>
          <div class="customer-details">
            <h2>Customer Details</h2>
            <table class="table table-bordered">
              <tbody>
              <tr>
                <td>Email</td>
                <td>
                  <a href="mailto:{{ $order->getShippingAddressAttribute()->email }}">
                    {{ $order->getShippingAddressAttribute()->email }}
                  </a>
                </td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>{{ $order->getShippingAddressAttribute()->phone }}</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-8 col-md-push-3 my-account">

          <div class="order-details">
            <h2>Order Details</h2>
            <p>Order #{{ $order->id }} was placed
              on {{ \Carbon\Carbon::parse($order->order_date)->format('F j, Y')}} and is
              <span class="label label-{{ getOrderStatusClass($order->orderStatus->name) }}">
                        {{ $order->orderStatus->name }}
                    </span>
            </p>
            @if(count($order->products) <= 0)
              <p>Sorry no products found.</p>
            @else
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Total</th>
                </tr>
                </thead>

                <tbody>
                @php
                  $subTotal = 0;
                  $discount = 0;
                  $has_bulk_discount=false;
                @endphp

                @foreach($order->products as $product)
                  @php
                    $subTotal_ =getSubtotal($cartContent);
                    $subTotal += getSubtotal($cartContent);
                    $discount_ = getDiscount(cartQty($cartContent));
                    $discount += $subTotal_ * $discount_ / 100;
                    if(cartQty($cartContent)>4){
                      $has_bulk_discount = true;
                    }
                  @endphp

                  <tr>
                    <td>
                      <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                      <strong>x {{ $product->pivot->qty }}</strong><br>

                      XS<strong> x {{$product->pivot->quantity_xs}}</strong><br>
                      S<strong> x {{$product->pivot->quantity_s}}</strong><br>
                      M<strong> x {{$product->pivot->quantity_m}}</strong><br>
                      XL<strong> x {{$product->pivot->quantity_xl}}</strong><br>
                      2XL<strong> x {{$product->pivot->quantity_2xl}}</strong><br>
                      3XL<strong> x {{$product->pivot->quantity_3xl}}</strong>
                    </td>
                    <td>RS {{ number_format($subtotal, 2) }}</td>
                    <td>RS {{ number_format($discountAmount, 2) }}</td>
                    <td>RS {{ number_format($productSubTotal, 2) }}</td>
                  </tr>
                @endforeach

                @php
                  if(!$has_bulk_discount){
                    $discount_item = getMitemDiscount($usercart);
                    $discount = $subTotal * $discount_item / 100;
                  }

                  $tax = 0;
                  if (getConfiguration('enable_tax')) {
                      $tax = ($subTotal * getConfiguration('tax_percentage')) / 100;
                  }
                  $grandTotal = $subTotal + $tax - $discount;

                @endphp
                </tbody>
                <tfoot>
                @php
                  $subTotal = $priceTotal;
                  $tax = 0;
                  if ($order->enable_tax) {
                      $tax = ($subTotal * $order->tax_percentage) / 100;
                  }
                  $grandTotal = $subTotal + $tax;
                @endphp
                <tr>
                  <td colspan="3">Subtotal:</td>
                  <td>RS {{ number_format($subTotal, 2) }}</td>
                </tr>
                <tr>
                  <td colspan="3">Color price:</td>
                  <td>RS {{ number_format($colorTotal, 2) }}</td>
                </tr>
                <tr>
                  <td colspan="3">Frame Price:</td>
                  <td>RS {{ number_format($frameTotal, 2) }}</td>
                </tr>
                <tr>
                  <td colspan="3">Tax:</td>
                  <td>RS {{ number_format($tax, 2) }}</td>
                </tr>
                <tr>
                  <td colspan="3">Total:</td>
                  <td>RS {{ number_format($grandTotal, 2) }}</td>
                </tr>
                </tfoot>
              </table>
            @endif
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- cart area end -->
</div>
