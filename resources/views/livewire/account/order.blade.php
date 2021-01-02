<div>
    <!-- Breadcrumb Area start -->
{{--    <section class="breadcrumb-area">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="breadcrumb-content">--}}
{{--                        <h1 class="breadcrumb-hrading">Order Page</h1>--}}
{{--                        <ul class="breadcrumb-links">--}}
{{--                            <li><a href="/">Home</a></li>--}}
{{--                            <li>Order</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Breadcrumb Area End -->--}}
{{--    <!-- cart area start -->--}}
{{--    <div class="cart-main-area mtb-60px">--}}
{{--        <div class="container">--}}
{{--            <h3 class="cart-page-title">Your order items</h3>--}}
{{--            <div class="row">--}}
{{--                @if($orders->count() <= 0)--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <p>No products in orderlist.</p>--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">--}}
{{--                        <form action="#">--}}
{{--                            <div class="table-content table-responsive cart-table-content">--}}
{{--                                <table style="width: 100%;">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Order</th>--}}
{{--                                        <th>Date</th>--}}
{{--                                        <th>Status</th>--}}
{{--                                        <th>Total</th>--}}
{{--                                        <th>Actions</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($orders as $order)--}}
{{--                                        @livewire('account.order-item',['order' => $order])--}}
{{--                                    @endforeach--}}

{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- cart area end -->


    <div class=" accounts">
    <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12 leftaccount">
            <h3>Hello, UserName
                <img src="assets/images/newchecks.svg">
            </h3>
            <div class="manage">
                <a href="#">Manage My Account</a>
                <div class="manage_lists">
                    <a href="{{route('my-account.index')}}"><i class="fa fa-chevron-right"></i> My Profile</a>

                </div>
            </div>
            <div class="order">
                <a href="{{route('account.order')}}">My Orders</a>

            </div>
            <div class="wish">
                <a href="profilecart.html">My Cart</a>

            </div>
        </div>

        <div class="col-lg-8 col-md-12 col-sm-12 rightaccount orderaccount">
            <h3>My Orders</h3>
            @if($orders->count() <= 0)
                <div class="alert alert-danger">
                    <p>No products in orderlist.</p>
                </div>
            @else
                <div class="profilewithedit orders">

                    <table class="table ordertable">
                        <thead>
                        <tr>
                            <th scope="col">ORDER NUMBER</th>
                            <th scope="col">DATE</th>
                            <th scope="col">Status</th>
                            <th scope="col">TOTAL</th>
                            <th scope="col">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--          <tr class="tableleft">--}}
                        {{--            <td scope="row">#3669</td>--}}
                        {{--            <td>14 December, 2020</td>--}}
                        {{--            <td>Pending</td>--}}
                        {{--            <td>RS 305.00 for 1 Products</td>--}}
                        {{--            <td class="eyetrash">--}}
                        {{--              <i class="fa fa-eye"></i>--}}
                        {{--              <i class="fa fa-times"></i>--}}
                        {{--            </td>--}}
                        {{--          </tr>--}}
                        @foreach($orders as $order)
                            @livewire('account.order-item',['order' => $order])
                        @endforeach
                        </tbody>

                        @endif
{{--                        <tbody>--}}
{{--                        <tr class="tableleft">--}}
{{--                            <td scope="row">#3669</td>--}}
{{--                            <td>14 December, 2020</td>--}}
{{--                            <td>Pending</td>--}}
{{--                            <td>RS 305.00 for 1 Products</td>--}}
{{--                            <td class="eyetrash">--}}
{{--                                <i class="fa fa-eye"></i>--}}
{{--                                <i class="fa fa-times"></i>--}}
{{--                            </td>--}}
{{--                        </tr>--}}

{{--                        </tbody>--}}
                        {{--          <tbody>--}}
                        {{--          <tr class="tableleft">--}}
                        {{--            <td scope="row">#3669</td>--}}
                        {{--            <td>14 December, 2020</td>--}}
                        {{--            <td>Pending</td>--}}
                        {{--            <td>RS 305.00 for 1 Products</td>--}}
                        {{--            <td class="eyetrash">--}}
                        {{--              <i class="fa fa-eye"></i>--}}
                        {{--              <i class="fa fa-times"></i>--}}
                        {{--            </td>--}}
                        {{--          </tr>--}}

                        {{--          </tbody>--}}
                    </table>


                </div>
        </div>


    </div>


</div>
