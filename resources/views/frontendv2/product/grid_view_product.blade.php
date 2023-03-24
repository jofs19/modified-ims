@forelse ($products as $product)
              
          <div class="col-md-4 col-sm-6 px-2 mb-4">
            <div class="card product-card product-section">

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
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">{{ $product->category->category_name_en }}</a>
                <h3 class="product-title fs-sm"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'filipino') {{ $product->product_name_fil }} @else {{ $product->product_name_en }} @endif </a></h3>
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

                  {{-- <div class="product-price"><span class="text-accent">$154.<small>00</small></span></div> --}}



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
              <div class="card-body card-body-hidden">
                {{-- <div class="text-center pb-2">
                  <div class="form-check form-option form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size1" id="s-75">
                    <label class="form-option-label" for="s-75">7.5</label>
                  </div>
                  <div class="form-check form-option form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size1" id="s-80" checked>
                    <label class="form-option-label" for="s-80">8</label>
                  </div>
                  <div class="form-check form-option form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size1" id="s-85">
                    <label class="form-option-label" for="s-85">8.5</label>
                  </div>
                  <div class="form-check form-option form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size1" id="s-90">
                    <label class="form-option-label" for="s-90">9</label>
                  </div>
                </div> --}}
                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                <div class="text-center">
                    <a class="nav-link-style fs-ms" href="#quick-view-electro"
                    data-bs-toggle="modal" data-bs-target="#quick-view-electro" id="{{ $product->id }}"
                    onclick="productView(this.id)"><i class="ci-eye align-middle me-1"></i>Quick view</a>
                </div>
              </div>
            </div>
            @if($loop->last)


            @else

            <hr class="d-sm-none">
            
            @endif
          </div>

          {{-- @if($loop->iteration == 1)
          
              @include('frontendv2.common.colorOptions')

            
            @endif --}}

          @empty
          @include('frontendv2.product.not_found')




          @endforelse