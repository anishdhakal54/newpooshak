<div>

  @php
    $image = $product->getImageAttribute();
  @endphp
  <div class="img_zoom">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5 col-md-5 col-12">
          <div class="row">
            <div class="col-md-2">
              <ul>
                @if($product->getProductGallery())
                  <div id="gallery" class="product-dec-slider-2">
                    @foreach($product->getProductGallery() as $gallery)
                      @if($loop->first)
                        <?php $first_image = $gallery; ?>
                      @endif
                      <li><img src="{{ $gallery->smallUrl }}" data-largeimg="{{$gallery->largeUrl}}" class="small_img">
                      </li>
                    @endforeach
                  </div>

                @endif
              </ul>
            </div>

            <div class="col-md-9">
              <canvas id="c" width="475px" height="475px"></canvas>
              @livewire('partials.wishlist-icon',['product' => $product])
            </div>


          </div>
          <div class="row">
            <div class="col-md-12" style="    text-align: end;
    margin-top: 21px;">
              @if($product->has_chart)
                <a href="javascript:void(0);" class="product-wish" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-ruler-horizontal"></i> &nbsp;Size chart
                </a>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chart</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <style>
                        .table.table-striped tr{
                          text-align: left;
                        }
                      </style>
                      <div class="modal-body">
                        <table class="table table-striped">
                          <tr>
                            <td>{{$product->size_chart->v1}}</td>
                            <td>{{$product->size_chart->v2}}</td>
                            <td>{{$product->size_chart->v3}}</td>
                            <td>{{$product->size_chart->v4}}</td>
                            <td>{{$product->size_chart->v5}}</td>
                            <td>{{$product->size_chart->v6}}</td>
                          </tr>
                          <tr>
                            <td>{{$product->size_chart->w1}}</td>
                            <td>{{$product->size_chart->w2}}</td>
                            <td>{{$product->size_chart->w3}}</td>
                            <td>{{$product->size_chart->w4}}</td>
                            <td>{{$product->size_chart->w5}}</td>
                            <td>{{$product->size_chart->w6}}</td>
                          </tr>
                          <tr>
                            <td>{{$product->size_chart->x1}}</td>
                            <td>{{$product->size_chart->x2}}</td>
                            <td>{{$product->size_chart->x3}}</td>
                            <td>{{$product->size_chart->x4}}</td>
                            <td>{{$product->size_chart->x5}}</td>
                            <td>{{$product->size_chart->x6}}</td>
                          </tr>
                          <tr>
                            <td>{{$product->size_chart->y1}}</td>
                            <td>{{$product->size_chart->y2}}</td>
                            <td>{{$product->size_chart->y3}}</td>
                            <td>{{$product->size_chart->y4}}</td>
                            <td>{{$product->size_chart->y5}}</td>
                            <td>{{$product->size_chart->y6}}</td>
                          </tr>
                          <tr>
                            <td>{{$product->size_chart->z1}}</td>
                            <td>{{$product->size_chart->z2}}</td>
                            <td>{{$product->size_chart->z3}}</td>
                            <td>{{$product->size_chart->z4}}</td>
                            <td>{{$product->size_chart->z5}}</td>
                            <td>{{$product->size_chart->z6}}</td>
                          </tr>

                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>

        <div class="col-lg-7 col-md-7 col-12 prod_right" style="padding-left: 28px;">
          <div class="prod_title">
            <h2>{{$product->name}}</h2>
          </div>
          <div class="second">
            <div class="rate">
              <p style="color:white">@if(null ==$product->getAverageRating()) 5 @else
                  {{number_format($product->getAverageRating(),2)}} @endif </p>
              <i class="fa fa-star"></i>
            </div>&nbsp;&nbsp;
          </div>
          <div class="third" style="margin-bottom: 10px">
            @unless($product->disable_price)
              <div class="product-price-box">
                @if(null !== $product->getSalePriceAttribute())
                  <h2>Best Price: {{trans('app.money_symbol')}} {{ $product->getSalePriceAttribute() }} <span
                        class="cut" style="font-weight: normal;"><del>{{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }}</del></span>
                  </h2>
                @else
                  <h2>Best Price: {{trans('app.money_symbol')}} {{ $product->getRegularPriceAttribute() }} </h2>
                @endif
              </div>
            @endunless

          </div>
          <div class="fourth" style="margin-bottom: 10px;">
            <h2>Bulk Offer:</h2>
            {{--<div class="offers">
              <div class="left_offer">
                <h2 style="font-weight: normal;">5+</h2>
                <h2 style="font-weight: normal;">Save 5%</h2>
              </div>
              <div class="left_offer">
                <h2 style="font-weight: normal;">10+</h2>
                <h2 style="font-weight: normal;">Save 8%</h2>
              </div>
              <div class="left_offer">
                <h2 style="font-weight: normal;">20+</h2>
                <h2 style="font-weight: normal;">Save 12%</h2>
              </div>
            </div>--}}

            <div class="notice warning">
              <h2>Discount policy:</h2>

              <p>For order of 5 or more pieces, Discount rate: 5%</p>
              <p> For order of 10 or more pieces, Discount rate: 8%</p>
              <p> For order of 20 pieces and above, Discount rate: 12%</p>

            </div>
          </div>

          @livewire('partials.product-detail',['product'=>$product])
        </div>
      </div>

    </div>
  </div>
  <div class="description-review-area mb-60px">
    <div class="container">
      <div class="description-review-wrapper">
        <div class="description-review-topbar nav">

          @if($product->specifications->count() > 0) <a data-toggle="tab" class="active" href="#des-details2">Product
            Details</a>@endif
          <a @if($product->specifications->count() == 0) class="active" @endif data-toggle="tab" href="#des-details1">Description</a>
          @if($product->faqs->count() > 0) <a data-toggle="tab" href="#des-details4">FAQ</a>@endif
          <a data-toggle="tab" href="#des-details3">Reviews ({{ count($product->getReviews()) }})</a>
        </div>
        <div class="tab-content description-review-bottom">
          @if($product->specifications->count() > 0)
            <div id="des-details2" class="tab-pane active">
              <div class="product-anotherinfo-wrapper">
                <ul>
                  @foreach($product->specifications as $specification)
                    <li><span>{{ $specification->title }}</span> {{ $specification->description }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          @endif


          <div id="des-details1" class="tab-pane @if($product->specifications->count() == 0) active @endif  ">
            <div class="product-description-wrapper">
              {!! $product->description !!}
            </div>
          </div>

          @if($product->faqs->count() > 0)
            <div id="des-details4" class="tab-pane">
              <div class="toggle toggle-primary" data-plugin-toggle>
                @foreach($product->faqs as $faq)
                  <section class="toggle">
                    <label style="color: black">{{ $faq->question }}</label>
                    <p>{{ $faq->answer }}</p>
                  </section>
                @endforeach
              </div>
            </div>
          @endif
          <div id="des-details3" class="tab-pane">
            <div class="row">
              @livewire('partials.reviews',['product_id' => $product->id])
              @livewire('partials.add-rating',['product_id' => $product->id])
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  @if(count($relatedProducts))
    <section class="recent-add-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title">
              <h2>You Might Also Like</h2>
              <p>Add Related products to weekly line up</p>
            </div>
          </div>
        </div>
        <div class="recent-product-slider owl-carousel owl-nav-style">
          @foreach($relatedProducts as $relatedProduct)
            @livewire('partials.product-item',['product' => $relatedProduct])
          @endforeach

        </div>
      </div>
    </section>
  @endif

  @if(count($best_selling_products))
    <section class="recent-add-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title">
              <h2>You Might Also Like</h2>
              <p>Add Related products to weekly line up</p>
            </div>
          </div>
        </div>
        <div class="recent-product-slider1 owl-carousel owl-nav-style">
          @foreach($best_selling_products as $best_sell_product)
            @php($product = $best_sell_product->product)
            @livewire('partials.product-item',['product'=>$product,'is_category'=>true])
          @endforeach


        </div>
      </div>
    </section>
  @endif

  @push('scripts')
    <script src="{{asset('assets/js/fabric.min.js')}}"></script>
    <script>


      $(document).ready(function () {
        $("#add_image").change(function () {
          readURL(this);
          $('#upload').css('display', 'block');
        });

        $(".small_img").click(function () {
          $(".big_img").attr('src', $(this).attr('src'));
        });
        $(".checkme").click(function (event) {
          var x = $(this).is(':checked');
          if (x == true) {
            $(this).parents(".checkbox-card").find('.passport-box').show();
            $(this).parents(".checkbox-card").find('.apply-box').hide();
          } else {
            $(this).parents(".checkbox-card").find('.passport-box').hide();
            $(this).parents(".checkbox-card").find('.apply-box').show();
          }
        });
      });
    </script>
    <script>


      var canvas = new fabric.Canvas('c');

      fabric.Image.fromURL('{{$first_image->largeUrl}}', function (img) {
        canvas.add(img);
        img.scaleToHeight(480);
        img.selectable = false;
      });

      $("#upload").click(function () {
        $("#c").get(0).toBlob(function (blob) {

          var data = new FormData();
          data.append('file', blob);

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url: "/upload_embroidery",
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success: function (data) {
              livewire.emit('imagechange', data.filename);
              $('.confirm-logo').css('display', 'block');
              $('#upload').css('display', 'none');
              /*$('#imagename').val(data.filename).change();*/
            },
            error: function () {
              alert("not so boa!");
            }
          });
        });
      });

      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            fabric.Image.fromURL(e.target.result, function (img) {
              canvas.add(img);
            });
          };

          reader.readAsDataURL(input.files[0]); // convert to base64 string

        }
      }

      $('.small_img').click(function () {
        var largeImage = $(this).data('largeimg');
        canvas.clear();
        fabric.Image.fromURL(largeImage, function (img) {
          canvas.add(img);
          img.scaleToHeight(480);
          img.selectable = false;
        });
      });


    </script>

  @endpush
  @push('styles')
    <style>
      .product-wish {
        padding: 10px;
        border: 1px solid #113b6d;
        border-radius: 10px;
      }
    </style>
  @endpush

</div>
