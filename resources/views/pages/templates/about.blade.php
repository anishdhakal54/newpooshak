@extends('layouts.app')

@section('content')
    <div class="aboutus_bannerpage">
        <img src="{{asset('assets/images/about.jpeg')}}">
    </div>

    <div class="aboutus_bodypage container">

        <div class="aboutus_titlepage">


            <h3>{{$page->name}}</h3>
        </div>
        <p>
            @if(Session::get('applocale')=='ne')
                {{$page->nepali_content}}
            @else
                {!!$page->content!!}
            @endif
            {{--            "Welcome to Poosak, Nepal's solitary personal style and fashion friendly online store. Come and celebrate the--}}
            {{--            vogue that you hold by shopping with us for the finest clothing exclusively made for you. We firmly believe--}}
            {{--            Shopping to be our birth-right, and not a luxury. We hold pride in delivering the biggest style trends at the--}}
            {{--            most affordable prices to your doorstep. Our commitment is to provide Customised Clothing put together using--}}
            {{--            the best quality fabrics and churning out trendy fashion clothing with a class-leading customer service--}}
            {{--            experience to our patrons.--}}


            {{--        </p>--}}
            {{--        <p>--}}

            {{--            We really hope you enjoy the customised products as much as we enjoy offering them to you! We hold our--}}
            {{--            confidence in transfiguring the industry of customised products and are affirmed in offering you with new and--}}
            {{--            innovative products to re-define your personal style. Ever since we debuted in the industry, one thing has--}}
            {{--            been constant- our users have shown preference for custom clothing! They choose the style which is tailored--}}
            {{--            fit by our expert professionals to create a signature style for every customer. Our aim is to offer customized--}}
            {{--            clothing without boundaries!!!--}}


        </p>
    </div>

    <div class="aboutus_gallerypage container">

        <div class="aboutus_titlepage">
            <h3>Our Gallery</h3>
        </div>

        <div class="poosgallery">
            @foreach($gallery as $gallery)
                <div class="image1">
                    <a href="{{ optional($gallery->getImage())->url }}" data-lightbox="mygallery">
                        <img src="{{ optional($gallery->getImage())->url }}"> </a>
                </div>

            @endforeach

            {{--            <div class="image1">--}}
            {{--                <a href="assets/images/newpro3.jpg" data-lightbox="mygallery">--}}
            {{--                    <img src="assets/images/newpro3.jpg"> </a>--}}
            {{--            </div>--}}
            {{--            <div class="image1">--}}
            {{--                <a href="assets/images/newpro4.jpg" data-lightbox="mygallery">--}}
            {{--                    <img src="assets/images/newpro4.jpg"> </a>--}}
            {{--            </div>--}}
            {{--            <div class="image1">--}}
            {{--                <a href="assets/images/newpro5.jpg" data-lightbox="mygallery">--}}
            {{--                    <img src="assets/images/newpro5.jpg"> </a>--}}
            {{--            </div>--}}
            {{--            <div class="image1">--}}
            {{--                <a href="assets/images/newpro6.jpg" data-lightbox="mygallery">--}}
            {{--                    <img src="assets/images/newpro6.jpg"> </a>--}}
            {{--            </div>--}}
            {{--            <div class="image1">--}}
            {{--                <a href="assets/images/newpro7.jpg" data-lightbox="mygallery">--}}
            {{--                    <img src="assets/images/newpro7.jpg"> </a>--}}
            {{--            </div>--}}
            {{--            <div class="image1">--}}
            {{--                <a href="assets/images/newpro8.jpg" data-lightbox="mygallery">--}}
            {{--                    <img src="{{asset('assets/images/newpro8.jpg')}}" alt="fafddasfsx"> </a>--}}
            {{--            </div>--}}
        </div>
    </div>

    <div class="service-area pb-20">
        <div class="container">
            <div class="service-wrap-border service-wrap-padding-3">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">
                        <div class="single-service-wrap-2 mb-30">
                            <div class="service-icon-2 icon-purple">
                                <i class="icon-cursor"></i>
                            </div>
                            <div class="service-content-2">
                                <h3>{{__('Free Shipping')}}</h3>
                                <p>Oders over Rs. 10000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1 service-border-1-none-md">
                        <div class="single-service-wrap-2 mb-30">
                            <div class="service-icon-2 icon-purple">
                                <i class="icon-refresh"></i>
                            </div>
                            <div class="service-content-2">
                                <h3>{{__('10 Days Return')}}</h3>
                                <p>For any problems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">
                        <div class="single-service-wrap-2 mb-30">
                            <div class="service-icon-2 icon-purple">
                                <i class="icon-credit-card"></i>
                            </div>
                            <div class="service-content-2">
                                <h3>{{__('Secure Payment')}}</h3>
                                <p>100% Guarantee</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="single-service-wrap-2 mb-30">
                            <div class="service-icon-2 icon-purple">
                                <i class="icon-earphones"></i>
                            </div>
                            <div class="service-content-2">
                                <h3>{{__('24h Support')}}</h3>
                                <p>Dedicated support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    {{--    <section class="page-header">--}}
    {{--        <div class="container">--}}
    {{--            <ul class="breadcrumb">--}}
    {{--                <li><a href="{{ route('welcome') }}">Home</a></li>--}}
    {{--                <li class="active">{{ $page->name }}</li>--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--    </section>--}}




    {{--    <div class="container page-content">--}}

    {{--        <div class="row">--}}
    {{--            <div class="col-md-8">--}}
    {{--                {!! $page->content !!}--}}
    {{--            </div>--}}
    {{--            <div class="col-md-4">--}}
    {{--                @if(null !== $page->getImage())--}}
    {{--                    <img src="{{ $page->getImage()->mediumUrl }}" alt="" class="img-responsive">--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--    </div>--}}

    {{--    <section--}}

    {{--            class="parallax section section-text-light section-parallax section-center section-overlay-opacity section-overlay-opacity-scale-8 mt-none mb-50"--}}
    {{--            data-plugin-parallax--}}
    {{--            data-plugin-options="{'speed': 1.5}" data-image-src="http://nextnepalgroup.com/storage/background/background.jpeg">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-10 col-md-offset-1">--}}
    {{--                    <div class="owl-carousel owl-theme nav-bottom rounded-nav"--}}
    {{--                         data-plugin-options="{'items': 1, 'loop': true, 'autoplay': true}">--}}

    {{--                        @foreach($about as $testimonial)--}}
    {{--                            <div>--}}

    {{--                                <div class="col-md-12">--}}
    {{--                                    <div class="testimonial testimonial-style-2 testimonial-with-quotes mb-none">--}}
    {{--                                    <p style="color: #c1bdbd;font-size: 30px;font-family: museo-slab;/* height: 25px; */padding-bottom: 0px;margin-bottom: 0;"><strong>What Our Founder Say </strong></p>--}}
    {{--                                        <div class="testimonial-author">--}}
    {{--                                            <img src="{{ null === $testimonial->getImage()  ? $testimonial->getDefaultImage('uploads/avatar.jpg')->url : $testimonial->getImage()->smallUrl }}"--}}
    {{--                                                 class="img-responsive img-circle" alt="">--}}
    {{--                                        </div>--}}
    {{--                  --}}

    {{--                                        <blockquote>--}}
    {{--                                            {!! $testimonial->content !!}--}}
    {{--                                        </blockquote>--}}
    {{--                                        <div class="testimonial-author">--}}
    {{--                                            <p><strong>{{ $testimonial->author }}</strong>--}}
    {{--                                                @if($testimonial->title)--}}
    {{--                                                    <span>{{ $testimonial->title }}</span>--}}
    {{--                                                @endif--}}
    {{--                                            </p>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <a href="{{route('about-message')}}" class="btn btn-primary btn-sm" style="margin-top: 40px;">View--}}
    {{--                                    All</a>--}}
    {{--                            </div>--}}
    {{--                        @endforeach--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    {{--    <div class="container page-content">--}}
    {{--        <div class="row mt-xlg">--}}
    {{--            <div class="col-md-12">--}}
    {{--                <h2><strong>Who</strong> We Are</h2>--}}
    {{--                <p>{{ getConfiguration('who_we_are') }}</p>--}}
    {{--                <hr class="tall">--}}
    {{--            </div>--}}
    {{--            <div class="col-md-12">--}}
    {{--                <div class="featured-boxes featured-boxes-style-6">--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-md-3">--}}
    {{--                            <div class="featured-box featured-box-primary featured-box-effect-6 mt-md">--}}
    {{--                                <div class="box-content">--}}
    {{--                                    <i class="icon-featured fa fa-user"></i>--}}
    {{--                                    <h4>Our Mission</h4>--}}
    {{--                                    <p>{{ getConfiguration('our_mission') }}</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-3">--}}
    {{--                            <div class="featured-box featured-box-secondary featured-box-effect-6 mt-md">--}}
    {{--                                <div class="box-content">--}}
    {{--                                    <i class="icon-featured fa fa-book"></i>--}}
    {{--                                    <h4>Our Vision</h4>--}}
    {{--                                    <p>{{ getConfiguration('our_vision') }}</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-3">--}}
    {{--                            <div class="featured-box featured-box-tertiary featured-box-effect-6 mt-md">--}}
    {{--                                <div class="box-content">--}}
    {{--                                    <i class="icon-featured fa fa-trophy"></i>--}}
    {{--                                    <h4>Our Help</h4>--}}
    {{--                                    <p>{{ getConfiguration('our_help') }}</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-3">--}}
    {{--                            <div class="featured-box featured-box-quaternary featured-box-effect-6 mt-md">--}}
    {{--                                <div class="box-content">--}}
    {{--                                    <i class="icon-featured fa fa-cogs"></i>--}}
    {{--                                    <h4>Our Supports</h4>--}}
    {{--                                    <p>{{ getConfiguration('our_support') }}</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--    <section class="call-to-action call-to-action-default with-button-arrow call-to-action-in-footer pb-lg">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <h2><strong>Our</strong> Team</h2>--}}
    {{--                </div>--}}
    {{--                @foreach($teamMembers as $teamMember)--}}
    {{--                    <div class="col-md-3 col-sm-6 col-xs-12 mb-xlg">--}}
    {{--                        <span class="thumb-info thumb-info-hide-wrapper-bg">--}}
    {{--                            <span class="thumb-info-wrapper">--}}
    {{--                                <a href="javascript:void(0);">--}}
    {{--                                    <img src="{{ null === $teamMember->getImage()  ? $teamMember->getDefaultImage('uploads/avatar.jpg')->url : $teamMember->getImage()->mediumUrl }}"--}}
    {{--                                         class="img-responsive" alt="">--}}
    {{--                                    <span class="thumb-info-title">--}}
    {{--                                        <span class="thumb-info-inner">{{ $teamMember->name }}</span>--}}
    {{--                                        <span class="thumb-info-type">{{ $teamMember->designation }}</span>--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}
    {{--                            </span>--}}
    {{--                            <span class="thumb-info-caption">--}}
    {{--                                <span class="thumb-info-caption-text">--}}
    {{--                                    {{ $teamMember->content }}--}}
    {{--                                </span>--}}
    {{--                                <span class="thumb-info-social-icons">--}}
    {{--                                    <a href="{{ $teamMember->facebook_link or '#' }}" target="_blank">--}}
    {{--                                        <i class="fa fa-facebook"></i>--}}
    {{--                                        <span>Facebook</span>--}}
    {{--                                    </a>--}}
    {{--                                    <a href="{{ $teamMember->twitter_link or '#' }}" target="_blank">--}}
    {{--                                        <i class="fa fa-twitter"></i>--}}
    {{--                                        <span>Twitter</span>--}}
    {{--                                    </a>--}}
    {{--                                    <a href="{{ $teamMember->googleplus_link or '#' }}" target="_blank">--}}
    {{--                                        <i class="fa fa-google-plus"></i>--}}
    {{--                                        <span>Google Plus</span>--}}
    {{--                                    </a>--}}
    {{--                                    <a href="{{ $teamMember->linkedin_link or '#' }}" target="_blank">--}}
    {{--                                        <i class="fa fa-linkedin"></i>--}}
    {{--                                        <span>Linkedin</span>--}}
    {{--                                    </a>--}}
    {{--                                </span>--}}
    {{--                            </span>--}}
    {{--                        </span>--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
{{--    @push('styles')--}}
{{--    <link href="{{asset('assets/lightbox.min.css')}}">--}}
{{--    @endpush--}}

{{--    @push('scripts')--}}
{{--        <script src="{{asset('assets/lightbox-plus-jquery.min.js')}}"></script>--}}

{{--    @endpush--}}

@endsection