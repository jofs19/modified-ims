@extends('frontendv2.main_master')
@section('content')

@section('title')
{{ $product->product_name_en }} Product Details
@endsection

      <!-- Custom page title-->
      <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap"><a href="{{ route('shop.page') }}">Shop</a>
                </li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page"><span id="dpname">@if(session()->get('language') == 'filipino') {{ $product->product_name_fil }} @else {{ $product->product_name_en }} @endif</span></li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-2" id="dpname">@if(session()->get('language') == 'filipino') {{ $product->product_name_fil }} @else {{ $product->product_name_en }} @endif</h1>
            <div>

                {{-- STAR RATING --}}

            @php
                $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                $average = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
            @endphp

              <div class="star-rating">


                @if($average == 0)
                <i class="star-rating-icon ci-star "></i>
                <i class="star-rating-icon ci-star "></i>
                <i class="star-rating-icon ci-star "></i>
                <i class="star-rating-icon ci-star "></i>
                <i class="star-rating-icon ci-star"></i>
                @elseif($average == 1 || $average < 2)
                <i class="star-rating-icon ci-star-filled active"></i>
                <i class="star-rating-icon ci-star "></i>
                <i class="star-rating-icon ci-star "></i>
                <i class="star-rating-icon ci-star "></i>
                <i class="star-rating-icon ci-star"></i>
                @elseif($average == 2 || $average < 3)
                <i class="star-rating-icon ci-star-filled active"></i>
                <i class="star-rating-icon ci-star-filled active"></i>
                <i class="star-rating-icon ci-star "></i>
                <i class="star-rating-icon ci-star "></i>
                <i class="star-rating-icon ci-star"></i>
               @elseif($average == 3 || $average < 4)
               <i class="star-rating-icon ci-star-filled active"></i>
               <i class="star-rating-icon ci-star-filled active"></i>
               <i class="star-rating-icon ci-star-filled active"></i>
               <i class="star-rating-icon ci-star "></i>
               <i class="star-rating-icon ci-star"></i>

               @elseif($average == 4 || $average < 5)
               <i class="star-rating-icon ci-star-filled active"></i>
               <i class="star-rating-icon ci-star-filled active"></i>
               <i class="star-rating-icon ci-star-filled active"></i>
               <i class="star-rating-icon ci-star-filled active"></i>
               <i class="star-rating-icon ci-star"></i>
               @elseif($average == 5 || $average < 5)
               <i class="star-rating-icon ci-star-filled active"></i>
               <i class="star-rating-icon ci-star-filled active"></i>
               <i class="star-rating-icon ci-star-filled active"></i>
               <i class="star-rating-icon ci-star-filled active"></i>
               <i class="star-rating-icon ci-star-filled active"></i>
                @endif

              </div>

              @if(count($reviewcount) < 1)

              <span class="d-inline-block fs-sm text-white opacity-70 align-middle mt-1 ms-1">
                        No Reviews yet
              </span>


            @else
            @php
                $convertAverage = number_format($average, 0, '.', '');
              @endphp
              <span class="d-inline-block fs-sm text-white opacity-70 align-middle mt-1 ms-1">
               ({{ number_format($average,1) }} out of 5)


              </span>
            @endif

                {{-- END STAR RATING --}}

            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="bg-light shadow-lg rounded-3">
          <!-- Tabs-->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link py-4 px-sm-4 active" href="#general" data-bs-toggle="tab" role="tab">Product <span class='d-none d-sm-inline'>Info</span></a></li>
            <li class="nav-item"><a class="nav-link py-4 px-sm-4" href="#specs" data-bs-toggle="tab" role="tab"><span class='d-none d-sm-inline'>Vendor</span> Info</a></li>
            <li class="nav-item"><a class="nav-link py-4 px-sm-4" href="#reviews" data-bs-toggle="tab" role="tab">Reviews <span class="fs-sm opacity-60">({{ count($reviewcount) }})</span></a></li>
          </ul>
          <div class="px-4 pt-lg-3 pb-3 mb-5">
            <div class="tab-content px-lg-3">

              <!-- General info tab-->
              <div class="tab-pane fade show active" id="general" role="tabpanel">
                <div class="row">
                  <!-- Product gallery-->
                  <div class="col-lg-7 pe-lg-0">
                    <div class="product-gallery">

                      <div class="product-gallery-preview order-sm-2">
                        @foreach($multiImag as $img)

                        @if($loop->first)
                        <div class="product-gallery-preview-item active" id="slide{{ $img->id }}"><img class="image-zoom" src="{{ asset($img->photo_name ) }}" data-zoom="{{ asset($img->photo_name ) }}" alt="Product image">
                            <div class="image-zoom-pane"></div>
                          </div>
                        @else
                        <div class="product-gallery-preview-item" id="slide{{ $img->id }}"><img class="image-zoom" src="{{ asset($img->photo_name ) }}" data-zoom="{{ asset($img->photo_name ) }}" alt="Product image">
                            <div class="image-zoom-pane"></div>
                          </div>
                        @endif


                        @endforeach

                      </div>
                      <div class="product-gallery-thumblist order-sm-1">
                        @foreach($multiImag as $img)

                        @if($loop->first)

                        <a class="product-gallery-thumblist-item active" href="#slide{{ $img->id }}"><img src="{{ asset($img->photo_name ) }}" alt="Product thumb"></a>

                        @else

                        <a class="product-gallery-thumblist-item" href="#slide{{ $img->id }}"><img src="{{ asset($img->photo_name ) }}" alt="Product thumb"></a>

                        @endif

                        @endforeach
                        {{-- <a class="product-gallery-thumblist-item video-item" href="https://www.youtube.com/watch?v=nrQevwouWn0">
                          <div class="product-gallery-thumblist-item-text"><i class="ci-video"></i>Video</div></a> --}}
                        </div>
                    </div>
                  </div>
                  <!-- Product details-->
                  <div class="col-lg-5 pt-4 pt-lg-0">
                    <div class="product-details ms-auto pb-3">


                      @if ($product->discount_price == NULL)
                      <div class="h3 fw-normal text-accent mb-3 me-1">${{ $product->selling_price }}.<small>00</small></div>
                      @else

                      <div class="mb-3">
                        <del class="text-muted fs-lg me-3">₱ {{ $product->selling_price }}.<small>00</small></del>

                        <span class="h4 fw-normal text-accent me-1">₱ {{ $product->discount_price }}.<small>00</small></span>

                        <span class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                      </div>

                      <span class="text-lead pb-2 mb-2 fw-semibold">Sales End at: </span> <div class="countdown h6 pt-2" data-countdown="{{ Carbon\Carbon::parse($product->sale_time)->format('m/d/Y') }}">
                        <div class="countdown-days shadow rounded p-3">
                          <span class="countdown-value">0</span>
                          <span class="countdown-label text-muted">d</span>
                        </div>
                        <div class="countdown-hours shadow rounded p-3">
                          <span class="countdown-value">0</span>
                          <span class="countdown-label text-muted">h</span>
                        </div>
                        <div class="countdown-minutes shadow rounded p-3">
                          <span class="countdown-value">0</span>
                          <span class="countdown-label text-muted">m</span>
                        </div>
                        <div class="countdown-seconds shadow rounded p-3">
                          <span class="countdown-value">0</span>
                          <span class="countdown-label text-muted">s</span>
                        </div>
                      </div>


                      @endif







                        {{-- @foreach ($product_color_en as $color)
                          @if($color == null)

                          @else
                          @if($loop->iteration == 1)
                          <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1 ">

                          Variant:

                        </span>
                        <span class="text-muted" id="color">----</span>
                    </div>
                    @endif
                          @endif
                        @endforeach --}}


