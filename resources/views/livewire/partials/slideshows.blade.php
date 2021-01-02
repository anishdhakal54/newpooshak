<div>
  <!-- Slider Arae Start -->
  @if($slideshows->isNotEmpty())
    <div class="slider-area bg-gray-10">
      <div
          class="hero-slider-active-2 nav-style-1 nav-style-1-modify-2 nav-style-1-orange">

        @foreach($slideshows as $slideshow)
          <div class="single-hero-slider">
            <div class="row slider-animated-1">
              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="hm10-hero-slider-img">
                  <a href="{{$slideshow->link}}">
                    <img
                        class="animated"
                        src="{{ optional($slideshow->getImage())->url }}"
                        alt=""
                    /></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
@endif
<!-- Slider Arae End -->
</div>
