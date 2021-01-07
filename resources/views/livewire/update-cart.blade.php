<div>
   
    <section class="shopping-cart spad">
        <div class="container">
            @if($usercart->count()>0)
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="quant">Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usercart as $cartContent)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <a href="{{ route('product.show', getProductSlug($cartContent->product_id)) }}">
                                                    <img src="{{ asset(getProductImage($cartContent->product_id, 'small')) }}"
                                                         alt="{{$cartContent->name}}">
                                                </a></div>
                                            <div class="product__cart__item__text">
                                                <h6><a
                                                            href="{{ route('product.show', getProductSlug($cartContent->product_id)) }}">{{ $cartContent->name }}</a>
                                                </h6>
                                                <h4>{{$cartContent->getProductNamebyId($cartContent->product_id)}}</h4>

                                                <h5>NPR {{ $cartContent->price}}</h5>
                                            </div>
                                        </td>

                                        @livewire('update-cart-quantity',['cartContent' =>
                                        $cartContent],key($loop->index))

                                        <td class="cart__price"><h6 style="font-weight: bold;">
                                                NPR {{ $cartContent->total }}</h6></td>
                                        <td class="cart__close" style="cursor: pointer;">

                                            <a href="javascript:void(0);"
                                               wire:click="deleteCartItem('{{$cartContent->rowId}}')">

                                                <img src="assets/images/trash.svg"></a></td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="col-lg-4 discart">
                        <div class="cart__total">
                            <h6>Cart total</h6>
                            @php
                                $subTotal = str_replace(',', '', Cart::instance('default')->subtotal());
                                $tax = 0;
                                if (getConfiguration('enable_tax')) {
                                    $tax = ($subTotal * getConfiguration('tax_percentage')) / 100;
                                }
                                $grandTotal = $subTotal + $tax;
                            @endphp
                            <ul>
                                <li>Subtotal (1 items) <span
                                            class="subprice">{{trans('app.money_symbol')}} {{ $subTotal }}</span></li>
                                <li>Tax <span
                                            class="subprice">{{trans('app.money_symbol')}} {{ number_format($tax, 2) }}</span>


                                <li>Total <span
                                            class="totprice">{{trans('app.money_symbol')}} {{ number_format($grandTotal, 2) }}</span>
                                </li>
                            </ul>
                            <form action="{{route('checkout')}}" method="get">
                                <button type="submit" class="site-btn">PROCEED TO CHECKOUT</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Opps oh!</h4>
                        <p>No items found in the cart.</p>
                        <hr>
                        <p class="mb-0"><a href="{{ url('/shop') }}"
                                           class="btn btn-xs btn-primary pull-right">Back to shop</a></p>
                    </div>
                </div>
            @endif
        </div>
    </section>


    <!-- Breadcrumb Area start -->
    {{--    <section class="breadcrumb-area">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <div class="breadcrumb-content">--}}
    {{--                        <h1 class="breadcrumb-hrading">Cart Page</h1>--}}
    {{--                        <ul class="breadcrumb-links">--}}
    {{--                            <li><a href="index.html">Home</a></li>--}}
    {{--                            <li>Cart</li>--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- Breadcrumb Area End -->--}}
    {{--    <!-- cart area start -->--}}
    {{--    <div class="cart-main-area">--}}
    {{--        <div class="container">--}}
    {{--            <h3 class="cart-page-title">Your cart items</h3>--}}
    {{--            <div class="row">--}}
    {{--                @if(Cart::instance('default')->count())--}}
    {{--                    <div class="col-lg-8 col-md-8 col-sm-12 col-12">--}}
    {{--                        <div class="table-content table-responsive cart-table-content">--}}
    {{--                            <table>--}}
    {{--                                <thead>--}}
    {{--                                <tr>--}}
    {{--                                    <th>Image</th>--}}
    {{--                                    <th>Product Name</th>--}}
    {{--                                    <th>Unit Price</th>--}}
    {{--                                    <th>Qty</th>--}}
    {{--                                    <th>Subtotal</th>--}}
    {{--                                    <th>Action</th>--}}
    {{--                                </tr>--}}
    {{--                                </thead>--}}
    {{--                                <tbody>--}}

    {{--                                @foreach(Cart::instance('default')->content() as $cartContent)--}}
    {{--                                    <tr>--}}
    {{--                                        <td class="product-thumbnail">--}}
    {{--                                            <a href="{{ route('product.show', getProductSlug($cartContent->id)) }}">--}}
    {{--                                                <img src="{{ asset(getProductImage($cartContent->id, 'small')) }}"--}}
    {{--                                                     alt="{{ $cartContent->name }}">--}}
    {{--                                            </a>--}}
    {{--                                        </td>--}}
    {{--                                        <td class=""><a--}}
    {{--                                                    href="{{ route('product.show', getProductSlug($cartContent->id)) }}">{{ $cartContent->name }}</a>--}}
    {{--                                        </td>--}}
    {{--                                        <td class=""><span class="amount">{{ $cartContent->price }}</span></td>--}}
    {{--                                        @livewire('update-cart-quantity',['cartContent' =>--}}
    {{--                                        $cartContent],key($loop->index))--}}
    {{--                                        <td class="">{{ $cartContent->total }}</td>--}}
    {{--                                        <td class="">--}}
    {{--                                            <a href="javascript:void(0);"--}}
    {{--                                               wire:click="deleteCartItem('{{$cartContent->rowId}}')"><i--}}
    {{--                                                        class="fa fa-times"></i></a>--}}
    {{--                                        </td>--}}
    {{--                                    </tr>--}}
    {{--                                @endforeach--}}
    {{--                                </tbody>--}}
    {{--                            </table>--}}
    {{--                        </div>--}}
    {{--                        <div class="row">--}}
    {{--                            <div class="col-lg-12">--}}
    {{--                                <div class="cart-shiping-update-wrapper">--}}
    {{--                                    <div class="cart-shiping-update">--}}
    {{--                                        <a href="#">Continue Shopping</a>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="cart-clear">--}}
    {{--                                        <a href="javascript:void(0);" wire:click="deleteAllCartItem">--}}
    {{--                      <span wire:loading wire:target="deleteAllCartItem"><i--}}
    {{--                                  class="fas fa-spinner fa-spin"></i> </span>--}}
    {{--                                            Clear Shopping Cart</a>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        --}}{{--<div class="row">--}}
    {{--                          <div class="col-lg-4 col-md-6">--}}
    {{--                            <div class="cart-tax">--}}
    {{--                              <div class="title-wrap">--}}
    {{--                                <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>--}}
    {{--                              </div>--}}
    {{--                              <div class="tax-wrapper">--}}
    {{--                                <p>Enter your destination to get a shipping estimate.</p>--}}
    {{--                                <div class="tax-select-wrapper">--}}
    {{--                                  <div class="tax-select">--}}
    {{--                                    <label>--}}
    {{--                                      * Country--}}
    {{--                                    </label>--}}
    {{--                                    <select class="email s-email s-wid">--}}
    {{--                                      <option>Bangladesh</option>--}}
    {{--                                      <option>Albania</option>--}}
    {{--                                      <option>?land Islands</option>--}}
    {{--                                      <option>Afghanistan</option>--}}
    {{--                                      <option>Belgium</option>--}}
    {{--                                    </select>--}}
    {{--                                  </div>--}}
    {{--                                  <div class="tax-select">--}}
    {{--                                    <label>--}}
    {{--                                      * Region / State--}}
    {{--                                    </label>--}}
    {{--                                    <select class="email s-email s-wid">--}}
    {{--                                      <option>Bangladesh</option>--}}
    {{--                                      <option>Albania</option>--}}
    {{--                                      <option>?land Islands</option>--}}
    {{--                                      <option>Afghanistan</option>--}}
    {{--                                      <option>Belgium</option>--}}
    {{--                                    </select>--}}
    {{--                                  </div>--}}
    {{--                                  <div class="tax-select mb-25px">--}}
    {{--                                    <label>--}}
    {{--                                      * Zip/Postal Code--}}
    {{--                                    </label>--}}
    {{--                                    <input type="text" />--}}
    {{--                                  </div>--}}
    {{--                                  <button class="cart-btn-2" type="submit">Get A Quote</button>--}}
    {{--                                </div>--}}
    {{--                              </div>--}}
    {{--                            </div>--}}
    {{--                          </div>--}}
    {{--                          <div class="col-lg-4 col-md-6">--}}
    {{--                            <div class="discount-code-wrapper">--}}
    {{--                              <div class="title-wrap">--}}
    {{--                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>--}}
    {{--                              </div>--}}
    {{--                              <div class="discount-code">--}}
    {{--                                <p>Enter your coupon code if you have one.</p>--}}
    {{--                                <form>--}}
    {{--                                  <input type="text" required="" name="name" />--}}
    {{--                                  <button class="cart-btn-2" type="submit">Apply Coupon</button>--}}
    {{--                                </form>--}}
    {{--                              </div>--}}
    {{--                            </div>--}}
    {{--                          </div>--}}
    {{--                          <div class="col-lg-4 col-md-12">--}}
    {{--                            <div class="grand-totall">--}}
    {{--                              <div class="title-wrap">--}}
    {{--                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>--}}
    {{--                              </div>--}}
    {{--                              <h5>Total products <span>$260.00</span></h5>--}}
    {{--                              <div class="total-shipping">--}}
    {{--                                <h5>Total shipping</h5>--}}
    {{--                                <ul>--}}
    {{--                                  <li><input type="checkbox" /> Standard <span>$20.00</span></li>--}}
    {{--                                  <li><input type="checkbox" /> Express <span>$30.00</span></li>--}}
    {{--                                </ul>--}}
    {{--                              </div>--}}
    {{--                              <h4 class="grand-totall-title">Grand Total <span>$260.00</span></h4>--}}
    {{--                              <a href="#">Proceed to Checkout</a>--}}
    {{--                            </div>--}}
    {{--                          </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-lg-4 col-md-12">--}}
    {{--                        <div class="grand-totall">--}}
    {{--                            <div class="title-wrap">--}}
    {{--                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>--}}
    {{--                            </div>--}}
    {{--                            @php--}}
    {{--                                $subTotal = str_replace(',', '', Cart::instance('default')->subtotal());--}}
    {{--                                $tax = 0;--}}
    {{--                                if (getConfiguration('enable_tax')) {--}}
    {{--                                    $tax = ($subTotal * getConfiguration('tax_percentage')) / 100;--}}
    {{--                                }--}}
    {{--                                $grandTotal = $subTotal + $tax;--}}
    {{--                            @endphp--}}

    {{--                            <h5>Subtotal <span>{{trans('app.money_symbol')}} {{ $subTotal }}</span></h5>--}}
    {{--                            <div class="total-shipping">--}}
    {{--                                <h5>Tax <span>{{trans('app.money_symbol')}} {{ number_format($tax, 2) }}</span></h5>--}}
    {{--                            </div>--}}
    {{--                            <h4 class="grand-totall-title">Grand Total--}}
    {{--                                <span>{{trans('app.money_symbol')}} {{ number_format($grandTotal, 2) }}</span></h4>--}}
    {{--                            <a href="{{route('checkout')}}">Proceed to Checkout</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                @else--}}
    {{--                    <div class="col-md-12">--}}
    {{--                        <div class="alert alert-success" role="alert">--}}
    {{--                            <h4 class="alert-heading">Opps oh!</h4>--}}
    {{--                            <p>No items found in the cart.</p>--}}
    {{--                            <hr>--}}
    {{--                            <p class="mb-0"><a href="{{ url('/shop') }}"--}}
    {{--                                               class="btn btn-xs btn-primary pull-right">Back to shop</a></p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <!-- cart area end -->--}}

    @push('styles')
        <style>
            .first_seventh {
                margin-right: 2px;
            }

            .first_seventh input {
                padding: 1rem;
            }

            .product-quantity .size_flex:first-child {
                margin-bottom: 11px;
            }
        </style>
    @endpush

</div>
