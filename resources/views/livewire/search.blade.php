<div>

  <div class="shop-area pt-20 pb-20">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-10">
          <div class="shop-topbar-wrapper">
            <div class="shop-topbar-left">
              <p> {{$products->total()}} results found!!!</p>
            </div>
            <div class="product-sorting-wrapper">

              <div class="product-show shorting-style">
                <label>Sort by :</label>
                <select wire:model="orderby" wire:change="filter" wire:loading.class="disabled">
                  <option value="1" selected="selected">Default sorting</option>
                  <option value="2">Sort by popularity</option>
                  <option value="3">Sort by newness</option>
                  <option value="4">Sort by price: low to high</option>
                  <option value="5">Sort by price: high to low</option>
                </select>
                <i wire:loading wire:target="filter" class="fas fa-spinner fa-spin"></i>

              </div>
            </div>
          </div>
          <div class="shop-bottom-area">
            <div class="tab-content jump">
              <div id="shop-1" class="tab-pane active">
                <div class="row">
                  @if(count($products) <= 0)
                    <div class="alert alert-danger">
                      No products found.
                    </div>
                  @else
                    @foreach($products as $product)
                      @livewire('partials.product-shop-item',['product' => $product],key($product->id))
                    @endforeach
                  @endif
                </div>
              </div>

            </div>
            <div class="pro-pagination-style text-center mt-10">
              {{ $products->links() }}
            </div>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="sidebar-wrapper sidebar-wrapper-mrg-right">
            <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
              <h4 class="sidebar-widget-title">Categories</h4>
              <div class="shop-catigory">
                <ul>
                  @foreach($productCategories as $key=>$productCategory)

                    <li><a href="/category/{{$productCategory['slug']}}">{{ $productCategory['name']}}</a></li>
                    {{-- <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>--}}
                  @endforeach

                </ul>
              </div>
            </div>
            <div class="sidebar-widget shop-sidebar-border mb-40 pt-40" wire:ignore>
              <h4 class="sidebar-widget-title">Price Filter</h4>
              <div class="price-filter">
                <div class="price-slider-amount">
                  <div id="slider-range"></div>
                  <div class="price-slider-amount">
                    <div class="label-input">
                      <input
                          type="text"
                          id="amount"
                          name="price"
                          placeholder="Add Your Price"
                      />
                    </div>
                  </div>
                  <div class="label-input">
                    <div class="">
                      <input type="hidden" class="form-control" name="price" wire:model="min" placeholder="Min"/>
                      <input type="hidden" class="form-control" name="price" wire:model="max" placeholder="Max"/>

                    </div>

                  </div>
                  <br/>
                  <button type="button" wire:click="filterbyPrice" wire:loading.class="disabled">
                    <span style="margin-bottom:0"><i wire:loading wire:target="filterbyPrice"
                                                     class="fas fa-spinner fa-spin"></i> Filter</span>
                  </button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  @push('styles')
    <meta name="turbolinks-visit-control" content="reload"/>
  @endpush
  @push('scripts')
    <script>
      /*---------------------
          Price range
      --------------------- */
      var sliderrange = $("#slider-range");
      var amountprice = $("#amount");
      $(function () {
        sliderrange.slider({
          range: true,
          min: 16,
          max: 1400,
          values: [0, 300],
          slide: function (event, ui) {
            amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
          },
        });
        amountprice.val(
          "$" +
          sliderrange.slider("values", 0) +
          " - $" +
          sliderrange.slider("values", 1)
        );
      });
    </script>

  @endpush
</div>

