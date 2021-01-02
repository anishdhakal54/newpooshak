<div class="panel panel-default single-my-account">
  <div class="panel-heading my-account-title">
    <h3 class="panel-title"><span>2 .</span> <a data-toggle="collapse" data-parent="#faq"
                                                href="#my-account-2">Change your password </a></h3>
  </div>
  <div id="my-account-2" class="panel-collapse collapse" wire:ignore>
    <div class="panel-body">
      <div class="myaccount-info-wrapper">
        <div class="account-info-wrapper">
          <h4>Change Password</h4>
          <h5>Your Password</h5>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="billing-info">
              <label>Current Password</label>
              <input class="@if ($errors->has('current_password')) is-invalid  @endif" type="text"
                     placeholder="Enter your current_password here.."
                     wire:model="current_password"/>
              @if ($errors->has('current_password'))
                <span class="error invalid-feedback">{{ $errors->first('current_password') }}</span>
              @endif
            </div>
          </div>

          <div class="col-lg-12 col-md-12">
            <div class="billing-info">
              <label>Password</label>
              <input class="@if ($errors->has('password')) is-invalid  @endif" type="password"
                     placeholder="Enter your password here.."
                     wire:model="password"/>
              @if ($errors->has('password'))
                <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
              @endif
            </div>
          </div>
          <div class="col-lg-12 col-md-12">
            <div class="billing-info">
              <label>Password Confirm</label>
              <input class="@if ($errors->has('password_confirmation')) is-invalid  @endif" type="password"
                     placeholder="Enter your password_confirmation here.."
                     wire:model="password_confirmation"/>
              @if ($errors->has('password_confirmation'))
                <span class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
              @endif
            </div>
          </div>
        </div>
        <div class="billing-back-btn">
          <div class="billing-back">
            <a href="#"><i class="fa fa-arrow-up"></i> back</a>
          </div>
          <div class="billing-btn">
            <button type="submit" wire:click="changePassword">Continue</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>