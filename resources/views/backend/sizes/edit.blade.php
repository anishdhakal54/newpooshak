@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Size</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="{{ route('dashboard.sizes.index') }}">Sizes</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @include('backend.partials.message-success')
                @include('backend.partials.message-error')
            </div>

            <div class="col-md-12">
            {!! Form::model($size, ['method' => 'PATCH','files' => true, 'action' => ['Backend\SizeController@update', $size->id]]) !!}
            <!-- general form elements -->
                <div class="box">
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::text('title',null, ['class'=> 'form-control', 'placeholder' => 'Title', 'required' => 'required', 'autofocus' => 'autofocus']) !!}

                            @if ($errors->has('title'))
                                <span class="help-block">
                    {{ $errors->first('title') }}
                </span>
                            @endif
                        </div>

                        <div class="form-group mb-none{{ $errors->has('status') ? ' has-error' : '' }}">
                            <select name="status" id="status" class="form-control select2">
                                <option value="1" {{ $size->status==1?'selected':'' }}>Active</option>
                                <option value="0" {{ $size->status==0?'selected':'' }}>Inactive</option>
                            </select>

                            @if ($errors->has('status'))
                                <span class="help-block">
                    {{ $errors->first('status') }}
                </span>
                            @endif
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! Form::submit('Submit', ['class'=>'btn btn-danger pull-right']) !!}
                    </div>
                </div>
                <!-- /.box -->
                {!! Form::close() !!}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#ages').select2();
            $('.select2').select2();
        });
    </script>
@endpush