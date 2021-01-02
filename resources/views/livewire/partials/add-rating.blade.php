<div class="col-lg-6">
  <div class="ratting-form-wrapper pl-50">
    <h3>Add a Review</h3>
    <div class="ratting-form">

      <div class="star-box">
        <span>Your rating:</span>

        <div class="rating-product">
          @for($i = 1; $i<=5; $i++ )
            <i wire:click="setRating({{$i}})" class="ion-android-star{{ $i <= $user_rating?'':'-outline'  }}"></i>
          @endfor
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="rating-form-style form-submit">
            <textarea name="Your Review" rows="4" cols="50"
                      class="@if ($errors->has('user_comment')) is-invalid  @endif"
                      placeholder="Message" wire:model="user_comment"></textarea>
            @if ($errors->has('user_comment'))
              <span class="error invalid-feedback">{{ $errors->first('user_comment') }}</span>
            @endif

            <button type="submit" wire:click="storeReview" wire:loading.class="disabled">
              <span><i wire:loading wire:target="storeReview" class="fas fa-spinner fa-spin"></i> Submit </span>

            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@push('styles')
  <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">
    <style>
      .rating-product i {
        overflow: hidden;
        font-size: 18px;
        color: #fdd835
      }

      .rating-form-style button[type=submit] {
        padding: 0 55px !important;
        line-height: 48px;
        height: 48px;
        font-size: 16px;
        font-weight: 700;
        border: none;
        border-radius: 30px;
        box-shadow: none;
        text-transform: uppercase;
        background: #4fb68d !important;
        display: block;
        color: #fff !important;
        width: 200px;
        -webkit-transition: all 300ms linear;
        -moz-transition: all 300ms linear;
        -ms-transition: all 300ms linear;
        -o-transition: all 300ms linear;
        transition: all 300ms linear;
      }

      .rating-form-style textarea {
        height: 180px;
        padding: 20px 10px 2px 20px;
        margin-bottom: 20px;
        width: 100%;
        outline: none;
        background: transparent;
        border: 1px solid #e6e6e6;
        color: #333;
      }

      .ratting-form-wrapper .star-box {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin: 6px 0 20px;
      }

      .rating-form-style textarea {
        height: 126px;
      }

    </style>
    <style>
      .ion-android-star:hover, .ion-android-star-outline:hover {
        cursor: pointer;
      }
    </style>
  @endpush
</div>