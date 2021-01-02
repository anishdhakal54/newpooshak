<section class="start">
  <div class="container-fluid">
    <div class="banner">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-6">
          <a href="{{getConfiguration('ad1_link')}}">
            <img class="img-fluid" alt="advertisement" src="{{ url('storage') . '/' . getConfiguration('ad1') }}"/>
          </a>

        </div>
        <div class="col-lg-4 col-md-4 col-6">
          <a href="{{getConfiguration('ad2_link')}}">
            <img class="img-fluid" alt="advertisement" src="{{ url('storage') . '/' . getConfiguration('ad2') }}"/>
          </a>
        </div>
        <div class="col-lg-4 col-md-4 col-12">
          <a href="{{getConfiguration('ad3_link')}}">
            <img class="img-fluid" alt="advertisement" src="{{ url('storage') . '/' . getConfiguration('ad3') }}"/>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>