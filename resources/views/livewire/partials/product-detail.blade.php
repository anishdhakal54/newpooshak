<div>
    <input type="hidden" id="imagename" wire:model="imagename">
    <div class="fifth">
        <h2>Available Sizes:</h2>
        <div class="sizes borders">
            @if(null == $product->show_available_size)

                @foreach(\App\Size::all() as $size)
                    <h2>{{$size->title}}</h2>
                @endforeach
            @else
                @if(isset($product->size) && $product->size !="")
                    @foreach(json_decode($product->size) as $id)
                <?php $size = getSize($id)?>
                        <h2 data-size="{{$size->id}}">{{$size->title}}</h2>
                    @endforeach
                @endif
            @endif

        </div>
    </div>

    @if($product->disable_size)
        <div class="seventh">
            <div class="size_flex">
                <div class="first_seventh">
                    <h2>Write quantity</h2>
                    <input type="number" name="quantity" wire:model="quantity" value="0">
                </div>
            </div>
        </div>
    @else
        <div class="seventh">
            <h2>Select Sizes: </h2>
            <div class="size_flex">
                <div class="first_seventh">
                    <h2>XS</h2>
                    <input type="number" id="quantity_xs" wire:model="quantity_xs" min="0" value="0">
                </div>
                <div class="first_seventh">
                    <h2>S</h2>
                    <input type="number" id="quantity_s" wire:model="quantity_s" min="0" value="0">
                </div>
                <div class="first_seventh">
                    <h2>M</h2>
                    <input type="number" id="quantity_m" wire:model="quantity_m" min="0" value="0">
                </div>
                <div class="first_seventh">
                    <h2>XL</h2>
                    <input type="number" id="quantity_xl" wire:model="quantity_xl" min="0" value="0">
                </div>
                <div class="first_seventh">
                    <h2>2XL</h2>
                    <input type="number" id="quantity_2xl" wire:model="quantity_2xl" min="0" value="0">
                </div>
                <div class="first_seventh">
                    <h2>3XL</h2>
                    <input type="number" id="quantity_3xl" wire:model="quantity_3xl" min="0" value="0">
                </div>
            </div>

        </div>
    @endif

    @if($product->colors->count()>0)
        <div class="seventh">
            <div class="size_flex">
                <div class="first_seventh">
                    <h2>Choose the color of the product. </h2>
                    @foreach($product->colors as $color)
                        <label for="{{$color}}">
                            <input id="{{$color}}" type="radio" class="color" wire:model="color" name="color"
                                   value="{{$color->color}}">{{$color->color }}
                        </label>

                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="checkbox-card">
        <div class="checkbox">
            <label>
                <div class="flexhunuparne">
                    <input type="checkbox" wire:model="interest_logo" class="checkme changed_checkbox">
                    <p>Interested in logo print on product</p>
                </div>
            </label>
        </div>
        <div class="passport-box" wire:ignore>
            <div class="row">
                <div class="col-md-12">
                    <p>Is this your first time printing from us. </p>
                    <input type="radio" class="has_frame" name="has_frame" value="true" wire:model="has_frame"> Yes
                    <input type="radio" class="has_frame" name="has_frame" value="false" wire:model="has_frame"> No

                </div>


                <div class="notice success">
                    <h2>Frame Price:</h2>

                    <p style="margin-bottom: 0;"><strong>Frame Rate: </strong>
                        Price of frame for each color: Rs. 400</p>
                    <p><strong>Frame Price: </strong> It will be free if you have already work with us or
                        only if item is above or equal to 200</p>


                </div>


            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">

                    <div class="passport-select">
                        <div class="select-item select-dropdown">
                            <fieldset>
                                <div class="passport-title">
                                    <h2>Logo File *</h2>
                                    <input id="add_image" type="file" style="margin-left: -10px">
                                    <p>Adjust your logo in image then confirm.</p>

                                    <div class="notice warning">
                                        <h2>Pricing:</h2>

                                        <p><strong>Color Rate: </strong>
                                            Price of each color in logo: Rs. 8</p>
                                        <p><strong>Frame Price: </strong> Price of frame for each color: Rs. 400 (A
                                            frame is a tool used in
                                            coloring fabrics.)</p>


                                    </div>

                                    <button id="upload">Confirm</button>
                                </div>
                            </fieldset>
                            <fieldset class="confirm-logo">
                                <div class="passport-title">
                                    <h2>Logo Placement *</h2>
                                </div>
                                <p>
                                    Where would you like to place your logo?
                                </p>
                                <div id="place">
                                    <input type="checkbox" id="place1" name="place" wire:model="front"
                                           value="front"/>Front </br>
                                    <input type="checkbox" id="place2" name="place" wire:model="back"
                                           value="back"/>Back </br>
                                    <input type="checkbox" id="place3" name="place" wire:model="pocket"
                                           value="pocket"/>Pocket </br>
                                </div>

                            </fieldset>

                            <fieldset class="confirm-logo">

                <span>
                  How many colors do you have in logo?
                </span>

                                <select wire:model="color_no" id="color_no">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>

                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="eigth">
        <div class="subtotal">
            <p>{!!  $color_no_message!!}</p>
            <p>{!!  $size_message!!}</p>
            <h2>Sub Total: <span>NRs. {{$subtotal}}</span></h2>
            <h2>Discount: <span>NRs. {{$discount}}</span> <span>{{$discount_message}}</span></h2>
            @if($subtotal!=0)
                @if($color_message)
                    <h2>Color price: <span>{{$color_message}}</span></h2>
                @endif
                @if($frame_message)
                    <h2>Frame price: <span>{{$frame_message}}</span></h2>
                @endif
            @endif
            <h2>Total: <span>NRs. {{$total}}</span></h2>
        </div>

        <div class="pro_buttons">
            @if(!$product->disable_size)
                <div class="modal fade" id="myModal" role="dialog" wire:ignore>
                    <div class="modal-dialog">
                        <form action="" wire:submit.prevent="handleCheckout">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Billing Information</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="billing-info mb-20px">

                                                <label>First Name</label>
                                                <input class="" type="text" required
                                                       placeholder="Enter your first name here.."
                                                       wire:model="first_name" autocomplete="off">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="billing-info mb-20px">
                                                <label>Last Name</label>
                                                <input class="" required type="text"
                                                       placeholder="Enter your last name here.."
                                                       wire:model="last_name">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="billing-info mb-20px">
                                                <label>Country</label>
                                                <select required wire:model="country" class="form-control  ">
                                                    <!-- <option value="">Enter your Country here..</option> -->
                                                    <option value="1">Nepal</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            {{-- <div class="billing-info mb-20px">
                                              <label>State</label>
                                              <select required wire:model="state" class="form-control  ">

                                                <option value="1">Bagmati</option>
                                                <option value="2">Mechi</option>
                                                <option value="3">Koshi</option>
                                                <option value="4">Sagarmatha</option>
                                                <option value="5">Janakpur</option>
                                                <option value="6">Narayani</option>
                                                <option value="7">Gandaki</option>
                                                <option value="8">Lumbini</option>
                                                <option value="9">Dhaulagiri</option>
                                                <option value="10">Rapti</option>
                                                <option value="11">Karnali</option>
                                                <option value="12">Bheri</option>
                                                <option value="13">Seti</option>
                                                <option value="14">Mahakali</option>
                                                <option value="">Enter your state here..</option>
                                              </select>

                                            </div> --}}

                                            <div class="col-sm-6 col-lg-12">
                                                <label for="inputAddress">Province</label>
                                                <select class="form-control checkselect" wire:model="zone" id="zone"
                                                        name="zone">
                                                    <option value="0" disabled="" selected>Select Zone</option>
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

                                            <div class="col-sm-6 col-lg-12">
                                                <label for="inputdistrict">District</label>
                                                <select class="form-control checkselect" wire:model="district"
                                                        id="district"
                                                        name="district"
                                                        disabled>
                                                    <option value="0" disabled="" selected>Select Option</option>

                                                </select>
                                                @if ($errors->has('district'))
                                                    <span class="help-block">
                                {{ $errors->first('district') }}
                            </span>

                                                @endif
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="area">Area</label>
                                                <select class="form-control checkselect" wire:model="area" id="area"
                                                        name="area"
                                                        disabled>
                                                    <option value="0">Select Option</option>

                                                </select>
                                                @if ($errors->has('area'))
                                                    <span class="help-block">
                                {{ $errors->first('area') }}
                            </span>

                                                @endif
                                            </div>

                                            <div class="col-lg-12">
                                                <label for="address"> Address<span>*</span></label>
                                                <input type="text" name="address" wire:model="address"
                                                       class="form-control" id="address"
                                                       value="{{old('address')}}">
                                                <input type="text">
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                {{ $errors->first('address') }}
                            </span>

                                                @endif
                                            </div>


                                        </div>


                                        <div class="col-lg-6 col-md-6">
                                            <div class="billing-info mb-20px">
                                                <label>Postcode / ZIP</label>
                                                <input class="@error('postcode') is-invalid  @enderror" type="text"
                                                       placeholder="Enter your postcode here.."
                                                       wire:model="postcode">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="billing-info mb-20px">
                                                <label>Phone</label>
                                                <input class="" required type="text"
                                                       placeholder="Enter your phone here.." wire:model="phone">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="billing-info mb-20px">
                                                <label>Email Address</label>
                                                <input class="" required type="email"
                                                       placeholder="Enter your email here.." wire:model="email">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="col-md-12">
                                                <div id="mapid"></div>
                                            </div>

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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" wire:click="handleCheckout" class="btn btn-default">Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="checkbox">
                    <label>
                        <div class="flexhunuparne">
                            <input type="checkbox" wire:model="agree_term" class="checkme changed_checkbox">
                            <p>I agree with your <a href="/terms_and_conditons" style="text-decoration: underline">Terms
                                    and Conditions</a>
                            </p>

                        </div>
                        <div>
                            <span class="help-block">{{!$agree_term?'Please Agree our Terms and conditions':''}}</span>
                        </div>
                    </label>

                </div>

                @if(Auth::check())
                    <button type="button" class="btn_add_to_cart" data-toggle="modal" data-target="#myModal">
                        Order Now
                    </button>
                    <button href="javascript:void(0);" class="button pro-add-to-cart " wire:click="addtocart"
                            data-product="{{ $product->id }}" title="Add to Cart" type="button"><span><i
                                    class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                @else
                    <button type="button" class="btn_add_to_cart" data-toggle="modal" data-target="#demoModal36699">
                        Order
                        Now
                    </button>
                    <button type="button" class="btn_add_to_cart" data-toggle="modal" data-target="#demoModal36699">
                        Add to Cart
                    </button>
                @endif
            @else
            @endif


        </div>

    </div>
    <div class="ninth">
        <div class="social_last_share">
            <h2 style="margin-bottom: 20px">Share this on:</h2>
            <i class="icon-social-facebook fb"></i>
            <i class="icon-social-instagram ig"></i>
            <i class="icon-social-twitter tw"></i>
            <i class="icon-social-pinterest pi"></i>
        </div>
    </div>


    <div wire:ignore class="modal fade loginmodal" id="demoModal36699" tabindex="-1" role="dialog"
         aria-labelledby="demoModal36699" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered  " role="document">
            <div class="modal-content">
                <div class="modal-body py-sm-4 px-sm-5">
                    <div class="text-center pt-5">
                        <img src="{{asset('assets/images/login.svg')}}" class="loginsvg">
                        <h3 class="loginheadings">Login</h3>


                    </div>
                    <form>
                        <div class="alert alert-warning" style="padding: 3px" role="alert">
                            <p class="help-block alert"><i class="fa fa-exclamation-circle"></i> Please login first!!!
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input wire:model='login_email' type="email" class="form-control"
                                   id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input wire:model='password' type="password" class="form-control"
                                   id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>

                        <div class="login_button">
                            <button type="button" wire:click="loginfromProductDetail" wire:loading.class="disabled">
                                <span><i wire:loading wire:target="loginfromProductDetail"
                                         class="fas fa-spinner fa-spin"></i> Login</span>

                            </button>
                        </div>
                        <div class="for">
                            <div class="left_forgot">
                                <a href="#">Forgot Password?</a>
                            </div>
                            <div class="new">
                                New to Poshak? <a href="register.html">Click here to register.</a>
                            </div>
                        </div>


                        <span class="or">OR</span>

                        <div class="social_last_share login_share" style="margin-bottom: 1rem">

                            <div class="login_button social_button">
                                <button type="submit">Sign In With Facebook <img
                                            src="{{asset('assets/images/facebook.png')}}"></button>
                                <button type="submit">Sign In With Google <img
                                            src="{{asset('assets/images/gmail.svg')}}"></button>
                            </div>
                        </div>


                    </form>


                </div>

            </div>
        </div>
        <div class="hehehe">
            <img src="assets/images/hehehe.png">
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{asset('assets/leaflet/dist/leaflet.css')}}"/>

        <style>
            .help-block {
                color: red;
                font-style: italic;
            }

            .select-item input[type=checkbox], .passport-box input[type=radio] {
                height: 15px;
                width: unset;
                display: inline-block;
                margin-right: 10px;
                margin-top: 5px;
            }

            .subtotal {
                border: 1px solid lightgrey;
                padding: 20px;
            }

            .passport-select .select-item select {
                display: inline-block;
                border: 1px solid;
                padding: 10px;
                width: 245px;
                margin-bottom: 15px;
            }

            #upload {
                margin: 10px 0;
                float: right;
                background-color: red;
                color: white;
                padding: 10px;
                border: none;
                outline: none;
                font-weight: bold;
            }

            .confirm-logo {
                display: none;
            }

            .notice {
                position: relative;
                margin: 1em;
                background: #F9F9F9;
                padding: 1em 1em 1em 2em;
                border-left: 4px solid #DDD;
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.125);
            }

            .notice:before {
                position: absolute;
                top: 50%;
                margin-top: -17px;
                left: -17px;
                background-color: #DDD;
                color: #FFF;
                width: 30px;
                height: 30px;
                border-radius: 100%;
                text-align: center;
                line-height: 30px;
                font-weight: bold;
                font-family: Georgia;
                text-shadow: 1px 1px rgba(0, 0, 0, 0.5);
            }

            .warning {
                border-color: #FFDC00;
            }

            .warning:before {
                content: "!";
                background-color: #FFDC00;
            }

            .notice.warning p {
                margin-bottom: 0;
            }

            .eigth .subtotal p {
                color: red;
                font-style: italic;
            }

            .success {
                border-color: #2ECC40;
            }

            .success:before {
                content: "√";
                background-color: #2ECC40;
            }

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
            var startlat = 27.69029236;
            var startlon = 85.33630908;

            var options = {
              center: [startlat, startlon],
              zoom: 14
            }

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
              // @this->set('lat', lat);
              // @this->set('lon', lon);

              myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
              map.invalidateSize();
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
          window.livewire.on('order_success', message => {
            setTimeout(function () {
              location.reload();
            }, 1000)

          });
          $(function () {
            $(".changed_checkbox").click(function () {
              $('.btn_add_to_cart').prop('disabled', $('input.changed_checkbox:checked').length == 0);
            });
          });
        </script>

        <script>
          $(document).ready(function () {
            $(".small_img").click(function () {
              $(".big_img").attr('src', $(this).attr('data-img'));
            });
            $(".checkme").click(function (event) {
              var x = $(this).is(':checked');
              if (x == true) {
                $(this).parents(".checkbox-card").find('.passport-box').show();
                $(this).parents(".checkbox-card").find('.apply-box').hide();
              } else {
                $(this).parents(".checkbox-card").find('.passport-box').hide();
                $(this).parents(".checkbox-card").find('.apply-box').show();
              }
            });
          });
        </script>

        <script>
          $(document).ready(function () {
            $(".big_img").imagezoomsl({
              zoomrange: [3, 3]
            });
          });

        </script>




        <script>

          var height = $('.inner-header').height();
          $(window).scroll(function () {
            if ($(this).scrollTop() > height) {
              $('.main_nav').addClass('fixed');
            } else {
              $('.main_nav').removeClass('fixed');
            }
          });
        </script>





    @endpush


</div>
