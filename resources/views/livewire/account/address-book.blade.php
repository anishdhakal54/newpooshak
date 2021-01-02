<div class="panel panel-default single-my-account">
  <div class="panel-heading my-account-title">
    <h3 class="panel-title"><span>3 .</span> <a data-toggle="collapse" data-parent="#faq"
                                                href="#my-account-3">Modify your address book entries </a>
    </h3>
  </div>
  <div id="my-account-3" class="panel-collapse collapse">
    <div class="panel-body">
      <div class="myaccount-info-wrapper">
        <div class="entries-wrapper">
          <div class="row">
            <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
              <div class="entries-info text-center">
                <h1 class=" heading-primary font-weight-normal" style="text-align: center;border-bottom: 2px sol">
                  Address Book
                </h1>

              </div>
            </div>
            <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
              <div class="entries-edit-delete text-center">
                @if(!isset($shippingAddress))
                  You have not set a default address.
                @else
                  <h2 style="color: #ee3d43">  {{ $shippingAddress->first_name . ' ' . $shippingAddress->last_name }}
                  </h2>
                  <p>{{ $shippingAddress->address1 . ' ' . $shippingAddress->address2 }}</p>
                  <p>{!! isset($shippingAddress->city) ? $shippingAddress->city .'<br/>' : '' !!}</p>
                  <p>{!! isset($shippingAddress->state_id->name) ? $shippingAddress->state_id->name . '<br/>' : '' !!}
                  {{ $shippingAddress->postcode }}</p>
                @endif

              </div>
            </div>
          </div>
        </div>
        <div class="billing-back-btn">
          <div class="billing-back">
            <a href="#"><i class="fa fa-arrow-up"></i> back</a>
          </div>
          <div class="billing-btn">
            <button type="submit">Continue</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>