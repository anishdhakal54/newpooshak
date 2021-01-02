<div>
{{--  <div class="toast-area" id="toasts">--}}
{{--    <div style="display: none">--}}
{{--      <div class="toast" id="clonemother">--}}
{{--        <div class="toast-content">--}}
{{--          <div class="before"></div>--}}
{{--          <div class="icon">&#x2714</div>--}}
{{--          <div class="text"><p>Success</p>--}}
{{--            <p class="message">Code Copied!!!</p></div>--}}
{{--          <div onclick="deletethis()" class="close">&#x00D7</div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--    <div class="subscribe-area bg-reds-s pt-20 pb-20">--}}
{{--      <div class="container">--}}
{{--        <div class="row">--}}
{{--          <div class="col-lg-5 col-md-5">--}}
{{--            <div class="section-title-3 newsletter-title">--}}
{{--              <h2>Our Newsletter</h2>--}}
{{--              <p>{{getConfiguration('newsletter_text')}}</p>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="col-lg-7 col-md-7">--}}
{{--            <div id="mc_embed_signup" class="subscribe-form-2">--}}
{{--              <form--}}
{{--                  id="mc-embedded-subscribe-form"--}}
{{--                  class="validate subscribe-form-style-2" action="/suscriber" method="POST"--}}
{{--              >--}}
{{--                {{csrf_field()}}--}}
{{--                <div id="mc_embed_signup_scroll" class="mc-form-2">--}}
{{--                  <input--}}
{{--                      class="email"--}}
{{--                      type="email"--}}
{{--                      required=""--}}
{{--                      placeholder="Enter your email address"--}}
{{--                      name="newsletterEmail"--}}
{{--                      value=""--}}
{{--                  />--}}
{{--                  <div class="clear-2 clear-2-purple">--}}
{{--                    <input--}}
{{--                        id="mc-embedded-subscribe"--}}
{{--                        class="button"--}}
{{--                        type="submit"--}}
{{--                        name="subscribe"--}}
{{--                        value="Subscribe"--}}
{{--                    />--}}
{{--                  </div>--}}

{{--                </div>--}}
{{--              </form>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--    @push('scripts')--}}

{{--      <script>--}}


{{--        window.livewire.on('subscriber_added', message => {--}}
{{--          $.iGrowl({--}}
{{--            type:'success',--}}
{{--            title: 'Suscribtion Confirmed',--}}
{{--            message: 'Thank You For Suscribing With Us.Stay Tuned For More Updates !!',--}}
{{--            icon: 'steadysets-newspaper',--}}
{{--            animShow: 'slideInRight',--}}
{{--            placement : {--}}
{{--              x: 	'right',--}}
{{--              y: 	'bottom'--}}
{{--            }--}}
{{--          })--}}
{{--        });--}}

{{--        @if ($errors->has('newsletterEmail'))--}}
{{--        $.iGrowl({--}}
{{--          type: 'error',--}}
{{--          title: 'Suscribtion failed',--}}
{{--          message: 'Try to provide another email address',--}}
{{--          icon: 'steadysets-newspaper',--}}
{{--          animShow: 'slideInRight',--}}
{{--          placement: {--}}
{{--            x: 'right',--}}
{{--            y: 'bottom'--}}
{{--          }--}}
{{--        });--}}

{{--        @endif--}}


{{--      </script>--}}

{{--    @endpush--}}
  </div>

