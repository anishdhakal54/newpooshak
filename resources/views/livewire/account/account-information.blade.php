<div class="panel panel-default single-my-account">
  <div class="panel-heading my-account-title">
    <h3 class="panel-title"><span>1 .</span> <a data-toggle="collapse" data-parent="#faq"
                                                href="#my-account-1">Edit your account information </a>
    </h3>
  </div>
  <div id="my-account-1" class="panel-collapse collapse show">
    <div class="panel-body">
      <div class="myaccount-info-wrapper">
        <div class="account-info-wrapper">
          <h4>My Account Information</h4>
          <h5>Your Personal Details</h5>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="billing-info">
              <label>First Name</label>
              <input class="@if ($errors->has('first_name')) is-invalid  @endif" type="text"
                     placeholder="Enter your first name here.."
                     wire:model="first_name"/>
              @if ($errors->has('first_name'))
                <span class="error invalid-feedback">{{ $errors->first('first_name') }}</span>
              @endif
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="billing-info">
              <label>Last Name</label>
               <input class="@error('last_name') is-invalid  @enderror" type="text" placeholder="Enter your last name here.."
                                wire:model="last_name"/>
                         @if ($errors->has('last_name'))
                           <span class="error invalid-feedback">{{ $errors->first('last_name') }}</span>
                         @endif
            </div>
          </div>
          <div class="col-lg-12 col-md-12">
            <div class="billing-info">
              <label>Email Address</label>
               <input class="@error('email') is-invalid  @enderror" type="text" placeholder="Enter your email here.."
                                wire:model="email"/>
                         @if ($errors->has('email'))
                           <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                         @endif
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="billing-info">
              <label>Telephone</label>
               <input class="@error('phone') is-invalid  @enderror" type="text" placeholder="Enter your phone here.."
                                wire:model="phone"/>
                         @if ($errors->has('phone'))
                           <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                         @endif
            </div>
          </div>

        </div>
        <div class="billing-back-btn">

          <div class="billing-btn">
            <button type="button" wire:click="editinfo" wire:loading.class="disabled">
              <span><i wire:loading wire:target="editinfo" class="fas fa-spinner fa-spin"></i> Continue</span>

            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>