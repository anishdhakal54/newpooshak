<div>
  <!-- Breadcrumb Area start -->
  <section class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-content">
            <h1 class="breadcrumb-hrading">About us Page</h1>
            <ul class="breadcrumb-links">
              <li><a href="/">Home</a></li>
              <li>About Us</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Area End -->

  <div class="container about-us page-content" style="margin-bottom: 30px;">
    <div class="row mt-xlg">
      <div class="col-md-12">
        <h2><strong>Who</strong> We Are</h2>
        <p style="    white-space: break-spaces;">{{ getConfiguration('who_we_are') }}</p>
        <hr class="tall">
      </div>
      <div class="col-md-12">
        <div class="featured-boxes featured-boxes-style-6 txtwrap">
          <div class="row">
            <div class="col-md-3">
              <div class="featured-box featured-box-primary featured-box-effect-6 mt-md">
                <div class="box-content">
                  <i class="igrowl-icon i-steadysets-graph" style="font-size:40px;"></i>
                  <h4>Our Mission</h4>
                  <p>{{ getConfiguration('our_mission') }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="featured-box featured-box-secondary featured-box-effect-6 mt-md">
                <div class="box-content">
                  <i class="igrowl-icon i-linecons-eye" style="font-size:40px;"></i>
                  <h4>Our Vision</h4>
                  <p>{{ getConfiguration('our_vision') }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="featured-box featured-box-tertiary featured-box-effect-6 mt-md">
                <div class="box-content">
                  <i class="icon-featured fa fa-question-circle" style="font-size:40px;"></i>
                  <h4>Our Help</h4>
                  <p>{{ getConfiguration('our_help') }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="featured-box featured-box-quaternary featured-box-effect-6 mt-md">
                <div class="box-content">
                  <i class="icon-featured fa fa-info-circle" style="font-size:40px;"></i>
                  <h4>Our Supports</h4>
                  <p>{{ getConfiguration('our_support') }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
@push('styles')
  <style>


    .about-us h4 {
      margin: 17px 0;
    }

    .about-us h2 {
      margin-bottom: 15px;
    }

    .about-us hr {
      margin-top: 4rem;
      margin-bottom: 4rem;
    }
  </style>
@endpush