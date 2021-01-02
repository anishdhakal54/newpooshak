<div>
    <!-- Breadcrumb Area start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-hrading">Contact Page</h1>
                        <ul class="breadcrumb-links">
                            <li><a href="index.html">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->
    <!-- contact area start -->
    <div class="contact-area mtb-60px">
        <div class="container">
            <div class="contact-map mb-10">
                <div id="mapid" wire:ignore style="width: 100%; height: 400px;"></div>
            </div>
            <div class="custom-row-2">
                <div class="col-lg-4 col-md-5" style="background-color: #f3f3f3;">
                    <div class="contact-info-wrap">
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-info-dec">
                                <p>{{getConfiguration('site_primary_phone')}} </p>
                                <p>{{getConfiguration('site_secondary_phone')}}
                                </p>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="contact-info-dec">
                                <p><a href="#">{{getConfiguration('site_primary_email')}}</a></p>
                                <p><a href="#">{{getConfiguration('site_secondary_email')}}</a></p>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="contact-info-dec">
                                <p>{{getConfiguration('site_address')}}</p>
                            </div>
                        </div>
                        {{--<div class="contact-social">
                            <h3>Follow Us</h3>
                            <div class="social-info">

                                <ul>
                                    @if(getConfiguration('facebook_link') || getConfiguration('twitter_link') || getConfiguration('googleplus_link') || getConfiguration('instagram_link') || getConfiguration('linkedin_link'))
                                        @if(getConfiguration('facebook_link'))
                                            <li>
                                                <a href="{{ getConfiguration('facebook_link') }}"><i
                                                            class="fa fa-facebook"></i></a>
                                            </li>

                                        @endif
                                        @if(getConfiguration('twitter_link'))
                                            <li>
                                                <a href="{{ getConfiguration('twitter_link') }}"><i
                                                            class="fa fa-twitter"></i></a>
                                            </li>

                                        @endif
                                        @if(getConfiguration('googleplus_link'))
                                            <li>
                                                <a href="{{ getConfiguration('googleplus_link') }}"><i
                                                            class="fa fa-google-plus"></i></a>
                                            </li>

                                        @endif
                                        @if(getConfiguration('linkedin_link'))
                                            <li>
                                                <a href="{{ getConfiguration('linkedin_link') }}"><i
                                                            class="fa fa-linkedin"></i></a>
                                            </li>
                                        @endif
                                    @endif

                                </ul>

                            </div>
                        </div>--}}
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2>Get In Touch</h2>
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><i class="fa fa-thumbs-o-up"></i> Success!</strong>
                                {!! session('success') !!}
                            </div>
                        @endif
                        <form class="contact-form-style" id="contact-form" wire:submit.prevent="insertContact">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input class="@if ($errors->has('name')) is-invalid   @endif" type="text"
                                           placeholder="Enter your name here.."
                                           wire:model.debounce.500ms="name"/>
                                    @if ($errors->has('name'))
                                        <span class="error invalid-feedback rel">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <input class="@if ($errors->has('email')) is-invalid   @endif" type="text"
                                           placeholder="Enter your email here.."
                                           wire:model.debounce.500ms="email"/>
                                    @if ($errors->has('email'))
                                        <span class="error invalid-feedback rel">{{ $errors->first('email') }}</span>
                                    @endif

                                </div>
                                <div class="col-lg-12">
                                    <input class="@if ($errors->has('phone')) is-invalid   @endif" type="text"
                                           placeholder="Enter your phone here.."
                                           wire:model.debounce.500ms="phone"/>
                                    @if ($errors->has('phone'))
                                        <span class="error invalid-feedback rel">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-12">
                                    <input class="@if ($errors->has('subject')) is-invalid   @endif" type="text"
                                           placeholder="Enter your subject here.."
                                           wire:model.debounce.500ms="subject"/>
                                    @if ($errors->has('subject'))
                                        <span class="error invalid-feedback rel">{{ $errors->first('subject') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-12">

                                    <textarea class="@if ($errors->has('message')) is-invalid   @endif"
                                              wire:model.debounce.500ms="message"
                                              placeholder="Your Message*"></textarea>
                                    @if ($errors->has('message'))
                                        <span class="error invalid-feedback ">{{ $errors->first('message') }}</span>
                                    @endif
                                    <button class="submit" type="button" wire:click="insertContact"
                                            wire:loading.class="disabled">
                                        <span><i wire:loading wire:target="insertContact"
                                                 class="fas fa-spinner fa-spin"></i> SEND</span>

                                    </button>

                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->
</div>
@push("scripts")
    <script>

        var mymap = L.map('mapid').setView([{{getConfiguration('latitude')}},{{getConfiguration('longitude')}} ], 13);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);

        L.marker([{{getConfiguration('latitude')}},{{getConfiguration('longitude')}}]).addTo(mymap)
            .bindPopup("<b>{{getConfiguration('marker_title')}}</b><br /> {{getConfiguration('marker_description')}}").openPopup();


        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(mymap);
        }

        mymap.on('click', onMapClick);

    </script>
@endpush

@push("styles")
    <style>
        .rel {
            position: relative;
            top: -25px;
        }
    </style>
@endpush