<div>
  @if(isset($latestProducts))
    <div class="product-categories-area pt-20 pb-20">
      <div class="container-fluid">
        <div class="_1GRhLX _3JslKL">
          <div class="section-title-btn-wrap border-bottom-3">
            <div class="section-title-3">
              <h2>Latest Products</h2>
            </div>
            <div class="btn-style-7">
              <a href="javascript:void(0);">All Product</a>
            </div>
          </div>
          <div class="product-categories-slider-1 nav-style-3">
            @foreach($latestProducts as $latestProduct)
              <?php $key = $loop->iteration.rand(1,999)?>
              @livewire('partials.product-item',['product'=>$latestProduct,'is_category'=>true],key($key))
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
