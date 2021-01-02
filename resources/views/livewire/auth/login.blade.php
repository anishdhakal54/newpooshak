<div class="main_login">
  <div class="top_login">
    <h3>LOGIN</h3>
  </div>
  @if (Session::has('success'))
    <div class="alert alert-success alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong><i class="fa fa-thumbs-o-up"></i> Success!</strong>
      {!! session('success') !!}
    </div>
  @endif
  @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong><i class="fa fa-warning"></i>Oh snap!</strong>
      {!! session('error') !!}
    </div>
  @endif

  <div class="login_container">
    <input class="@error('email') is-invalid  @enderror" type="email" placeholder="Enter your email here.."
           wire:model="email"/>
    @if ($errors->has('email'))
      <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
    @endif
    <input class="@error('password') is-invalid  @enderror" type="password"
           placeholder="Enter your password here.."
           wire:model="password"/>
    @if ($errors->has('password'))
      <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $errors->first('password') }}</span>
    @endif

  </div>


  <div class="login_button">
    <button type="submit" wire:click="login" wire:loading.class="disabled">
      <span><i wire:loading wire:target="login" class="fas fa-spinner fa-spin"></i> Login</span>

    </button>
  </div>

  <div class="for">
    <div class="left_forgot">
      <a href="#">Forgot Password?</a>
    </div>
    <div class="new">
      New to Poshak? <a href="{{route('register')}}">Click here to register.</a>
    </div>
  </div>


  <span class="or">OR</span>

  <div class="social_last_share login_share" style="margin-bottom: 1rem">

    <div class="login_button social_button">
      <button type="submit">Sign In With Facebook <img src="/assets/images/facebook.png"></button>
      <button type="submit">Sign In With Google <img src="/assets/images/gmail.svg"></button>
    </div>
  </div>
  @push('scripts')
    <script>
      window.livewire.on('login_success', message => {
        setTimeout(function () {
          location.reload();
        }, 1000)

      });
    </script>

  @endpush
</div>