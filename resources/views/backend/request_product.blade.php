@extends('backend.layouts.app')
@section('content')
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
                <th>phone:</th>
                <th>image1:</th>
                <th>Image 2:</th>
                <th>Action:</th>


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
                        {{$quote->phone}}
                    </td>
                    <td><img src="{{asset('uploads/RequestProduct/'.$quote->attachment1)}}"
                             style="width: 100px; height: 100px;"
                        >

                    </td>
                    <td>
                        <img src="{{asset('uploads/RequestProduct/'.$quote->attachment2)}}"
                             style="width: 100px; height: 100px;"
                        >

                    </td>
                    {{--@foreach($catname as $cat)
                        <td>{{$cat->name}},</td>
                        @endforeach--}}

                    <td>
                        <form action="{{route('dashboard.deleteRequestedProduct')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$quote->id}}" name="id"/>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
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