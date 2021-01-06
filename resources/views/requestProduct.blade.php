@extends('layouts.app')

@section('content')
    <h1></h1>
    <form action="{{route('storeRequestProduct')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 bg-img d-none d-sm-flex align-items-end"
                     style="background-image: url('https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1331&q=80')">

                </div>


                <div class="col-md-6 py-2 px-sm-5 ">
                    <form id="get-quote">
                        <h1>Request Product </h1>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">{{__('First Name')}}</label>
                                <input class="form-control" type="text"
                                       placeholder="Enter your first name here.."
                                       name="firstname"/>
                                @if ($errors->has('firstname'))
                                    <span class="error help-block">{{ $errors->first('firstname') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">{{__('Last Name')}}</label>
                                <input class="form-control" type="text"
                                       placeholder="Enter your lastname here.."
                                       name="lastname"/>
                                @if ($errors->has('lastname'))
                                    <span class="error help-block">{{ $errors->first('lastname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">{{__('Email')}}</label>
                            <input class="form-control " type="email"
                                   placeholder="Enter your email  here.."
                                   name="email"/>
                            @if ($errors->has('email'))
                                <span class="error help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4">{{__('Company Name')}}</label>
                            <input class="form-control" type="text"
                                   placeholder="Enter Company Name"
                                   name="company_name"/>
                            @if ($errors->has('companyname'))
                                <span class="error help-block">{{ $errors->first('companyname') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{__('Address')}}</label>
                            <input class="form-control " type="text"
                                   placeholder="Enter your address  here.."
                                   name="address"/>
                            @if ($errors->has('address'))
                                <span class="error help-block">{{ $errors->first('address') }}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="inputAddress">{{__('Phone')}}</label>
                            <input class="form-control " type="text" name="phone"
                                   placeholder="Enter your address  here.."
                            />
                            @if ($errors->has('Phone'))
                                <span class="error help-block">{{ $errors->first('phone') }}</span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{__('attachment1')}}</label>
                            <input class="form-control " type="file"
                                   placeholder="Upload File here.."
                                   name="attachment1"/>
                            @if ($errors->has('attachment1'))
                                <span class="error help-block">{{ $errors->first('attachment1') }}</span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{__('attachment2')}}</label>
                            <input class="form-control " type="file"
                                   placeholder="Upload File  here.."
                                   name="attachment2"/>
                            @if ($errors->has('attachment2'))
                                <span class="error help-block">{{ $errors->first('attachment2') }}</span>
                            @endif

                        </div>


<div class="proinfoswow">
    <h3>Notice: </h3>
    <li>
        <i class="fa fa-chevron-right"></i> If the product limit is between 10-20 piece, time to be taken = 1 week</li>
    <li>  <i class="fa fa-chevron-right"></i> If the product limit is between 20-100 piece, time to be taken = 2 weeks</li>
    <li>  <i class="fa fa-chevron-right"></i> If the product limit is between 100-500 piece, time to be taken = 1 month</li>

    <p>Delivery time might vary accordingly!</p>



</div>

                        @if(!Auth::check())
                            <button type="submit" class="btn_add_to_cart" data-toggle="modal"
                                    data-target="#demoModal3669">{{__('Submit')}}</button>

                        @else
                            {{--                    <button type="button"  class="btn btn-cta" wire:target="sendquote" > Submit--}}
                            {{--                        <span><i wire:loading wire:target="sendquote" class="fas fa-spinner fa-spin"></i> {{__('Submit')}}</span>--}}
                            {{--            --}}
                            {{--                    </button>--}}
                            <div class="demo-area quotebutton">
                                <button type="submit" class="btn btn-cta" >
                                    Submit
                                </button>
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>


        <style>
            #get-quote input.checkbox {
                display: inline-block;
                width: unset;
                height: auto;
                margin-right: 7px;
            }
        </style>

        <div wire:ignore class="modal fade loginmodal" id="demoModal3669" tabindex="-1" role="dialog"
             aria-labelledby="demoModal3669" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered  " role="document">
                <div class="modal-content">
                    <div class="modal-body py-sm-4 px-sm-5">

                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="text-center pt-5">
                            <img src="{{asset('assets/images/login.svg')}}" class="loginsvg">
                            <h3 class="loginheadings">Login</h3>


                        </div>
                        <form>

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('Email address')}}</label>
                                <input wire:model='login_email' type="email" class="form-control"
                                       id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{__('Password')}}</label>
                                <input wire:model='password' type="password" class="form-control"
                                       id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                            </div>

                            <div class="login_button">
                                <button type="submit" wire:click="login" wire:loading.class="disabled">
                                    <span><i wire:loading wire:target="login" class="fas fa-spinner fa-spin"></i> {{__('Login')}}</span>

                                </button>
                            </div>
                            <div class="for">
                                <div class="left_forgot">
                                    <a href="#">{{__('Forgot Password?')}}</a>
                                </div>
                                <div class="new">
                                    New to Poshak? <a href="{{route('register')}}">{{__('Click here to register.')}}</a>
                                </div>
                            </div>


                            <span class="or">{{__('OR')}}</span>

                            <div class="social_last_share login_share" style="margin-bottom: 1rem">

                                <div class="login_button social_button">
                                    <button type="submit">{{__('Sign In With Facebook')}} <img
                                                src="{{asset('assets/images/facebook.png')}}"></button>
                                    <button type="submit">{{__('Sign In With Google')}} <img
                                                src="{{asset('assets/images/gmail.svg')}}"></button>
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


    </form>


@endsection