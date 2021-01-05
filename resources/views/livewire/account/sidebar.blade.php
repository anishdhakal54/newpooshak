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
        <a href="profilecart.html">My Cart</a>

    </div>
    <div class="wish">
        <a  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Exchange</a>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
        </div>
    </div>
</div>