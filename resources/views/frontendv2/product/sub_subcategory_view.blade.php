@extends('frontendv2.main_master')
@section('content')
@section('title')
Sub/Sub Category Item
@endsection


<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ url('/') }}"><i class="ci-home"></i>Home</a></li>
            @foreach($breadsubsubcat as $item)
            <li class="breadcrumb-item text-nowrap text-light">{{ $item->category->category_name_en }}
            </li>
            @endforeach
            @foreach($breadsubsubcat as $item)
            <li class="breadcrumb-item text-nowrap text-light">{{ $item->subcategory->subcategory_name_en }}
            </li>
            @endforeach
            @foreach($breadsubsubcat as $item)
            <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ $item->subsubcategory_name_en }}</li>
           @endforeach
        </ol>
        </nav>






      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 text-light mb-0">Sub/Sub Category Products</h1>
      </div>
    </div>
  </div>
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">

    {{-- Shop Sidebar --}}
    @include('frontendv2.shop.shop_sidebar')
    {{-- End Shop Sidebar --}}

      <!-- Content  -->
      <section class="col-lg-8">
        <!-- Toolbar-->
        <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
          <div class="d-flex flex-wrap">
            <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
              <label class="text-light opacity-75 text-nowrap fs-sm me-2 d-none d-sm-block" for="sorting">Sort by:</label>
              <form name="sortProducts" id="sortProducts">

              <select name="sort" class="form-select sort-product" id="sorting">
                <option selected="">Select options</option>
                <option value="product_latest" @if (isset($_GET['sort']) && $_GET['sort'] == 'product_latest') selected="" @endif>Latest</option>
                <option value="product_oldest" @if (isset($_GET['sort']) && $_GET['sort'] == 'product_oldest') selected="" @endif>Oldest</option>

                <option value="name_a_z" @if (isset($_GET['sort']) && $_GET['sort'] == 'name_a_z') selected="" @endif>A - Z Order</option>
                <option value="name_z_a" @if (isset($_GET['sort']) && $_GET['sort'] == 'name_z_a') selected="" @endif>Z - A Order</option>
              </select>

              </form>

              {{-- Product count --}}
              @php
              $product_count = App\Models\Product::where('status',1)->count();
              @endphp
              {{-- End Product count --}}

              <span class="fs-sm text-light opacity-75 text-nowrap ms-2 d-none d-md-block">of {{ $product_count }} products</span>
            </div>
          </div>

          {{-- Sort product --}}
          {{-- <div class="d-flex pb-3">
          <a class="nav-link-style nav-link-light me-3" href="#">
            <i class="ci-arrow-left"></i>
          </a><span class="fs-md text-light">1 / 5</span>
          <a class="nav-link-style nav-link-light ms-3" href="#">
            <i class="ci-arrow-right"></i></a>
          </div> --}}

          {{ $products->links('vendor.pagination.top_nav') }}

          <div class="d-none d-sm-flex pb-3">

            <ul class="nav" role="tablist">

                <li class="nav-item">
            {{-- Grid view --}}
            <a class="btn btn-icon nav-link-style nav-link-light me-2" href="#grid"
            class="nav-link active" data-bs-toggle="tab" role="tab" id="gridT">

            {{-- btn btn-icon nav-link-style bg-light text-dark disabled opacity-100 me-2 --}}

                <i class="ci-view-grid"></i>
            </a>
            {{-- End Grid view --}}
                </li>

                <li class="nav-item">

            {{-- List view --}}
            <a class="btn btn-icon nav-link-style nav-link-light" href="#list" class="nav-link" data-bs-toggle="tab" role="tab" id="listT">
                <i class="ci-view-list"></i>
            </a>
            {{-- End List view --}}
                </li>

            </ul> <!-- End of nav tabs -->

        </div>
        </div>

        <div class="tab-content">

        <div class="tab-pane fade show active" id="grid" role="tabpanel">

        <!-- Products grid-->
        <div class="row mx-n2">
          <!-- Product-->
          @forelse ($products as $product)

          <div class="col-md-4 col-sm-6 px-2 mb-4">
            <div class="card product-card product-section">

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

              <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img src="{{ asset($product->product_thumbnail) }}" alt="Product"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">{{ $product->category->category_name_en }}</a>
                <h3 class="product-title fs-sm"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'filipino') {{ $product->product_name_fil }} @else {{ $product->product_name_en }} @endif </a></h3>
                <div class="d-flex justify-content-between">

                    {{-- @if($product->discount_price == NULL)

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

                    @endif --}}

                  {{-- <div class="product-price"><span class="text-accent">$154.<small>00</small></span></div> --}}




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
                {{-- <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                <div class="text-center">
                    <a class="nav-link-style fs-ms" href="#quick-view-electro"
                    data-bs-toggle="modal" data-bs-target="#quick-view-electro" id="{{ $product->id }}"
                    onclick="productView(this.id)"><i class="ci-eye align-middle me-1"></i>Quick view</a>
                </div> --}}
              </div>
            </div>
            <hr class="d-sm-none">
          </div>

          {{-- @if($loop->iteration == 6)
          <div class="py-sm-2">
            <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden mb-4 rounded-3">
              <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                <h4 class="fs-lg fw-light mb-2">

                    Only on <img src="{{ asset('frontendv2/assets/img/vartouhi-logos.svg') }}" class="px-0 py-0 mx-0 my-0" width="70"
                                            alt="">

                </h4>
                <h3 class="mb-4">Because your skin deserves the best care</h3><a class="btn btn-primary btn-shadow btn-sm" href="#">Shop Now</a>
              </div><img class="d-block ms-auto" src="{{ asset('frontendv2/assets/img/shop/catalog/banner.jpg') }}" alt="Shop Converse">
            </div>
          </div>
            @endif --}}

          @empty
          @include('frontendv2.product.not_found')
        @endforelse
          <!-- End Product-->

        </div>{{-- End Row --}}
        <!-- End Products grid-->
        </div> <!-- End Tab Pane -->

        <div class="tab-pane fade show" id="list" role="tabpanel">

        <!-- Products list -->
        @include('frontendv2.tags.tags_list_view')
        <!-- End Products list -->
        </div> <!-- End Tab Pane -->

        </div> <!-- End Tab Content -->


        </div>
        <hr class="my-3">
        <!-- Pagination-->
        {{-- <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a></li>
          </ul>
          <ul class="pagination">
            <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
            <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
          </ul>
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>
          </ul>
        </nav> --}}


        {{ $products->links('vendor.pagination.grid_paginate') }}


      </section>
    </div>
  </div>

  {{-- <script>

    $('#listT').on('click',function(){

        $('#listT').addClass('btn btn-icon nav-link-style bg-light text-dark disabled opacity-100 me-2');

    })

    $('#gridT').on('click',function(){

        $('#listT').removeClass();
        $('#gridT').addClass('btn btn-icon nav-link-style bg-light text-dark disabled opacity-100 me-2');

    })



  </script> --}}

  @endsection
