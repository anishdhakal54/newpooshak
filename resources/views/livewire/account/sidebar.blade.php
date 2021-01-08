
    <div class="col-lg-3 col-md-12 col-sm-12 leftaccount">
        <h3>Hello, {{auth()->user()->first_name}}
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
            <a href="/cart" wire:click="/cart">My Cart</a>

        </div>
        <div class="wish">
            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
               aria-controls="collapseExample">Exchange</a>
            <div wire:ignore class="collapse" id="collapseExample">
                <div class="card card-body">
                    <label for="">Please enter order id</label>
                    <input type="text" name="orderid" wire:model="order_id" placeholder="Please enter order id">
                    <p> Please note that after submitting your order will status will be on exchanged and you can buy
                        new
                        product. </p>
                    <button type="button" wire:click="exchangeOrder" class="form-control btn btn-danger">Submit</button>

                </div>
            </div>
        </div>
    </div>
