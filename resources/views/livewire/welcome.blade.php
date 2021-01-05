<div>
    @livewire('partials.slideshows')
    @livewire('components.trending-products')

    @include('livewire.includes.home3ad')
    @livewire('components.featured-products')
{{--    @livewire('components.bestselling-products')--}}
    {{--  @livewire('components.latest-products')--}}

    @livewire('components.popular-categories')

    <div class="modal fade" id="demoModal23" tabindex="-1" role="dialog"
         aria-labelledby="demoModal" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class=" py-5 text-center rounded-top" style="background-color: #3e4676;
  background-size: 10px;
  background-repeat: repeat-x;
  background-position: 0 100.1%;">
                    <img src="{{asset('assets/images/onboard.svg')}}" alt="">
                </div>
                <div class="modal-body automodal">
                    <div class=" text-center">
                        <h3 class="pt-3">Get Upto 25% Off</h3>
                        <p class="text-muted">
                            The best shopping site in town. Get your chance to win over 25% Off by subscribing to our
                            Newsletter.
                        </p>
                        <a href="#" class="btn btn-cta" data-dismiss="modal" aria-label="Close">Subscribe Now</a>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- free shipping -->
    <div class="service-area pb-20">
        <div class="container-fluid">
            <div class="service-wrap-border service-wrap-padding-3">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">
                        <div class="single-service-wrap-2 mb-30">
                            <div class="service-icon-2 icon-purple">
                                <i class="icon-cursor"></i>
                            </div>
                            <div class="service-content-2">
                                <h3>Free Shipping</h3>
                                <p>Oders over Rs. 10000</p>
                            </div>
                        </div>
                    </div>
                    <div
                            class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1 service-border-1-none-md"
                    >
                        <div class="single-service-wrap-2 mb-30">
                            <div class="service-icon-2 icon-purple">
                                <i class="icon-refresh"></i>
                            </div>
                            <div class="service-content-2">
                                <h3>{{__('10 Days Return')}}</h3>
                                <p>{{__('For any problems')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">
                        <div class="single-service-wrap-2 mb-30">
                            <div class="service-icon-2 icon-purple">
                                <i class="icon-credit-card"></i>
                            </div>
                            <div class="service-content-2">
                                <h3>Secure Payment</h3>
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
                                <h3>24h Support</h3>
                                <p>Dedicated support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- free shipping ended -->

    <div class="about-us-area pb-20">
        <div class="container-fluid">
            <div class="about-us-content-2">
                <div class="about-us-content-2-title">
                    <h4>{{__(' Pooshak: The One-stop Shopping Destination')}}   </h4>
                </div>
                <p>
                    @if(Session::get('applocale')=='ne')
                        {{getConfiguration('home_ne_content')}}
                    @else
                        {{getConfiguration('home_eng_content')}}
                    @endif
                </p>

            </div>
        </div>
    </div>
    @livewire('components.newsletter')

</div>

@push('scripts')
    <script>

    </script>

@endpush
