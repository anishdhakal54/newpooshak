<div class="tab-pane" id="home">
    <div class="col-sm-12">
        <h4>Products Section 1 </h4>
    </div>

    <div class="form-group">
        <label for="home_products_section1" class="col-sm-2 control-label">Select Options</label>
        <div class="col-sm-10">
            <div class="product-categories-dropdown">
                {!! Form::select('products_section_1[]', $categories, $selectedCategories_1, ['class' => 'form-control full-width select2', 'multiple' => 'multiple']) !!}
            </div>

        </div>
    </div>
    <div class="form-group">
        <label for="home_products_section1" class="col-sm-2 control-label">English Content</label>
        <div class="col-sm-10 pt-4">
        <textarea name="home_eng_content" id="who_we_are" class="form-control"
                  rows="5">{{ getConfiguration('home_eng_content') }}</textarea>
            @if ($errors->has('home_eng_content'))
                <span class="help-block">
                    {{ $errors->first('home_eng_content') }}
                </span>
            @endif
        </div>
    </div>


    <div class="form-group">
        <label for="home_products_section1" class="col-sm-2 control-label">Nepali Content</label>
        <div class="col-sm-10 pt-4">
        <textarea name="home_ne_content" id="who_we_are" class="form-control"
                  rows="5">{{ getConfiguration('home_ne_content') }}</textarea>
            @if ($errors->has('home_ne_content'))
                <span class="help-block">
                    {{ $errors->first('home_ne_content') }}
                </span>
            @endif
        </div>
    </div>
    {{--    <div class="col-sm-10">--}}
    {{--           --}}
    {{--    </div>--}}
    {{--<div class="col-sm-12">
        <h4>Products Section 2 </h4>
    </div>

    <div class="form-group">
        <label for="home_products-section1" class="col-sm-2 control-label">Select Options</label>
        <div class="col-sm-10">
            <div class="product-categories-dropdown">
                {!! Form::select('products_section_2[]', $categories, $selectedCategories_2, ['class' => 'form-control full-width select2', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>



    <div class="col-sm-12">
        <h4>Products Section 3 </h4>
    </div>

    <div class="form-group">
        <label for="home_products-section4" class="col-sm-2 control-label">Select Options</label>
        <div class="col-sm-10">
            <div class="product-categories-dropdown">
                {!! Form::select('products_section_4[]', $categories, $selectedCategories_4, ['class' => 'form-control full-width select2', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>--}}
</div>
<!-- /.tab-pane -->