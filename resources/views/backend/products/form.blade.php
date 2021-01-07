<div class="col-md-9">
  <!-- general form elements -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Add New Product</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name','Name *') !!}
        {!! Form::text('name',null, ['class'=> 'form-control']) !!}

        @if ($errors->has('name'))
          <span class="help-block">
                        {{ $errors->first('name') }}
                    </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
        {!! Form::label('short_description','Short Description') !!}
        {{ Form::textarea('short_description', null, ['rows' => 6, 'class' => 'form-control ckeditor']) }}

        @if ($errors->has('short_description'))
          <span class="help-block">
                        {{ $errors->first('short_description') }}
                    </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        {!! Form::label('description','Description') !!}
        {{ Form::textarea('description', null, ['rows' => 10, 'class' => 'form-control ckeditor']) }}

        @if ($errors->has('description'))
          <span class="help-block">
                        {{ $errors->first('description') }}
                    </span>
        @endif
      </div>

      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#collapse1">Images</a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
              @include('backend.products.images')
            </div>
          </div>
        </div>
      </div>

      <div class="product-tab-content">
        <ul class="nav nav-tabs">
          <li class="general active">
            <a href="#tab_general" data-toggle="tab"
               aria-expanded="true">General</a>
          </li>
          <li class="inventory">
            <a href="#tab_stock" data-toggle="tab"
               aria-expanded="false">Inventory</a>
          </li>
          <li class="faqs">
            <a href="#tab_specification" data-toggle="tab"
               aria-expanded="false">Specification</a>
          </li>
          <li class="faqs">
            <a href="#tab_faqs" data-toggle="tab"
               aria-expanded="false">FAQs</a>
          </li>
          <li class="faqs">
            <a href="#tab_downloads" data-toggle="tab"
               aria-expanded="false">Downloads</a>
          </li>
          <li class="seo">
            <a href="#tab_seo" data-toggle="tab">SEO</a>
          </li>
          <li class="advanced">
            <a href="#tab_advanced" data-toggle="tab">Advanced</a>
          </li>
          <li class="size_chart">
            <a href="#tab_size_chart" data-toggle="tab">Size Chart</a>
          </li>
          <li class="size_name">
            <a href="#tab_sizename" data-toggle="tab">Quantity</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-general tab-pane active" id="tab_general">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                  {!! Form::label('sku','SKU', ['class' => 'control-label col-sm-3']) !!}
                  <div class="col-sm-9">
                    {!! Form::text('sku',null, ['class'=> 'form-control']) !!}

                    @if ($errors->has('sku'))
                      <span class="help-block">
                                                {{ $errors->first('sku') }}
                                            </span>
                    @endif
                  </div>

                </div>
                <div class="form-group{{ $errors->has('regular_price') ? ' has-error' : '' }}">
                  {!! Form::label('regular_price','Regular Price', ['class' => 'control-label col-sm-3']) !!}
                  <div class="col-sm-9">
                    {!! Form::number('regular_price',null, ['class'=> 'form-control', 'min' => 0, 'step' => 'any']) !!}

                    @if ($errors->has('regular_price'))
                      <span class="help-block">
                                                {{ $errors->first('regular_price') }}
                                            </span>
                    @endif
                  </div>

                </div>
                <div class="form-group{{ $errors->has('sale_price') ? ' has-error' : '' }}">
                  {!! Form::label('sale_price','Sale Price', ['class' => 'control-label col-sm-3']) !!}
                  <div class="col-sm-9">
                    {!! Form::number('sale_price',null, ['class'=> 'form-control', 'min' => 0, 'step' => 'any']) !!}

                    @if ($errors->has('sale_price'))
                      <span class="help-block">
                                            {{ $errors->first('sale_price') }}
                                            </span>
                    @endif
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="tab-stock tab-pane" id="tab_stock">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="inputManageStock">Manage
                    Stock</label>
                  <div class="col-sm-9">
                    <label class="mb-15">
                      {{ Form::checkbox('track_stock', 1, null, ['class' => 'track-stock minimal-red']) }}
                      Enable stock management
                    </label>
                  </div>
                </div>
                <div class="form-group stock-qty" style="">
                  <label class="col-sm-3 control-label" for="qty">Stock Qty</label>
                  <div class="col-sm-9">
                    {!! Form::number('stock_qty', null , ['min' => '0' ,'class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label"
                         for="stock_availability_status">Stock Availability</label>
                  <div class="col-sm-9">
                    {{ Form::select('in_stock', [ '1' => 'In Stock', '0' => 'Out of Stock'], null, ['class' => 'form-control']) }}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-specification tab-pane" id="tab_specification">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered table-specifications">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if(isset($product->specifications))
                    @foreach($product->specifications as $specification)
                      <tr data-row="{{ $loop->iteration }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                          <div class="form-group">
                            <input type="text" name="specifications[title][{{ $specification->id }}]"
                                   value="{{ $specification->title }}"
                                   class="form-control" required>
                          </div>
                        </td>
                        <td>
                          <div class="form-group">
                            <input type="text" name="specifications[description][{{ $specification->id }}]"
                                   value="{{ $specification->description }}"
                                   class="form-control" required>
                          </div>
                        </td>
                        <td>
                          <button type="button" class="btn btn-danger btn-xs btn-delete-specification"
                                  data-specification="{{ $specification->id }}"><i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                      <button class="btn btn-danger btn-sm btn-add-specification">Add New</button>
                    </th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

          <div class="tab-faqs tab-pane" id="tab_faqs">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered table-faqs">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if(isset($product->faqs))
                    @foreach($product->faqs as $faq)
                      <tr data-row="{{ $loop->iteration }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                          <div class="form-group">
                            <input type="text" name="faqs[question][{{ $faq->id }}]"
                                   value="{{ $faq->question }}"
                                   class="form-control" required>
                          </div>
                        </td>
                        <td>
                          <div class="form-group">
                                                    <textarea name="faqs[answer][{{ $faq->id }}]" class="form-control"
                                                              rows="3" required>{{ $faq->answer }}</textarea>
                          </div>
                        </td>
                        <td>
                          <button class="btn btn-danger btn-xs btn-delete-faq"
                                  data-faq="{{ $faq->id }}"><i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                      <button type="button" class="btn btn-danger btn-sm btn-faqs">Add New</button>
                    </th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

          <div class="tab-downloads tab-pane" id="tab_downloads">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered table-downloads">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if(isset($product->downloads))
                    @foreach($product->downloads as $download)
                      <tr data-row="{{ $loop->iteration }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                          <div class="form-group">
                            <input type="text" name="downloads[title][{{ $download->id }}]"
                                   value="{{ $download->title }}"
                                   class="form-control" required>
                          </div>
                        </td>
                        <td>
                          <div class="form-group">
                            <input type="file" name="file" class="form-control mb-15 download-file">
                            <input type="text" name="downloads[link][{{ $download->id }}]"
                                   value="{{ $download->link }}"
                                   class="form-control download-file-link" required>
                          </div>
                        </td>
                        <td>
                          <button type="button" class="btn btn-danger btn-xs btn-delete-download"
                                  data-download="{{ $download->id }}"><i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                      <button class="btn btn-danger btn-sm btn-add-download">Add New</button>
                    </th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

          <div class="tab-seo tab-pane" id="tab_seo">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group{{ $errors->has('page_title') ? ' has-error' : '' }}">
                  {!! Form::label('page_title','Page Title', ['class' => 'control-label col-sm-3']) !!}
                  <div class="col-sm-9">
                    {!! Form::text('page_title',null, ['class'=> 'form-control']) !!}

                    @if ($errors->has('page_title'))
                      <span class="help-block">
                                                {{ $errors->first('page_title') }}
                                            </span>
                    @endif
                  </div>

                </div>

                <div class="form-group{{ $errors->has('page_description') ? ' has-error' : '' }}">
                  {!! Form::label('page_description','Page Description', ['class' => 'control-label col-sm-3']) !!}
                  <div class="col-sm-9">
                    {{ Form::textarea('page_description', null, ['rows' => 3, 'class' => 'form-control']) }}

                    @if ($errors->has('page_description'))
                      <span class="help-block">
                                                {{ $errors->first('page_description') }}
                                            </span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-advanced tab-pane" id="tab_advanced">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-sm-3 control-label"
                         for="disable_price">Disable Price</label>
                  <div class="col-sm-9">
                    <label class="mb-15">
                      {{ Form::checkbox('disable_price', 1, null, ['class' => 'minimal-red']) }}
                      Disable product price
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label"
                         for="featured">Featured Product</label>
                  <div class="col-sm-9">
                    <label class="mb-15">
                      {{ Form::checkbox('is_featured', 1, null, ['class' => 'minimal-red']) }}
                      Enable as featured product
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label"
                         for="featured">Disable Size</label>
                  <div class="col-sm-9">
                    <label class="mb-15">
                      {{ Form::checkbox('disable_size', 1, null, ['class' => 'minimal-red']) }}
                      Product that doesn't have size
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label"
                         for="featured">Available Size</label>
                  <div class="col-sm-9">
                    <label class="mb-15">
                      {{ Form::checkbox('show_available_size', 1, null, ['class' => 'minimal-red']) }}
                      Show available sizes for customer
                    </label>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-3 control-label"
                         for="featured">Is Trending</label>
                  <div class="col-sm-9">
                    <label class="mb-15">
                      {{ Form::checkbox('is_trending', 1, null, ['class' => 'minimal-red']) }}
                      Show in Trending Items
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-size_chart tab-pane" id="tab_size_chart">
            <div class="row">
              <div class="col-md-12">
                <table class="table">
                  <tbody>
                  <tr>
                    <th scope="row">V1</th>
                    <td><input type="text" name="v1" class="form-control" placeholder="s"
                               value="{{ isset($product->size_chart) && $product->size_chart->v1 !=''
                               ? $product->size_chart->v1  : '' }}"></td>
                    <td><input type="text" name="v2" class="form-control" placeholder="x"
                               value="{{ isset($product->size_chart) && $product->size_chart->v2 !=''
                                ? $product->size_chart->v2  : '' }}"></td>
                    <td><input type="text" name="v3" value="{{ isset($product->size_chart) && $product->size_chart->v3 !=''
                     ? $product->size_chart->v3  : '' }}" class="form-control" placeholder="xl"></td>
                    <td><input type="text" name="v4" value="{{ isset($product->size_chart) && $product->size_chart->v4 !=''
                     ? $product->size_chart->v4  : '' }}" class="form-control" placeholder="xll"></td>
                    <td><input type="text" name="v5" value="{{ isset($product->size_chart) && $product->size_chart->v5 !=''
                     ? $product->size_chart->v5  : '' }}" class="form-control" placeholder="l"></td>
                  </tr>
                  <tr>
                    <th scope="row">W1</th>
                    <td><input type="text" name="y1" value="{{ isset($product->size_chart) && $product->size_chart->w1 !=''
                               ? $product->size_chart->w1  : '' }}" class="form-control" placeholder="s"></td>
                    <td><input type="text" name="y2" value="{{ isset($product->size_chart) && $product->size_chart->w2 !=''
                               ? $product->size_chart->w2  : '' }}" class="form-control" placeholder="x"></td>
                    <td><input type="text" name="y3" value="{{ isset($product->size_chart) && $product->size_chart->w3 !=''
                               ? $product->size_chart->w3  : '' }}" class="form-control" placeholder="xl"></td>
                    <td><input type="text" name="y4" value="{{ isset($product->size_chart) && $product->size_chart->w4 !=''
                               ? $product->size_chart->w4  : '' }}" class="form-control" placeholder="xll"></td>
                    <td><input type="text" name="y5" value="{{ isset($product->size_chart) && $product->size_chart->w5 !=''
                               ? $product->size_chart->w5  : '' }}" class="form-control" placeholder="l"></td>
                  </tr>
                  <tr>
                    <th scope="row">x1</th>
                    <td><input type="text" name="x1" value="{{ isset($product->size_chart) && $product->size_chart->x1 !=''
                               ? $product->size_chart->x1  : '' }}" class="form-control" placeholder="s"></td>
                    <td><input type="text" name="x2" value="{{ isset($product->size_chart) && $product->size_chart->x2 !=''
                               ? $product->size_chart->x2  : '' }}" class="form-control" placeholder="x"></td>
                    <td><input type="text" name="x3" value="{{ isset($product->size_chart) && $product->size_chart->x3 !=''
                               ? $product->size_chart->x3  : '' }}" class="form-control" placeholder="xl"></td>
                    <td><input type="text" name="x4" value="{{ isset($product->size_chart) && $product->size_chart->x4 !=''
                               ? $product->size_chart->x4  : '' }}" class="form-control" placeholder="xll"></td>
                    <td><input type="text" name="x5" value="{{ isset($product->size_chart) && $product->size_chart->x5 !=''
                               ? $product->size_chart->x5  : '' }}" class="form-control" placeholder="l"></td>
                  </tr>
                  <tr>
                    <th scope="row">Y1</th>
                    <td><input type="text" name="y1" value="{{ isset($product->size_chart) && $product->size_chart->y1 !=''
                               ? $product->size_chart->y1  : '' }}" class="form-control" placeholder="s"></td>
                    <td><input type="text" name="y2" value="{{ isset($product->size_chart) && $product->size_chart->y2 !=''
                               ? $product->size_chart->y2  : '' }}" class="form-control" placeholder="x"></td>
                    <td><input type="text" name="y3" value="{{ isset($product->size_chart) && $product->size_chart->y3 !=''
                               ? $product->size_chart->y3  : '' }}" class="form-control" placeholder="xl"></td>
                    <td><input type="text" name="y4" value="{{ isset($product->size_chart) && $product->size_chart->y4 !=''
                               ? $product->size_chart->y4  : '' }}" class="form-control" placeholder="xll"></td>
                    <td><input type="text" name="y5" value="{{ isset($product->size_chart) && $product->size_chart->y5 !=''
                               ? $product->size_chart->y5  : '' }}" class="form-control" placeholder="l"></td>
                  </tr>
                  <tr>
                    <th scope="row">Z1</th>
                    <td><input type="text" name="z1" value="{{ isset($product->size_chart) && $product->size_chart->z1 !=''
                               ? $product->size_chart->z1  : '' }}" class="form-control" placeholder="s"></td>
                    <td><input type="text" name="z2" value="{{ isset($product->size_chart) && $product->size_chart->z2 !=''
                               ? $product->size_chart->z2  : '' }}" class="form-control" placeholder="x"></td>
                    <td><input type="text" name="z3" value="{{ isset($product->size_chart) && $product->size_chart->z3 !=''
                               ? $product->size_chart->z3  : '' }}" class="form-control" placeholder="xl"></td>
                    <td><input type="text" name="z4" value="{{ isset($product->size_chart) && $product->size_chart->z4 !=''
                               ? $product->size_chart->z4  : '' }}" class="form-control" placeholder="xll"></td>
                    <td><input type="text" name="z5" value="{{ isset($product->size_chart) && $product->size_chart->z5!=''
                               ? $product->size_chart->z5 : '' }}" class="form-control" placeholder="l"></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="tab-sizename tab-pane" id="tab_sizename">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered table-size_name">
                  <tbody>
                  <tr>
                    <th scope="row">XS</th>
                    <td><input type="number" name="quantity_xs" value="{{ isset($product) ? $product->quantity_xs
                    : old('quantity_xs') }}" class="form-control" placeholder="XS"></td>
                  </tr>
                  <tr>
                    <th scope="row">S</th>
                    <td><input type="number" name="quantity_s" value="{{  isset($product) ? $product->quantity_s
                    : old('quantity_s') }}" class="form-control" placeholder="S"></td>
                  </tr>
                  <tr>
                    <th scope="row">M</th>
                    <td><input type="number" name="quantity_m" value="{{  isset($product) ? $product->quantity_m
                    : old('quantity_m') }}" class="form-control" placeholder="M"></td>
                  </tr>
                  <tr>
                    <th scope="row">XL</th>
                    <td><input type="number" name="quantity_xl" value="{{ isset($product) ? $product->quantity_xl
                    : old('quantity_xl')}}" class="form-control" placeholder="Xl"></td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                      <button class="btn btn-danger btn-sm btn-add-size_name">Add New</button>
                    </th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a href="{{ route('dashboard.product.index') }}" class="btn btn-default">Cancel</a>
      {!! Form::submit($submitButtonText, ['class'=>'btn btn-danger pull-right']) !!}
    </div>
  </div>
  <!-- /.box -->
