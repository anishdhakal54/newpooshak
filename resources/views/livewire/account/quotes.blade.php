@extends('layouts.app')
@section('content')
    <div class="container-fluid"> </div>

    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped border-0">
            <thead class="thead-inverse">
            <tr>
                <th>S.N:</th>
                <th>First Name:</th>
                <th>Last Name:</th>
                <th>Email:</th>
                <th>Company Name:</th>
                <th>Address:</th>
                <th>Categories:</th>



            </tr>
            </thead>
            <tbody>
            @foreach ($quotes as $quote)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td scope="row">{{$quote->first_name}}</td>
                    <td>{{$quote->last_name}}</td>
                    <td>{{$quote->email}}</td>
                    <td>{{$quote->company_name}}</td>
                    <td>{{$quote->address}}</td>
                    <td>
                        @foreach(json_decode($quote->category) as $cat)
                            @php
                                $cat_name = \App\Category::where('id',$cat)->first();
                            @endphp
                            {{$cat_name->name}} ,
                        @endforeach

                    </td>

                    {{--@foreach($catname as $cat)
                        <td>{{$cat->name}},</td>
                        @endforeach--}}

                </tr>
            @endforeach
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection