{{-- Product Widgets Area --}}

<section class="container pb-4 pb-md-5">
    <div class="row">
        <!-- Bestsellers / Hot Deals--> 
        <div class="col-md-4 col-sm-6 mb-2 py-3">
            <div class="widget">
                <h3 class="widget-title">Bestsellers</h3>

                @foreach($hot_deals as $product)

                @if($loop->iteration == 1)
                <div class="d-flex align-items-center pb-2 border-bottom product-section"><a class="d-block flex-shrink-0"
                        href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">

                @elseif($loop->iteration == 4)
                <div class="d-flex align-items-center py-2 product-section"><a class="d-block flex-shrink-0"
                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                @else
                <div class="d-flex align-items-center py-2 border-bottom product-section"><a class="d-block flex-shrink-0"
                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                @endif
                
                        
                        <img
                            src="{{ asset($product->product_thumbnail) }}" width="64"
                            alt="Product"></a>
                    <div class="ps-2">
                        <h6 class="widget-product-title"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'filipino') {{ $product->product_name_fil }} @else {{ $product->product_name_en }} @endif</a>
                        </h6>

                        @php
                        $amount = $product->selling_price - $product->discount_price;
                        $discount = ($amount/$product->selling_price) * 100;
                        @endphp  

                    @if ($product->discount_price == NULL)

                        <div class="widget-product-meta"><span class="text-accent">₱{{ $product->selling_price }}.<small>00</small></span></div>
                    @else

                    <span class="text-accent widget-product-meta">₱{{$product->discount_price}}.<small>00</small></span>
                    <del class="fs-sm text-muted widget-product-meta"> ₱{{$product->selling_price}}.<small>00</small></del>
                                               

                    @endif

                    </div>
                </div>
                @endforeach

                <p class="mb-0">...</p><a class="fs-sm bounce-right" href="{{ route('shop.page') }}">View more<i
                        class="ci-arrow-right fs-xs ms-1"></i></a>
            </div>
        </div>


















        <!-- New arrivals / Special Deals-->
        <div class="col-md-4 col-sm-6 mb-2 py-3">
            <div class="widget">
                <h3 class="widget-title">Trending Products</h3>

                @foreach ($special_deals as $product)
                    
                @if($loop->iteration == 1)
                <div class="d-flex align-items-center pb-2 border-bottom product-section"><a class="d-block flex-shrink-0"
                        href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">

                @elseif($loop->iteration == 4)
                <div class="d-flex align-items-center py-2 product-section"><a class="d-block flex-shrink-0"
                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                @else
                <div class="d-flex align-items-center py-2 border-bottom product-section"><a class="d-block flex-shrink-0"
                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                @endif
                        
                        
                        <img src="{{ asset($product->product_thumbnail) }}"
                            width="64" alt="Product"></a>
                    <div class="ps-2">
                        <h6 class="widget-product-title"><a href="shop-single-v2.html">@if(session()->get('language') == 'filipino') {{ $product->product_name_fil }} @else {{ $product->product_name_en }} @endif</a></h6>

                        @php
                        $amount = $product->selling_price - $product->discount_price;
                        $discount = ($amount/$product->selling_price) * 100;
                        @endphp  

                    @if ($product->discount_price == NULL)

                        <div class="widget-product-meta"><span class="text-accent">₱{{ $product->selling_price }}.<small>00</small></span></div>
                    @else

                    <span class="text-accent widget-product-meta">₱{{$product->discount_price}}.<small>00</small></span>
                    <del class="fs-sm text-muted widget-product-meta"> ₱{{$product->selling_price}}.<small>00</small></del>
                                               

                    @endif


                    </div>
                </div>


                @endforeach

                


                <p class="mb-0">...</p><a class="fs-sm" href="{{ route('shop.page') }}">View more<i
                        class="ci-arrow-right fs-xs ms-1"></i></a>
            </div>
        </div>





                  <!-- Discounted Product -->
                  <div class="col-md-4 col-sm-6 mb-2 py-3">
                    <div class="widget">
                        <h3 class="widget-title">Discounted Products</h3>
        
                        @foreach($discounted_products as $product)
        
                        @if($loop->iteration == 1)
                        <div class="d-flex align-items-center pb-2 border-bottom product-section"><a class="d-block flex-shrink-0"
                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
        
                        @elseif($loop->iteration == 4)
                        <div class="d-flex align-items-center py-2 product-section"><a class="d-block flex-shrink-0"
                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                        @else
                        <div class="d-flex align-items-center py-2 border-bottom product-section"><a class="d-block flex-shrink-0"
                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                        @endif
                        
                                
                                <img
                                    src="{{ asset($product->product_thumbnail) }}" width="64"
                                    alt="Product"></a>
                            <div class="ps-2">
                                <h6 class="widget-product-title"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'filipino') {{ $product->product_name_fil }} @else {{ $product->product_name_en }} @endif</a>
                                </h6>
        
                                @php
                                $amount = $product->selling_price - $product->discount_price;
                                $discount = ($amount/$product->selling_price) * 100;
                                @endphp  
        
                            @if ($product->discount_price == NULL)
        
                                <div class="widget-product-meta"><span class="text-accent">₱{{ $product->selling_price }}.<small>00</small></span></div>
                            @else
        
                            <span class="text-accent widget-product-meta">₱{{$product->discount_price}}.<small>00</small></span>
                            <del class="fs-sm text-muted widget-product-meta"> ₱{{$product->selling_price}}.<small>00</small></del>
                                                       
        
                            @endif
        
                            </div>
                        </div>
                        @endforeach
        
                        <p class="mb-0">...</p><a class="fs-sm" href="{{ route('shop.page') }}">View more<i
                                class="ci-arrow-right fs-xs ms-1"></i></a>
                    </div>
                </div>

    </div>
</section>

{{-- End Product Widgets Area --}}