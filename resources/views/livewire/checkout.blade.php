<div>


  <section class="shopping-cart checkshopspad spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-12 checkformsleft">
          {{--                    <form>--}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">First Name*</label>
              <input type="text" wire:model="first_name" class="form-control" id="inputEmail4"
                     placeholder="Your First Name">

              @if ($errors->has('first_name'))
                <span class="help-block">
                                {{ $errors->first('first_name') }}
                            </span>
              @endif

            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Last Name*</label>
              <input type="text" class="form-control" wire:model="last_name" id="inputPassword4"
                     placeholder="Your Last Name">
              @if ($errors->has('last_name'))
                <span class="help-block">
                                {{ $errors->first('last_name') }}
                            </span>
              @endif
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Billing Name</label>
              <input type="text" wire:model="billing_name" class="form-control" id="inputEmail4"
                     placeholder="Billing name">
              @if ($errors->has('billing_name'))
                <span class="help-block">
                                {{ $errors->first('billing_name') }}
                            </span>
              @endif
            </div>
            <div class="form-group col-md-6" wire:ignore>
              <label for="inputPassword4">Pan</label>
              <input type="text" class="form-control" wire:model="pan" id="inputPassword4"
                     placeholder="Your Pan no.">

              @if ($errors->has('pan'))
                <span class="help-block">
                                {{ $errors->first('pan') }}
                            </span>
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Phone Number*</label>
              <input type="number" wire:model="phone" class="form-control" id="inputEmail4"
                     placeholder="Your Phone">
              @if ($errors->has('phone'))
                <span class="help-block">
                                {{ $errors->first('phone') }}
                            </span>
              @endif
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Email Address*</label>
              <input type="email" wire:model="email" class="form-control" id="inputPassword4"
                     placeholder="Your Email Address">
              @if ($errors->has('email'))
                <span class="help-block">
                                {{ $errors->first('email') }}
                            </span>
              @endif
            </div>
          </div>
          <div class="form-row" wire:ignore>
            <div class="form-group col-md-6">
              <label for="inputCity">Zone*</label>
              <select wire:model="zone" class="form-control checkselect" id="zone"
                      name="zone">
                <option value="0">Select Zone</option>
                @foreach(\App\DeliveryCharge::where('parent_id',0)->get() as $zones)
                  <option value="{{$zones->id}}">{{$zones->name}}</option>
                @endforeach
              </select>
              @if ($errors->has('zone'))
                <span class="help-block">
                                {{ $errors->first('zone') }}
                            </span>
              @endif

            </div>
            <div class="form-group col-md-6">
              <label for="inputCity">District*</label>
              <select class="form-control checkselect" wire:model="district"
                      id="district"
                      name="district"
                      disabled>
                <option value="0">Select District</option>
              </select>
              @if ($errors->has('district'))
                <span class="help-block">
                                {{ $errors->first('district') }}
                            </span>
              @endif
            </div>

          </div>

          <div class="form-row " wire:ignore>

            <div class="form-group col-md-12">
              <label for="inputState">Area*</label>
              <select class="form-control checkselect" wire:model="area" id="area"
                      name="area"
                      disabled>
                <option value="0">Select Area</option>
              </select>
              @if ($errors->has('area'))
                <span class="help-block">
                                {{ $errors->first('area') }}
                            </span>
              @endif
            </div>

            <div class="form-group col-md-6">
              <label for="inputAddress">Street Address*</label>
              <input type="text" wire:model="address1" name="address1" class="form-control"
                     id="inputAddress"
                     placeholder="1234 Main St">
              @if ($errors->has('address1'))
                <span class="help-block">
                                {{ $errors->first('address1') }}
                            </span>

              @endif
            </div>
            <div class="form-group col-md-6">
              <label for="inputAddress2">Street Address 2</label>
              <input type="text" wire:model="address2" name="address2" class="form-control"
                     id="inputAddress2"
                     placeholder="Apartment, studio, or floor">
            </div>
            @if ($errors->has('address2'))
              <span class="help-block">
                                {{ $errors->first('address2') }}
                            </span>

            @endif
            <div class="col-lg-12 col-md-12">
              <div class="col-md-12">
                <div id="mapid"></div>
              </div>
              <p class="text-primary">Please dragon the pointer to your location</p>
              <div class="col-md-6">
                <input type="hidden" wire:model="lon" class="form-control" name="lat"
                       id="lat" size=12
                       value="">
                <input type="hidden" wire:model="lat" class="form-control" name="lon"
                       id="lon" size=12
                       value="">
              </div>
            </div>
          </div>


          {{--                        <button type="submit" class="btn savecheckout">Save</button>--}}
          {{--                    </form>--}}

        </div>
        <div class="col-lg-4 col-md-12 checkform checkformsright ">
          <div class="checkshipandbillwithedit">
            <h4>Shipping & Billing </h4>

          </div>
          <div class="addresswithview">
            <div class="address">
              <img src="{{asset('assets/images/pin.svg')}}">
              <div class="checkaddress">
                <input wire:model="first_name" readonly>
                <p class="checkships">User</p>

              </div>
            </div>
            <div class="address">
              <img src="{{asset('assets/images/call.svg')}}">
              <div class="checkaddress">
                <input wire:model="phone" readonly>
                <p class="checkships">Contact Number
                </p>

              </div>
            </div>

            <div class="address">
              <img src="{{asset('assets/images/pin.svg')}}">
              <div class="checkaddress">
                <input wire:model="email" readonly>
                <p class="checkships">Email Address</p>

              </div>
            </div>
          </div>
          <div class="ordersummary">
            <h4>Order Summary
            </h4>
            @php
              $subTotal = 0;
              $discount = 0;
              $has_bulk_discount=false;
            @endphp
            @foreach($usercart as $cartContent)

              @php
                $subTotal_ =$cartContent->price;
           $subTotal +=  $cartContent->price;

           if(cartQty($cartContent)>4){
           $has_bulk_discount = true;
           }
              @endphp
            @endforeach
            @php


              if(!$has_bulk_discount){
                $discount_item = getMitemDiscount($usercart);
                $discount = $subTotal * $discount_item / 100;
              }


$tax_amounts=taxCalculation($usercart);




         $grandTotal = $subTotal +$tax_amounts - $discount;

            @endphp
            <div class="ordersummarysubtotal">
              <p>total ( {{$usercart->count()}} Item(s))</p>
              <p>{{trans('app.money_symbol')}}  {{ $subTotal }}</p>
            </div>
            <div class="ordersummaryship">
              <p>
                Tax :
              </p>
              <p>{{$tax_amounts}}</p>
            </div>
            <div class="ordersummaryship">
              <p>
                @if(!$has_bulk_discount) Unique Discount ({{getUniqueDiscount()}}%) @else
                  Discount @endif
              </p>
              <p
                  class="subprice">{{trans('app.money_symbol')}} {{ $discount }}</p>
            </div>

            <div class="ordersummaryship">
              <p>Shipping Fee</p>
              <input type="text" id="shipping" value="" readonly>
              <input type="hidden" id="shipping_rate" value="{{getConfiguration('shipping_amount')}}">
            </div>


            <div class="ordersummarytotal">

                <p>subTotal: </p>
{{--                <p>{{trans('app.money_symbol')}}  {{ number_format($grandTotal) }}</p>--}}
                <input type="text" id="total" value="{{$grandTotal}}" readonly>

            </div>
            <div class="ordersummarysubtotal">
              <p>Grand Total</p>
              <input type="text text-right" id="grand_total" value="">

            </div>


          </div>
          <div class="paynow" style="margin-top: -35px;">

            {{--                        <a class="btn-hover" wire:click="orderNow" wire:loading.class="disabled"--}}
            {{--                           href="javascript:void(0);"><i--}}
            {{--                                    wire:loading wire:target="orderNow" class="fas fa-spinner fa-spin"></i>--}}
            {{--                            Place Order</a>--}}

            <button type="submit" wire:click="orderNow({{$discount}},{{$tax_amounts}})"
                    wire:loading.class="disabled"
                    href="javascript:void(0);"><i wire:loading wire:target="orderNow"
                                                  class="fas fa-spinner fa-spin"></i>
              Place My Order
            </button>
          </div>
        </div>
      </div>
    </div>

  </section>


{{--    <!-- Breadcrumb Area start -->--}}
{{--    <section class="breadcrumb-area">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="breadcrumb-content">--}}
{{--                        <h1 class="breadcrumb-hrading">Checkout Page</h1>--}}
{{--                        <ul class="breadcrumb-links">--}}
{{--                            <li><a href="/">Home</a></li>--}}
{{--                            <li>Checkout</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Breadcrumb Area End -->--}}
{{--    <!-- checkout area start -->--}}
{{--    <div class="checkout-area mt-60px mb-40px">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                @if(Cart::instance('default')->count())--}}
{{--                    <div class="col-lg-7">--}}
{{--                        @if(session()->has('error_message'))--}}
{{--                            <div class="alert alert-warning">--}}

{{--                                @foreach(session()->get('error_message') as $data)--}}
{{--                                    <i class="fa fa-exclamation-circle"></i>--}}
{{--                                    @php--}}
{{--                                        $data = json_decode($data);--}}
{{--                                    @endphp--}}
{{--                                    {{$data->product_name}} is out of stock <br/>--}}
{{--                                @endforeach--}}

{{--                            </div>--}}
{{--                            <div class="alert alert-warning">--}}
{{--                                You can Enquiry for that product <a href="/contact-us"--}}
{{--                                                                    class="btn btn-primary pull-right"--}}
{{--                                                                    style="margin-top: -6px;">Make--}}
{{--                                    Enquiry</a>--}}
{{--                            </div>--}}

{{--                            <div class="alert alert-warning">--}}
{{--                                Or update your cart <a href="/cart" class="btn btn-primary pull-right"--}}
{{--                                                       style="margin-top: -6px;">Update--}}
{{--                                    Cart</a>--}}
{{--                            </div>--}}

{{--                        @endif--}}
{{--                        <div class="billing-info-wrap">--}}
{{--                            <h3>Billing Details</h3>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="billing-info mb-20px">--}}

{{--                                        <label>First Name</label>--}}
{{--                                        <input class="@if ($errors->has('first_name')) is-invalid  @endif" type="text"--}}
{{--                                               placeholder="Enter your first name here.."--}}
{{--                                               wire:model="first_name"/>--}}
{{--                                        @if ($errors->has('first_name'))--}}
{{--                                            <span class="error invalid-feedback">{{ $errors->first('first_name') }}</span>--}}
{{--                                        @endif--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="billing-info mb-20px">--}}
{{--                                        <label>Last Name</label>--}}
{{--                                        <input class="@if ($errors->has('last_name')) is-invalid  @endif" type="text"--}}
{{--                                               placeholder="Enter your last name here.."--}}
{{--                                               wire:model="last_name"/>--}}
{{--                                        @if ($errors->has('last_name'))--}}
{{--                                            <span class="error invalid-feedback">{{ $errors->first('last_name') }}</span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-12 col-md-12">--}}
{{--                                    <div class="billing-info mb-20px">--}}
{{--                                        <label>Country</label>--}}
{{--                                        <select wire:model="country"--}}
{{--                                                class="form-control  @if ($errors->has('country')) is-invalid  @endif">--}}
{{--                                            <option value="">Enter your Country here..</option>--}}
{{--                                            <option value="1">Nepal</option>--}}

{{--                                        </select>--}}
{{--                                        @if ($errors->has('country'))--}}
{{--                                            <span class="error invalid-feedback">{{ $errors->first('country') }}</span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="billing-info mb-20px">--}}
{{--                                        <label>Street Address</label>--}}
{{--                                        <input class="address @if ($errors->has('address1')) is-invalid  @endif"--}}
{{--                                               type="text"--}}
{{--                                               placeholder="Enter your address1 here.."--}}
{{--                                               wire:model="address1"/>--}}
{{--                                        @if ($errors->has('address1'))--}}
{{--                                            <span class="error invalid-feedback">{{ $errors->first('address1') }}</span>--}}
{{--                                        @endif--}}
{{--                                        <input class="@error('address2') is-invalid  @enderror" type="text"--}}
{{--                                               placeholder="Enter your address2 here.."--}}
{{--                                               wire:model="address2"/>--}}
{{--                                        @if ($errors->has('address2'))--}}
{{--                                            <span class="error invalid-feedback">{{ $errors->first('address2') }}</span>--}}
{{--                                        @endif--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="billing-info mb-20px">--}}
{{--                                        <label>Town / City</label>--}}
{{--                                        <input class="@if ($errors->has('city')) is-invalid  @endif" type="text"--}}
{{--                                               placeholder="Enter your city here.."--}}
{{--                                               wire:model="city"/>--}}
{{--                                        @if ($errors->has('city'))--}}
{{--                                            <span class="error invalid-feedback">{{ $errors->first('city') }}</span>--}}
{{--                                        @endif--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="billing-info mb-20px">--}}
{{--                                        <label>State</label>--}}
{{--                                        <select wire:model="state"--}}
{{--                                                class="form-control  @if ($errors->has('state')) is-invalid  @endif">--}}

{{--                                            @if(isset($states))--}}
{{--                                                @foreach($states as $key => $data)--}}
{{--                                                    <option value="{{$key}}">{{$data}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
{{--                                        </select>--}}

{{--                                        @if ($errors->has('state'))--}}
{{--                                            <span class="error invalid-feedback">{{ $errors->first('state') }}</span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="billing-info mb-20px">--}}
{{--                                        <label>Postcode / ZIP</label>--}}
{{--                                        <input class="@error('postcode') is-invalid  @enderror" type="text"--}}
{{--                                               placeholder="Enter your postcode here.."--}}
{{--                                               wire:model="postcode"/>--}}
{{--                                        @if ($errors->has('postcode'))--}}
{{--                                            <span class="error invalid-feedback">{{ $errors->first('postcode') }}</span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="billing-info mb-20px">--}}
{{--                                        <label>Phone</label>--}}
{{--                                        <input class="@if ($errors->has('phone')) is-invalid  @endif" type="text"--}}
{{--                                               placeholder="Enter your phone here.."--}}
{{--                                               wire:model="phone"/>--}}
{{--                                        @if ($errors->has('phone'))--}}
{{--                                            <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="billing-info mb-20px">--}}
{{--                                        <label>Email Address</label>--}}
{{--                                        <input class="@if ($errors->has('email')) is-invalid  @endif" type="text"--}}
{{--                                               placeholder="Enter your email here.."--}}
{{--                                               wire:model="email"/>--}}
{{--                                        @if ($errors->has('email'))--}}
{{--                                            <span class="error invalid-feedback">{{ $errors->first('email') }}</span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{-- <div class="checkout-account mb-50px">
   <input class="checkout-toggle2" type="checkbox"/>
   <label>Create an account?</label>
 </div>
 <div class="checkout-account-toggle open-toggle2 mb-30">
   <input placeholder="Email address" type="email"/>
   <input placeholder="Password" type="password"/>
   <button class="btn-hover checkout-btn" type="submit">register</button>
 </div>
 <div class="additional-info-wrap">
   <h4>Additional information</h4>
   <div class="additional-info">
     <label>Order notes</label>
     <textarea placeholder="Notes about your order, e.g. special notes for delivery. "
               name="message"></textarea>
   </div>
 </div>
 <div class="checkout-account mt-25">
   <input class="checkout-toggle" type="checkbox"/>
   <label>Ship to a different address?</label>
 </div>
 <div class="different-address open-toggle mt-30">
   <div class="row">
     <div class="col-lg-6 col-md-6">
       <div class="billing-info mb-20px">
         <label>First Name</label>
         <input type="text"/>
       </div>
     </div>
     <div class="col-lg-6 col-md-6">
       <div class="billing-info mb-20px">
         <label>Last Name</label>
         <input type="text"/>
       </div>
     </div>
     <div class="col-lg-12">
       <div class="billing-info mb-20px">
         <label>Company Name</label>
         <input type="text"/>
       </div>
     </div>
     <div class="col-lg-12">
       <div class="billing-select mb-20px">
         <label>Country</label>
         <select>
           <option>Select a country</option>
           <option>Azerbaijan</option>
           <option>Bahamas</option>
           <option>Bahrain</option>
           <option>Bangladesh</option>
           <option>Barbados</option>
         </select>
       </div>
     </div>
     <div class="col-lg-12">
       <div class="billing-info mb-20px">
         <label>Street Address</label>
         <input class="billing-address" placeholder="House number and street name" type="text"/>
         <input placeholder="Apartment, suite, unit etc." type="text"/>
       </div>
     </div>
     <div class="col-lg-12">
       <div class="billing-info mb-20px">
         <label>Town / City</label>
         <input type="text"/>
       </div>
     </div>
     <div class="col-lg-6 col-md-6">
       <div class="billing-info mb-20px">
         <label>State / County</label>
         <input type="text"/>
       </div>
     </div>
     <div class="col-lg-6 col-md-6">
       <div class="billing-info mb-20px">
         <label>Postcode / ZIP</label>
         <input type="text"/>
       </div>
     </div>
     <div class="col-lg-6 col-md-6">
       <div class="billing-info mb-20px">
         <label>Phone</label>
         <input type="text"/>
       </div>
     </div>
     <div class="col-lg-6 col-md-6">
       <div class="billing-info mb-20px">
         <label>Email Address</label>
         <input type="text"/>
       </div>
     </div>
   </div>
 </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-5">--}}
{{--                        <div class="your-order-area">--}}
{{--                            <h3>Your order</h3>--}}
{{--                            <div class="your-order-wrap gray-bg-4">--}}
{{--                                <div class="your-order-product-info">--}}
{{--                                    <div class="your-order-top">--}}
{{--                                        <ul>--}}
{{--                                            <li>Product</li>--}}
{{--                                            <li>Total</li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="your-order-middle">--}}
{{--                                        <ul>--}}
{{--                                            @foreach(Cart::instance('default')->content() as $cartContent)--}}
{{--                                                <li><span class="order-middle-left">{{ $cartContent->name }} X {{ $cartContent->qty }}--}}
{{--                            ({{trans('app.money_symbol')}} {{$cartContent->price}})</span> <span--}}
{{--                                                            class="order-price">{{trans('app.money_symbol')}}  {{ $cartContent->total }} </span>--}}
{{--                                                </li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}

{{--                                    @php--}}
{{--                                        $subTotal = str_replace(',', '', Cart::instance('default')->subtotal());--}}
{{--                                        $tax = 0;--}}
{{--                                        if (getConfiguration('enable_tax')) {--}}
{{--                                            $tax = ($subTotal * getConfiguration('tax_percentage')) / 100;--}}
{{--                                        }--}}
{{--                                        $grandTotal = $subTotal + $tax;--}}
{{--                                    @endphp--}}


{{--                                    <div class="your-order-bottom">--}}
{{--                                        <ul>--}}
{{--                                            <li class="your-order-shipping">Shipping</li>--}}
{{--                                            <li>Free shipping</li>--}}
{{--                                        </ul>--}}
{{--                                        <ul>--}}
{{--                                            <li class="your-order-shipping">Subtotal</li>--}}
{{--                                            <li>{{trans('app.money_symbol')}}  {{ $subTotal }}</li>--}}
{{--                                        </ul>--}}
{{--                                        <ul>--}}
{{--                                            <li class="your-order-shipping">Tax</li>--}}
{{--                                            <li>{{trans('app.money_symbol')}}  {{ number_format($tax, 2) }}</li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="your-order-total">--}}
{{--                                        <ul>--}}
{{--                                            <li class="order-total">Total</li>--}}
{{--                                            <li>{{trans('app.money_symbol')}}  {{ number_format($grandTotal, 2) }}</li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="payment-method">--}}
{{--                                    <div class="payment-accordion element-mrg">--}}
{{--                                        <div class="panel-group" id="accordion">--}}
{{--                                            <div class="panel payment-accordion">--}}
{{--                                                <div class="panel-heading" id="method-one">--}}
{{--                                                    <h4 class="panel-title">--}}
{{--                                                        <a data-toggle="collapse" data-parent="#accordion"--}}
{{--                                                           href="#method1">--}}
{{--                                                            Direct bank transfer--}}
{{--                                                        </a>--}}
{{--                                                    </h4>--}}
{{--                                                </div>--}}
{{--                                                <div id="method1" class="panel-collapse collapse show">--}}
{{--                                                    <div class="panel-body">--}}
{{--                                                        <p>Please send a check to Store Name, Store Street, Store Town,--}}
{{--                                                            Store State / County, Store--}}
{{--                                                            Postcode.</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="panel payment-accordion">--}}
{{--                                                <div class="panel-heading" id="method-two">--}}
{{--                                                    <h4 class="panel-title">--}}
{{--                                                        <a class="collapsed" data-toggle="collapse"--}}
{{--                                                           data-parent="#accordion" href="#method2">--}}
{{--                                                            Check payments--}}
{{--                                                        </a>--}}
{{--                                                    </h4>--}}
{{--                                                </div>--}}
{{--                                                <div id="method2" class="panel-collapse collapse">--}}
{{--                                                    <div class="panel-body">--}}
{{--                                                        <p>Please send a check to Store Name, Store Street, Store Town,--}}
{{--                                                            Store State / County, Store--}}
{{--                                                            Postcode.</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="panel payment-accordion">--}}
{{--                                                <div class="panel-heading" id="method-three">--}}
{{--                                                    <h4 class="panel-title">--}}
{{--                                                        <a class="collapsed" data-toggle="collapse"--}}
{{--                                                           data-parent="#accordion" href="#method3">--}}
{{--                                                            Cash on delivery--}}
{{--                                                        </a>--}}
{{--                                                    </h4>--}}
{{--                                                </div>--}}
{{--                                                <div id="method3" class="panel-collapse collapse">--}}
{{--                                                    <div class="panel-body">--}}
{{--                                                        <p>Please send a check to Store Name, Store Street, Store Town,--}}
{{--                                                            Store State / County, Store--}}
{{--                                                            Postcode.</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="Place-order mt-25">--}}
{{--                                <a class="btn-hover" wire:click="orderNow" wire:loading.class="disabled"--}}
{{--                                   href="javascript:void(0);"><i--}}
{{--                                            wire:loading wire:target="orderNow" class="fas fa-spinner fa-spin"></i>--}}
{{--                                    Place Order</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    @if (Session::has('order'))--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                <h4 class="alert-heading">Success!!!</h4>--}}
{{--                                <p>{!! session('order') !!}</p>--}}
{{--                                <hr>--}}
{{--                                <p class="mb-0"><a href="{{ url('/shop') }}"--}}
{{--                                                   class="btn btn-xs btn-primary pull-right">Back to shop</a></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                <h4 class="alert-heading">Opps oh!</h4>--}}
{{--                                <p>No items found in the cart.</p>--}}
{{--                                <hr>--}}
{{--                                <p class="mb-0"><a href="{{ url('/shop') }}"--}}
{{--                                                   class="btn btn-xs btn-primary pull-right">Back to shop</a></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endif--}}


{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<!-- checkout area end -->
  @push('styles')
    <style>
      div#mapid {
        width: 100%;
        height: 300px;
      }

      .address {
        cursor: pointer
      }

      .address:hover {
        color: #AA0000;
        text-decoration: underline
      }
    </style>
  @endpush

  @push('scripts')
    <script src="{{asset('assets/fullleaflet/leaflet.js')}}"></script>
    <script type="text/javascript">
      var myMarker;
      var map;
      init_map();


      function init_map() {

        var startlat =  {{getConfiguration('latitude')}};
        var startlon = {{getConfiguration('longitude')}};


        var options = {
          center: [startlat, startlon],
          zoom: 14
        }
        var shippingRate = document.getElementById('shipping_rate').value;

        document.getElementById('lat').value = startlat;
        document.getElementById('lon').value = startlon;

        map = L.map('mapid', options);
        var nzoom = 12;

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png',
          {attribution: 'OSM'}
        ).addTo(map);
        myMarker = L.marker([startlat, startlon], {
          title: "Coordinates",
          alt: "Coordinates",
          draggable: true
        }).addTo(map).on('dragend', function () {

          var lat = myMarker.getLatLng().lat.toFixed(8);
          var lon = myMarker.getLatLng().lng.toFixed(8);


          var czoom = map.getZoom();

          document.getElementById('lat').value = lat;
          document.getElementById('lon').value = lon;


        @this.set('lat', lat);
        @this.set('lon', lon);
          var shippingfee = calcCrow(startlat, startlon, lat, lon).toFixed(2);
          var shipping_charge = shippingfee.toString() * shippingRate;
          document.getElementById('shipping').value = shipping_charge;
          var total = document.getElementById('total').value;

          document.getElementById('grand_total').value = parseFloat(total) + parseFloat(shipping_charge);
          // document.getElementById('grand_total').value=shipping_charge;

        @this.set('shipping_amount', shipping_charge);
          // myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
          // map.invalidateSize();
        });

        chooseAddr(startlat, startlon);
      }

      function chooseAddr(lat1, lng1) {
        myMarker.closePopup();
        map.setView([lat1, lng1], 18);
        myMarker.setLatLng([lat1, lng1]);
        lat = lat1.toFixed(8);
        lon = lng1.toFixed(8);
        document.getElementById('lat').value = lat;
        document.getElementById('lon').value = lon;
        myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
      }

    </script>



    <script>
      $(document).ready(function () {
        document.getElementById("area").onchange = function () {
          var e = document.getElementById("area");

          var zone = e.options[e.selectedIndex].value;

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type: 'GET',
            url: "",
            data: {
              location: zone
            },
            success: function (data) {
              $('#shipping_charge').html(data.amount.toLocaleString());
              $('#ship_amnt').html(data.amount.toLocaleString());
              $('#grand_total_value').html(data.grandTotal.toLocaleString());
              $('#ship_amnt_total').html(data.grandTotal.toLocaleString());
            }
          });


        };
      })
    </script>
    <script>
      document.getElementById("zone").onchange = function () {

        var e = document.getElementById("zone");
        var zone = e.options[e.selectedIndex].value;
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type: 'GET',
          url: "{{ route('checkout.zone') }}",
          data: {
            zone: zone
          },
          success: function (data) {
//                console.log(data);

            $('#district').html(data);
            $('#district').removeAttr('disabled');
            $('#zone').css('width', 'auto');

          }

        });
      };

      document.getElementById("district").onchange = function () {

        var e = document.getElementById("district");
        var zone = e.options[e.selectedIndex].value;
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type: 'GET',
          url: "{{ route('checkout.zone') }}",
          data: {
            zone: zone
          },
          success: function (data) {
            $('#area').html(data);
            $('#area').removeAttr('disabled');
            $('#district').css('width', 'auto');

          }

        });
      };


    </script>


    <script>
      function calcCrow(lat1, lon1, lat2, lon2) {
        var R = 6371; // km
        var dLat = toRad(lat2 - lat1);
        var dLon = toRad(lon2 - lon1);
        var lat1 = toRad(lat1);
        var lat2 = toRad(lat2);

        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
          Math.sin(dLon / 2) * Math.sin(dLon / 2) * Math.cos(lat1) * Math.cos(lat2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c;
        return d;
      }

      // Converts numeric degrees to radians
      function toRad(Value) {
        return Value * Math.PI / 180;
      }
    </script>
  @endpush
</div>