<br>

                      <div class="position-relative me-n4 mb-3">



                        @if($product->product_qty < 1)
                        <div class="product-badge product-not-available mt-n1"><i class="ci-security-close"></i>Out of Stock</div>

                        @else
                        <div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Product available</div>

                        @endif

                      </div>

                      <br>


                      <!-- Select Color -->
                      @if($product->product_color_en == NULL)

                      @else

                      <div class="mb-3">
                        <label for="color" class="form-label">Product Options:</label>
                        <select class="form-select" id="dcolor">
                          <option class="bg-secondary" disabled>Select variant...</option>

                          @foreach($product_color_en as $color)
                          <option value="{{ $color }}">{{ ucwords($color) }}</option>
                          @endforeach

                        </select>
                      </div>

                      @endif

                      @if($product->product_size_en == null)

                      @else
                      <div class="mb-3">
                        {{-- <div class="d-flex justify-content-between align-items-center pb-1">
                          <label class="form-label" for="product-size">Choose Size:</label><a class="nav-link-style fs-sm" href="#size-chart" data-bs-toggle="modal"><i class="ci-ruler lead align-middle me-1 mt-n1"></i>Size guide</a>
                        </div> --}}
                        <select class="form-select" id="dsize">
                          <option disabled class="bg-faded-dark">Select size...</option>
                          @foreach($product_size_en as $size)
                          <option value="{{ $size }}">{{ ucwords($size) }}</option>
                          @endforeach
                        </select>
                      </div>
                      @endif

                      {{-- <!-- Size options (radio buttons) -->
<div class="form-check form-option form-check-inline mb-2">
  <input type="radio" class="form-check-input" id="xl" name="size" checked>
  <label for="xl" class="form-option-label">50 ML</label>
</div>
<div class="form-check form-option form-check-inline mb-2">
  <input type="radio" class="form-check-input" id="l" name="size" checked>
  <label for="l" class="form-option-label">100 ML</label>
</div>
<div class="form-check form-option form-check-inline mb-2">
  <input type="radio" class="form-check-input" id="m" name="size" checked>
  <label for="m" class="form-option-label">150 ML</label>
</div> --}}



                      <div class="d-flex align-items-center pt-2 pb-4">

                        @if($product->product_qty < 1)
                        <input class="form-control me-3" type="number" id="dqty" value="0" min="0"  max="0" style="width: 6rem;">
                        @else
                        <input class="form-control me-3" type="number" id="dqty" value="1" min="1"  max="{{ $product->product_qty }}" style="width: 6rem;">
                        @endif


                        @if($product->product_qty < 1)

                        <button class="btn btn-secondary btn-shadow d-block w-100" disabled type="button"><i class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                        @else

           {{-- <input type="hidden" id="product_id" value="{{ $product->id }}" min="1"> --}}
           <input type="hidden" id="dproduct_id" value="{{ $product->id }}">
           <input type="hidden" id="vproduct_id" value="{{ $product->vendor_id }}">

			    <button type="submit" id="try" onclick="addToCartDetails()" class="btn btn-primary btn-shadow d-block w-100 shimmer-btn placeholder-wave" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart"><i class="ci-cart fs-lg me-2"></i> ADD TO CART</button>

                        @endif




                      </div>
                      <div class="d-flex mb-4">
                        <div class="w-100 me-3">
                          <button class="btn btn-danger btn-shadow d-block w-100" type="button" data-bs-toggle="tooltip" id="{{ $product->id }}" data-bs-placement="bottom" onclick="addToWishList(this.id)" title="Add to Wishlist"><i class="ci-heart fs-lg me-2"></i><span class='d-none d-sm-inline'>Add to </span>Wishlist</button>
                        </div>
                        <div class="w-100">
                          <button class="btn btn-accent btn-shadow d-block w-100" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Compare" id="{{ $product->id }}" onclick="addToCompare(this.id)"><i class="ci-compare fs-lg me-2"></i>Compare</button>
                        </div>
                      </div>
                      <!-- Product panels-->
                      <div class="accordion mb-4" id="productPanels">
                        <div class="accordion-item">
                          <h3 class="accordion-header"><a class="accordion-button " href="#shippingOptions" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions"><i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>General info</a></h3>
                          <div class="accordion-collapse collapse show" id="shippingOptions" data-bs-parent="#productPanels">
                            <div class="accordion-body fs-sm">
                              <div class="d-flex justify-content-between border-bottom pb-2">
                                <div>
                                  <div class="fw-semibold text-dark">Product Brand</div>
                                  <div class="fs-sm text-muted">{{ $product->brand->brand_name_en }}</div>
                                </div>
                                <div>...</div>
                              </div>
                              <div class="d-flex justify-content-between border-bottom py-2">
                                <div>
                                  <div class="fw-semibold text-dark">Product Category</div>
                                  <div class="fs-sm text-muted">{{ $product->category->category_name_en }}</div>
                                </div>
                                <div>...</div>
                              </div>
                              <div class="d-flex justify-content-between border-bottom py-2 ">
                                <div>
                                  <div class="fw-semibold text-dark">Product Tag</div>
                                  <div class="fs-sm text-muted">{{ $product->product_tags_en }}</div>
                                </div>
                                <div>...</div>
                              </div>
                              <div class="d-flex justify-content-between border-bottom py-2">
                                <div>
                                  <div class="fw-semibold text-dark">Product Stock</div>
                                  <div class="fs-sm text-muted">{{ $product->product_qty }}</div>
                                </div>
                                <div>...</div>
                              </div>

                              <div class="d-flex justify-content-between pt-2">
                                <div>
                                  <div class="fw-semibold text-dark">Product Vendor</div>
                                  <div class="fs-sm text-muted">
                                    @if ($product->vendor_id == NULL)
                                    <span class="badge badge-danger">No Vendor</span>

                                    @else
                                    {{ $product['vendor']['name'] }}

                                    @endif
                                </div>
                                </div>
                                <div>...</div>
                              </div>

                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h3 class="accordion-header"><a class="accordion-button collapsed" href="#localStore" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="localStore"><i class="ci-list text-muted fs-lg align-middle mt-n1 me-2"></i>Product Description</a></h3>
                          <div class="accordion-collapse collapse" id="localStore" data-bs-parent="#productPanels">
                            <div class="accordion-body pt-3 pb-1">
                                <dl>
                                  <dt class="fw-semibold">@if(session()->get('language') == 'filipino')
                                    {{ $product->short_descp_fil }}
                                    @else {{  $product->short_descp_en }}
                                    @endif</dt>
                                  <dd>@if(session()->get('language') == 'filipino')
                                    {!! $product->long_descp_fil !!} @else {!! $product->long_descp_en !!} @endif</dd>

                                </dl>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Sharing-->
                      <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End General info tab -->


                            <!-- Tech specs tab-->
                            <div class="tab-pane fade" id="specs" role="tabpanel">
                                <div class="d-md-flex justify-content-between align-items-start pb-4 mb-4 border-bottom">
                                  <div class="d-flex align-items-center me-md-3"><img src="{{ (!empty($product->vendor->profile_photo_path)) ? url($product->vendor->profile_photo_path):url('upload/no_image.jpg') }}" width="120" alt="Product thumb">
                                    <div class="ps-3">
                                      <h6 class="fs-base mb-2">

                                        {{-- vendor name --}}
                                        @if ($product->vendor_id == NULL)
                                            <span class="badge badge-danger">No Vendor</span>
                                        @else
                                        {{ $product['vendor']['name'] }}

                                        @endif



                                    </h6>
                                      <div class="h5 fw-normal text-accent"><small>
                                        @if ($product->vendor_id == NULL)
                                        {{-- <span class="badge badge-danger">No Vendor</span> --}}

                                        @else
                                        {{ $product['vendor']['email'] }}

                                        @endif
                                    </small></div>
                                    <div class="h6 fw-bold text-accent"><small>
                                        @if ($product->vendor_id == NULL)
                                        {{-- <span class="badge badge-danger">No Vendor</span> --}}

                                        @else
                                        {{ $product['vendor']['phone'] }}

                                        @endif
                                    </small></div>
                                    </div>
                                  </div>


                                    <div class="me-2">


                                        <div class="h4 fw-normal text-accent"><small>
                                            @if ($product->vendor_id == NULL)
                                            {{-- <span class="badge badge-danger">No Vendor</span> --}}

                                            @else
                                            {{ $product['vendor']['address'] }}

                                            @endif
                                        </small>
                                    </div>




                                    <div>




                                    </div>
                                  </div>
                                </div>
                                <!-- Specs table-->

                                <blockquote class="blockquote">
                                    <p class="mb-2">    @if($product->vendor_id == NULL)
                                        {{-- Owner Information --}}
                                      @else
                                        {{ $product['vendor']['vendor_short_info'] }}
                                      @endif</p>
                                    <footer class="blockquote-footer">
                                      Creation Date <cite title="Source Title">


                                        @if($product->vendor_id == NULL)
                                        {{-- Owner Information --}}
                                      @else
                                        {{ $product['vendor']['vendor_join'] }}
                                      @endif


                                    </cite>
                                    </footer>
                                  </blockquote>


                              </div>
                              <!--end specs tab-->



              <!-- Reviews tab-->
              <div class="tab-pane fade" id="reviews" role="tabpanel">
                <div class="d-md-flex justify-content-between align-items-start pb-4 mb-4 border-bottom">
                  <div class="d-flex align-items-center me-md-3"><img src="{{ asset($product->product_thumbnail) }}" width="90" alt="Product thumb">
                    <div class="ps-3">
                      <h6 class="fs-base mb-2">@if(session()->get('language') == 'filipino') {{ $product->product_name_fil }} @else {{ $product->product_name_en }} @endif</h6>

                      @if ($product->discount_price == NULL)
                      <div class="h4 fw-normal text-accent">₱ {{ number_format($product->selling_price,2) }}</div>
                      @else

                      <div class="mb-3">
                        <del class="text-muted fs-lg me-3">₱ {{ number_format($product->selling_price,2) }}</del>

                        <span class="h3 fw-normal text-accent me-1">₱ {{ number_format($product->discount_price,2) }}</span>

                        <span class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                      </div>


                      @endif

                      {{-- <div class="h4 fw-normal text-accent">$124.<small>99</small></div> --}}




                    </div>
                  </div>
                  <div class="d-flex align-items-center pt-3">
                    {{-- @if($product->product_qty < 1)
                        <input class="form-control me-3" type="number" id="qty" value="0" min="0"  max="0" style="width: 6rem;">
                        @else
                        <input class="form-control me-3" type="number" id="qty" value="1" min="1"  max="{{ $product->product_qty }}" style="width: 6rem;">
                      @endif --}}


                      @if($product->product_qty < 1)

                        <button class="btn btn-secondary btn-shadow me-2" disabled type="button"><i class="ci-cart fs-lg me-sm-2"></i><span class="d-none d-sm-inline">Add to Cart</span></button>
                        @else

                        {{-- <input type="hidden" id="product_id" value="{{ $product->id }}" min="1"> --}}
                        <input type="hidden" id="dproduct_id" value="{{ $product->id }}">
                        <input type="hidden" id="vproduct_id" value="{{ $product->vendor_id }}">
                        <button type="submit" id="try" onclick="addToCartDetails()" class="btn btn-primary btn-shadow me-2 shimmer-btn placeholder-wave" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add to Cart" style="width: 15rem"><i class="ci-cart fs-lg me-sm-2"></i> <span class="d-none d-sm-inline">Add to Cart</span></button>

                        @endif


                    {{-- <button class="btn btn-primary btn-shadow me-2" type="button"><i class="ci-cart fs-lg me-sm-2"></i><span class="d-none d-sm-inline">Add to Cart</span></button> --}}
                    <div class="me-2">
                      <button class="btn btn-danger btn-icon" type="button" data-bs-toggle="tooltip" id="{{ $product->id }}" data-bs-placement="top" onclick="addToWishList(this.id)" title="Add to Wishlist"><i class="ci-heart fs-lg"></i></button>
                    </div>
                    <div>
                      <button class="btn btn-accent btn-icon" type="button" data-bs-placement="top" data-bs-toggle="tooltip" title="Compare" id="{{ $product->id }}" onclick="addToCompare(this.id)"><i class="ci-compare fs-lg"></i></button>
                    </div>
                  </div>
                </div>
                <!-- Reviews-->

                @php
                // $reviews = App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();
                $reviews = App\Models\Review::where('product_id',$product->id)->latest()->get();
                $average = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                $onestar = App\Models\Review::where('product_id',$product->id)->where('status',1)->where('rating',1)->count();
                $twostar = App\Models\Review::where('product_id',$product->id)->where('status',1)->where('rating',2)->count();
                $threestar = App\Models\Review::where('product_id',$product->id)->where('status',1)->where('rating',3)->count();
                $fourstar = App\Models\Review::where('product_id',$product->id)->where('status',1)->where('rating',4)->count();
                $fivestar = App\Models\Review::where('product_id',$product->id)->where('status',1)->where('rating',5)->count();

                $zerostar = App\Models\Review::where('product_id',$product->id)->where('status',1)->where('rating',0)->count();

                if($onestar != null){
                  $onestarpercent = ($onestar / $reviews->count()) * 100;
                }else{
                  $onestarpercent = 0;
                }

                if($twostar != null){
                  $twostarpercent = ($twostar / $reviews->count()) * 100;
                }else{
                  $twostarpercent = 0;
                }

                if($threestar != null){
                  $threestarpercent = ($threestar / $reviews->count()) * 100;
                }else{
                  $threestarpercent = 0;
                }

                if($fourstar != null){
                  $fourstarpercent = ($fourstar / $reviews->count()) * 100;
                }else{
                  $fourstarpercent = 0;
                }

                if($fivestar != null){
                  $fivestarpercent = ($fivestar / $reviews->count()) * 100;
                }else{
                  $fivestarpercent = 0;
                }

                $fivepercent = round($fivestarpercent);

                @endphp

                <div class="row pt-2 pb-3">
                  <div class="col-lg-4 col-md-5">
                    <h2 class="h3 mb-4">{{ count($reviewcount) }} Reviews </h2>

                    <div class="star-rating me-2">
                      @if($average == 0)
                      <i class="ci-star fs-sm text-muted me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                      @elseif($average == 1 || $average < 2)
                      <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                      @elseif($average == 2 || $average < 3)
                      <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                     @elseif($average == 3 || $average < 4)
                     <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>

                     @elseif($average == 4 || $average < 5)
                     <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star fs-sm text-muted me-1"></i>
                     @elseif($average == 5 || $average < 5)
                   <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      <i class="ci-star-filled fs-sm text-accent me-1"></i>
                      @endif
                    </div>



                    <span class="d-inline-block align-middle"> {{ number_format($average,1) }} Overall rating</span>
                    <p class="pt-3 fs-sm text-muted">{{ $fivestar }} out of {{ count($reviewcount) }} ({{ $fivepercent }}%)<br>Customers recommended this product</p>
                  </div>
                  <div class="col-lg-8 col-md-7">
                    <div class="d-flex align-items-center mb-2">
                      <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">5</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                      <div class="w-100">
                        <div class="progress" style="height: 12px;">
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: {{ round($fivestarpercent) }}%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div><span class="text-muted ms-3">{{ $fivestar }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                      <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">4</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                      <div class="w-100">
                        <div class="progress" style="height: 12px;">
                          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ round($fourstarpercent) }}%; background-color: #a7e453;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div><span class="text-muted ms-3">{{ $fourstar }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                      <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">3</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                      <div class="w-100">
                        <div class="progress" style="height: 12px;">
                          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ round($threestarpercent) }}%; background-color: #ffda75;" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div><span class="text-muted ms-3">{{ $threestar }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                      <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">2</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                      <div class="w-100">
                        <div class="progress" style="height: 12px;">
                          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ round($twostarpercent) }}%; background-color: #fea569;" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div><span class="text-muted ms-3">{{ $twostar }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">1</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                      <div class="w-100">
                        <div class="progress" style="height: 12px;">
                          <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ round($onestarpercent) }}%;" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div><span class="text-muted ms-3">{{ $onestar }}</span>
                    </div>
                  </div>
                </div>
                <hr class="mt-4 mb-3">
                <div class="row py-4">
                  <!-- Reviews list-->
                  <div class="col-md-7">
                    <div class="d-flex justify-content-end pb-4">
                      <div class="d-flex flex-nowrap align-items-center">
                        <label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block" for="sort-reviews">Sort by:</label>
                        <select class="form-select form-select-sm" id="sort-reviews">
                          <option>Newest</option>
                          <option>Oldest</option>
                          <option>Popular</option>
                          <option>High rating</option>
                          <option>Low rating</option>
                        </select>
                      </div>
                    </div>
                    @foreach($reviews as $item)
                    @if($item->status == 0)

                    @else
                    <!-- Review-->
                    <div class="product-review pb-4 mb-4 border-bottom">
                      <div class="d-flex mb-3">
                        <div class="d-flex align-items-center me-4 pe-2"><img class="rounded-circle" src="{{ (!empty($item->user->profile_photo_path)) ? asset($item->user->profile_photo_path):url('upload/no_image.jpg') }}" width="50" alt="User">
                          <div class="ps-3">
                            <h6 class="fs-sm mb-0">{{ $item->name }}</h6><span class="fs-ms text-muted">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                          </div>
                        </div>
                        <div>







                        </div>
                      </div>
                      <dl>
                        <dt>{{ $item->summary }}</dt>
                        <dd>{{ $item->comment }}</dd>

                      </dl>

                      <div class="star-rating">


                        @if($item->rating == NULL)
                        <i class="star-rating-icon ci-star"></i>
                        <i class="star-rating-icon ci-star"></i>
                        <i class="star-rating-icon ci-star"></i>
                        <i class="star-rating-icon ci-star"></i>
                        <i class="star-rating-icon ci-star"></i>

                        @elseif($item->rating == 1)
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star"></i>
                        <i class="star-rating-icon ci-star"></i>
                        <i class="star-rating-icon ci-star"></i>
                        <i class="star-rating-icon ci-star"></i>
                        @elseif($item->rating == 2)
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star"></i>
                        <i class="star-rating-icon ci-star"></i>
                        <i class="star-rating-icon ci-star"></i>

                        @elseif($item->rating == 3)
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star"></i>
                        <i class="star-rating-icon ci-star"></i>

                        @elseif($item->rating == 4)
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star"></i>
                        @elseif($item->rating == 5)
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>

                         @endif

                         <small>
                        @if ($item->user_id == Auth::id())
                        <a class="blog-entry-meta-link text-nowrap text-right ms-2" style="text-align: right"
                        href="{{ route('delete.reviews', $item->id) }}" id="removeComment" data-scroll><i class="ci-trash"></i></a>
                        @endif
                        </small>
                      </div>



                      <div class="fs-ms text-muted pb-2">

                        @if($item->rating == 1)
                        Unsatisfied
                        @elseif($item->rating == 2)
                        Not Bad
                        @elseif($item->rating == 3)
                        Satisfied
                        @elseif($item->rating == 4)
                        Very Good
                        @elseif($item->rating == 5)
                        Excellent
                        @else
                        No Rating
                        @endif



                      </div>

                      @if($item->image != NULL)
                      <div class="gallery">
                        <a href="{{ asset($item->image) }}" class="gallery-item rounded-3" data-sub-html='<h6 class="fs-sm text-light">{{ $item->summary }}</h6>'>
                          {{-- <img src="{{ asset($item->image) }}" style="width: 50%;height: 50%" alt="Gallery thumbnail"> --}}
                          <!-- Block outline button -->

