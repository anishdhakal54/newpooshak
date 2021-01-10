@extends('backend.layouts.app')
@section('content')
    <div class="box-body">
        <table id="example1" class="table table-bordered border-2">
            <thead class="thead-inverse">
            <tr>
                <th>S.N:</th>
                <th>Product Name:</th>
                <th>Product Image</th>
                <th>Sku:</th>
                <th>XS:</th>
                <th>S:</th>
                <th>M:</th>
                <th>L:</th>
                <th>XL:</th>
                <th>XXL:</th>
                <th>XXXL:</th>


            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ($products as $product)
                    @if(($product->stock_quantity_xs>$product->quantity_xs ) ||( $product->stock_quantity_x>$product->quantity_x )||($product->stock_quantity_m>$product->quantity_m )||($product->stock_quantity_l>$product->quantity_l) ||($product->stock_quantity_xl>$product->quantity_xl) ||($product->stock_quantity_xxl>$product->quantity_xxl )||($product->stock_quantity_xxxl>$product->quantity_xxxl ))
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->name}}</td>
                        <td><img src="{{$product->getImageAttribute()->smallUrl}}"></td>
                        <td>{{$product->sku}}</td>
                        @if($product->stock_quantity_xs>$product->quantity_xs)
                            <td>{{$product->quantity_xs}} |<span
                                        class="text-danger text-bold">{{$product->stock_quantity_xs}}</span></td>
                        @else
                            <td>-</td>
                        @endif
                        @if($product->stock_quantity_s>$product->quantity_s)
                            <td>{{$product->quantity_s}} |<span
                                        class="text-danger text-bold">{{$product->stock_quantity_s}}</span></td>
                        @else
                            <td>-</td>
                        @endif
                        @if($product->stock_quantity_m>$product->quantity_m)
                            <td>{{$product->quantity_m}} |<span
                                        class="text-danger text-bold">{{$product->stock_quantity_m}}</span></td>
                        @else
                            <td>-</td>
                        @endif
                        @if($product->stock_quantity_l>$product->quantity_l)
                            <td>{{$product->quantity_l}} |<span
                                        class="text-danger text-bold">{{$product->stock_quantity_l}}</span></td>
                        @else
                            <td>-</td>
                        @endif
                        @if($product->stock_quantity_xl>$product->quantity_xl)
                            <td>{{$product->quantity_xl}} |<span
                                        class="text-danger text-bold">{{$product->stock_quantity_xl}}</span></td>
                        @else
                            <td>-</td>
                        @endif
                        @if($product->stock_quantity_xxl>$product->quantity_xxl)
                            <td>{{$product->quantity_xxl}}|<span
                                        class="text-danger text-bold">{{$product->stock_quantity_xxl}}</span></td>
                        @else
                            <td>-</td>
                        @endif
                        @if($product->stock_quantity_xxxl>$product->quantity_xxxl)
                            <td>{{$product->quantity_xxxl}}|<span
                                        class="text-danger text-bold">{{$product->stock_quantity_xxxl}}</span></td>
                        @else
                            <td>-</td>
                        @endif


                        {{--                        <td><img src="{{$product->getImageAttribute()}}" alt="{{$product->name}}"> </td>--}}
            </tr>

            @endif
            @endforeach

            {{--                    <td>{{$loop->iteration}}</td>--}}
            {{--                    @if($product->quantity_l>$product->stock_quantity_l)--}}

            {{--                        @endif--}}


            {{--                    <td scope="row">{{$stock->quantity_xl}}</td>--}}
            {{--                    <td>{{$quote->last_name}}</td>--}}
            {{--                    <td>{{$quote->email}}</td>--}}
            {{--                    <td>{{$quote->company_name}}</td>--}}
            {{--                    <td>{{$quote->address}}</td>--}}
            {{--            <td>--}}
            {{--                        @foreach(json_decode($quote->category) as $cat)--}}
            {{--                            @php--}}
            {{--                                $cat_name = \App\Category::where('id',$cat)->first();--}}
            {{--                            @endphp--}}
            {{--                            {{$cat_name->name}} ,--}}
            {{--                        @endforeach--}}

            {{--            </td>--}}

            {{--@foreach($catname as $cat)
                <td>{{$cat->name}},</td>
                @endforeach--}}

            {{--            <td>--}}
            {{--                <form action="{{route('dashboard.deleteQuote')}}" method="post">--}}
            {{--                    {{csrf_field()}}--}}
            {{--                    <input type="hidden" value="" name="id"/>--}}
            {{--                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>--}}
            {{--                </form>--}}
            {{--            </td>--}}
            {{--            </tr>--}}

            {{--            <tr>--}}
            {{--                <td scope="row"></td>--}}
            {{--                <td></td>--}}
            {{--                <td></td>--}}
            {{--            </tr>--}}
            </tbody>
        </table>
    </div>

    @push('styles')
        border: 1px solid #b71e1e;
        }
    @endpush

@endsection
