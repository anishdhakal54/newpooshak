@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Colleges</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('dashboard.college.index') }}">Colleges</a></li>
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

            {!! Form::model($college, ['method' => 'PATCH', 'files' => true, 'action' => ['Backend\CollegeController@update', $college->id], 'class' => '']) !!}
            @include('backend.colleges.form', ['submitButtonText' => 'Update'])
            {!! Form::close() !!}

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@push('scripts')
    <script>
        jQuery(function () {
            //CKEDITOR.replace('content');
        });
    </script>
@endpush