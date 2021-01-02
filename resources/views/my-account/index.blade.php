@extends('layouts.app')

@section('content')
    <section class="page-header">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li class="active">My-Account</li>
            </ul>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3 my-account">
                <h1 class=" heading-primary font-weight-normal" style="text-align: center;border-bottom: 2px sol">
                    Welcome
                    @if(isset($shippingAddress))
                        {{ $shippingAddress->first_name . ' ' . $shippingAddress->last_name }}
                    @endif
                </h1>


                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="panel-box">
                            <div class="panel-box-title">
                                <h3>ADDRESS BOOK</h3>
                                <a href="{{ route('my-account.edit-address.shipping') }}" class="panel-box-edit">Edit
                                    Address</a>
                            </div>

                            <div class="panel-box-content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <address>
                                            @if(!isset($shippingAddress))
                                                You have not set a default address.
                                            @else
                                                <h2 style="color: #ee3d43">  {{ $shippingAddress->first_name . ' ' . $shippingAddress->last_name }}
                                                </h2>
                                                {{ $shippingAddress->address1 . ' ' . $shippingAddress->address2 }}
                                                <br>
                                                {!! isset($shippingAddress->city) ? $shippingAddress->city .'<br/>' : '' !!}
                                                {!! isset($shippingAddress->state_id->name) ? $shippingAddress->state_id->name . '<br/>' : '' !!}
                                                {{ $shippingAddress->postcode }}
                                            @endif
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        @include('blog.sidebar2')

                    </div>
                </div>
            </div>

            @include('my-account.sidebar')


        </div>
    </div>

<div class=" accounts">
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
                <a href="order.html">My Orders</a>

            </div>
            <div class="wish">
                <a href="profilecart.html">My Cart</a>

            </div>
        </div>

        <div class="col-lg-8 col-md-8 col-sm-12 rightaccount">


            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 coninformation">
                    <h3>Contact Information</h3>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   value="Next">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   value="Aussie">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   value="nextaussietech@gmail.com">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   value="9846533669">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" value="ohyeahbaby">
                        </div>


                    </form>
                </div>

                <div class="col-lg-6 col-md-6 col-12 coninformation">
                    <h3>Address</h3>
                    <form>
                        <div class="form-group streetaddress">
                            <label for="exampleInputEmail1">Street Address</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

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

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">State/Province</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
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

            <div class="editprofile updateprofile">
                <button type="submit">
                    UPDATE PROFILE</button>
            </div>
        </div>

    </div>
</div>


@endsection
