<div>
  @if(isset($best_selling_products))
    <div class="product-categories-area pt-20 pb-20">
      <div class="container-fluid">
        <div class="_1GRhLX _3JslKL">
          <div class="section-title-btn-wrap border-bottom-3">
            <div class="section-title-3">
              <h2>{{__('Best Selling')}}</h2>
            </div>
            <div class="btn-style-7">
              <a href="/shop">All Product</a>
            </div>
          </div>
          <div class="product-categories-slider-1 nav-style-3">
            @foreach($best_selling_products as $best_sell_product)
              @php($product = $best_sell_product->product)
              @livewire('partials.product-item',['product'=>$product,'is_category'=>true])
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
