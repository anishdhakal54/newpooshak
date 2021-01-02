<div class="tab-pane" id="map">
    <div class="form-group{{ $errors->has('marker_title') ? ' has-error' : '' }}">
        <label for="marker_title" class="col-sm-2 control-label">Marker Title</label>
        <div class="col-sm-10">
            <input type="text" name="marker_title" class="form-control" id="marker_title"
                   value="{{ getConfiguration('marker_title') }}">
            @if ($errors->has('marker_title'))
                <span class="help-block">
                    {{ $errors->first('marker_title') }}
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('marker_description') ? ' has-error' : '' }}">
        <label for="marker_description" class="col-sm-2 control-label">Marker Description</label>
        <div class="col-sm-10">
            <textarea name="marker_description" id="marker_description" class="form-control"
                      rows="5">{{ getConfiguration('marker_description') }}</textarea>
            @if ($errors->has('marker_description'))
                <span class="help-block">
                    {{ $errors->first('marker_description') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
        <label for="latitude" class="col-sm-2 control-label">Latitude</label>
        <div class="col-sm-10">
            <input type="text" name="latitude" class="form-control" id="latitude"
                   value="{{ getConfiguration('latitude') }}">
            @if ($errors->has('latitude'))
                <span class="help-block">
                    {{ $errors->first('latitude') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
        <label for="longitude" class="col-sm-2 control-label">Longitude</label>
        <div class="col-sm-10">
            <input type="text" name="longitude" class="form-control" id="longitude"
                   value="{{ getConfiguration('longitude') }}">
            @if ($errors->has('longitude'))
                <span class="help-block">
                    {{ $errors->first('longitude') }}
                </span>
            @endif
        </div>
    </div>


</div>
<!-- /.tab-pane -->