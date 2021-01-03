<div>
    @if(isset($trending_products))
        <div class="product-categories-area pt-20 pb-20">
            <div class="container-fluid">
                <div class="_1GRhLX _3JslKL">
                    <div class="section-title-btn-wrap border-bottom-3">
                        <div class="section-title-3">
                            <h2>{{__('Trending Items')}}</h2>
                        </div>
                        <div class="btn-style-7">
                            <a href="/shop">{{__('All Product')}}</a>
                        </div>
                    </div>
                    <div class="product-categories-slider-1 nav-style-3">
                        @foreach($trending_products as $trending_product)
                            @livewire('partials.product-item',['product'=>$trending_product,'is_category'=>true])
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
