<div>

    {{--  <section class="last_footer">--}}
    {{--    <div class="container">--}}
    {{--      <div class="row flex-hune">--}}
    {{--        <div class="col-lg-4 col-md-4 col-12">--}}
    {{--          <div class="footer_logo">--}}
    {{--            <a href="/">--}}
    {{--              <img alt="logo" src="{{ url('storage') . '/' . getConfiguration('footer-logo') }}"/>--}}
    {{--            </a>--}}
    {{--          </div>--}}
    {{--          <div class="footer_title" style="padding: 10px 0">--}}
    {{--            <p style="font-size: 14px">--}}
    {{--              {{getConfiguration('footer_text')}}--}}
    {{--            </p>--}}
    {{--          </div>--}}
    {{--          <div class="footer-social" style="padding-bottom: 1rem">--}}
    {{--            @if(getConfiguration('facebook_link') || getConfiguration('twitter_link') || getConfiguration('googleplus_link') || getConfiguration('instagram_link') || getConfiguration('linkedin_link'))--}}
    {{--              @if(getConfiguration('facebook_link'))--}}
    {{--                <a href="{{ getConfiguration('facebook_link') }}"><i class="icon-social-facebook"></i></a>--}}

    {{--              @endif--}}
    {{--              @if(getConfiguration('twitter_link'))--}}
    {{--                <a href="{{ getConfiguration('twitter_link') }}"><i class="icon-social-twitter"></i></i></a>--}}

    {{--              @endif--}}
    {{--              @if(getConfiguration('googleplus_link'))--}}
    {{--                <a href="{{ getConfiguration('googleplus_link') }}"><i class="icon-social-google"></i></a>--}}

    {{--              @endif--}}
    {{--              @if(getConfiguration('linkedin_link'))--}}
    {{--                <a href="{{ getConfiguration('linkedin_link') }}"><i class="icon-social-linkedin"></i></a>--}}
    {{--              @endif--}}
    {{--            @endif--}}

    {{--          </div>--}}
    {{--          <div class="footer_pay">--}}
    {{--            <h2 style="font-weight: bold">We accept</h2>--}}
    {{--            <div class="pay_img">--}}
    {{--              <img src="/assets/images/eSewa.png" style="width: 60px"/>--}}
    {{--              <img src="/assets/images/visa.png"/>--}}
    {{--              <img src="/assets/images/cod.png"/>--}}
    {{--            </div>--}}
    {{--          </div>--}}
    {{--        </div>--}}

    {{--        <div class="col-lg-8 col-md-8 col-12">--}}
    {{--          <div class="row">--}}
    {{--            <div class="col-lg-3 col-md-3 col-6">--}}
    {{--              <div class="right_title">--}}
    {{--                <h2>Useful Links</h2>--}}
    {{--              </div>--}}
    {{--              <div class="links">--}}
    {{--                <a href="/about-us">About</a><br/>--}}
    {{--                <a href="/contact-us">Contact Us</a><br/>--}}
    {{--                <a href="/terms-and-conditions">Terms and Conditions</a><br/>--}}
    {{--                <a href="/privacy-policy">Privacy Policy</a><br/>--}}
    {{--              </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-md-3 col-6">--}}
    {{--              <div class="right_title">--}}
    {{--                <h2>Category</h2>--}}
    {{--              </div>--}}
    {{--              <div class="links">--}}
    {{--                <a href="#">Hospital Dress</a><br/>--}}
    {{--                <a href="#">Hotel Dress</a><br/>--}}
    {{--                <a href="#">Industrial Cloth</a><br/>--}}
    {{--                <a href="#">Hospital Shoes</a><br/>--}}
    {{--                <a href="#">Tshirt</a><br/>--}}
    {{--                <a href="#">Other Products</a><br/>--}}
    {{--              </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-md-3 col-6">--}}
    {{--              <div class="right_title">--}}
    {{--                <h2>My Account</h2>--}}
    {{--              </div>--}}
    {{--              <div class="links">--}}
    {{--                <a href="{{route('my-account.index')}}">My Account</a><br/>--}}
    {{--                <a href="{{route('account.order')}}">Order</a><br/>--}}
    {{--                <a href="{{route('wishlist')}}">Wishlist</a><br/>--}}
    {{--              </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-lg-3 col-md-3 col-6">--}}
    {{--              <div class="right_title">--}}
    {{--                <h2>Contact Information</h2>--}}
    {{--              </div>--}}
    {{--              <div class="links">--}}
    {{--                <div class="first_con">--}}
    {{--                  <h2>{{getConfiguration('site_address')}}</h2>--}}
    {{--                  <h2>{{getConfiguration('site_primary_email')}}</h2>--}}
    {{--                  <h2>{{getConfiguration('site_primary_phone')}}</h2>--}}
    {{--                </div>--}}
    {{--              </div>--}}
    {{--            </div>--}}
    {{--          </div>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--    </div>--}}
    {{--  </section>--}}

    {{--  <section class="final_footer">--}}
    {{--    <div class="container">--}}
    {{--      <div class="top_title">--}}
    {{--        <div class="top_links">--}}
    {{--          <a href="#">--}}
    {{--            @if(getConfiguration('copyright'))--}}
    {{--            {{ getConfiguration('copyright') }}--}}
    {{--            @else--}}
    {{--            &copy; Copyright {{ date('Y') }}. All Rights Reserved.--}}
    {{--            @endif</a>--}}
    {{--          <span>|</span>--}}

    {{--          Developed by <b>NAT</b>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--    </div>--}}
    {{--  </section>--}}


    <footer id="footer" class="footer color-bg">
        <div class="footer-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 footlogo">
                        <div class="logo">
                            <a href="/">
                                <img alt="logo" src="{{ url('storage') . '/' . getConfiguration('site_logo') }}"/>
                                <img class="mini-logo" src="{{asset('assets/images/footlogo1.png')}}" alt="">
                            </a>

                            <div class="trades">
                                <p>Our Trademark</p>
                            </div>
                        </div>


                        <!-- /.module-body -->
                    </div>
                    <!-- /.col -->

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-1 hiddenknow">
                        <div class="module-heading">
                            <h4 class="module-title">{{__('Know Us')}}</h4>
                            <h4><a href=></a></h4>
                        </div>
                        <!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a title="Your Account" href="/page/about-us">{{__('About Us')}}</a>
                                </li>
                                <li class="first"><a title="Your Account" href="/contact-us">{{__('Contact Us') }}</a></li>
                            </ul>
                        </div>
                        <!-- /.module-body -->
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 poli">
                        <div class="module-heading">
                            <h4 class="module-title">{{__('Our Policies')}}</h4>
                        </div>
                        <!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
    {{--                                <li class="first"><a href="{{url('/page/faq')}}" title="Contact us">{{__('FAQ')}}</a>--}}
    {{--                                </li>--}}
                                <li><a href="{{url('/page/privacy-and-policies')}}"
                                       title="About us">{{__('Privacy Policy')}}</a></li>
                                <li><a href="{{url('/page/terms-and-condition')}}"
                                       title="faq">{{__('Terms & Condition')}}</a></li>
                                <li><a href="{{url('/page/return-and-policy')}}"
                                       title="Popular Searches">{{__('Return Policy')}}</a></li>
{{--                                <li><a href="{{url('/page/exchange-policy')}}"--}}
{{--                                       title="Popular Searches">{{__('Exchange Policy')}}</a></li>--}}
                            </ul>
                        </div>
                        <!-- /.module-body -->
                    </div>
                    <!-- /.col -->

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 shop">
                        <div class="module-heading">
                            <h4 class="module-title">Category</h4>
                        </div>
                        <!-- /.module-heading -->

                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a title="Your Account" href="#">Hospital Dress</a></li>
                                <li><a title="Information" href="" wire:click="contact-us">Hotel Dress</a></li>
                                <li><a title="Addresses" href="#">Industrial Cloth</a></li>
                                <li><a title="Addresses" href="#">Hospital Shoes</a></li>
                                <li><a title="Addresses" href="#">Industrial Cloth</a></li>
                                <li><a title="Addresses" href="#">Tshirt</a></li>
                                <li><a title="Addresses" href="#">Other Products</a></li>
                            </ul>
                        </div>
                        <!-- /.module-body -->
                    </div>
                    <!-- /.col -->

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="module-heading">
                            <h4 class="module-title">{{__('Connect')}}</h4>
                        </div>
                        <!-- /.module-heading -->

                        <div class="module-body">

                            <div class="healthdose">
                                <p>{{__('Sign up for our newsletter to receive updates & exclusive offers')}}

                                </p>
                                <div class="demo-area ">
                                    <button type="button" class="btn btn-dark btn-cta subnowbtn" data-toggle="modal"
                                            data-target="#subs">
                                        {{__('Subscribe')}}
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade   " id="subs" tabindex="-1" role="dialog" aria-labelledby="subs"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered  modal-lg  " role="document">
                                        <div class="modal-content">

                                            <div class="container-fluid">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="row">
                                                    <div class="col-md-6 bg-img rounded-left m-h-60 d-none d-sm-block modalimg">
                                                        <img src="{{asset('assets/images/undraw_subscribe_vspl.svg')}}">
                                                    </div>
                                                    <div class="col-md-6 py-5 px-sm-5  newsletterform">

                                                        <h2 class="pt-sm-3">{{__('Subscribe to our Newsletter')}}</h2>
                                                        <p class="text-muted subscribe">
                                                            {{__('Stay informed! Monthly offers & discounts.')}}
                                                        </p>
                                                        <form method="POST" action="/suscriber">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">{{__('Email address')}}</label>
                                                                <input type="email" class="form-control"
                                                                       name="newsletterEmail"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Enter email">
                                                                <small id="emailHelp"
                                                                       class="form-text text-muted">{{__('We will never share your email with anyone else.')}}</small>
                                                            </div>

                                                            <button type="submit" class="btn btn-block btn-cta subsform"
                                                                    data-dismiss="modal"
                                                                    aria-label="Close">{{__('Subscribe')}}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Ends -->

                                <!-- Modal Ends -->
                            </div>
                        </div>
                        <!-- /.module-body -->
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="module-heading">
                            <h4 class="module-title">{{__('Contact Us')}}</h4>
                        </div>
                        <!-- /.module-heading -->

                        <div class="conloc">
                            <i class="fa fa-map-marker"></i>
                            <p>{{getConfiguration('site_address')}}</p>
                        </div>

                        <div class="conloc">
                            <i class="fa fa-envelope"></i>
                            <p>{{getConfiguration('site_primary_email')}}
                            </p>
                        </div>

                        <div class="conloc">
                            <i class="fa fa-phone"></i>
                            <p>{{getConfiguration('site_primary_phone')}}</p>
                        </div>

                        <ul class='list-unstyled soc footsoc'>

                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-google"></i>
                            <i class="fa fa-youtube"></i>
                        </ul>


                        <!-- /.module-body -->
                    </div>


                </div>

            </div>
        </div>


    </footer>

    <div class="paycopy container-fluid">
        <div class=" payment-methods">
            <h3>{{__('Payment Methods')}}</h3>
            <ul>
                <li><img src="{{asset('assets/images/cod.png')}}" alt=""></li>
                <li><img src="{{asset('assets/images/esewa.png')}}" alt=""></li>

            </ul>
        </div>
        <div class="copyr">
            <p>© {{date('Y')}} {{__('Pooshak. All rights reserved.')}} </p>
        </div>
    </div>


</div>


</div>
