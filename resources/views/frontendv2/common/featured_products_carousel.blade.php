{{-- Product Category Area / Featured Product--}}

<head>
    <style>
         @media screen and (max-width: 767px) {

        .truncated {
          width: 120px;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
      }
    }
    </style>
  </head>


<section class="container pt-lg-3 mb-4 mb-sm-5">

    {{-- <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 me-2">Shop by Category</h2>
        <div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="shop-grid-ls.html">More products<i
                    class="ci-arrow-right ms-1 me-n1"></i></a></div>
    </div> --}}

    <div class="row">
        <!-- Banner with controls-->
        <div class="col-md-5">
            <div class="d-flex flex-column h-100 overflow-hidden rounded-3" style="background-color: #f6f8fb;">
                <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
                    <div>
                        <h3 class="mb-3 text-shadow-drop-center">Featured Products</h3>
                        <a class="fs-md " href="{{ route('shop.page') }}"> <span class="bounce-right">Shop now</span> 
                            <i class="ci-arrow-right fs-xs align-middle ms-1"></i></a>
                        
                    </div>

                    <div class="tns-carousel-controls" id="for-women">
                        <button type="button"><i class="ci-arrow-left"></i></button>
                        <button type="button"><i class="ci-arrow-right"></i></button>
                    </div>
                </div><a class="d-none d-md-block mt-auto" href="{{ route('shop.page') }}"><img class="d-block w-100"
                    src="{{ asset("frontendv2/assets/img/home/categories/cat-lg02.jpg") }}"
                        alt="For Women"></a>
            </div>
        </div>
        <!-- Product grid (carousel)-->
        <div class="col-md-7 pt-4 pt-md-0">
            <div class="tns-carousel">
                <div class="tns-carousel-inner  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                    data-carousel-options='{"nav": false, "controlsContainer": "#for-women", "mode": "carousel", "gutter":20}' style="transition-duration: 0s; transform: translate3d(-33.3333%, 0px, 0px);">


                    @foreach ($featured->chunk(6) as $product)

                    <!-- Carousel item-->
                    <div class="@if ($loop->first) active @endif">

                        <div class="row mx-n2">

                            @foreach ($product as $item)

                            

                            @if($loop->iteration < 5) <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                                <div class="card product-card card-static product-section">

                                                    @php
                $amount = $item->selling_price - $item->discount_price;
                $discount = ($amount/$item->selling_price) * 100;
                @endphp

                @if($item->discount_price == NULL)
                <span class="badge bg-success badge-shadow">
                    New
                </span> @else
                <span class="badge bg-danger badge-shadow">
                   
                   <i class="ci-discount"></i> Sale {{ round($discount) }}% 
                </span>
                @endif
                                    {{-- <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                        data-bs-placement="left" title="Add to wishlist"><i
                                            class="ci-heart"></i></button> --}}
                                    <a class="card-img-top d-block overflow-hidden" href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
                                        <!-- Product card alt (Downloadable) -->
                                        <div class="card product-card-alt">
                                            <div class="product-thumb">
                                                <button class="btn-wishlist btn-sm heartbeat" style="z-index: 5" type="button" data-bs-toggle="tooltip" id="{{ $item->id }}" data-bs-placement="left" onclick="addToWishList(this.id)"><i class="ci-heart"></i></button>
                                                <div class="product-card-actions">
                                                    <a class="btn btn-light btn-icon btn-shadow fs-base mx-2"
                                                    type="button" id="{{ $item->id }}" onclick="addToCompare(this.id)"><i class="ci-compare me-1"></i>
                                                    </a>

                                                    

                                                    <button class="btn btn-light btn-icon btn-shadow fs-base mx-2"
                                                    type="submit" 
                                                    href="#quick-view-electro" data-bs-toggle="modal" data-bs-target="#quick-view-electro" id="{{ $item->id }}" onclick="productView(this.id)">
                                                        <i class="ci-cart"></i>
                                                    </button>
                                                </div>
                                                <a class="product-thumb-overlay" href="#"></a>
                                                <img src="{{ asset($item->product_thumbnail) }}" alt="Product">
                                            </div>

                                        </div>
                                    </a>

                                    <div class="card-body py-2">
                                        
                                            @php
                                            $reviewcount =
                                            App\Models\Review::where('product_id',$item->id)->where('status',1)->latest()->get();
                                            $average =
                                            App\Models\Review::where('product_id',$item->id)->where('status',1)->avg('rating');
                                            @endphp

                                            @if($average == 0 || $average < 0) <a
                                                href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
                                                <div class="star-rating"><i
                                                        class="star-rating-icon ci-star-filled "></i><i
                                                        class="star-rating-icon ci-star-filled "></i><i
                                                        class="star-rating-icon ci-star-filled "></i><i
                                                        class="star-rating-icon ci-star-filled "></i><i
                                                        class="star-rating-icon ci-star-filled "></i>
                                                </div>
                                                {{-- <span class="review">{{ count($reviewcount) }}
                                                Review(s)</span> --}}
                                                </a>
                                                @elseif($average == 1 || $average < 2) <a
                                                    href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
                                                    <div class="star-rating"><i
                                                            class="star-rating-icon ci-star-filled active"></i><i
                                                            class="star-rating-icon ci-star-filled "></i><i
                                                            class="star-rating-icon ci-star-filled "></i><i
                                                            class="star-rating-icon ci-star-filled "></i><i
                                                            class="star-rating-icon ci-star-filled "></i>
                                                    </div>
                                                    {{-- <span class="review">{{ count($reviewcount) }}
                                                    Review(s)</span> --}}
                                                    </a>
                                                    @elseif($average == 2 || $average < 3) <a
                                                        href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
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
                                                            href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
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
                                                                href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
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
                                                                @elseif($average == 5 || $average < 5) <div
                                                                    class="reviews">
                                                                    <a
                                                                        href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
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
                                        
                                        @foreach ($categories->chunk(6) as $category)
                                        @foreach ($category as $cat)
                                        @if ($item->category_id == $cat->id)
                                        <a class="product-meta d-block fs-xs pb-1 truncated"
                                            href="#">{{ $cat->category_name_en }}</a>
                                        @endif
                                        @endforeach
                                        @endforeach


                                        <h3 class="product-title fs-sm truncated"><a
                                                href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">{{ Str::of($item->product_name_en)->limit(15)}}</a></h3>
                                        <div class="d-flex justify-content-between">
                                            
                                            
                                            <div class="product-price">

                                                @php
                                                $amount = $item->selling_price - $item->discount_price;
                                                $discount = ($amount/$item->selling_price) * 100;
                                                @endphp

                                                @if($item->discount_price == NULL)
                                                <span
                                                    class="text-accent">₱{{$item->selling_price}}.<small>00</small></span>
                                                @else
                                                <span
                                                    class="text-accent">₱{{$item->discount_price}}.<small>00</small></span>
                                                 <del
                                                    class="fs-xs text-muted">₱{{$item->selling_price}}.<small>00</small></del>
                                                
                                                @endif



                                                {{-- <span class="text-accent"> ₱{{ $item->pro }}.<small>00</small></span>
                                                --}}


                                            </div>






                                    </div>


                                </div>
                        </div>

                        @endif

                        @if ($loop->iteration == 5)

                        <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4 d-none d-lg-block">


                            <div class="card product-card card-static product-section">
                                @php
                                $amount = $item->selling_price - $item->discount_price;
                                $discount = ($amount/$item->selling_price) * 100;
                                @endphp
                
                                @if($item->discount_price == NULL)
                                <span class="badge bg-success badge-shadow">
                                    New
                                </span> @else
                                <span class="badge bg-danger badge-shadow">
                                   
                                   <i class="ci-discount"></i> Sale {{ round($discount) }}% 
                                </span>
                                @endif
                                {{-- <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button> --}}
                                <a class="card-img-top d-block overflow-hidden" href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
                                    <!-- Product card alt (Downloadable) -->
                                    <div class="card product-card-alt">
                                        <div class="product-thumb">
                                            <button class="btn-wishlist btn-sm heartbeat" style="z-index: 5"  type="button" data-bs-toggle="tooltip" id="{{ $item->id }}" data-bs-placement="left" onclick="addToWishList(this.id)"><i class="ci-heart"></i></button>
                                            <div class="product-card-actions">
                                                <a class="btn btn-light btn-icon btn-shadow fs-base mx-2"
                                                type="button" id="{{ $item->id }}" onclick="addToCompare(this.id)"><i class="ci-compare me-1"></i>
                                                </a>
                                                <button class="btn btn-light btn-icon btn-shadow fs-base mx-2"
                                                type="submit" 
                                                href="#quick-view-electro" data-bs-toggle="modal" data-bs-target="#quick-view-electro" id="{{ $item->id }}" onclick="productView(this.id)">
                                                    <i class="ci-cart"></i>
                                                </button>
                                            </div>
                                            <a class="product-thumb-overlay" href="#"></a>
                                            <img src="{{ asset($item->product_thumbnail) }}" alt="Product">
                                        </div>

                                    </div>
                                </a>

                                <div class="card-body py-2">
                                    
                                                                                @php
                                            $reviewcount =
                                            App\Models\Review::where('product_id',$item->id)->where('status',1)->latest()->get();
                                            $average =
                                            App\Models\Review::where('product_id',$item->id)->where('status',1)->avg('rating');
                                            @endphp

                                            @if($average == 0 || $average < 0) <a
                                                href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
                                                <div class="star-rating"><i
                                                        class="star-rating-icon ci-star-filled "></i><i
                                                        class="star-rating-icon ci-star-filled "></i><i
                                                        class="star-rating-icon ci-star-filled "></i><i
                                                        class="star-rating-icon ci-star-filled "></i><i
                                                        class="star-rating-icon ci-star-filled "></i>
                                                </div>
                                                {{-- <span class="review">{{ count($reviewcount) }}
                                                Review(s)</span> --}}
                                                </a>
                                                @elseif($average == 1 || $average < 2) <a
                                                    href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
                                                    <div class="star-rating"><i
                                                            class="star-rating-icon ci-star-filled active"></i><i
                                                            class="star-rating-icon ci-star-filled "></i><i
                                                            class="star-rating-icon ci-star-filled "></i><i
                                                            class="star-rating-icon ci-star-filled "></i><i
                                                            class="star-rating-icon ci-star-filled "></i>
                                                    </div>
                                                    {{-- <span class="review">{{ count($reviewcount) }}
                                                    Review(s)</span> --}}
                                                    </a>
                                                    @elseif($average == 2 || $average < 3) <a
                                                        href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
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
                                                            href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
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
                                                                href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
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
                                                                @elseif($average == 5 || $average < 5) <div
                                                                    class="reviews">
                                                                    <a
                                                                        href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
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
                                    
                                    @foreach ($categories->chunk(6) as $category)
                                    @foreach ($category as $cat)
                                    @if ($item->category_id == $cat->id)
                                    <a class="product-meta d-block fs-xs pb-1 truncated" href="#">{{ $cat->category_name_en }}</a>
                                    @endif
                                    @endforeach
                                    @endforeach


                                    <h3 class="product-title fs-sm truncated"><a
                                            href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">{{$item->product_name_en}}</a></h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="product-price">

                                            @php
                                            $amount = $item->selling_price - $item->discount_price;
                                            $discount = ($amount/$item->selling_price) * 100;
                                            @endphp

                                            @if($item->discount_price == NULL)
                                            <span class="text-accent">₱{{$item->selling_price}}.<small>00</small></span>
                                            @else
                                            <span
                                                class="text-accent">₱{{$item->discount_price}}.<small>00</small></span>
                                             <del
                                                class="fs-xs text-muted">${{$item->selling_price}}.<small>00</small></del>
                                            
                                            @endif



                                            {{-- <span class="text-accent"> ₱{{ $item->pro }}.<small>00</small></span>
                                            --}}


                                        </div>





                                    {{-- <div class="star-rating">
                                            <i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-half active"></i><i
                                                class="star-rating-icon ci-star">
                                            </i>
                                        </div> --}}

                                </div>


                            </div>
                        </div>

                        @endif

                        @if ($loop->iteration == 6)

                        <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4 d-none d-lg-block">


                            <div class="card product-card card-static product-section">
                                @php
                                $amount = $item->selling_price - $item->discount_price;
                                $discount = ($amount/$item->selling_price) * 100;
                                @endphp
                
                                @if($item->discount_price == NULL)
                                <span class="badge bg-success badge-shadow">
                                    New
                                </span> @else
                                <span class="badge bg-danger badge-shadow">
                                   
                                   <i class="ci-discount"></i> Sale {{ round($discount) }}% 
                                </span>
                                @endif
                                {{-- <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button> --}}
                                <a class="card-img-top d-block overflow-hidden" href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
                                    <!-- Product card alt (Downloadable) -->
                                    <div class="card product-card-alt">
                                        <div class="product-thumb">
                                            <button class="btn-wishlist btn-sm heartbeat" style="z-index: 5"  type="button" data-bs-toggle="tooltip" id="{{ $item->id }}" data-bs-placement="left" onclick="addToWishList(this.id)"><i class="ci-heart"></i></button>
                                            <div class="product-card-actions">
                                                <a class="btn btn-light btn-icon btn-shadow fs-base mx-2"
                                                    href="#quick-view-electro" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-electro" id="{{ $item->id }}"
                                                    onclick="productView(this.id)">
                                                    <i class="ci-eye"></i>
                                                </a>


                                                	<input type="hidden" id="product_id" value="{{ $item->id }}" min="1">
                                                <button class="btn btn-light btn-icon btn-shadow fs-base mx-2"
                                                    type="submit" 
                    onclick="addToCart(this.id)" id="{{ $item->id }}">
                                                    <i class="ci-cart"></i>
                                                </button>
                                            </div>
                                            <a class="product-thumb-overlay" href="#"></a>
                                            <img src="{{ asset($item->product_thumbnail) }}" alt="Product">
                                        </div>

                                    </div>
                                </a>

                                <div class="card-body py-2">
                                    
                                                                                @php
                                            $reviewcount =
                                            App\Models\Review::where('product_id',$item->id)->where('status',1)->latest()->get();
                                            $average =
                                            App\Models\Review::where('product_id',$item->id)->where('status',1)->avg('rating');
                                            @endphp

                                            @if($average == 0 || $average < 0) <a
                                                href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
                                                <div class="star-rating"><i
                                                        class="star-rating-icon ci-star-filled "></i><i
                                                        class="star-rating-icon ci-star-filled "></i><i
                                                        class="star-rating-icon ci-star-filled "></i><i
                                                        class="star-rating-icon ci-star-filled "></i><i
                                                        class="star-rating-icon ci-star-filled "></i>
                                                </div>
                                                {{-- <span class="review">{{ count($reviewcount) }}
                                                Review(s)</span> --}}
                                                </a>
                                                @elseif($average == 1 || $average < 2) <a
                                                    href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
                                                    <div class="star-rating"><i
                                                            class="star-rating-icon ci-star-filled active"></i><i
                                                            class="star-rating-icon ci-star-filled "></i><i
                                                            class="star-rating-icon ci-star-filled "></i><i
                                                            class="star-rating-icon ci-star-filled "></i><i
                                                            class="star-rating-icon ci-star-filled "></i>
                                                    </div>
                                                    {{-- <span class="review">{{ count($reviewcount) }}
                                                    Review(s)</span> --}}
                                                    </a>
                                                    @elseif($average == 2 || $average < 3) <a
                                                        href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
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
                                                            href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
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
                                                                href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
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
                                                                @elseif($average == 5 || $average < 5) <div
                                                                    class="reviews">
                                                                    <a
                                                                        href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">
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
                                    
                                    @foreach ($categories->chunk(6) as $category)
                                    @foreach ($category as $cat)
                                    @if ($item->category_id == $cat->id)
                                    <a class="product-meta d-block fs-xs pb-1 truncated" href="#">{{ $cat->category_name_en }}</a>
                                    @endif
                                    @endforeach
                                    @endforeach


                                    <h3 class="product-title fs-sm truncated"><a
                                            href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">{{$item->product_name_en}}</a></h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="product-price">

                                            @php
                                            $amount = $item->selling_price - $item->discount_price;
                                            $discount = ($amount/$item->selling_price) * 100;
                                            @endphp

                                            @if($item->discount_price == NULL)
                                            <span class="text-accent">₱{{$item->selling_price}}.<small>00</small></span>
                                            @else
                                            <span
                                                class="text-accent">₱{{$item->discount_price}}.<small>00</small></span>
                                            <del
                                                class="fs-xs text-muted">${{$item->selling_price}}.<small>00</small></del>
                                            
                                            @endif



                                            {{-- <span class="text-accent"> ₱{{ $item->pro }}.<small>00</small></span>
                                            --}}


                                        </div>


 




                                    {{-- <div class="star-rating">
                                            <i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-filled active"></i><i
                                                class="star-rating-icon ci-star-half active"></i><i
                                                class="star-rating-icon ci-star">
                                            </i>
                                        </div> --}}

                                </div>


                            </div>
                        </div>

                        @endif








                    </div>
                    @endforeach


                </div>
            </div>
            <!-- Carousel item-->

            @endforeach

        </div>


    </div>
    </div>
    </div>




</section>



{{-- End Product Category Area --}}
