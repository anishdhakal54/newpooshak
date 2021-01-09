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
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php
                                    $p_subtotal = 0.00;
                                @endphp
                                @foreach($order->products as $product)
                                    @php
                                        $p_subtotal += $product->pivot->price;

                                    @endphp

                                    <tr>
                                        <td>
                                            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                            @if(!$product->disable_size)
                                                <br>

                                                XS<strong> x {{$product->pivot->quantity_xs}}</strong><br>
                                                S<strong> x {{$product->pivot->quantity_s}}</strong><br>
                                                M<strong> x {{$product->pivot->quantity_m}}</strong><br>
                                                XL<strong> x {{$product->pivot->quantity_xl}}</strong><br>
                                                2XL<strong> x {{$product->pivot->quantity_2xl}}</strong><br>
                                                3XL<strong> x {{$product->pivot->quantity_3xl}}</strong>
                                            @endif
                                        </td>
                                        <td>{{ $product->pivot->qty }}</td>
                                        <td>RS {{ number_format($product->pivot->price, 2) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                @php
                                    $subTotal = $p_subtotal;
                                    $tax = 0;
                                    if ($order->enable_tax) {
                                        $tax = ($subTotal * $order->tax_percentage) / 100;
                                    }
                                    $grandTotal = $subTotal + $tax;
                                @endphp
                                <tr style="border-top: 1px solid #dee2e6">
                                    <td colspan="2">Subtotal:</td>
                                    <td>RS {{ number_format($subTotal, 2) }}</td>
                                </tr>

                                <tr>
                                    <td colspan="2">Tax:</td>
                                    <td>RS {{ number_format($tax, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Total:</td>
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
