{{-- <i><span class="ci-globe"></span></i>Language --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
<head>

  <style>

      @keyframes rotation {
        0% {
          transform: rotate(0deg); }
        100% {
          transform: rotate(360deg); } }
      #loader-wrapper {
        background-color: #FFFFFF;
        position: fixed;
        z-index: 999;
        width: 100%;
        height: 100%;
        text-align: center; }
      .loader {
        width: 40px;
        height: 40px;
        border: 5px solid #000000;
        border-bottom-color: transparent;
        border-radius: 50%;
        margin-top:calc(50vh - 20px);
        display: inline-block;
        box-sizing: border-box;
        -webkit-animation: rotation 1s linear infinite;
        animation: rotation 1s linear infinite; }

        .ui-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 999999 !important;
    float: left;
    display: none;
    min-width: 160px;
    padding: 4px 0;
    margin: 2px 0 0;
    list-style: none;
    background-color: #fff;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 0 0 4px 4px;


    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
    background-clip: padding-box;
  }

  .ui-menu-divider:hover{
    display: block;
    cursor: pointer;
    color: #dae1e7;
  }


  /* color anchor to grey */

  .ui-menu-divider a {
    color: #dae1e7;
  }

  </style>

  </head>

  <header class="shadow-sm">
    <!-- Topbar-->
    <div class="topbar topbar-dark bg-dark">
        <div class="container">
            <div>

                <div class="topbar-text text-nowrap d-none d-md-inline-block border-start border-light ps-1 ms-1 tracking-in-expand"><span
                        class="text-muted me-2">Contact Us</span><a class="topbar-link"
                        href="tel:00331697720">(+63) 947 5220 247</a></div>


            </div>
            <div class="topbar-text dropdown d-md-none ms-auto"><a class="topbar-link dropdown-toggle" href="#"
                    data-bs-toggle="dropdown">Favorites / Track</a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('wishlist') }}"><i
                                class="ci-star text-muted me-2"></i>@if(session()->get('language') ==
                                'filipino') Kagustuhan (<span class="wishlistQty">0</span>) @else Favorites (<span class="wishlistQty">0</span>) @endif</a></li>
                    {{-- <li><a class="dropdown-item" href="{{ route('compare') }}"><i
                                class="ci-compare text-muted me-2"></i>@if(session()->get('language') ==
                                'filipino') Ikumpara (<span class="compareQty">0</span>) @else Compare (<span class="compareQty">0</span>) @endif </a></li> --}}
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLarge" href="#modalLarge"><i
                                class="ci-location text-muted me-2"></i>@if(session()->get('language') ==
                                'filipino') Sundan ang Requests @else Requests Tracking @endif </a></li>
                </ul>
            </div>
            <div class="d-none d-md-block ms-3 text-nowrap"><a class="topbar-link d-none d-md-inline-block"
              href="{{ route('wishlist') }}"><i class="ci-star mt-n1"></i>@if(session()->get('language') ==
              'filipino') Kagustuhan (<span class="wishlistQty">0</span>) @else Favorites (<span class="wishlistQty">0</span>) @endif</a>
              {{-- <a class="topbar-link ms-3 ps-3 border-start border-light d-none d-md-inline-block"
                    href="{{ route('compare') }}"><i class="ci-compare mt-n1"></i>@if(session()->get('language') ==
                    'filipino') Ikumpara (<span class="compareQty">0</span>) @else Compare (<span class="compareQty">0</span>) @endif</a> --}}
                    <a
                    class="topbar-link ms-3 border-start border-light ps-3 d-none d-md-inline-block"
                    data-bs-toggle="modal" data-bs-target="#modalLarge" href="#modalLarge"><i class="ci-location mt-n1"></i>@if(session()->get('language') ==
                    'filipino') Sundan ang Requests @else Requests Tracking @endif</a></div>
        </div>
    </div>
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->

     <form method="POST" action="{{ route('product.search') }}">
      @csrf
    <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-dark bg-darker py-0 my-0">
            <div class="container">
                <a class="navbar-brand d-none d-sm-block me-3 py-2 my-2 flex-shrink-0 flicker-in-1" style="z-index: 5" href="{{ url('/') }}">
                    <img src="{{ asset('frontendv2/assets/img/psu.png') }}" width="90" alt="Vartouhi"></a>
                <a class="navbar-brand d-sm-none me-2 flicker-in-1" href="{{ url('/') }}">
                    <img src="{{ asset('frontendv2/assets/img/psu.png') }}"  style="z-index: 5" width="80" alt="Vartouhi">
                </a>

                {{-- <div class="input-group d-none d-lg-flex flex-nowrap ms-3 me-4">
                  <i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>

                    <input class="form-control rounded-start w-100" name="search" type="text" placeholder="Search for products">
                    <select class="form-select flex-shrink-0" style="width: 10.5rem;">
                        <option>All categories</option>
                        <option>Computers</option>
                        <option>Smartphones</option>
                        <option>TV, Video, Audio</option>
                        <option>Cameras</option>
                        <option>Headphones</option>
                        <option>Wearables</option>
                        <option>Printers</option>
                        <option>Video Games</option>
                        <option>Home Music</option>
                        <option>Data Storage</option>
                    </select>

                </div> --}}

                <!-- Search (PC)-->

                <form method="POST" action="{{ url('searchproduct') }}">
                  @csrf
                <div class="input-group d-none d-lg-flex flex-nowrap ms-3 me-4 search-bar">


                  <input class="form-control  pe-5 search_product" name="search" type="text" placeholder="Search for products">

                  <button class="btn btn-primary rounded-end" type="submit"><i class="ci-search"></i></button>




                </div>
              </form>


                <!-- End Search (PC)-->


              </form>



                <!-- Toolbar-->
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a
                        class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Toggle
                            menu</span>
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
                    </a>

                    @auth

                    @php
                    $id = Auth::user()->id;
                    $user = App\Models\User::find($id);
                    @endphp

                    <div class="navbar-tool dropdown ms-2"><a class="navbar-tool-icon-box border dropdown-toggle"
                            href="{{ route('login') }}"><img class="rounded-circle"
                            src="{{ (!empty($user->profile_photo_path)) ? asset($user->profile_photo_path):url('upload/no_image.jpg') }}"
                                alt="User Profile"></a><a class="navbar-tool-text ms-n1"
                            href="{{ route('login') }}"><small>Requestor</small>
                          @php
                              $truncate = Auth::user()->name;
                              $numOfChars = strlen($truncate);
                              if ($numOfChars > 11) {
                                  $truncate = substr($truncate, 0, 11).'...';
                              }else{
                                  $truncate = substr($truncate, 0, 11);
                              }
                          @endphp


                            {{ $truncate }}


                          </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div style="min-width: 14rem;">
                                <h6 class="dropdown-header">Account</h6><a
                                    class="dropdown-item d-flex align-items-center {{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{ route('login') }}"><i
                                        class="ci-view-grid opacity-60 me-2"></i>Dashboard</a>

            @php
              $order = App\Models\Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
            @endphp


                                        <a class="dropdown-item d-flex align-items-center {{ (request()->is('user/my/orders')) ? 'active' : '' }}" href="{{ route('my.orders') }}"><i
                                        class="ci-basket opacity-60 me-2"></i>Requests History<span
                                        class="fs-xs text-muted ms-auto">{{ count($order) }}</span></a><a
                                    class="dropdown-item d-flex align-items-center {{ (request()->is('user/wishlist')) ? 'active' : '' }}" href="{{ route('wishlist') }}"><i
                                        class="ci-heart opacity-60 me-2"></i>Wishlist<span
                                        class="fs-xs text-muted ms-auto wishlistQty"></span></a>

              @php
                $returned = App\Models\Order::where('user_id',Auth::id())->where('return_order',2)->orderBy('id','DESC')->get();
              @endphp

                                        <a
                                    class="dropdown-item d-flex align-items-center {{ (request()->is('user/return/order/list')) ? 'active' : '' }}" href="{{ route('return.order.list') }}"><i
                                        class="ci-reply opacity-60 me-2"></i>Returned Items<span
                                        class="fs-xs text-muted ms-auto">{{ count($returned) }}</span></a>

                                        @php
			                                  if (Auth::check()){
                                          $ncount = Auth::user()->unreadNotifications()->count();
                                        }
                                        else{
                                          $ncount = 0;

                                        }


                                        @endphp


                                        {{-- @if(Auth::check())

                                        $ncount = Auth::user()->unreadNotifications()->count()

                                        @else

                                        $ncount = 0;

                                        @endif --}}


                                        <a type="button"
                                    class="dropdown-item d-flex align-items-center" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"><i
                                        class="ci-bell opacity-60 me-2"></i>Notifications<span
                                        class="fs-xs text-muted ms-auto">{{ $ncount }}</span></a>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">More Settings</h6><a
                                    class="dropdown-item d-flex align-items-center {{ (request()->is('user/profile')) ? 'active' : '' }}" href="{{ route('user.profile') }}"><i
                                        class="ci-user opacity-60 me-2"></i>Profile Information</a>
                                        <a class="dropdown-item d-flex align-items-center {{ (request()->is('user/change/password')) ? 'active' : '' }}" href="{{ route('change.password') }}"><i
                                        class="ci-security-check opacity-60 me-2"></i>Update Password</a>
                                        {{-- <a
                                    class="dropdown-item d-flex align-items-center {{ (request()->is('help')) ? 'active' : '' }}"
                                    href="{{ url('/help') }}"><i
                                        class="ci-help opacity-60 me-2"></i>Help Center</a> --}}
                                <div class="dropdown-divider"></div><a class="dropdown-item d-flex align-items-center"
                                    href="{{ route('user.logout') }}"><i class="ci-sign-out opacity-60 me-2"></i>Sign
                                    Out</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#signin-modal" data-bs-toggle="modal">
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                        <div class="navbar-tool-text ms-n3"><small>Sign in as Requestor</small>My Account</div>
                    </a>
                    @endauth





                    {{-- My Cart Area --}}
                  <div class="navbar-tool dropdown ms-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="{{ route('mycart') }}" id="mcart"> <!-- Outer -->
                            <span class="navbar-tool-label cartQty" ></span><i class="navbar-tool-icon ci-bag"></i></a>
                                <a class="navbar-text" href="{{ route('mycart') }}">
                                    <div class="navbar-tool-text ms-n2">Requested Items</div>
                                </a>
                        <!-- Cart dropdown-->
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                                <div style="height: 13rem;" data-simplebar data-simplebar-auto-hide="false">



                                    <div id="miniCart"></div>




                                </div>
                                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                    <div class="fs-sm me-2 py-2"></div>
                                            <a class="btn btn-outline-secondary btn-sm checkoutMe" href="{{ route('mycart') }}">View All Requests<i
                                            class="ci-arrow-right ms-1 me-n1"></i></a>
                                </div>

                                <a class="btn btn-primary btn-sm d-block w-100 checkoutMe" href="{{ route('checkout') }}"><i
                                        class="ci-card me-2 fs-base align-middle"></i>Request Item</a>

                            </div>
                        </div>
                        <!-- End Cart dropdown-->

                    </div><!-- End Outer -->
                    {{-- End My Cart Area --}}

                </div>



            </div>
        </div>
        <div class="navbar navbar-expand-lg navbar-dark bg-darker navbar-stuck-menu mt-n3 pt-0 pb-2">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarCollapse">



                  <form autocomplete="off" method="post" action="{{ route('product.search') }}">
                      @csrf

                      <form method="POST" action="{{ url('searchproduct') }}">
                        @csrf

                    <!-- Search (MOBILE)-->
                    <div class="input-group d-lg-none my-3"><i
                            class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>

                        <input class="form-control rounded-start search_product" type="text" placeholder="Search for products" name="search">
                        <button class="btn btn-primary rounded-end" type="submit"><i class="ci-search"></i></button>

                    </div>
                    <!-- End Search (MOBILE)-->
                    </form>

                  </form>




                    <!-- Departments menu-->
                    <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2 tracking-in-expand" style="z-index: 5">
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
                                    class="ci-menu align-middle mt-n1 me-2"></i>@if(session()->get('language') ==
                                'filipino') Mga Kategorya @else Categories @endif</a>

                            {{-- bg- for mobile
                     navbar- for pc
                --}}
                            <ul class="dropdown-menu navbar-dark bg-light tracking-in-expand">

                                @php
                                $categories = App\Models\Category::orderBy('category_name_en')->get();
                                @endphp

                                @foreach ($categories as $category)

                                <li class="dropdown mega-dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown"><i
                                            class="{{ $category->category_icon }} opacity-60 fs-lg mt-n1 me-2"></i>
                                            @if(session()->get('language') ==
                                'filipino') {{ $category->category_name_fil }} @else {{ $category->category_name_en }} @endif</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-sm-nowrap px-2">

                                          @php
                                          $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                                          @endphp

                                          @foreach ($subcategories as $key => $subcategory)


                                          <div class="mega-dropdown-column pt-4 pb-0 py-sm-4 px-3">
                                            <div class="widget widget-links">

                                             <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en ) }}"> <h6 class="fs-base mb-3">
                                              @if(session()->get('language') ==
                                'filipino') {{ $subcategory->subcategory_name_fil }} @else {{ $subcategory->subcategory_name_en }} @endif
                                              </h6></a>




                                              @php
                                              $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
                                              @endphp

                              @foreach($subsubcategories as $subsubcategory)

                              @if($subsubcategory->subsubcategory_name_en != "-----")


                                                <ul class="widget-list">
                                                    <li class="widget-list-item pb-1"><a class="widget-list-link"
                                                      href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en ) }}">
                                                      @if(session()->get('language') ==
                                'filipino') {{ $subsubcategory->subsubcategory_name_fil }} @else {{ $subsubcategory->subsubcategory_name_en }} @endif
                                                      </a>
                                                    </li>

                                                </ul>
                                                @endif

                              @endforeach

                                            </div>
                                        </div>

                                          @endforeach

                                            {{-- <div class="mega-dropdown-column d-none d-lg-block py-4 text-center"><a
                                                    class="d-block mb-2" href="#"> --}}

                                              {{-- @php
                                                $productss = App\Models\Product::where('subcategory_id',$subcategory->id)->get();

                                              @endphp


                                              @foreach ($productss as $product)

                                              @if ($loop->first)

                                              <center>
                                              <img class="d-block rounded-lg" src="{{ asset($product->product_thumbnail) }}" alt="Shop" width="180">
                                              </center>

                                              @endif

                                              @endforeach --}}


                                                      {{-- @if ($productss->product_thumbnail == NULL)

                                                      @else


                                                      <img src="{{ $productss->product_thumbnail }}" alt="">
                                                      @endif --}}




                                                      {{-- </a> --}}
                                                {{-- <div class="fs-sm mb-3">Starting from <span
                                                        class='fw-medium'>{{ $lowest_price }}.<small>00</small></span>
                                                </div> --}}
                                                        {{-- <a
                                                    class="btn btn-primary btn-shadow btn-sm" href="{{ route('shop.page') }}">See offers<i
                                                        class="ci-arrow-right fs-xs ms-1"></i></a> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </li>

                                @endforeach



                            </ul>
                        </li>
                    </ul>
                    <!-- Primary menu-->
                    <ul class="navbar-nav tracking-in-expand">
                        <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                          <a class="nav-link" href="{{ url('/') }}">
                              <i class="ci-home align-middle mt-n1 me-2"></i> @if(session()->get('language') == 'filipino') Home @else Home
                                @endif
                          </a>

                        </li>

                        <li class="nav-item {{ (request()->is('shop')) || (request()->is('product/tag/*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('shop.page') }}">
                          <i class="ci-view-grid align-middle mt-n1 me-2"></i>@if(session()->get('language') == 'filipino') Mga Kagamitan @else
                                Items @endif</a>

                        </li>


                        {{-- <li class="nav-item dropdown">
                          <a class="nav-link" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="ci-user-circle align-middle mt-n1 me-2"></i>@if(session()->get('language') ==
                                'filipino') Aking Account @else My Account @endif
                          </a>

                        </li> --}}

                        {{-- <li class="nav-item"><a class="nav-link" href="{{ url("/about") }}" data-bs-auto-close="outside">
                          <i class="ci-briefcase align-middle mt-n1 me-2"></i>@if(session()->get('language') == 'filipino') Tungkol sa Amin @else
                                About Us @endif</a>

                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{ url("/contact") }}" data-bs-auto-close="outside">
                          <i class="ci-phone align-middle mt-n1 me-2"></i>@if(session()->get('language') == 'filipino') Kontakin kami @else
                                Contact Us @endif</a>

                        </li> --}}

                    </ul>

                    {{-- place text in right side (Become a vendor)--}}





                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="modalLarge" tabindex="-1" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Track your Requests</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

      <form class="needs-validation" novalidate autocomplete="off" method="post" action="{{ route('order.tracking') }}">
          @csrf
          <div class="modal-body">

              <div>
                  <input class="form-control form-control-lg" name="code" required type="text" id="large-input" placeholder="Enter Invoice #">
              </div>

              </div>
          <div class="modal-footer">
            <button class="btn btn-secondary btn-sm" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary btn-shadow btn-sm" type="submit">Track now</button>
          </div>
      </form>


        </div>
      </div>
    </div>



  </header>
