@extends('backend.layouts.app')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>All Slideshows
      {{--<small>({{ $slideshowsCount }})</small>--}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Slideshows</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        @include('backend.partials.message-success')
        @include('backend.partials.message-error')

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All Slideshows</h3>
            <a href="{{ route('dashboard.slideshows.create') }}" class="btn btn-sm btn-danger pull-right">Add New</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped datatable">
              <thead>
              <tr>
                <th>#</th>
                <th class="sorting-false text-center"><i class="fa fa-image"></i></th>
                <th>Name</th>
                <th>Description</th>

                <th class="sorting-false">Action</th>
              </tr>
              </thead>
              <tbody>
              <?php $i = 1?>
              @foreach($colleges as $data)
                <tr>
                  <td>{{$i}}</td>
                  <td>image</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->description}}</td>
                  <td>
                    <a href="{{ route('dashboard.college.edit', $data->id) }}">
                      <button>Edit</button>
                    </a>
                    <form action="{{ route('dashboard.college.destroy', $data->id) }}" method="POST">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button>Delete</button>
                    </form>


                  </td>
                </tr>
                <?php $i++;?>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th class="sorting-false text-center"><i class="fa fa-image"></i></th>
                <th>Name</th>
                <th>Description</th>
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
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
@endpush