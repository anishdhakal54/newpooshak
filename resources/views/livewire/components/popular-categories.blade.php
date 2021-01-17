<div>

    @if(isset($categories))
        <div class="container-fluid top_sell all_cate">
            <div class="top_sell">
                <div class="top_sell_title cate_title">
                    <h3>{{__('All Categories')}}</h3>
                </div>
                <hr>

                                <div class="anishsir">
                                    @foreach($categories as $category)
                                        <a href="{{ route('shop.category', ['slug' => $category->slug]) }}">
                                            <div class="catsec">
                                                <div class="catmain">
                                                    <img src="{{optional( $category->getImage())->mediumCatUrl}}">
                                                    <p>{{$category->name}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>

            </div>
        </div>

    @endif
</div>
