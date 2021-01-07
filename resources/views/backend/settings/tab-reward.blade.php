<div class="tab-pane" id="reward">
    <div class="form-group{{ $errors->has('rewards') ? ' has-error' : '' }}">
        <label for="rewards" class="col-sm-2 control-label">Rewards (in percent)</label>
        <div class="col-sm-10">
            <input type="text" name="rewards" class="form-control" id="keywords"
                   value="{{ getConfiguration('rewards') }}">
            @if ($errors->has('rewards'))
                <span class="help-block">
                    {{ $errors->first('rewards') }}
                </span>
            @endif
        </div>
    </div>

</div>
<!-- /.tab-pane -->