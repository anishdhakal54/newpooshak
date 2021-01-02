<div class="tab-pane" id="ad">
    <h3>Below Slideshow</h3>

    <div class="form-group{{ $errors->has('ad1') ? ' has-error' : '' }}">
        <label for="footer_logo" class="col-sm-2 control-label">Ad</label>
        <div class="col-sm-10">
            <input type="text" name="ad1_link" placeholder="Link" class="form-control" id="ribbon_text"
                   value="{{ getConfiguration('ad1_link') }}">
            <br/>
            <input type="file" name="ad1" id="footer_logo" class="form-control">
            @if ($errors->has('ad1'))
                <span class="help-block">
                    {{ $errors->first('ad1') }}
                </span>
            @endif

            @if(getConfiguration('ad1'))
                <div class="mt-15 half-width">
                    <img src="{{ url('storage') . '/' . getConfiguration('ad1') }}"
                         class="thumbnail img-responsive">
                </div>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('ad2') ? ' has-error' : '' }}">
        <label for="footer_logo" class="col-sm-2 control-label">Ad2</label>
        <div class="col-sm-10">
            <input type="text" name="ad2_link" placeholder="Link" class="form-control" id="ribbon_text"
                   value="{{ getConfiguration('ad2_link') }}">
            <br/>
            <input type="file" name="ad2" id="footer_logo" class="form-control">
            @if ($errors->has('ad2'))
                <span class="help-block">
                    {{ $errors->first('ad2') }}
                </span>
            @endif

            @if(getConfiguration('ad2'))
                <div class="mt-15 half-width">
                    <img src="{{ url('storage') . '/' . getConfiguration('ad2') }}"
                         class="thumbnail img-responsive">
                </div>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('ad3') ? ' has-error' : '' }}">
        <label for="footer_logo" class="col-sm-2 control-label">Ad3</label>
        <div class="col-sm-10">
            <input type="text" name="ad3_link" placeholder="Link" class="form-control" id="ribbon_text"
                   value="{{ getConfiguration('ad3_link') }}">
            <br/>
            <input type="file" name="ad3" id="footer_logo" class="form-control">
            @if ($errors->has('ad3'))
                <span class="help-block">
                    {{ $errors->first('ad3') }}
                </span>
            @endif

            @if(getConfiguration('ad3'))
                <div class="mt-15 half-width">
                    <img src="{{ url('storage') . '/' . getConfiguration('ad3') }}"
                         class="thumbnail img-responsive">
                </div>
            @endif
        </div>
    </div>
    <h3>Below Popular Category</h3>
    <div class="form-group{{ $errors->has('ad4') ? ' has-error' : '' }}">
        <label for="footer_logo" class="col-sm-2 control-label">Ad 4</label>
        <div class="col-sm-10">
            <input type="text" name="ad4_link" placeholder="Link" class="form-control" id="ribbon_text"
                   value="{{ getConfiguration('ad4_link') }}">
            <br/>
            <input type="file" name="ad4" id="footer_logo" class="form-control">
            @if ($errors->has('ad4'))
                <span class="help-block">
                    {{ $errors->first('ad4') }}
                </span>
            @endif

            @if(getConfiguration('ad4'))
                <div class="mt-15 half-width">
                    <img src="{{ url('storage') . '/' . getConfiguration('ad4') }}"
                         class="thumbnail img-responsive">
                </div>
            @endif
        </div>
    </div>

    <h3>Below New Arrival</h3>
    <div class="form-group{{ $errors->has('ad5') ? ' has-error' : '' }}">
        <label for="footer_logo" class="col-sm-2 control-label">Ad 5</label>
        <div class="col-sm-10">
            <input type="text" name="ad5_link" placeholder="Link" class="form-control" id="ribbon_text"
                   value="{{ getConfiguration('ad5_link') }}">
            <br/>
            <input type="file" name="ad5" id="footer_logo" class="form-control">
            @if ($errors->has('ad5'))
                <span class="help-block">
                    {{ $errors->first('ad5') }}
                </span>
            @endif

            @if(getConfiguration('ad5'))
                <div class="mt-15 half-width">
                    <img src="{{ url('storage') . '/' . getConfiguration('ad5') }}"
                         class="thumbnail img-responsive">
                </div>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ad6') ? ' has-error' : '' }}">
        <label for="footer_logo" class="col-sm-2 control-label">Ad 6</label>
        <div class="col-sm-10">
            <input type="text" name="ad6_link" placeholder="Link" class="form-control" id="ribbon_text"
                   value="{{ getConfiguration('ad6_link') }}">
            <br/>
            <input type="file" name="ad6" id="footer_logo" class="form-control">
            @if ($errors->has('ad6'))
                <span class="help-block">
                    {{ $errors->first('ad6') }}
                </span>
            @endif

            @if(getConfiguration('ad6'))
                <div class="mt-15 half-width">
                    <img src="{{ url('storage') . '/' . getConfiguration('ad6') }}"
                         class="thumbnail img-responsive">
                </div>
            @endif
        </div>
    </div>
</div>


