<div class="tab-pane" id="about">
    <div class="form-group{{ $errors->has('who_we_are') ? ' has-error' : '' }}">
        <label for="who_we_are" class="col-sm-2 control-label">Who we are</label>
        <div class="col-sm-10">
            <textarea name="who_we_are" id="who_we_are" class="form-control"
                      rows="5">{{ getConfiguration('who_we_are') }}</textarea>
            @if ($errors->has('who_we_are'))
                <span class="help-block">
                    {{ $errors->first('who_we_are') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('our_mission') ? ' has-error' : '' }}">
        <label for="our_mission" class="col-sm-2 control-label">Mission</label>
        <div class="col-sm-10">
            <textarea name="our_mission" id="our_mission" class="form-control"
                      rows="5">{{ getConfiguration('our_mission') }}</textarea>

            @if ($errors->has('our_mission'))
                <span class="help-block">
                    {{ $errors->first('our_mission') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('our_vision') ? ' has-error' : '' }}">
        <label for="our_vision" class="col-sm-2 control-label">Vision</label>
        <div class="col-sm-10">

            <textarea name="our_vision" id="our_vision" class="form-control"
                      rows="5">{{ getConfiguration('our_vision') }}</textarea>
            @if ($errors->has('our_vision'))
                <span class="help-block">
                    {{ $errors->first('our_vision') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('our_help') ? ' has-error' : '' }}">
        <label for="our_help" class="col-sm-2 control-label">Our Help</label>
        <div class="col-sm-10">

            <textarea name="our_help" id="our_help" class="form-control"
                      rows="5">{{ getConfiguration('our_help') }}</textarea>
            @if ($errors->has('our_help'))
                <span class="help-block">
                    {{ $errors->first('our_help') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('our_support') ? ' has-error' : '' }}">
        <label for="our_support" class="col-sm-2 control-label">Our Support</label>
        <div class="col-sm-10">

            <textarea name="our_support" id="our_support" class="form-control"
                      rows="5">{{ getConfiguration('our_support') }}</textarea>
            @if ($errors->has('our_support'))
                <span class="help-block">
                    {{ $errors->first('our_support') }}
                </span>
            @endif
        </div>
    </div>
</div>
<!-- /.tab-pane -->