<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Sidebar-->
      <aside class="col-lg-4">
        <!-- Sidebar-->
        <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar" style="max-width: 22rem;">
          <div class="offcanvas-header align-items-center shadow-sm">
            <h2 class="h5 mb-0">Filters</h2>
            <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
            <!-- Categories-->
            <div class="widget widget-categories mb-4 pb-4 border-bottom">
              <h3 class="widget-title">Categories</h3>
              <div class="accordion mt-n1" id="shop-categories">
                <!-- Shoes-->

                {{-- Accordion Category--}}
                @foreach($categories as $category)

                <div class="accordion-item">
                  <h3 class="accordion-header"><a class="accordion-button collapsed" href="#collapse{{ $category->id }}"
                    role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shoes">@if(session()->get('language') == 'filipino') {{ $category->category_name_fil }} @else {{ $category->category_name_en }} @endif </a></h3>
                  <div class="accordion-collapse collapse" id="collapse{{ $category->id }}" data-bs-parent="#shop-categories">
                    <div class="accordion-body">
                      <div class="widget widget-links widget-filter">
                        <div class="input-group input-group-sm mb-2">
                          <input class="widget-filter-search form-control rounded-end" type="text" placeholder="Search"><i class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
                        </div>

                        @php
                        $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                        @endphp


                        <ul class="widget-list widget-filter-list pt-1" style="height: 5rem;" data-simplebar data-simplebar-auto-hide="false">
                            @php
                            $total = 0;
                            @endphp

                            @foreach($subcategories as $subcategory)
                            @php
                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
                            $total += $subsubcategories->count();
                            @endphp
                            @endforeach
                          {{-- <li class="widget-list-item widget-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="{{ $category->category_slug_en }}"><span class="widget-filter-item-text">View all</span><span class="fs-xs text-muted ms-3"></span></a></li> --}}

                          @foreach($subcategories as $key => $subcategory)

                          @if($subcategory->subcategory_name_en != "-----")

                          <li class="widget-list-item widget-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en ) }}"><span class="widget-filter-item-text">@if(session()->get('language') == 'filipino') {{ $subcategory->subcategory_name_fil }} @else {{ $subcategory->subcategory_name_en }} @endif</span><span class="fs-xs text-muted ms-3">

                            @php
                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();

                            $count = App\Models\Product::where('subcategory_id',$subcategory->id)->where('status',1)->count();

                            @endphp

                            {{ $count }}

                        </span></a></li>
                        @endif

                          @endforeach

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                @endforeach
                {{-- End Accordion Category--}}

              </div>
            </div>



            <form action="{{ route('shop.filter') }}" method="post">
              @csrf
            <!-- Price range-->
            {{-- <div class="widget mb-4 pb-4 border-bottom">
              <h3 class="widget-title">Price</h3>
              <div class="range-slider" id="slider-range" data-start-min="500" data-start-max="1500" data-min="0" data-max="2000" data-step="1">
                <div class="range-slider-ui"></div>
                <div class="d-flex pb-1">
                  <div class="w-50 pe-2 me-2">
                    <div class="input-group input-group-sm"><span class="input-group-text">₱</span>
                      <input type="hidden" class="price_range" name="price_range" value="">
                      <input class="form-control range-slider-value-min" type="text" id="amount" value="₱0 - ₱2000" readonly="">
                    </div>
                  </div>
                  <div class="w-50 ps-2">
                    <div class="input-group input-group-sm"><span class="input-group-text">₱</span>
                      <input type="hidden" class="price_range" name="price_range" value="">
                      <input class="form-control range-slider-value-max" type="text" readonly>
                    </div>
                  </div>
                </div>

              </div>
              <br>
              <div class="text-center">
              <button type="submit" class="btn btn-accent btn-sm text-center btn-shadow">Filter Price</button>
              </div>

            </div> --}}

            {{-- <div id="slider-range" class="price-filter-range" data-min="0" data-max="2000" ></div>
            <input type="hidden" id="price_range" name="price_range" value="">
            <input type="text" id="amount" value="$0 - $2000" readonly="">

          <br><br>

           <button type="submit" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</button> --}}

            <!-- Filter by Category-->



            {{-- <div class="widget widget-filter mb-4 pb-4 border-bottom">
              <h3 class="widget-title">Shop by Category</h3>

              <div class="input-group input-group-sm mb-2">
                <input class="widget-filter-search form-control rounded-end pe-5" type="text" placeholder="Search"><i class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
              </div>



              <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;" data-simplebar data-simplebar-auto-hide="false">

              @if(!empty($_GET['category']))
              @php
              $filterCat = explode(',',$_GET['category']);
              @endphp
              @endif

            @foreach($categories as $category)

                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="category[]" value="{{ $category->category_slug_en }}" @if(!empty($filterCat) && in_array($category->category_slug_en,$filterCat)) checked @endif onchange="this.form.submit()">

                    <label class="form-check-label widget-filter-item-text" for="category">  @if(session()->get('language') == 'filipino') {{ $category->category_name_fil }} @else {{ $category->category_name_en }} @endif
                    </label>

                    @php
                      $count = App\Models\Product::where('category_id',$category->id)->where('status',1)->count();
                    @endphp
                  </div><span class="fs-xs text-muted">{{ $count }}</span>
                </li>

            @endforeach

              </ul>
            </div> --}}

            <!-- End Filter by Category-->

            <!-- Filter by Brand-->
            <div class="widget widget-filter mb-4 pb-4 border-bottom">
              <h3 class="widget-title">Shop by Brand</h3>
              <div class="input-group input-group-sm mb-2">
                <input class="widget-filter-search form-control rounded-end pe-5" type="text" placeholder="Search"><i class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>
              </div>
              <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;" data-simplebar data-simplebar-auto-hide="false">

                @if(!empty($_GET['brand']))
                @php
                $filterBrand = explode(',',$_GET['brand']);
                @endphp
                @endif
                @foreach($brands as $brand)

                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="brand[]" value="{{ $brand->brand_slug_en }}" @if(!empty($filterBrand) && in_array($brand->brand_slug_en,$filterBrand)) checked @endif onchange="this.form.submit()">
                    <label class="form-check-label widget-filter-item-text" for="size-xs">  @if(session()->get('language') == 'filipino') {{ $brand->brand_name_fil }} @else {{ $brand->brand_name_en }} @endif
                    </label>
                  </div><span class="fs-xs text-muted">...</span>
                </li>

                @endforeach
              </ul>
            </div>
            <!-- End Filter by Brand-->

          </form>


            <!-- Filter by Color-->
            {{-- <div class="widget mb-4 pb-4 border-bottom">
              <h3 class="widget-title">Color</h3>
              <div class="d-flex flex-wrap">
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                  <input class="form-check-input" type="checkbox" id="color-blue-gray">
                  <label class="form-option-label rounded-circle" for="color-blue-gray"><span class="form-option-color rounded-circle" style="background-color: #b3c8db;"></span></label>
                  <label class="d-block fs-xs text-muted mt-n1" for="color-blue-gray">Blue-gray</label>
                </div>

              </div>
            </div> --}}

            {{-- Product Tags --}}

            @include('frontendv2.common.product_tags')

            {{-- End Product Tags --}}


          </div>
        </div>
      </aside>

      <script type="text/javascript">

        $(document).ready(function (){
            if ($('#slider-range').length > 0) {
                const max_price = parseInt($('#slider-range').data('max'));
                const min_price = parseInt($('#slider-range').data('min'));
                let price_range = min_price+"-"+max_price;
                let price = price_range.split('-');
                    $("#slider-range").slider({
                        range: true,
                        min: min_price,
                        max: max_price,
                        values: price,
                    slide: function (event, ui) {
                    $("#amount").val('$'+ui.values[0]+"-"+'$'+ui.values[1]);
                    $("#price_range").val(ui.values[0]+"-"+ui.values[1]);
                    }
                    });
            }
        })
    </script>
