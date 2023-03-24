@extends('frontendv2.main_master')
@section('content')

      <!-- Header-->
      <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-flex flex-wrap flex-sm-nowrap justify-content-center justify-content-sm-between align-items-center pt-2">
          <div class="d-flex align-items-center pb-3">
            <div class="img-thumbnail rounded-circle flex-shrink-0" style="width: 6.375rem;"><img class="rounded-circle" src="{{ (!empty($vendor->profile_photo_path)) ? url('upload/vendor_images/'.$vendor->profile_photo_path):url('upload/no_image.jpg') }}" alt="Vendor"></div>
            <div class="ps-3">
              <h3 class="text-light fs-lg mb-0">{{ $vendor->name }}</h3><span class="d-block text-light fs-ms opacity-60 py-1">Member since {{ $vendor->vendor_join }}</span><span class="badge bg-success"><i class="ci-check me-1"></i>Verified Vendor</span>
            </div>
          </div>
          {{-- <div class="d-flex">
            <div class="text-sm-end me-5">
              <div class="text-light fs-base">Total Products</div>
              <h3 class="text-light">{{ count($vproduct) }}</h3>
            </div>
            <div class="text-sm-end">
              <div class="text-light fs-base">Seller rating</div>
              <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
              </div>
              <div class="text-light opacity-60 fs-xs">Based on 98 reviews</div>
            </div>
          </div> --}}
        </div>
      </div>






      <div class="container mb-5 pb-3">
        <div class="bg-light shadow-lg rounded-3 overflow-hidden">
          <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-4 pe-xl-5">
              <div class="bg-white h-100 border-end p-4">
                <div class="p-2">
                  <h6>About</h6>
                  <p class="fs-ms text-muted">{{ $vendor->vendor_short_info }}</p>
                  <hr class="my-4">
                  <h6>Contacts</h6>
                  <ul class="list-unstyled fs-sm">
                    <li><a class="nav-link-style d-flex align-items-center" href="mailto:contact@example.com"><i class="ci-mail opacity-60 me-2"></i>{{ $vendor->email }}</a></li>
                    <li><a class="nav-link-style d-flex align-items-center" href="#"><i class="ci-phone opacity-60 me-2"></i>{{ $vendor->phone }}</a></li>
                  </ul><a class="btn-social bs-facebook bs-outline bs-sm me-2 mb-2" href="#"><i class="ci-facebook"></i></a><a class="btn-social bs-twitter bs-outline bs-sm me-2 mb-2" href="#"><i class="ci-twitter"></i></a><a class="btn-social bs-instagram bs-outline bs-sm me-2 mb-2" href="#"><i class="ci-instagram"></i></a>
                  <hr class="my-4">
                  <h6 class="pb-1">Send message</h6>
                  <form class="needs-validation pb-2" method="post" novalidate>
                    <div class="mb-3">
                      <textarea class="form-control" rows="6" placeholder="Your message" required></textarea>
                      <div class="invalid-feedback">Please wirte your message!</div>
                    </div>
                    <button class="btn btn-primary btn-sm d-block w-100" type="submit">Send</button>
                  </form>
                </div>
              </div>
            </aside>
            <!-- Content-->
            <section class="col-lg-8 pt-lg-4 pb-md-4">
              <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                <h2 class="h3 pt-2 pb-4 mb-4 text-center text-sm-start border-bottom">Products<span class="badge bg-faded-accent fs-sm text-body align-middle ms-2">{{ count($vproduct) }}</span></h2>
                <div class="row pt-2">

                    @foreach($vproduct as $product)
                    @php
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ($amount/$product->selling_price) * 100;
                    @endphp
                  <!-- Product-->
                  <div class="col-sm-6 mb-grid-gutter">
                    <div class="card product-card-alt">
                      <div class="product-thumb">
                        <button class="btn-wishlist btn-sm heartbeat" style="z-index: 5" type="button" data-bs-toggle="tooltip" id="{{ $product->id }}" data-bs-placement="left" onclick="addToWishList(this.id)"><i class="ci-heart"></i></button>                        <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><i class="ci-eye"></i></a>


                            <button class="btn btn-light btn-icon btn-shadow fs-base mx-2"
                            type="submit"
                            href="#quick-view-electro" data-bs-toggle="modal" data-bs-target="#quick-view-electro" id="{{ $product->id }}" onclick="productView(this.id)">
                                <i class="ci-cart"></i>
                            </button>
                        </div><a class="product-thumb-overlay" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"></a><img src="{{ asset( $product->product_thumbnail ) }}" alt="Product">
                      </div>
                      <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                          <div class="text-muted fs-xs me-1">by <a class="product-meta fw-medium" href="#">Createx Std. </a>in <a class="product-meta fw-medium" href="#">Graphics</a></div>


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




                      @php
                          $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                      @endphp

                        </div>
                        <h3 class="product-title fs-sm mb-2"><a href="marketplace-single.html">{{ $product->product_name_en }}</a></h3>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                          <div class="fs-sm me-2"><i class="ci-thumb text-muted me-1"></i>{{ count($reviewcount) }}<span class="fs-xs ms-1">reviews</span></div>
                          <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">


                            @if ($product->discount_price == NULL)
                            ₱{{ $product->selling_price }}.<small>00</small>
                            @else
                            ₱<del>{{  $product->selling_price  }}.<small>00</small></del>  ₱{{ $product->discount_price }}.<small>00</small>



                            @endif





                        </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  @endforeach

                </div>
              </div>
            </section>
          </div>
        </div>
      </div>


@endsection
