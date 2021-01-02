@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Sizes
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Sizes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @include('backend.partials.message-success')
                @include('backend.partials.message-error')
            </div>
            <div class="col-md-4">
                {!! Form::open(['route'=>'dashboard.sizes.store', 'files' => true, 'class' => '']) !!}
                @include('backend.sizes.form-create', ['submitButtonText' => 'Save'])
                {!! Form::close() !!}
            </div>
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Sizes</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th class="sorting-false">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sizes as $size)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $size->title }}</td>
                                    <td>{{ $size->created_at }}</td>
                                    <td>
                                        @role(['admin','manager'])
                                        <a href="{{ route('dashboard.sizes.edit', $size->id) }}" class="btn btn-xs btn-info">Edit</a>
                                        <form action='{{ route('dashboard.sizes.destroy', $size->id) }}' method='post'>
                                            <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                                            <input type='hidden' name='_method' value='DELETE'>
                                            <button type='submit' class='btn btn-xs btn-danger'>Delete</button>
                                        </form>
                                        @endrole
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th class="sorting-false">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
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
            $('.select2').select2();

            $('.datatable').DataTable({

            });
        });
    </script>
@endpush