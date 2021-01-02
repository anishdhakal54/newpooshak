<!-- general form elements -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Add New</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::text('title',null, ['class'=> 'form-control', 'placeholder' => 'Title']) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>

        <div class="form-group mb-none{{ $errors->has('status') ? ' has-error' : '' }}">
            <select name="status" id="status" class="form-control select2">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
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
        {!! Form::submit($submitButtonText, ['class'=>'btn btn-danger pull-right']) !!}
    </div>
</div>
<!-- /.box -->