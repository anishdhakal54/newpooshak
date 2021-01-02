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
              {{ $order->getShippingAddressAttribute()->address1 . ' ' . $order->getShippingAddressAttribute()->address2 }}
              <br>
              {!! isset($order->getShippingAddressAttribute()->city) ? $order->getShippingAddressAttribute()->city .'<br/>' : '' !!}
              {!! isset($order->getShippingAddressAttribute()->state_id->name) ? $order->getShippingAddressAttribute()->state_id->name . '<br/>' : '' !!}
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
                  $priceTotal = 0.00;
                  $frameTotal = 0.00;
                  $colorTotal = 0.00;
                @endphp
                @foreach($order->products as $product)
                  @php
                    $discount = $product->pivot->discount;
                    $actualPrice = $product->pivot->price * $product->pivot->qty;

                    $frame_rate = $product->pivot->total_frame_price;
                    $color_rate = $product->pivot->total_color_price;
                    $frameTotal+=$frame_rate;
                    $colorTotal+=$color_rate;

                    $discountAmount = $actualPrice * ( $discount / 100 );
                    $productSubTotal = $actualPrice - ( $discountAmount );
                    $priceTotal += ($actualPrice - ( $discountAmount )+$frame_rate+$color_rate);
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
                    <td>RS {{ number_format($product->pivot->price, 2) }}</td>
                    <td>RS {{ number_format($discountAmount, 2) }}</td>
                    <td>RS {{ number_format($productSubTotal, 2) }}</td>
                  </tr>
                @endforeach
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
