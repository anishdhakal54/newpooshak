@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="color: #ee3d43;background-color: #f2dede;border-color: #ebccd1;font-weight: 800;text-align: center">Your Email is successfully verified</div>
                <div class="panel-body" style="background-color: #d6e9c6;color: #3c763d;border-color: #d6e9c6;font-weight: 700;text-align: center">
                    Once admin will approve your submission you can start order. It will take maximim 1 hours. Click here to visit  <a href="{{url('/')}}">Shop</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection