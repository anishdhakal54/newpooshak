{{--<div>--}}
{{--  <div class="subscribe-area bg-reds-s pt-20 pb-20">--}}
{{--    <div class="container">--}}
{{--      <div class="row">--}}
{{--        <div class="col-lg-5 col-md-5">--}}
{{--          <div class="section-title-3 newsletter-title">--}}
{{--            <h2>Our Newsletter</h2>--}}
{{--            <p>{{getConfiguration('newsletter_text')}}</p>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-7 col-md-7">--}}
{{--          <div id="mc_embed_signup" class="subscribe-form-2">--}}
{{--            <form--}}
{{--                id="mc-embedded-subscribe-form"--}}
{{--                class="validate subscribe-form-style-2"--}}
{{--                wire:submit.prevent="addSuscriber"--}}
{{--            >--}}
{{--              <div id="mc_embed_signup_scroll" class="mc-form-2">--}}
{{--                <input class="email @error('name') is-invalid  @enderror" type="email" required="" placeholder="Enter your email here.."--}}
{{--                       wire:model.debounce.500ms="email"/>--}}
{{--                @if ($errors->has('email'))--}}
{{--                  <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>--}}
{{--                @endif--}}


{{--                <div class="clear-2 clear-2-purple">--}}
{{--                  <input--}}
{{--                      id="mc-embedded-subscribe"--}}
{{--                      class="button"--}}
{{--                      type="submit"--}}
{{--                      name="subscribe"--}}
{{--                      value="Subscribe"--}}
{{--                  />--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </form>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--  <div id="mc_embed_signup" class="subscribe-form">--}}

{{--    <form--}}
{{--        class="validate"--}}
{{--        target="_blank"--}}
{{--        wire:submit.prevent="addSuscriber"--}}
{{--    >--}}
{{--      {{csrf_field()}}--}}
{{--      <div id="mc_embed_signup_scroll" class="mc-form">--}}
{{--        <input class="email @error('name') is-invalid  @enderror" type="email" required="" placeholder="Enter your email here.."--}}
{{--               wire:model.debounce.500ms="email"/>--}}
{{--        @if ($errors->has('email'))--}}
{{--        <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>--}}
{{--        @endif--}}

{{--        <div class="clear">--}}
{{--          <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Sign Up"/>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </form>--}}
{{--  </div>--}}
{{--</div>--}}
{{--@push('scripts')--}}
{{--<script>--}}

{{--  window.livewire.on('subscriber_added', message => {--}}
{{--    $.iGrowl({--}}
{{--      type:'success',--}}
{{--      title: 'Suscribtion Confirmed',--}}
{{--      message: 'Thank You For Suscribing With Us.Stay Tuned For More Updates !!',--}}
{{--      icon: 'steadysets-newspaper',--}}
{{--      animShow: 'slideInRight',--}}
{{--      placement : {--}}
{{--        x: 	'right',--}}
{{--        y: 	'bottom'--}}
{{--      }--}}
{{--    })--}}
{{--  });--}}
{{--</script>--}}

{{--@endpush--}}
