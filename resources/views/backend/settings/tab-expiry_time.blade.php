<div class="tab-pane" id="expiry_time">
    <div class="form-group{{ $errors->has('expiry_time') ? ' has-error' : '' }}">
        <label for="tax_percentage" class="col-sm-2 control-label">Expiry Time:</label>
        <div class="col-sm-10">
            <input type="number" name="expiry_time" class="form-control" id="tax_percentage"
                   value="{{ getConfiguration('expiry_time') }}" min="0">
            @if ($errors->has('expiry_time'))
                <span class="help-block">
                    {{ $errors->first('expiry_time') }}
                </span>
            @endif
        </div>
    </div>
</div>
<!-- /.tab-pane -->