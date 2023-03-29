{{-- Product Category Area --}}


{{-- <section class="container pt-lg-3 mb-4 mb-sm-5">

    <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 me-2">Shop by Category</h2>
        <div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="shop-grid-ls.html">More products<i
                    class="ci-arrow-right ms-1 me-n1"></i></a></div>
    </div>

    @php
    $allCategories = App\Models\Product::where('status',1)->orderBy('id','DESC')->get();
    $count = count($allCategories);
    @endphp


    <div class="tns-carousel tns-controls-static tns-controls-outside">
        <div class="tns-carousel-inner"
            data-carousel-options='{"items": {{ $count }}, "nav": false, "responsive":
{"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":3, "gutter": 20}, "1100":{"gutter": 24}}}'>
@foreach ($products_category as $product)

<!-- Product card alt (Downloadable) -->
<div class="card product-card-alt">
    <div class="product-thumb">
        <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart"></i></button>
        <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2"
                href="marketplace-single.html"><i class="ci-eye"></i></a>
            <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"><i
                    class="ci-bag"></i></button>
        </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img
            src="{{ asset($product->product_thumbnail) }}" alt="Product">
    </div>
    <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
            <div class="text-muted fs-xs me-1">by <a class="product-meta fw-medium" href="#">Createx Std.
                </a>in <a class="product-meta fw-medium" href="#">Graphics</a></div>
            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i>
            </div>
        </div>
        <h3 class="product-title fs-sm mb-2"><a href="marketplace-single.html">Flat-line E-Commerce Icons
                (AI)</a></h3>
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i>26<span class="fs-xs ms-1">Sales</span>
            </div>
            <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">$18.<small>00</small></div>
        </div>
    </div>
</div>
@endforeach

</div>
</div>




</section> --}}


<section class="container pt-lg-3 mb-4 mb-sm-5">

    {{-- Heading --}}
<div class="d-flex flex-wrap mb-3">
      <h2 class="h3 mb-0">Products in&nbsp;</h2>
    <div class="dropdown d-inline-block" data-bs-toggle="select"><a class="dropdown-toggle h3 text-primary" href="#" data-bs-toggle="dropdown" aria-expanded="false"><span class="dropdown-toggle-label blink-2">All categories</span></a>
        <input type="hidden" name="trending-category">
        <div class="dropdown-menu dropdown-menu-end" style="">
          <div class="nav">

          <a class="dropdown-item active" data-bs-toggle="tab" role="tab" href="#all"><span class="dropdown-item-label">All categories</span></a>
          @foreach($categories as $category)
          <a class="dropdown-item nav-item" data-bs-toggle="tab" role="tab" href="#category{{ $category->id }}">
            <span class="dropdown-item-label">
              {{$category->category_name_en }}
            </span>
          </a>
          @endforeach
          </div>

        </div>
    </div>
</div>
    {{-- End Heading --}}

            <!-- Nav tabs -->
            {{-- <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a href="#all" class="nav-link active" data-bs-toggle="tab" role="tab">
                  <i class="ci-home me-2"></i>
                  All Categories
                </a>
              </li>
              @foreach($categories as $category)
              <li class="nav-item">
                <a href="#category{{ $category->id }}" class="nav-link" data-bs-toggle="tab" role="tab">
                  <i class="ci-home me-2"></i>
                  {{ $category->category_name_en }}
                </a>
              </li>
              @endforeach
            </ul> --}}
            {{-- End Nav Tabs --}}

      {{-- Tab Content --}}
      <div class="tab-content">

