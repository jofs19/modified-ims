            <!-- Products list-->

            <!-- Product-->
            @forelse ($products as $product)

            <div class="card product-card product-list product-section">


                {{-- @php
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
                @endif --}}

                <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Favorites"><i class="ci-star"></i></button>
                <div class="d-sm-flex align-items-center"><a class="product-list-thumb" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img src="{{ asset($product->product_thumbnail) }}" alt="Product"></a>
                  <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">{{ $product->category->category_name_en }}</a>
                    <h3 class="product-title fs-base"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'filipino') {{ $product->product_name_fil }} @else {{ $product->product_name_en }} @endif</a></h3>
                    <div class="d-flex justify-content-between">

                        {{-- @if($product->discount_price == NULL)

                        <div class="product-price"><span class="text-accent">
                                ₱ {{ $product->selling_price }} <small>.00</small>
                            </span></div>

                        @else
                        <div class="product-price">
                            <del class="fs-sm text-muted"> ₱ {{ $product->selling_price }}
                                <small>.00</small></del>
                            <span class="text-accent"> ₱ {{ $product->discount_price }}
                                <small>.00</small></span>

                        </div>

                        @endif --}}


                    </div>
                    <div class="card-body card-body-hidden">
                      <div class="pb-2">
                        <div class="form-check form-option form-check-inline mb-2">
                          <input class="form-check-input" type="radio" name="color1" id="white" checked>
                          <label class="form-option-label rounded-circle" for="white"><span class="form-option-color rounded-circle" style="background-color: #eaeaeb;"></span></label>
                        </div>
                        <div class="form-check form-option form-check-inline mb-2">
                          <input class="form-check-input" type="radio" name="color1" id="blue">
                          <label class="form-option-label rounded-circle" for="blue"><span class="form-option-color rounded-circle" style="background-color: #d1dceb;"></span></label>
                        </div>
                        <div class="form-check form-option form-check-inline mb-2">
                          <input class="form-check-input" type="radio" name="color1" id="yellow">
                          <label class="form-option-label rounded-circle" for="yellow"><span class="form-option-color rounded-circle" style="background-color: #f4e6a2;"></span></label>
                        </div>
                        <div class="form-check form-option form-check-inline mb-2">
                          <input class="form-check-input" type="radio" name="color1" id="pink">
                          <label class="form-option-label rounded-circle" for="pink"><span class="form-option-color rounded-circle" style="background-color: #f3dcff;"></span></label>
                        </div>
                      </div>
                      <div class="d-flex mb-2">
                        <select class="form-select form-select-sm me-2" style="max-width: 6rem;">
                          <option>XS</option>
                          <option>S</option>
                          <option>M</option>
                          <option>L</option>
                          <option>XL</option>
                        </select>
                        {{-- <button class="btn btn-primary btn-sm" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                      </div>
                      <div class="text-start"><a class="nav-link-style fs-ms" href="#quick-view-electro"
                        data-bs-toggle="modal" data-bs-target="#quick-view-electro" id="{{ $product->id }}"
                        onclick="productView(this.id)"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
                    </div> --}}
                  </div>
                </div>
            </div>

            @if($loop->last)

            <div class="pt-4 mt-4"></div>


            @else

              <div class="border-top pt-3 mt-3"></div>

            @endif

              {{-- @if($loop->iteration == 6)

              @include('frontendv2.common.colorOptions')


              @endif --}}

            @empty
              @include('frontendv2.product.not_found')
            @endforelse

                 <!-- End Product-->






              <!-- Banner-->