</div>
<div class="col-md-3">
  <!-- general form elements -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Status</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="form-group mb-none{{ $errors->has('status') ? ' has-error' : '' }}">
        {{ Form::select('status', [ '1' => 'Enabled', '0' => 'Disabled'], null, ['class' => 'form-control']) }}

        @if ($errors->has('status'))
          <span class="help-block">
                        {{ $errors->first('status') }}
                    </span>
        @endif
      </div>
    </div>
  </div>
  <!-- /.box -->
  <!-- general form elements -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Product Categories</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="product-categories">
        <ul class="pl-none">
          @foreach($categories as $category)
            <li>
              {{ Form::checkbox('category[]', $category->id, (isset($selectedCategories) && in_array($category->id, $selectedCategories)) ? $category->id : null, ['class' => 'minimal-red']) }}{{ $category->name }}
            </li>
            @include('backend.products.category')
          @endforeach
        </ul>
      </div>
    </div>
  </div>

  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Sizes</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="product-categories">
        <ul class="pl-none">
          @foreach($sizes as $size)
            <li>
              {{ Form::checkbox('size[]', $size->id, (isset($selectedSizes) && in_array($size->id, $selectedSizes)) ? $size->id : 0, ['class' => 'minimal-red']) }}{{ $size->title }}
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

  <div class="box box-default">
    <div class="box-body">


      <div class="form-group @if ($errors->has('view_chart')) has-error @endif">
        {!! Form::label('view_chart','View Chart Image', ['class' => 'control-label']) !!}
        {!! Form::file('view_chart', ['class'=> 'form-control']) !!}
        @if ($errors->has('view_chart'))
          <span class="help-block">
                        {{ $errors->first('view_chart') }}
                    </span>
        @endif

        @if(isset($product) && null !== $product->view_chart)
          <div class="mt-15">
            <img src="{{asset("/view_chart/$product->view_chart")}}" class="thumbnail img-responsive mb-none">
          </div>
        @endif

      </div>

    </div>
    <div class="box-footer">
      {!! Form::submit($submitButtonText, ['class'=>'btn btn-danger pull-right']) !!}
    </div>
  </div>

  <!-- /.box -->
</div>