<button type="button" class="btn btn-secondary d-block w-100">View Image</button>
                        </a>
                      </div>
                      @endif

                      {{-- <img src="{{ asset($item->image) }}" alt="" srcset=""> --}}
                      {{-- <div class="text-nowrap">
                        <button class="btn-like" type="button">15</button>
                        <button class="btn-dislike" type="button">3</button>
                      </div> --}}
                    </div>
                    <!-- End Review-->
                    @endif
                    @endforeach

                    <div class="text-center">
                      <button class="btn btn-outline-accent" type="button"><i class="ci-reload me-2"></i>Load more reviews</button>
                    </div>



                  </div>
                  <!-- Leave review form-->
                  <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
                    <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3">
                      <h3 class="h4 pb-2">Write a review</h3>
                      <form class="needs-validation" method="post" action="{{ route('review.store') }}" novalidate enctype="multipart/form-data" id="commentForm">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        @if($product->vendor_id == NULL)
                        <input type="hidden" name="hvendor_id" value="">
                        @else
                        <input type="hidden" name="hvendor_id" value="{{ $product->vendor_id }}">
                        @endif


                        <div class="mb-3">
                          <label class="form-label" for="review-name">Your name<span class="text-danger">*</span></label>
                          <input class="form-control" name="name" type="text" required id="review-name" @guest @else  value="{{ Auth::user()->name }}" @endguest >
                          <div class="invalid-feedback">Please enter your name!</div><small class="form-text text-muted">Will be displayed on the comment.</small>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="review-email">Your email<span class="text-danger">*</span></label>
                          <input class="form-control" type="email" name="email" required id="review-email" @guest @else  value="{{ Auth::user()->email }}" @endguest>
                          <div class="invalid-feedback">Please provide valid email address!</div><small class="form-text text-muted">Authentication only - we won't spam you.</small>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="review-rating">Rating<span class="text-danger">*</span></label>
                          <select class="form-select" required id="review-rating" name="quality">
                            <option value="" disabled class="bg-secondary" selected>Choose rating</option>
                            <option  value="5">5 stars</option>
                            <option value="4">4 stars</option>
                            <option value="3">3 stars</option>
                            <option value="2">2 stars</option>
                            <option value="1">1 star</option>
                          </select>
                          <div class="invalid-feedback">Please choose rating!</div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="review-text">Summary<span class="text-danger">*</span></label>
                          <textarea class="form-control" rows="2" required id="review-text" name="summary"></textarea>
                          <div class="invalid-feedback">Please write a review!</div><small class="form-text text-muted">Your review must be at least 10 characters.</small>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="review-text">Review<span class="text-danger">*</span></label>
                          <textarea class="form-control" rows="6" required id="review-text" name="comment"></textarea>
                          <div class="invalid-feedback">Please write a review!</div><small class="form-text text-muted">Your review must be at least 50 characters.</small>
                        </div>

                        <div class="mb-4">
                          <label class="form-label" for="review-cons">Upload image <span class="text-muted fs-xs">(optional)</span></label>
                          <!-- Drag and drop file upload -->
                          <div class="file-drop-area">
                            <div class="file-drop-icon ci-cloud-upload"></div>
                            <span class="file-drop-message">Drag and drop here to upload</span>
                            <input type="file" class="file-drop-input" name="image">
                            <button type="button" class="file-drop-btn btn btn-primary btn-sm">Or select file</button>
                          </div>
                        </div>
                        @guest
                        <button class="btn btn-primary btn-shadow d-block w-100 disabled" type="submit">Login your account first</button>
                        @else
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Submit a Review</button>
                        @endguest
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Reviews tab-->

            </div>
          </div>
        </div>
      </div>
      <!-- Product description-->
      {{-- <div class="container pt-lg-3 pb-4 pb-sm-5">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h2 class="h3 pb-2">
              @if(session()->get('language') == 'filipino')
              {{ $product->short_descp_fil }}
              @else {{  $product->short_descp_en }}
              @endif
            </h2>


            <p class="text">@if(session()->get('language') == 'filipino')
              {!! $product->long_descp_fil !!} @else {!! $product->long_descp_en !!} @endif</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>

            <img src="{{ asset('frontendv2/assets/img/shop/single/prod-img2.jpg') }}" alt="Product description">
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.</p>
          </div>
        </div>
      </div> --}}
      <hr class="mb-5">
      <!-- Product carousel (You may also like) Related Products -->
      <div class="container pt-lg-2 pb-5 mb-md-3">
        <h2 class="h3 text-center pb-4">You may also like</h2>
        <div class="tns-carousel tns-controls-static tns-controls-outside">
          <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">

            @foreach($relatedProduct as $product)
            <!-- Product-->
            <div>
              <div class="card product-card card-static slide-in-bck-center">
                @php
                $amount = $product->selling_price - $product->discount_price;
                $discount = ($amount/$product->selling_price) * 100;
                @endphp

                @if($product->discount_price == NULL)
                <span class="badge bg-success badge-shadow">
                    New
                </span> @else
                <span class="badge bg-danger badge-shadow">

                   <i class="ci-discount"></i> Sale {{ round($discount) }}%
                </span>
                @endif

                <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img src="{{ asset($product->product_thumbnail) }}" alt="Product"></a>
                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'filipino') {{ $product->category->category_name_fil }} @else {{ $product->category->category_name_en }} @endif</a>
                  <h3 class="product-title fs-sm"><a href="#">
                    @if(session()->get('language') == 'filipino') {{ $product->product_name_fil }} @else {{ $product->product_name_en }} @endif</a></h3>
                  <div class="d-flex justify-content-between">

                    @if($product->discount_price == NULL)

                    <div class="product-price"><span class="text-accent fs-sm">
                            ₱ {{ $product->selling_price }} <small>.00</small>
                        </span></div>

                    @else
                    <div class="product-price">
                        <del class="fs-xs text-muted"> ₱ {{ $product->selling_price }}
                            <small>.00</small></del>
                        <span class="fs-sm text-accent"> ₱ {{ $product->discount_price }}
                            <small>.00</small></span>

                    </div>

                    @endif



                    @php
                    $reviewcount =
                    App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                    $average =
                    App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                    @endphp



                    @if($average == 0 || $average < 0) <a
                        href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled "></i><i
                                class="star-rating-icon ci-star-filled "></i><i
                                class="star-rating-icon ci-star-filled "></i><i
                                class="star-rating-icon ci-star-filled "></i><i
                                class="star-rating-icon ci-star-filled "></i>
                        </div>
                        {{-- <span class="review">{{ count($reviewcount) }}
                        Review(s)</span> --}}
                        </a>
                        @elseif($average == 1 || $average < 2) <a
                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                    class="star-rating-icon ci-star-filled "></i><i
                                    class="star-rating-icon ci-star-filled "></i><i
                                    class="star-rating-icon ci-star-filled "></i><i
                                    class="star-rating-icon ci-star-filled "></i>
                            </div>
                            {{-- <span class="review">{{ count($reviewcount) }}
                            Review(s)</span> --}}
                            </a>
                            @elseif($average == 2 || $average < 3) <a
                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                <div class="star-rating"><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled active"></i><i
                                        class="star-rating-icon ci-star-filled "></i><i
                                        class="star-rating-icon ci-star-filled "></i><i
                                        class="star-rating-icon ci-star-filled "></i>
                                </div>
                                {{-- <span class="review">{{ count($reviewcount) }}
                                Review(s)</span> --}}
                                </a>

                                @elseif($average == 3 || $average < 4) <a
                                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                    <div class="star-rating"><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled "></i><i
                                            class="star-rating-icon ci-star-filled"></i>
                                    </div>
                                    {{-- <span class="review">{{ count($reviewcount) }}
                                    Review(s)</span> --}}
                                    </a>


                                    @elseif($average == 4 || $average < 5) <a
                                        href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                        <div class="star-rating"><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled "></i>
                                        </div>
                                        {{-- <span class="review">{{ count($reviewcount) }}
                                        Review(s)</span> --}}
                                        </a>
                                        @elseif($average == 5 || $average < 5) <div class="reviews">
                                            <a
                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                <div class="star-rating"><i
                                                        class="star-rating-icon ci-star-filled active"></i><i
                                                        class="star-rating-icon ci-star-filled active"></i><i
                                                        class="star-rating-icon ci-star-filled active"></i><i
                                                        class="star-rating-icon ci-star-filled active"></i><i
                                                        class="star-rating-icon ci-star-filled active"></i>
                                                </div>
                                                {{-- <span class="review">{{ count($reviewcount) }}
                                                Review(s)</span> --}}
                                            </a>
                </div>

                @endif


                  </div>
                </div>
              </div>
            </div>
            <!-- End Product-->
            @endforeach

          </div>
        </div>
      </div>













{{-- Color Options --}}
@include('frontendv2.common.colorOptions')
{{-- End Color Options --}}



@endsection
