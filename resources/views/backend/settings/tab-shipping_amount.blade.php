<div class="tab-pane" id="shipping">
    <div class="form-group{{ $errors->has('shipping_amount') ? ' has-error' : '' }}">
        <label for="tax_percentage" class="col-sm-2 control-label">Shipping Amount(per kilometer):</label>
        <div class="col-sm-10">
            <input type="number" name="shipping_amount" class="form-control" id="tax_percentage"
                   value="{{ getConfiguration('shipping_amount') }}" min="0">
            @if ($errors->has('shipping_amount'))
                <span class="help-block">
                    {{ $errors->first('shipping_amount') }}
                </span>
            @endif
        </div>
    </div>
</div>
<!-- /.tab-pane -->