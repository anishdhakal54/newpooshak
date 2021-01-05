<div>

    <header class="header-area bg-white">
        <div class="header-large-device">
            <div class="header-top bg-gray-6 mathiko-padding">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="header-offer-wrap-2 mrg-none mt-1">
                                <p>{{getConfiguration('ribbon_text')}}
                                </p>

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="header-top-right">
                                <div class="header-action header-action-flex pr-20">
                                    <div class="same-style-2 text-pad top-right-whistlist same-style-2-white same-style-2-font-dec">
                                        <a href="/wishlist"><i class="icon-heart"></i><span class="pro-count red">
                            {{\App\Wishlist::where( ['user_id' => auth()->id()])->count()}}
                          </span> Wishlist</a>
                                    </div>

                                    @if(!Auth::check())
                                        <div class="same-style-2 text-pad same-right-whistlist same-style-2-white same-style-2-font-dec">
                                            <i class="fa fa-user" style="color:#fff"></i>
                                            <div class="demo-area">
                                                <button type="button" class="btn btn-cta logsmodalbutton"
                                                        data-toggle="modal"
                                                        data-target="#demoModal3669">
                                                    Login
                                                </button>
                                            </div>

                                            <div class="modal fade loginmodal" wire:ignore id="demoModal3669"
                                                 tabindex="-1" role="dialog"
                                                 aria-labelledby="demoModal3669" aria-hidden="true">
                                                <div class="modal-dialog  modal-dialog-centered  " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body py-sm-4 px-sm-5">

                                                            <button type="button" class="close " data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <div class="text-center pt-5">
                                                                <img src="{{asset('assets/images/login.svg')}}"
                                                                     class="loginsvg">
                                                                <h3 class="loginheadings">Login</h3>


                                                            </div>
                                                            <form>

                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Email
                                                                        address</label>
                                                                    <input type="email" wire:model="login_email"
                                                                           class="form-control" id="exampleInputEmail1"
                                                                           aria-describedby="emailHelp">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Password</label>
                                                                    <input type="password" wire:model="password"
                                                                           class="form-control" id="exampleInputEmail1"
                                                                           aria-describedby="emailHelp">
                                                                </div>

                                                                <button type="button" wire:click="login"
                                                                        class="btn btn-cstm-dark btn-cta buttonlogin">
                                                                    Login
                                                                </button>

                                                                <div class="for">
                                                                    <div class="left_forgot">
                                                                        <a href="#">Forgot Password?</a>
                                                                    </div>
                                                                    <div class="new">
                                                                        New to Poshak? <a href="{{route('register')}}">Click
                                                                            here to register.</a>
                                                                    </div>
                                                                </div>


                                                                <span class="or">OR</span>

                                                                <div class="social_last_share login_share"
                                                                     style="margin-bottom: 1rem">

                                                                    <div class="login_button social_button">
                                                                        <button type="submit">Sign In With Facebook <img
                                                                                    src="{{asset('assets/images/facebook.png')}}">
                                                                        </button>
                                                                        <button type="submit">Sign In With Google <img
                                                                                    src="{{asset('assets/images/gmail.svg')}}">
                                                                        </button>
                                                                    </div>
                                                                </div>


                                                            </form>


                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="hehehe">
                                                    <img src="{{asset('assets/images/hehehe.png')}}">
                                                </div>
                                            </div>


                                            <a href="{{route('register')}}"> Register</a>
                                        </div>
                                    @else
                                        @role(['admin', 'manager','shop-manager'])
                                        <div class="same-style-2 text-pad top-right-whistlist same-style-2-white same-style-2-font-dec">
                                            <a data-turbolinks="false" href="{{ route('dashboard.index') }}"
                                            ><i class="fa fa-icon-dashboard"></i>Dashboard</a
                                            >
                                        </div>

                                        @endrole
                                        <div class="same-style-2 text-pad top-right-whistlist same-style-2-white same-style-2-font-dec">
                                            <a href="{{ route('my-account.index') }}"
                                            ><i class="fa fa-icon-dashboard"></i>My Account</a
                                            >
                                        </div>

                                        <div
                                                class="same-style-2 text-pad top-right-whistlist same-style-2-white same-style-2-font-dec"
                                        >
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            ><i class="fa fa-icon-dashboard"></i>Logout</a
                                            >
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>

                                    @endif
                                    <div class="same-style-2 text-pad top-right-whistlist same-style-2-white same-style-2-font-dec">

                                        @if(Session::get('applocale')=='en')
                                            <a data-turbolinks="false" href="{{ route('switch.lang','ne') }}">
                                                भाषा परिवर्तन</a
                                            >
                                        @else
                                            <a data-turbolinks="false" href="{{ route('switch.lang','en') }}">
                                                Change Language</a>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-top header-top-ptb-7 border-bottom-9 headmids">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img alt="logo"
                                         src="{{ url('storage') . '/' . getConfiguration('site_logo') }}"/>
                                    <img class="mini-logo" src="{{asset('assets/images/robho.png')}}" alt="">

                                <div class="trades">
                                    <p>Our Trademark</p>
                                </div>
                                </a>
                            </div>
                        </div>


                        <div class="col-xl-7 col-lg-7" style="padding-left: 70px;">
                            <div class="categori-search-wrap categori-search-wrap-modify-3">
                                <div class="search-wrap-3">
                                @include('livewire.partials.search')
                                <!-- <form action="http://poshaak.nextaussietech.com/search" method="get">
                                        <select name="poscats" wire:ignore>
                                            <option value="">All Categories</option>
                                            <option value="3">Hotel Uniform</option>
                                            <option value="2">- Waiter Uniform</option>
                                            <option value="4">Tshirt</option>
                                            <option value="5">Hospital Uniform</option>
                                            <option value="6">Apron</option>
                                            <option value="7">Housekeeping Uniform</option>
                                            <option value="8">Industrial Uniform</option>
                                            <option value="10">Other Products</option>
                                            <option value="11">Hospitality Shoes</option>
                                            <option value="12">- Men Shoes</option>
                                            <option value="13">- Women Shoes</option>

                                        </select>
                                        <input placeholder="Search Products..." name="q" id="q" type="text"/>
                                        <button type="submit"><i class="lnr lnr-magnifier"></i></button>
                                    </form> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3">
                            <div class="header-action header-action-flex">
                                <div class="same-style-2 same-style-2-font-inc">
                                    <div class="demo-area quotebutton">
                                        <button type="button" class="btn btn-cta" wire:click="getquote">
                                            {{__('Get A Quote')}}
                                        </button>
                                    </div>


                                </div>

                                <div class="same-style-2 same-style-2-font-inc header-cart">
                                    <a class="cart-active" href="#">
                                        <i class="icon-basket-loaded"></i><span
                                                class="pro-count green">{{cartCount()}}</span>
                                        <!-- <span class="cart-amount">$2,435.30</span> -->
                                    </a>
                                </div>


                            </div>
                            <div class="sidebar-cart-active">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div
                                    class="main-menu main-menu-white main-menu-font-size-14 main-menu-padding-3 main-menu-lh-5 main-menu-hover-black">
                                <nav>
                                    <ul>
                                        @foreach($menuList as $menu)
                                            <li>
                                                <a href="{{ $menu['link'] }}">
                                                    {{ $menu['label'] }}
                                                    @if(!empty($menu['child']))
                                                        <i class="icon-arrow-down"></i>
                                                    @endif
                                                </a>
                                                @include('livewire.partials.menu', ['menu' => $menu])
                                            </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div wire:ignore class="header-small-device small-device-ptb-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-5">
                        <div class="mobile-logo">
                            <a href="{{route('home')}}">
                                <img alt="logo" src="{{ url('storage') . '/' . getConfiguration('site_logo') }}"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="header-action header-action-flex">
                            <div class="same-style-2 same-style-2-white same-style-2-hover-black same-style-2-font-inc">
                                <a class="usermodalthis"><i class="icon-user"></i></a>
                            </div>
                            <div class="same-style-2 same-style-2-white same-style-2-hover-black same-style-2-font-inc">
                                <a href="/wishlistl"><i class="icon-heart"></i><span
                                            class="pro-count black">   {{\App\Wishlist::where(['user_id' => auth()->id()])->count()}}</span></a>
                            </div>
                            <div
                                    class="same-style-2 same-style-2-white same-style-2-hover-black same-style-2-font-inc header-cart">
                                <a class="cart-active" href="#">
                                    <i class="icon-basket-loaded"></i><span
                                            class="pro-count black">{{cartCount()}}</span>
                                </a>
                            </div>
                            <div class="same-style-2 same-style-2-white same-style-2-hover-black main-menu-icon">
                                <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="sidebar-cart-active">
        <div class="sidebar-cart-all">
            <a class="cart-close" href="javascript:void(0);"><i class="icon_close"></i></a>
            <div class="cart-content">
                <h3>{{__('Shopping Cart')}}</h3>

                <ul>
                    @if($cart && $cart->count()>0)
                        @foreach($cart as $cartContent)

                            <li class="single-product-cart">
                                <div class="cart-img">
                                    <a href="javascript:void(0);">
                                        @if($cartContent->imagename!="")
                                        <img src="{{asset('/uploads/embroidery/'.$cartContent->imagename)}}"
                                             alt="test-img">
                                            @else
                                            @php


                                            @endphp
                                            <img src="{{$cartContent->product->getImageAttribute()->smallUrl}}"
                                                 alt="test-img">
                                        @endif
                                    </a>
                                </div>
                                <div class="cart-title">
                                    <h4><a href="#">{{ $cartContent->product->name }}</a></h4>
                                    <span> {{ cartQty($cartContent) }} × {{ $cartContent->price }} </span>




                                </div>

                                <div class="cart-delete">
                                    <a href="" wire:click="destroyRow({{$cartContent->id}})">×</a>
                                </div>

                            </li>
                        @endforeach
                    @else

                        <div class="alert alert-info" role="alert">
                            No item in cart. Please add some.
                        </div>
                    @endif
                </ul>
                {{--                <div class="cart-total">--}}
                {{--                    <h4>{{__('Subtotal')}}: <span>{{ Cart::instance('default')->total() }}</span></h4>--}}
                {{--                </div>--}}
                <div class="cart-checkout-btn">
                    <a class="btn-hover cart-btn-style" href="/cart">{{__('View Cart')}}</a>
                    <a class="btn-hover cart-btn-style" href="{{route('checkout')}}">{{__('Checkout')}}</a>

                </div>
            </div>
        </div>
    </div>


</div>