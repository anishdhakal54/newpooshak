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
            @include('livewire.account.sidebar')

            <div class="col-lg-8 col-md-8 col-sm-12 rightaccount">


                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 coninformation">
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


                    {{--                                <select class="form-control checkselect" wire:model="district"--}}
                    {{--                                        id="district"--}}
                    {{--                                        name="district"--}}
                    {{--                                    >--}}
                    {{--                                    <option value="0">Select District</option>--}}
                    {{--                                </select>--}}
                    {{--                            </div>--}}
                    <div class="editprofile updateprofile">
                        <button type="button" wire:click="editinfo" wire:loading.class="disabled">  <span><i
                                        wire:loading
                                        wire:target="editinfo"
                                        class="fas fa-spinner fa-spin"></i>
                             UPDATE PROFILE</span>
                        </button>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            document.getElementById("area").onchange = function () {
                var e = document.getElementById("area");

                var zone = e.options[e.selectedIndex].value;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "",
                    data: {
                        location: zone
                    },
                    success: function (data) {
                        $('#shipping_charge').html(data.amount.toLocaleString());
                        $('#ship_amnt').html(data.amount.toLocaleString());
                        $('#grand_total_value').html(data.grandTotal.toLocaleString());
                        $('#ship_amnt_total').html(data.grandTotal.toLocaleString());
                    }
                });


            };
        })
    </script>
    <script>
        document.getElementById("zone").onchange = function () {

            var e = document.getElementById("zone");
            var zone = e.options[e.selectedIndex].value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('checkout.zone') }}",
                data: {
                    zone: zone
                },
                success: function (data) {
//                console.log(data);

                    $('#district').html(data);
                    $('#district').removeAttr('disabled');
                    $('#zone').css('width', 'auto');

                }

            });
        };

        document.getElementById("district").onchange = function () {

            var e = document.getElementById("district");
            var zone = e.options[e.selectedIndex].value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('checkout.zone') }}",
                data: {
                    zone: zone
                },
                success: function (data) {
                    $('#area').html(data);
                    $('#area').removeAttr('disabled');
                    $('#district').css('width', 'auto');

                }

            });
        };


    </script>
    @endpush
    </div>
