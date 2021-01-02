<div>
    <!-- Breadcrumb Area start -->
{{--  <section class="breadcrumb-area">--}}
{{--    <div class="container">--}}
{{--      <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--          <div class="breadcrumb-content">--}}
{{--            <h1 class="breadcrumb-hrading">Account Page</h1>--}}
{{--            <ul class="breadcrumb-links">--}}
{{--              <li><a href="/">Home</a></li>--}}
{{--              <li>My Account</li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}
{{--  <!-- Breadcrumb Area End -->--}}
{{--  <!-- account area start -->--}}
{{--  <div class="checkout-area mtb-60px">--}}
{{--    <div class="container">--}}
{{--      <div class="row">--}}
{{--        <div class="ml-auto mr-auto col-lg-9">--}}
{{--          <div class="checkout-wrapper">--}}
{{--            <div id="faq" class="panel-group">--}}
{{--              @livewire('account.account-information')--}}
{{--              @livewire('account.change-password')--}}
{{--              @livewire('account.address-book')--}}
{{--              <div class="panel panel-default single-my-account">--}}
{{--                <div class="panel-heading my-account-title">--}}
{{--                  <h3 class="panel-title"><span>4 .</span> <a href="{{route('wishlist')}}">Modify your wish list </a></h3>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="panel panel-default single-my-account">--}}
{{--                <div class="panel-heading my-account-title">--}}
{{--                  <h3 class="panel-title"><span>5.</span> <a href="{{route('account.order')}}">Order list </a></h3>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="panel panel-default single-my-account">--}}
{{--                <div class="panel-heading my-account-title">--}}
{{--                  <h3 class="panel-title"><span>6.</span> <a href="{{route('my-account.myquotes')}}">My Quotes</a></h3>--}}
{{--                </div>--}}
{{--              </div>--}}

{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
<!-- account area end -->

    <div wire:ignore class=" accounts">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 leftaccount">
                <h3>Hello, UserName
                    <img src="assets/images/newchecks.svg">
                </h3>
                <div class="manage">
                    <a href="#">Manage My Account</a>
                    <div class="manage_lists">
                        <a href="profile.html"><i class="fa fa-chevron-right"></i> My Profile</a>

                    </div>
                </div>
                <div class="order">
                    <a href="{{route('account.order')}}">My Orders</a>

                </div>
                <div class="wish">
                    <a href="profilecart.html">My Cart</a>

                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-12 rightaccount">


                <div  class="row">
                    <div class="col-lg-6 col-md-6 col-12 coninformation">
                        <h3>Contact Information</h3>
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" wire:model="first_name" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp"
                                       value="Next">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" wire:model="last_name" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp"
                                       value="Aussie">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" wire:model="email" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp"
                                       value="nextaussietech@gmail.com">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="tel" wire:model="phone" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp"
                                       value="">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" value="">
                            </div>


                        </form>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12 coninformation">
                        <h3>Address</h3>
                        <form>
                            <div class="form-group streetaddress">
                                <label for="exampleInputEmail1">Street Address</label>
                                <input type="text" class="form-control" wire:model="address1" id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                                <input type="text" class="form-control" id="exampleInputEmail1" wire:model="address2"
                                       aria-describedby="emailHelp">

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">County</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Nepal</option>
                                    <option>Nepal</option>
                                    <option>Nepal</option>
                                    <option>Nepal</option>
                                    <option>Nepal</option>
                                </select>
                            </div>

                            <div  class="form-group">
                                <label for="exampleFormControlSelect1">State/Province</label>
                                <select class="form-control" id="exampleFormControlSelect1">

                                    @foreach ($allstate as $key => $value)
                                        <option wire:model="state" value="{{ $key }}" {{ ( $value->id == $state->id) ? 'selected' : '' }}>
                                            {{ $value->name}}
                                        </option>
                                    @endforeach

{{--                                @foreach ($allstate as $key => $allstate)--}}
{{--                                        <option value="{{$key}}" {{ ( $key == $state->id) ? 'selected' : ''}}>{{$allstate->name}}</option>--}}

{{--                                    @foreach ($items as $key => $value)--}}
{{--                                        <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}>--}}
{{--                                            {{ $value }}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}

                                    {{--                  <option>2</option>--}}
                                    {{--                  <option>3</option>--}}
                                    {{--                  <option>4</option>--}}
                                    {{--                  <option>5</option>--}}
                                    {{--                  <option>6</option>--}}
                                    {{--                  <option>7</option>--}}

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">District
                                </label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Kathmandu</option>
                                    <option>Bhaktapur</option>
                                    <option>Lalitpur</option>

                                </select>
                            </div>


                        </form>
                    </div>
                </div>

                <div wire:click="editinfo" class="editprofile updateprofile">
                    <button type="button">
                        UPDATE PROFILE
                    </button>
                </div>
            </div>

        </div>
    </div>


</div>