{{-- ALL Categories Tab Panel --}}
    <div class="tab-pane fade show active" id="all" role="tabpanel">

    <div class="tns-carousel tns-controls-static tns-controls-outside tns-dots-enabled pt-2">
        <div class="tns-carousel-inner"
            {{-- data-carousel-options="{&quot;items&quot;: 2, &quot;gutter&quot;: 16, &quot;controls&quot;: true, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1}, &quot;480&quot;:{&quot;items&quot;:2}, &quot;720&quot;:{&quot;items&quot;:3}, &quot;991&quot;:{&quot;items&quot;:2}, &quot;1140&quot;:{&quot;items&quot;:3}, &quot;1300&quot;:{&quot;items&quot;:4}, &quot;1500&quot;:{&quot;items&quot;:5}}}"> --}}
            data-carousel-options='{"nav":true, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":3, "gutter": 20}, "1100":{"items":5, "gutter": 18}}}'>





        <!-- Product-->
            @foreach($products_category as $product)
            <div>
                <div class="card product-card-alt product-section">
                    {{-- @php
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ($amount/$product->selling_price) * 100;
                    @endphp

                    @if($product->discount_price == NULL)
                    <span class="badge bg-success badge-shadow mt-2">
                        New
                    </span> @else
                    <span class="badge bg-danger badge-shadow mt-2">

                       <i class="ci-discount"></i> Sale {{ round($discount) }}%
                    </span>
                    @endif --}}


                    {{-- Product Thumbnail --}}
                    <div class="product-thumb">



                        <button class="btn-wishlist btn-sm heartbeat" type="button" data-bs-toggle="tooltip" id="{{ $product->id }}" data-bs-placement="left" onclick="addToWishList(this.id)"><i class="ci-star"></i></button>

                        {{-- Product Actions --}}
                        <div class="product-card-actions">

                            {{-- <a class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button" id="{{ $product->id }}" onclick="addToCompare(this.id)"><i class="ci-compare me-1"></i>
                            </a> --}}
                            <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="submit"
                            href="#quick-view-electro" data-bs-toggle="modal" data-bs-target="#quick-view-electro" id="{{ $product->id }}" onclick="productView(this.id)"><i
                                    class="ci-bag"></i></button>
                        </div>
                        {{-- End Product Action --}}
                        <a class="product-thumb-overlay" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"></a><img
                            src="{{ asset($product->product_thumbnail) }}" alt="Product">
                    </div>
                    {{-- End Product Thumbnail --}}


                    {{-- Card Body --}}
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                            {{-- Product Category --}}
                            <div class="text-muted fs-xs me-1">
                                <a class="product-meta fw-medium" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                    @foreach ($categories as $category)
                                    @if ($category->id == $product->category_id)

                                    @php
                                    $truncated = Str::of( $category->category_name_en )->limit(15);

                                    @endphp

                                    {{ $truncated }}
                                    @endif
                                    @endforeach

                                </a>
                            </div>
                            {{-- End Product Category --}}

                            {{-- Product Rating --}}
                            {{-- <div class="star-rating">
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

                                    </a>
                                    @elseif($average == 1 || $average < 2) <a
                                        href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                        <div class="star-rating"><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled "></i><i
                                                class="star-rating-icon ci-star-filled "></i><i
                                                class="star-rating-icon ci-star-filled "></i><i
                                                class="star-rating-icon ci-star-filled "></i>
                                        </div>

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

                                                    </a>
                                                    @elseif($average == 5 || $average < 5)
                                                        <a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                            <div class="star-rating"><i
                                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                                    class="star-rating-icon ci-star-filled active"></i>
                                                            </div>

                                                        </a>

                            @endif
                            </div> --}}
                            {{-- End Product Rating --}}



                        </div>
                    </div>
                    {{-- End Card Body --}}


                    @php
                    $truncatedPname = $product->product_name_en;
                    @endphp


                    <h3 class="product-title fs-sm mb-2"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">{{ $truncatedPname }}</a></h3>

                  {{-- Product Name, Price, and Review count --}}
                  <div class="d-flex flex-wrap justify-content-between align-items-center">

                    {{-- Review Count --}}
                        {{-- <div class="fs-sm me-2"><i class="ci-thumb-up-filled text-muted me-1"></i>
                            {{ count($reviewcount) }}
                            </span><span class="fs-xs ms-1">review(s)</span>
                        </div> --}}
                    {{-- End Review Count --}}

                    {{-- Product Price --}}
                        {{-- <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">
                            @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = ($amount/$product->selling_price) * 100;
                            @endphp

                            @if($product->discount_price == NULL)
                            <span class="text-accent">₱{{$product->selling_price}}.<small>00</small></span>
                            @else
                            <span class="text-accent">₱{{$product->discount_price}}.<small>00</small></span>

                            @endif
                        </div> --}}
                    {{-- End Product Price --}}


                  </div>
                  {{-- End Product Name, Price, and Review count --}}


                </div>

            </div>
            @endforeach
        <!-- End Product-->


      </div> {{-- End Carousel Inner --}}

    </div> {{-- End Carousel --}}

  </div>
{{-- ALL Categories End Tab Panel --}}



      {{-- ANCHOR INSERTED --}}

      @foreach($categories as $category)

            {{-- ALL Categories Tab Panel --}}
            <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel">

              <div class="tns-carousel tns-controls-static tns-controls-outside tns-dots-enabled pt-2">
                  <div class="tns-carousel-inner"
                      data-carousel-options='{"nav":true, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":3, "gutter": 20}, "1100":{"items":5, "gutter": 18}}}'>


          {{-- "items": 2, "gutter": 16, "controls": true, "autoHeight": true, "responsive": {"0":{"items":1}} --}}


            @php
              $catwiseProduct = App\Models\Product::where('category_id',$category->id)->where('status',1)->orderBy('id','DESC')->get();

            @endphp

                  <!-- Product-->
                      @forelse($catwiseProduct as $product)
                      <div>
                          <div class="card product-card-alt product-section">
                            {{-- @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = ($amount/$product->selling_price) * 100;
                            @endphp

                            @if($product->discount_price == NULL)
                            <span class="badge bg-success badge-shadow mt-2">
                                New
                            </span> @else
                            <span class="badge bg-danger badge-shadow mt-2">

                               <i class="ci-discount"></i> Sale {{ round($discount) }}%
                            </span>
                            @endif --}}

                              {{-- Product Thumbnail --}}
                              <div class="product-thumb">
                                <button class="btn-wishlist btn-sm heartbeat" type="button" data-bs-toggle="tooltip" id="{{ $product->id }}" data-bs-placement="left" onclick="addToWishList(this.id)"><i class="ci-heart"></i></button>
                                  {{-- Product Actions --}}
                                  <div class="product-card-actions">
                                      <a class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button" id="{{ $product->id }}" onclick="addToCompare(this.id)"><i class="ci-compare me-1"></i>
                                      </a>
                                      <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="submit"
                                      href="#quick-view-electro" data-bs-toggle="modal" data-bs-target="#quick-view-electro" id="{{ $product->id }}" onclick="productView(this.id)"><i
                                              class="ci-bag"></i></button>
                                  </div>
                                  {{-- End Product Action --}}
                                  <a class="product-thumb-overlay" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"></a><img
                                      src="{{ asset($product->product_thumbnail) }}" alt="Product">
                              </div>
                              {{-- End Product Thumbnail --}}


                              {{-- Card Body --}}
                              <div class="card-body">
                                  <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                      {{-- Product Category --}}
                                      <div class="text-muted fs-xs me-1">
                                          <a class="product-meta fw-medium" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                              @foreach ($categories as $category)
                                              @if ($category->id == $product->category_id)

                                              @php
                                              $truncated = Str::of( $category->category_name_en )->limit(15);

                                              @endphp

                                              {{ $truncated }}
                                              @endif
                                              @endforeach

                                          </a>
                                      </div>
                                      {{-- End Product Category --}}

                                      {{-- Product Rating --}}
                                      {{-- <div class="star-rating">
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

                                              </a>
                                              @elseif($average == 1 || $average < 2) <a
                                                  href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                  <div class="star-rating"><i
                                                          class="star-rating-icon ci-star-filled active"></i><i
                                                          class="star-rating-icon ci-star-filled "></i><i
                                                          class="star-rating-icon ci-star-filled "></i><i
                                                          class="star-rating-icon ci-star-filled "></i><i
                                                          class="star-rating-icon ci-star-filled "></i>
                                                  </div>

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

                                                              </a>
                                                              @elseif($average == 5 || $average < 5)
                                                                  <a
                                                                      href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                                      <div class="star-rating"><i
                                                                              class="star-rating-icon ci-star-filled active"></i><i
                                                                              class="star-rating-icon ci-star-filled active"></i><i
                                                                              class="star-rating-icon ci-star-filled active"></i><i
                                                                              class="star-rating-icon ci-star-filled active"></i><i
                                                                              class="star-rating-icon ci-star-filled active"></i>
                                                                      </div>

                                                                  </a>

                                      @endif
                                      </div> --}}
                                      {{-- End Product Rating --}}



                                  </div>
                              </div>
                              {{-- End Card Body --}}


                              @php
                              $truncatedPname = Str::of( $product->product_name_en )->limit(15);
                              @endphp


                              <h3 class="product-title fs-sm mb-2"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">{{ $truncatedPname }}</a></h3>

                            {{-- Product Name, Price, and Review count --}}
                            <div class="d-flex flex-wrap justify-content-between align-items-center">

                              {{-- Review Count --}}
                                  {{-- <div class="fs-sm me-2"><i class="ci-thumb-up-filled text-muted me-1"></i>
                                      {{ count($reviewcount) }}
                                      </span><span class="fs-xs ms-1">review(s)</span>
                                  </div> --}}
                              {{-- End Review Count --}}

                              {{-- Product Price --}}
                                  {{-- <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">
                                      @php
                                      $amount = $product->selling_price - $product->discount_price;
                                      $discount = ($amount/$product->selling_price) * 100;
                                      @endphp

                                      @if($product->discount_price == NULL)
                                      <span class="text-accent">₱{{$product->selling_price}}.<small>00</small></span>
                                      @else
                                      <span class="text-accent">₱{{$product->discount_price}}.<small>00</small></span>

                                      @endif
                                  </div> --}}
                              {{-- End Product Price --}}


                            </div>
                            {{-- End Product Name, Price, and Review count --}}


                          </div>

                      </div>
                      @empty

                      <div class="alert alert-danger d-flex" role="alert">
                        <div class="alert-icon">
                          <i class="ci-close-circle"></i>
                        </div>
                        <div>No Product Found</div>
                      </div>

                      @endforelse
                  <!-- End Product-->


                </div> {{-- End Carousel Inner --}}

              </div> {{-- End Carousel --}}


            </div>
          {{-- ALL Categories End Tab Panel --}}

      @endforeach

      {{-- ANCHOR INSERTED --}}





    </div>
    {{-- End Tab Content --}}

</section>

{{-- End Product Category Area --}}
