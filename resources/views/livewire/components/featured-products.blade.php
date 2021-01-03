<div>
  @if(isset($featured_products))
    <div class="product-categories-area pt-20 pb-20">
      <div class="container-fluid">
        <div class="_1GRhLX _3JslKL">
          <div class="section-title-btn-wrap border-bottom-3">
            <div class="section-title-3">
              <h2>{{__('Featured Items')}}</h2>
            </div>
            <div class="btn-style-7">
              <a href="/shop">{{__('All Product')}}</a>
            </div>
          </div>
          <div class="product-categories-slider-1 nav-style-3">
            @foreach($featured_products as $featured_product)
              @livewire('partials.product-item',['product'=>$featured_product,'is_category'=>true],key($loop->iteration))
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
