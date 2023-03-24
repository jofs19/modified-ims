<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title') </title>

    <!-- SEO Meta Tags-->
    <meta name="description" content="JOFS E-Commerce">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="color-scheme" content="dark"> --}}

    <meta name="keywords" content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="John Oliver Santiago">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{ asset('frontendv2/assets/img/logo.png') }}" />

    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontendv2/assets/img/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontendv2/assets/img/logo.png') }}">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/vendor/simplebar/dist/simplebar.min.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/vendor/tiny-slider/dist/tiny-slider.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/vendor/drift-zoom/dist/drift-basic.min.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/vendor/lightgallery.js/dist/css/lightgallery.min.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/vendor/prismjs/themes/prism.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/vendor/prismjs/plugins/toolbar/prism-toolbar.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/vendor/flatpickr/dist/flatpickr.min.css') }}"/>

    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/vendor/prismjs/plugins/line-numbers/prism-line-numbers.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">





    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/vendor/nouislider/dist/nouislider.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >



    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/css/theme.min.css') }}">

    <style>

      @include('frontendv2.partials.animation');



        .product-badge.product-unavailable {
        background-color: #dc3545;
        color: #fff;
    }


    .modal-open .container {
    -webkit-filter: blur(5px) grayscale(90%);
    filter: blur(5px) grayscale(90%);
    }

    .center{
      display: block;
      margin-left: auto;
      margin-right: auto;
      padding: 80px 0;
    }

    .shimmer-btn{
      background-image: linear-gradient(
        -60deg,
        transparent, transparent 40%,
        #ffffff44 40%, #ffffff44 60%,
        transparent 60%, transparent 100%
      );
      background-size: 200% 100%;
      background-repeat: no-repeat;
      background-position-x: 150%;
    }

    .shimmer-btn:hover{
      background-position-x: -150%;
      transition: background-position-x 1s ease-in-out;
    }

    .dropdown-item:not(.lang) {
      color: #000;
      position: relative;
      text-decoration: none;
    }

    .dropdown-item:not(.lang)::before {
      background: #f3f5f9;
      content: "";
      inset: 0;
      position: absolute;
      transform: scaleX(0);
      transform-origin: right;
      transition: transform 0.5s ease-in-out;
      z-index: -1;
    }

    .dropdown-item:hover:not(.lang)::before {
      transform: scaleX(1);
      transform-origin: left;
    }

    /* body.modal-open .container{
    -webkit-filter: blur(4px);
    -moz-filter: blur(4px);
    -o-filter: blur(4px);
    -ms-filter: blur(4px);
    filter: blur(4px);
    filter: url("https://gist.githubusercontent.com/amitabhaghosh197/b7865b409e835b5a43b5/raw/1a255b551091924971e7dee8935fd38a7fdf7311/blur".svg#blur);
    filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius='4');
    } */

    @media (min-width: 767px) {
      .showCart{
        display: none;
      }
    }


		.confirm{
			visibility: collapse;
		}
		/* if problem persisted, just put this css in first */

    @media screen and (min-width: 1024px) {
      div .wrap{
      width: 280px;
      word-wrap: break-word;

    }

    }


    @media screen and (max-width: 767px) {
      div .wrap{
      width: 158px;
      word-wrap: break-word;

    }

    }



    @media screen and (min-width: 767px) and (max-width: 1024px) {
      div .wrap{
      width: 210px;
      word-wrap: break-word;

    }
  }


	</style>

  </head>


  <div id="loader-wrapper">
  	<div>
      <img src="{{ asset('frontendv2/assets/img/my-loader.svg') }}" alt="" srcset="" width="80" height="80" style="text-align: center; display:inline-block; margin-top:calc(50vh - 20px);
      ">
    </div>
  </div>

  <!-- Body-->
  <body class="handheld-toolbar-enabled"></body>

  {{-- <div id="loader-wrapper">
  	<div class="loader"></div>
  </div> --}}



    <main class="page-wrapper">


      <!-- Navbar Electronics Store-->

      {{-- Header Area--}}
      @include('frontendv2.body.header')
      {{-- End Header Area--}}









      <!-- Hero (Banners + Slider)-->
      {{-- Slider Area --}}
      {{-- Products grid Trending Products Area --}}
      {{-- Promo Banner Area --}}
      {{-- Brand Area --}}
      {{-- Product Widgets Area --}}
      {{-- Blog Area --}}
      {{-- Blog + Instagram info cards --}}

      @yield('content')

      <!-- End Hero (Banners + Slider)-->
      {{-- End Slider Area --}}
      {{-- End Products grid Trending Products Area --}}
      {{-- End Promo Banner Area --}}
      {{-- End Brand Area --}}
      {{-- End Product Widgets Area --}}
      {{-- End Blog Area --}}
      {{-- End Blog + Instagram info cards --}}

      {{-- Size chart Modal --}}

      {{-- End Size chart Modal --}}

    </main>
    <!-- Footer-->



    {{-- Footer Area --}}
    @include('frontendv2.body.footer')
    {{-- End Footer Area --}}


    @if(request()->is('/') || request()->is('dashboard') || request()->is('product/details/*') || request()->is('user/wishlist')|| request()->is('mycart') || request()->is('login') || request()->is('checkout') || request()->is('user/order_details/*') || request()->is('user/order/tracking') || request()->is('user/compare') || request()->is('user/my/orders') || request()->is('user/return/order/list') || request()->is('user/profile') || request()->is('user/change/password') || request()->is('help') || request()->is('about') || request()->is('contact') || request()->is('checkout/store') || request()->is('user/cash/order') || request()->is('user/online/order') )

    {{-- Mobile UI Area for Home Page --}}
    <div class="handheld-toolbar">
      <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item" href="{{ route('wishlist') }}"><span class="handheld-toolbar-icon"><i class="ci-heart"></i><span class="badge bg-primary rounded-pill ms-1 wishlistQty">0</span>
      </span><span class="handheld-toolbar-label">Wishlist</span></a>


      <a class="d-table-cell handheld-toolbar-item" href="{{ route('mycart') }}"><span class="handheld-toolbar-icon"><i class="ci-cart"></i><span class="badge bg-primary rounded-pill ms-1 cartQty"></span></span> <span class="handheld-toolbar-label" id="cartSubTotal"></span></a>

                                        @php
			                                  if (Auth::check()){
                                          $ncount = Auth::user()->unreadNotifications()->count();
                                        }
                                        else{
                                          $ncount = 0;

                                        }

                                        @endphp

      @if(Auth::check())

      <a class="d-table-cell handheld-toolbar-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"><span class="handheld-toolbar-icon"><i class="ci-bell"></i><span class="badge bg-primary rounded-pill ms-1">  {{ $ncount }}  </span></span> <span class="handheld-toolbar-label">Notifications</span></a>

      @endif

      <a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i class="ci-menu"></i></span><span class="handheld-toolbar-label">Menu</span></a>

    </div>
    </div>
    {{-- End Mobile UI Area --}}

    @elseif (request()->is('shop') || request()->is('product/tag/*') || request()->is('subcategory/*') || request()->is('subsubcategory/*'))

    {{-- Mobile UI Area for Shop Page --}}
    <div class="handheld-toolbar">
      <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#shop-sidebar"><span class="handheld-toolbar-icon"><i class="ci-filter-alt"></i></span><span class="handheld-toolbar-label">Filters</span></a><a class="d-table-cell handheld-toolbar-item" href="{{ route('wishlist') }}"><span class="handheld-toolbar-icon"><i class="ci-heart"></i><span class="badge bg-primary rounded-pill ms-1 wishlistQty">0</span></span><span class="handheld-toolbar-label">Wishlist</span></a>


        <a class="d-table-cell handheld-toolbar-item" href="{{ route('mycart') }}"><span class="handheld-toolbar-icon"><i class="ci-cart"></i><span class="badge bg-primary rounded-pill ms-1 cartQty"></span></span> <span class="handheld-toolbar-label" id="cartSubTotal"></span></a>

        <a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i class="ci-menu"></i></span><span class="handheld-toolbar-label">Menu</span></a>

      </div>
    </div>
    {{-- End Mobile UI Area for Shop Page --}}

    @elseif(request()->is('blog') || request()->is('post/details/*') || request()->is('blog/category/*'))

    <!-- Toolbar for handheld devices (Blog)-->
    <div class="handheld-toolbar">
      <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#blog-sidebar"><span class="handheld-toolbar-icon"><i class="ci-sign-in"></i></span><span class="handheld-toolbar-label">Sidebar</span></a><a class="d-table-cell handheld-toolbar-item" href="{{ route('wishlist') }}"><span class="handheld-toolbar-icon"><i class="ci-heart"></i><span class="badge bg-primary rounded-pill ms-1 wishlistQty"></span></span><span class="handheld-toolbar-label">Wishlist</span></a>



        <a class="d-table-cell handheld-toolbar-item" href="{{ route('mycart') }}"><span class="handheld-toolbar-icon"><i class="ci-cart"></i><span class="badge bg-primary rounded-pill ms-1 cartQty"></span></span> <span class="handheld-toolbar-label" id="cartSubTotal"></span></a>

        <a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i class="ci-menu"></i></span><span class="handheld-toolbar-label">Menu</span></a>

      </div>

    </div>

    @endif




    <!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon ci-arrow-up">   </i></a>
    {{-- JQUERY CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        var availableTags = [];
          $.ajax({
            url: "/product-list",
            type: "GET",

            success: function(data) {
              // console.log(data);
              startAutoComplete(data);
            }
          });

          function startAutoComplete(availableTags) {
            $( ".search_product" ).autocomplete({
              source: availableTags
            });
          }


        // $( "#search_product" ).autocomplete({
        //   source: availableTags
        // });
      </script>


    {{-- VENDOR PLUGINS --}}
    {{-- MAIN THEME JS --}}

    <script src="https://js.stripe.com/v3/"></script>


    {{-- TOASTR + SWEETALERT --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

    {{-- TOASTR + SWEETALERT CDN --}}

    {{-- GSAP PLUGINS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollToPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js"></script>


    <script src="{{ asset('frontendv2/assets/js/code2.js') }}"></script>

<script>
  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type','info') }}"
  switch(type){
     case 'info':
     toastr.info(" {{ Session::get('message') }} ");
     break;
     case 'success':
     toastr.success(" {{ Session::get('message') }} ");
     break;
     case 'warning':
     toastr.warning(" {{ Session::get('message') }} ");
     break;
     case 'error':
     toastr.error(" {{ Session::get('message') }} ");
     break;
  }
  @endif
</script>

    {{-- <script src="{{ asset('frontendv2/assets/js/jquery-1.11.1.min.js') }}"></script>  --}}
    <script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>

    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>


    @php
    $user = Auth::user();
    @endphp

                        <!-- Offcanvas Notifications -->
<div class="offcanvas offcanvas-end" id="offcanvasRight" tabindex="-1">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title">Notifications</h5>
    <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body" data-simplebar>

    @if(Auth::check())

    @forelse($user->notifications as $notification)

    <!-- Post comment -->
<div class=" d-flex align-items-start border-bottom py-2 my-2 roll-in-blurred-right">
  <img class="rounded-circle" width="50" src="{{ asset('frontendv2/assets/img/vartouhi-logo.png') }}" alt="Laura Willson"/>
  <div class="ps-3">
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h6 class="fs-md mb-0">
    @php
        $truncate = Auth::user()->name;
        $numOfChars = strlen($truncate);
        if ($numOfChars > 11) {
            $truncate = substr($truncate, 0, 20).'...';
        }else{
            $truncate = substr($truncate, 0, 20);
        }
    @endphp


      Vartouhi Corporation </h6>

    </div>
    <p class="fs-md mb-1">{{ $notification->data['message'] }}</p>
    <span class="fs-ms text-muted">
      <i class="ci-time align-middle me-2"></i>
      {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
    </span>
  </div>
</div>


    @empty
    <div class="d-flex align-items-center justify-content-center">
      <div class="text-center py-4">
        <h4 class="h4 mb-4 text-muted">No Notifications</h4>
      </div>
    </div>

    @if(!Auth::check())
    <div class="d-flex align-items-center justify-content-center">
      <div class="text-center py-4">
        <h4 class="h4 mb-4 text-muted">No Notifications</h4>
      </div>
    </div>
    @endif

    @endforelse

    @endif



  </div>
</div>

    {{-- Sign-in/Sign-up Modal Area --}}
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link fw-medium active" href="#signin-tab" data-bs-toggle="tab" role="tab" aria-selected="true"><i class="ci-unlocked me-2 mt-n1"></i>Sign in</a></li>
              <li class="nav-item"><a class="nav-link fw-medium" href="#signup-tab" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Sign up</a></li>
            </ul>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body tab-content py-4">


            {{-- ANCHOR SIGN-IN FORM --}}
            <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="signin-tab" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="py-1">
                  <h3 class="d-inline-block align-middle fs-base fw-medium mb-2 me-2">With social account:</h3>
                  <div class="d-inline-block align-middle"><a class="btn-social bs-google me-2 mb-2" href="{{ route('login.google') }}" data-bs-toggle="tooltip" title="Sign in with Google"><i class="ci-google"></i></a><a class="btn-social bs-facebook me-2 mb-2" href="{{ route('login.facebook') }}" data-bs-toggle="tooltip" title="Sign in with Facebook"><i class="ci-facebook"></i></a><a class="btn-social bs-twitter me-2 mb-2" href="{{ route('login.twitter') }}" data-bs-toggle="tooltip" title="Sign in with Twitter"><i class="ci-twitter"></i></a></div>
                </div>
                <hr>
                <h3 class="fs-base pt-4 pb-2">Or using form below</h3>

                <div class="input-group mb-3"><i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>

                  <input class="form-control rounded-start" type="email" placeholder="Email" id="email" name="email" required>
                </div>
                <div class="input-group mb-3"><i class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                  <div class="password-toggle w-100">
                    <input class="form-control" type="password" placeholder="Password" id="password" name="password" required>
            @error('password')
            <span class="invalid-feedback" role="alert">
            <div class="invalid-feedback">{{ $message }}</div>
          </span>

            @enderror

                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" checked id="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                  </div><a class="nav-link-inline fs-sm" href="{{ route('password.request') }}">Forgot password?</a>
                </div>
                <hr class="mt-3">
                <div class="text-end pt-4">
                  <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign in</button>
                </div>
              </form>
            {{-- END SIGN-IN FORM --}}

            {{-- ANCHOR SIGN-UP FORM --}}
            <form class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab" method="POST" action="{{ route('register') }}" onSubmit = "return checkPassword(this)">
                @csrf
                {{-- <div class="container scroll-me"> --}}

              <div class="mb-2">
                <label class="form-label" for="su-name">Username</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="John Oliver Santiago" required>
                <div class="invalid-feedback">Please fill in your name.</div>
              </div>
              <div class="mb-2">
                <label for="su-email" class="form-label">Email address</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="jofs@example.com" required>
                <div class="invalid-feedback">Please provide a valid email address.</div>
              </div>

              <div class="mb-2">
                <label for="su-address" class="form-label">Home Address <span> <div class="form-text">(<strong>e.g.</strong> #26 Padilla St. West Poblacion)</div></span>
                </label>
                <input class="form-control" type="text" id="address" name="address" placeholder="House #, Street/Bldg. Name, Brgy." required>
                <div class="invalid-feedback">Please provide a valid email address.</div>
              </div>

              <div class="mb-2">
                <label for="su-email" class="form-label">Phone number</label>
                <input class="form-control" type="tel" id="phone" name="phone" placeholder="+(63)-012-3456-789" required>
                <div class="invalid-feedback">Please provide a valid email address.</div>
              </div>


              <div class="mb-2">
				<label class="form-label" for="password">Enter password</label>
				<input class="form-control" type="password" id="password" name="password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" data-bs-toggle="tooltip" data-bs-placement="right" title="Password must contain: Minimum of 8 characters; atleast 1 Alphabet and 1 Number.">

                {{-- @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror --}}

				{{-- <div class="form-text"><strong>Password must contain:</strong> Minimum of <strong>8</strong> characters; atleast <strong>1</strong> Alphabet and <strong>1</strong> Number.</div> --}}
				<div class="invalid-feedback">Please provide valid password.</div>
			  </div>

        {{-- ANCHOR CONFIRM PASSWORD --}}
			  <div class="mb-4">
				<label class="form-label" for="password_confirmation">Confirm password</label>
				<input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">

        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
          <div class="invalid-feedback">{{ $message }}</div>
      </span>

        @enderror

                {{-- <div class="invalid-feedback">Password does not match!</div> --}}

                <div class="confirm" id="confirm"><small><span class="text-danger"> Password does not match!</span></small></div>




			  </div>

              <button class="btn btn-primary btn-shadow d-block w-100" type="submit" id="sign-up">Sign up</button>
            {{-- </div> --}}

            </form>
          </div>
        </div>
      </div>
    </div>
    {{-- END SIGN-UP FORM --}}


        {{-- Product Quick View Area --}}

            <!-- Quick View Modal Area-->

            <div class="modal-quick-view modal fade" id="quick-view-electro" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                        <div class="modal-header">


                            <h4 class="modal-title product-title"><a id="plink" href="#" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="Go to product page">

                                    <strong><span id="pname"></span> </strong>


                                    <i class="ci-arrow-right fs-lg ms-2"></i></a></h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" id="closeModel"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <!-- Product gallery-->
                                <div class="col-lg-7 pe-lg-0">
                                    <div class="product-gallery">
                                        <div class="product-gallery-preview order-sm-2">
                                            <div class="product-gallery-preview-item active" id="first">
                                                <img class="image-zoom"
                                                    id="pimage"

                                                    alt="Product image">
                                                <div class="image-zoom-pane"></div>
                                            </div>

                                            <div class="product-gallery-preview-item" id="second"><img class="image-zoom"
                                                    src="{{ asset('frontendv2/assets/img/shop/single/gallery/06.jp') }}g"
                                                    data-zoom="{{ asset('frontendv2/assets/img/shop/single/gallery/06.jpg') }}"
                                                    alt="Product image">
                                                <div class="image-zoom-pane"></div>
                                            </div>
                                            <div class="product-gallery-preview-item" id="third"><img class="image-zoom"
                                                    src="{{ asset('frontendv2/assets/img/shop/single/gallery/07.jpg') }}"
                                                    data-zoom="{{ asset('frontendv2/assets/img/shop/single/gallery/07.jpg') }}"
                                                    alt="Product image">
                                                <div class="image-zoom-pane"></div>
                                            </div>
                                            <div class="product-gallery-preview-item" id="fourth"><img class="image-zoom"
                                                    src="{{ asset('frontendv2/assets/img/shop/single/gallery/08.jpg') }}"
                                                    data-zoom="{{ asset('frontendv2/assets/img/shop/single/gallery/08.jpg') }}"
                                                    alt="Product image">
                                                <div class="image-zoom-pane"></div>
                                            </div>
                                        </div>
                                        {{-- <div class="product-gallery-thumblist order-sm-1">
                                          <a
                                                class="product-gallery-thumblist-item active" href="#first"><img
                                                id="pgallery"

                                                    alt="Product thumb"></a>
                                                    <a class="product-gallery-thumblist-item"
                                                href="#second"><img
                                                    src="{{ asset('frontendv2/assets/img/shop/single/gallery/th06.jpg') }}"
                                                    alt="Product thumb"></a><a class="product-gallery-thumblist-item"
                                                href="#third"><img
                                                    src="{{ asset('frontendv2/assets/img/shop/single/gallery/th07.jpg') }}"
                                                    alt="Product thumb"></a><a class="product-gallery-thumblist-item"
                                                href="#fourth"><img
                                                    src="{{ asset('frontendv2/assets/img/shop/single/gallery/th08.jpg') }}"
                                                    alt="Product thumb"></a>
                                        </div> --}}
                                    </div>
                                </div>
                                <!-- Product details-->
                                <div class="col-lg-5 pt-4 pt-lg-0 image-zoom-pane">
                                    <div class="product-details ms-auto pb-3">
                                        {{-- <div class="mb-2">
                                            <div class="star-rating">
                                                    <i class="star-rating-icon ci-star-filled active"></i>
                                                    <i class="star-rating-icon ci-star-filled active"></i>
                                                    <i class="star-rating-icon ci-star-filled active"></i>
                                                    <i class="star-rating-icon ci-star-filled active"></i>
                                                    <i class="star-rating-icon ci-star"></i>
                                            </div>
                                            <span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74
                                                Reviews</span>
                                        </div> --}}

                                        {{-- <div class="h3 fw-normal text-accent mb-3 me-1"><span id="oldprice"></span>.<small>00</small></div>
                                        <del class="text-danger me-2" id="pprice">.<small>00</small></del><span id="pprice"></span>.<small>00</small> --}}

                                        {{-- <div class="product-price">
                                          <del class="fs-lg text-muted" id="oldprice">
                                              <small>.00</small></del>
                                          <span class=" fs-lg text-accent" id="pprice">
                                              <small>.00</small></span>

                                      </div> --}}



                                      {{-- <label for="color">Choose Color</label>
                                      <select class="form-control" id="color" name="color"> --}}




                                        {{-- <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Color:</span>

                                          <span class="text-muted" id="colorOptionText">Dark blue/Orange</span></div> --}}
                                        <div class="position-relative me-n4 mb-3">






                                            <div id="aviable"></div>
                                            <br>


                                          {{-- </div>  <!-- // end form group -->
                                          <div class="form-group" id="sizeArea">
                                          <label for="size">Choose Size</label>
                                          <select class="form-control" id="size" name="size">
                                            <option>1</option>

                                          </select>
                                        </div>  <!-- // end form group --> --}}


                                        </div>



                                        {{-- <div class="mb-3">
                                          <label for="color" class="form-label">Choose Variant</label>
                                          <select class="form-select" id="color" name="color">

                                          </select>
                                        </div>

                                        <div class="my-3" id="sizeArea">
                                          <label for="size" class="form-label">Choose Size</label>
                                          <select class="form-select" id="size" name="size">

                                            <option>1</option>

                                          </select>
                                        </div> --}}



                                        <div class="d-flex align-items-center pt-2 pb-4">

                                          {{-- <input type="number" class="form-control" id="qty" value="0" min="1"> --}}

                                          <input class="form-control me-3 product-qty" type="number" id="qty" min="0" value="0" style="width: 6rem;">




                                          <input type="hidden" id="product_id">
<button type="submit" id="try" class="btn btn-primary btn-shadow d-block w-100 btn-shadow add-cart" onclick="addToCart()" ><i class="ci-bag fs-lg me-1"></i>Request Item</button>


                                        </div>
                                        {{-- <div class="d-flex mb-4"> <!--START-->
                                            <div class="w-100 me-3"> --}}



                                              {{-- <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>

                                              <input type="hidden" id="product_id">
<button type="submit" id="try" class="btn btn-primary mb-2" onclick="addToCart()" >Add to Cart</button> --}}

          {{-- <input type="hidden" id="product_id">
            <button class="btn btn-danger d-block w-100 btn-shadow" type="submit" onclick="addToWishList()">
              <i class="ci-heart fs-lg me-2"></i><span class='d-none d-sm-inline'>Add to</span> Wishlist</button> --}}







                                            {{-- </div> --}}
                                            {{-- <div class="w-100">
                                                <button class="btn btn-accent d-block w-100 btn-shadow" type="button"><i
                                                        class="ci-compare fs-lg me-2"></i>Compare</button>
                                            </div> --}}
                                        {{-- </div> --}} <!--END-->

                      <!-- Product panels-->
                      <div class="accordion mb-4" id="productPanels">
                        <div class="accordion-item">
                          <h3 class="accordion-header"><a class="accordion-button" href="#shippingOptions" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions"><i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>General info</a></h3>
                          <div class="accordion-collapse collapse show" id="shippingOptions" data-bs-parent="#productPanels">
                            <div class="accordion-body fs-sm">
                              <div class="d-flex justify-content-between border-bottom pb-2">
                                <div>
                                  <div class="fw-semibold text-dark">Product Brand</div>
                                  <div class="fs-sm text-muted"><span id="pbrand"></span></div>
                                </div>
                                <div>...</div>
                              </div>
                              <div class="d-flex justify-content-between border-bottom py-2">
                                <div>
                                  <div class="fw-semibold text-dark">Product Category</div>
                                  <div class="fs-sm text-muted">

                                    @if(session()->get('language') == 'filipino')
                                    <span id="pcategoryFil"></span>
                                    @else
                                    <span id="pcategoryEng"></span>
                                    @endif



                                  </div>
                                </div>
                                <div>...</div>
                              </div>
                              <div class="d-flex justify-content-between border-bottom py-2 ">
                                <div>
                                  <div class="fw-semibold text-dark">Product Tag</div>
                                  <div class="fs-sm text-muted">

                                    @if(session()->get('language') == 'filipino')
                                    <span id="ptagsFil"></span>
                                    @else
                                    <span id="ptagsEng"></span>
                                    @endif


                                  </div>
                                </div>
                                <div>...</div>
                              </div>

                              <div class="d-flex justify-content-between pt-2">
                                <div>
                                  <div class="fw-semibold text-dark">Product Stock</div>
                                  <div class="fs-sm text-muted"><span id="pquantity"></span></div>
                                </div>
                                <div>...</div>
                              </div>


                               <div class="d-flex justify-content-between border-bottom " style="visibility:collapse">
                                <div>
                                  <div class="fw-semibold text-dark">Product Vendor</div>
                                  <div class="fs-sm text-muted">

                                    <span id="pvendor_id"></span>


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
                                  <dt class="fw-semibold">
                                    @if(session()->get('language') == 'filipino')
                                    <span id="shortDetailsFil" class="text"></span>
                                    @else
                                    <span id="shortDetailsEng" class="text"></span>

                                    @endif</dt>
                                  <dd @if(session()->get('language') == 'filipino')
                                    id="longDetailsFil"
                                    @else
                                    id="longDetailsEng"
                                    @endif
                                    >




                                  </dd>

                                </dl>
                            </div>
                          </div>
                        </div>
                        {{-- <div class="accordion-item">
                            <h3 class="accordion-header"><a class="accordion-button collapsed" href="#localStore" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="localStore"><i class="ci-list text-muted fs-lg align-middle mt-n1 me-2"></i>Product Vendor</a></h3>
                            <div class="accordion-collapse collapse" id="localStore" data-bs-parent="#productPanels">
                              <div class="accordion-body pt-3 pb-1">
                                  <dl>
                                    <dt class="fw-semibold">
                                      @if(session()->get('language') == 'filipino')
                                      <span id="shortDetailsFil" class="text"></span>
                                      @else
                                      <span id="shortDetailsEng" class="text"></span>

                                      @endif</dt>
                                    <dd @if(session()->get('language') == 'filipino')
                                      id="longDetailsFil"
                                      @else
                                      id="longDetailsEng"
                                      @endif
                                      >




                                    </dd>

                                  </dl>
                              </div>
                            </div>
                          </div>
                      </div> --}}

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- End Quick View Modal Area --}}


    <script type="text/javascript">
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })
    // Start Product View with Modal
    function productView(id){
        // alert(id)
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/'+id,
            dataType:'json',
            success:function(data){
                // console.log(data)
                $('#product_id').val(id);
                $('#plink').attr('href','/product/details/'+data.product.id+'/'+data.product.product_slug_en);
                $('#pname').text(data.product.product_name_en);
                $('#price').text(data.product.selling_price);
                $('#pcode').text(data.product.product_code);
                $('#pcategoryEng').text(data.product.category.category_name_en);
                $('#pcategoryFil').text(data.product.category.category_name_fil);
                $('#pbrand').text(data.product.brand.brand_name_en);
                $('#pimage').attr('src','/'+data.product.product_thumbnail);
                $('#pvendor_id').text(data.product.vendor_id);
                $('#pimage').attr('data-zoom','/'+data.product.product_thumbnail);
                $('#pgallery').attr('src','/'+data.product.product_thumbnail);
                $('#shortDetailsEng').text(data.product.short_descp_en);
                $('#shortDetailsFil').text(data.product.short_descp_fil);
                $('#ptagsEng').text(data.product.product_tags_en);
                $('#ptagsFil').text(data.product.product_tags_fil);
                $('#longDetailsEng').html(data.product.long_descp_en);
                $('#longDetailsFil').html(data.product.long_descp_fil);
                $('#pquantity').text(data.product.product_qty);
                $('#qty').val(1);
                // !! Start Product Color !!



                // Product Price
                if (data.product.discount_price == null) {
                    $('#pprice').text('');
                    $('#oldprice').text('');
                    $('#pprice').html('₱'+data.product.selling_price+'<small>.00</small>');
                }else{
                    $('#pprice').html('₱'+data.product.discount_price+'<small>.00</small>');
                    $('#oldprice').html('₱'+data.product.selling_price+'<small>.00</small>');
                } // end prodcut price
                // Start Stock opiton
                if (data.product.product_qty > 0) {

                    $('#aviable').text('');
                    $('#stockout').text('');
                    $('#aviable').html(`<div class="product-badge product-available mt-n1"><i class="ci-security-check" ></i>Product Available</div>`);
                    $('#try').attr('disabled',false);
                    $('#qty').attr('max',data.product.product_qty);

                }else{
                    $('#aviable').text('');
                    $('#stockout').text('');
                    $('#aviable').html(`<div class="product-badge product-not-available mt-n1"><i
                                                    class="ci-security-close" ></i>Out of Stock</div>`);
                    $('#try').attr('disabled',true);

                    $('#qty').attr('max',data.product.product_qty);

                } // end Stock Option




        // Color
        $('select[name="color"]').empty();
    $.each(data.color,function(key,value){
        $('select[name="color"]').append('<option value=" '+value+' ">'+value+' </option>')
    }) // end color




         // Size
    $('select[name="size"]').empty();
    $.each(data.size,function(key,value){
        $('select[name="size"]').append('<option value=" '+value+' ">'+value+' </option>')
        if (data.size == "") {
            $('#sizeArea').hide();
        }else{
            $('#sizeArea').show();
        }
    }) // end size




            }
        })

    }
    // Eend Product View with Modal


 // Start Add To Cart Product
    function addToCart(){
        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var vendor  = $('#pvendor_id').text();
        var color = $('#color option:selected').text();
        var size = $('#size option:selected').text();
        var quantity = $('#qty').val();



        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                color:color, size:size, quantity:quantity, product_name:product_name,vendor:vendor
            },
            url: "/cart/data/store/"+id,
            success:function(data){

              miniCart();
                $('#closeModel').click();
                // console.log(data)
                // Start Message
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                    const Toast2 = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'error',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast2.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        })
    }

// End Add To Cart Product


        /// Start Details Page Add To Cart Product
    function addToCartDetails(){
     var product_name = $('#dpname').text();
     var id = $('#dproduct_id').val();
     var vendor  = $('#vproduct_id').val();
     var color = $('#dcolor option:selected').text();
     var size = $('#dsize option:selected').text();
     var quantity = $('#dqty').val();
     $.ajax({
        type: "POST",
        dataType : 'json',
        data:{
            color:color, size:size, quantity:quantity,product_name:product_name,vendor:vendor
        },
        url: "/dcart/data/store/"+id,
        success:function(data){
            miniCart();

            // console.log(data)
            // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    title: data.success,
                    })
            }else{

           Toast.fire({
                    type: 'error',
                    title: data.error,
                    })
                }
              // End Message
        }
     })
    }
     /// Eend Details Page Add To Cart Product


</script>




    <script type="text/javascript">
         function miniCart(){
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType:'json',
                success:function(response){
                  $('span[id="cartSubTotal"]').text('₱ '+response.cartTotal);
                    $('.cartQty').text(response.cartQty);
                  var miniCart = ""
                    $.each(response.carts, function(key,value){

                        miniCart += `<div class="widget-cart-item pb-2 border-bottom">
                                      <button class="btn-close text-danger pt-1" type="button" id="${value.rowId}" onclick="miniCartRemove(this.id)" aria-label="Remove"><span
                                              aria-hidden="true">&times;</span></button>
                                      <div class="d-flex align-items-center"><a class="d-block flex-shrink-0"
                                              href="#"><img
                                                  src="/${value.options.image}" width="64" alt="Product" class="pt-1"></a>
                                          <div class="ps-2">
                                              <h6 class="widget-product-title"><a href="#">${value.name}</a></h6>
                                              <div class="widget-product-meta"><span
                                                      class="text-accent me-2"> ₱ ${value.price}.<small>00</small></span><span
                                                      class="text-muted">x ${value.qty}</span></div>
                                          </div>
                                      </div>
                                  </div>`
                    });

                    if(response.cartQty < 1){
                      $("#mcart").removeClass("jello-horizontal");
                        miniCart += `<div class="d-flex justify-content-center align-items-center py-3">
                          <p class="fs-sm text-muted mb-0">Your cart is currently empty...</p>


                                    </div>`
                      $('.checkoutMe').addClass('disabled',true);
                    }else{
                      $("#mcart").addClass("jello-horizontal");
                      $('.checkoutMe').removeClass('disabled',false);
                    }

                    $('#miniCart').html(miniCart);
                }
            })
         }
     miniCart();


     /// mini cart remove Start
     function miniCartRemove(rowId){
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/'+rowId,
                dataType:'json',
                success:function(data){
                miniCart();
                 // Start Message
                    const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          icon: 'success',
                          showConfirmButton: false,
                          timer: 3000
                        })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
     //  end mini cart remove
    </script>


    <!--  /// Start Add Wishlist Page  //// -->

    <script type="text/javascript">

      function addToWishList(product_id){
          $.ajax({
              type: "POST",
              dataType: 'json',
              url: "/add-to-wishlist/"+product_id,
              success:function(data){

                    // Start Message
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                  })

                  if ($.isEmptyObject(data.error)) {
                      Toast.fire({
                          type: 'success',
                          icon: 'success',
                          title: data.success
                      })
                  }else{
                      Toast.fire({
                          type: 'error',
                          icon: 'error',
                          title: data.error
                      })
                  }
                    // End Message
                    $('.wishlistQty').text(data.wishlistQty);


              }
          })
      }

      </script>

       <!--  /// End Add Wishlist Page  ////   -->
        {{-- var id = value.product_id; --}}
        {{-- var slug = value.product.product_slug_en; --}}
        {{-- {{ url('product/details/'.$product->id.'/'.$product->product_slug_en') }} --}}

       <script type="text/javascript">
        function wishlist(){
           $.ajax({
               type: 'GET',
               url: '/user/get-wishlist-product',
               dataType:'json',
               success:function(response){
                $('.wishlistQty').text(response.wishlistQty);
                   var rows = ""
                   $.each(response.wishlist, function(key,value){

                       rows += `
        <div class="d-sm-flex justify-content-between my-4 mt-lg-4 pb-3 pb-sm-4 border-bottom">
          <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="/product/details/${value.product_id}/${value.product.product_slug_en}" style="width: 10rem;"><img src="/${value.product.product_thumbnail}" alt="Product"></a>
            <div class="pt-2">
              <h3 class="product-title fs-base mb-2"><a href="/product/details/${value.product_id}/${value.product.product_slug_en}">${value.product.product_name_en}</a></h3>
              <div class="fs-sm"><span class="text-muted me-2">Sizes:</span>${value.product.product_size_en != null ? `${value.product.product_size_en}` : `----`}</div>
              <div class="fs-sm"><span class="text-muted me-2">Variants:</span>${value.product.product_color_en != null ? `${value.product.product_color_en}` : `----`} </div>
              <div class="fs-lg text-accent pt-2">${value.product.discount_price == null ? `₱ ${value.product.selling_price}` : `<del class="text-muted fs-lg me-1">₱ ${value.product.selling_price}.<small>00</small></del> <span> ₱ ${value.product.discount_price}</span>`}.<small>00</small></div>
            </div>
          </div>
          <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">

            <button class="btn btn-outline-primary btn-sm" type="submit" href="#quick-view-electro"
                            data-bs-toggle="modal" data-bs-target="#quick-view-electro" id="${value.id}"
                            onclick="productView(${value.product_id})"><i class="ci-cart me-2"></i>Add to Cart</button>
            <button class="btn btn-outline-danger btn-sm" type="submit" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="ci-trash me-2"></i>Remove</button>
          </div>
        </div>`
           });

                   $('#wishlist').html(rows);
               }
           })
        }
    wishlist();


     ///  Wishlist remove Start
     function wishlistRemove(id){
            $.ajax({
                type: 'GET',
                url: '/user/wishlist-remove/'+id,
                dataType:'json',
                success:function(data){
                wishlist();
                 // Start Message
                    const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',

                          showConfirmButton: false,
                          timer: 3000
                        })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
     // End Wishlist remove


    </script>

    <!-- /// End Load Wish list Data  -->








        <!--  /// Start Add Compare Page  //// -->

        <script type="text/javascript">

          function addToCompare(product_id){
              $.ajax({
                  type: "POST",
                  dataType: 'json',
                  url: "/add-to-compare/"+product_id,
                  success:function(data){

                        // Start Message
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                      })

                      if ($.isEmptyObject(data.error)) {
                          Toast.fire({
                              type: 'success',
                              icon: 'success',
                              title: data.success
                          })
                      }else{
                          Toast.fire({
                              type: 'error',
                              icon: 'error',
                              title: data.error
                          })
                      }
                        // End Message
                        $('.compareQty').text(data.compareQty);


                  }
              })
          }

          </script>

           <!--  /// End Add Compare Page  ////   -->


           <script type="text/javascript">
            function compare(){
               $.ajax({
                   type: 'GET',
                   url: '/user/get-compare-product',
                   dataType:'json',
                   success:function(response){
                    $('.compareQty').text(response.compareQty);
                       var rows = ""
                       var tname = ""
                       var description = ""
                       var brand = ""
                       var sizes = ""
                       var variants = ""
                       var stock = ""
                       var price_rating = ""
                       var buttons = ""

                $.each(response.compare, function(key,value){
                           rows += `

                           <td class="text-center px-4 pb-4">

                            <a class="btn btn-sm d-block w-100 text-danger mb-2 reload" type="submit" id="${value.id}" onclick="compareRemove(this.id)" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><i class="ci-trash me-1"></i>Remove</a>

                            <a class="d-inline-block mb-3" href="/product/details/${value.product_id}/${value.product.product_slug_en}"><img src="/${value.product.product_thumbnail}" width="100" alt="Apple iPhone Xs Max"></a>
                  <h3 class="product-title fs-sm"><a href="/product/details/${value.product_id}/${value.product.product_slug_en}">${value.product.product_name_en}</a></h3>
                  <button class="btn btn-icon btn-primary btn-sm" type="submit" href="#quick-view-electro"
                            data-bs-toggle="modal" data-bs-target="#quick-view-electro" id="${value.id}"
                            onclick="productView(${value.product_id})" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Cart"><i class="ci-cart fs-lg"></i></button>

                  <button class="btn btn-sm btn-danger btn-icon" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" id="${value.id}" onclick="addToWishList(this.id)" ><i class="ci-heart fs-lg"></i></button>

                  </td>
                `
               });

                       $('#compareTable .table-header').append(rows);
                       $('.reload').on('click', function(){
                        window.location.reload();
                       });

              $.each(response.compare, function(key,value){
                        tname += `<td class="text-center"><span class="text-dark fw-medium text-dark">${value.product.product_name_en}</span></td>`

               });

                       $('#compareTable .tname').append(tname);



              $.each(response.compare, function(key,value){
                description += `<td class="text-center">

                  <dl>

                    <dt>
                      <div class="mx-auto wrap">
                    ${value.product.short_descp_en}
                      </div>
                    </dt>

                    <dd>
                      <div class="mx-auto wrap">

                      ${value.product.long_descp_en}

                    </div>

                      </dd>

                  </dl>


                  </td>


                `

      });

              $('#compareTable .description').append(description);



              $.each(response.compare, function(key,value){
                        sizes += `<td class="text-center">${value.product.product_size_en}</td>`

                });

                        $('#compareTable .sizes').append(sizes);



              $.each(response.compare, function(key,value){
              variants += `<td class="text-center">${value.product.product_color_en}</td>`

                });

                        $('#compareTable .variants').append(variants);


              $.each(response.compare, function(key,value){
              stock += `<td class="text-center">${value.product.product_qty}</td>`

                });

                        $('#compareTable .stock').append(stock);


              $.each(response.compare, function(key,value){
                price_rating += `<td class="text-center">${value.product.discount_price == null ? `₱ ${value.product.selling_price}` : `<del class="text-muted fs-lg me-1">₱ ${value.product.selling_price}.<small>00</small></del> <span> ₱ ${value.product.discount_price}</span>`}.<small>00</small> </td>`

                });

                        $('#compareTable .price_rating').append(price_rating);


              $.each(response.compare, function(key,value){
                buttons += `<td>
                  <button class="btn btn-primary d-block w-100" type="submit" href="#quick-view-electro"
                            data-bs-toggle="modal" data-bs-target="#quick-view-electro" id="${value.id}"
                            onclick="productView(${value.product_id})">Add to Cart</button>
                </td>`

                });

                        $('#compareTable .buttons').append(buttons);







                   }
               })
            }
        compare();


         ///  Compare remove Start
         function compareRemove(id){
                $.ajax({
                    type: 'GET',
                    url: '/user/compare-remove/'+id,
                    dataType:'json',
                    success:function(data){
                    compare();
                     // Start Message
                        const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',

                              showConfirmButton: false,
                              timer: 3000
                            })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        }else{
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }
                        // End Message
                    }
                });
            }
         // End Compare remove


        </script>

        <!-- /// End Load Compare Data  -->


    <!-- /// Load My Cart /// -->

    <script type="text/javascript">
      function cart(){
         $.ajax({
             type: 'GET',
             url: '/user/get-cart-product',
             dataType:'json',
             success:function(response){
              // $('.product_max_qty').attr('max',response.product_max_qty);


     var rows = ""
     $.each(response.carts, function(key,value){
         rows += `
         <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
          <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="#"><img src="/${value.options.image}" width="160" alt="Product"></a>
            <div class="pt-2">
              <h3 class="product-title fs-base mb-2"><a href="#">${value.name}</a></h3>
              <div class="fs-sm"><span class="text-muted me-2">Size:</span>${value.options.size == null ? `---`:`${value.options.size}`}</div>
              <div class="fs-sm"><span class="text-muted me-2">Variant:</span>${value.options.color == null ? `---`:`${value.options.color}`}</div>
              <div class="fs-lg text-accent pt-2"> <span class="fs-ms text-dark">₱ ${value.price}.<small>00</small> x <strong>${value.qty}</strong> = </span>
                ₱ ${value.subtotal}.<small>00</small></div>
            </div>
          </div>
          <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 10rem;">
            <label class="form-label" for="quantity2">Quantity</label>
              <div class="input-group">

                ${value.qty > 1 ?

                `<button class="btn btn-secondary btn-sm fw-small btn-shadow" type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)" data-bs-toggle="tooltip" data-bs-placement="top" title="decrement">-</button>` :

                `<button class="btn btn-secondary btn-sm fw-small btn-shadow disabled" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="decrement">-</button>`
              }

                <input class="form-control text-center" type="text" placeholder="..." readonly value="${value.qty}" min="1">




                <button class="btn btn-secondary btn-sm fw-small btn-shadow stop" type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" data-bs-toggle="tooltip" data-bs-placement="top" title="increment">+</button>

              </div>


            <button class="btn btn-link px-0 text-danger" type="submit" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="ci-close-circle me-2"></i><span class="fs-sm">Remove</span></button>
          </div>
        </div>`


         });

        if(response.cartQty < 1){
          rows += `<div class="container py-4 mb-lg-3">
    <div class="row justify-content-center pt-lg-4 text-center">
      <div class="col-lg-5 col-md-7 col-sm-9"><img class="d-block mx-auto mb-5" src="{{ asset('frontendv2/assets/img/pages/404.png') }}" width="340"
          alt="404 Error">
        <h1 class="h2">Your Cart is Empty</h1>
      <a href="{{ url('/') }}">
        <p class="fs-md mb-4">
          <u>Add more products to Cart</u>
        </p>
      </a>
      </div>
    </div>

  </div>`
        }

                 $('#cartPage').html(rows);
             }
         })
      }
    cart();


    ///  Cart remove Start
    function cartRemove(id){
      $.ajax({
             type: 'GET',
             url: '/user/cart-remove/'+id,
             dataType:'json',
             success:function(data){
                couponCalculation();
              cart();
                miniCart();
                $('#couponField').show();
                $('#coupon_name').val('');
                // Start Message
                 const Toast = Swal.mixin({
                       toast: true,
                       position: 'top-end',

                       showConfirmButton: false,
                       timer: 3000
                     })
                 if ($.isEmptyObject(data.error)) {
                     Toast.fire({
                         type: 'success',
                         icon: 'success',
                         title: data.success
                     })
                 }else{
                     Toast.fire({
                         type: 'error',
                         icon: 'error',
                         title: data.error
                     })
                 }
                 // End Message
             }
         });
     }
    // End Cart remove


    // -------- CART INCREMENT --------//
    function cartIncrement(rowId){
            $.ajax({
                type:'GET',
                url: "/cart-increment/"+rowId,
                dataType:'json',
                success:function(data){
                    couponCalculation();
                    cart();
                    miniCart();
                }
            });
        }
     // ---------- END CART INCREMENT -----///


      // -------- CART Decrement  --------//
      function cartDecrement(rowId){
            $.ajax({
                type:'GET',
                url: "/cart-decrement/"+rowId,
                dataType:'json',
                success:function(data){
                    couponCalculation();
                    cart();
                    miniCart();
                }
            });
        }
     // ---------- END CART Decrement -----///

    </script>

    <!-- //End Load My cart / -->

    <!--  //// =========== Coupon Apply Start ================= ////  -->
    <script type="text/javascript">
        function applyCoupon(){
          var coupon_name = $('#coupon_name').val();
          $.ajax({
              type: 'POST',
              dataType: 'json',
              data: {coupon_name:coupon_name},
              url: "{{ url('/coupon-apply') }}",
              success:function(data){
                couponCalculation();
                if (data.validity == true) {
                    $('#couponField').hide(500);
                }

                // Start Message
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
              }
          })
        }

        function couponCalculation(){
        $.ajax({
            type:'GET',
            url: "{{ url('/coupon-calculation') }}",
            dataType: 'json',
            success:function(data){

              if(data.total == 0){
                $(".applyCpn").attr("disabled", true);
              }else{
                $(".applyCpn").attr("disabled", false);
              }

                if (data.total) {
                    $('#couponCalField').html(
                        `<div class="widget mb-3">
              <h2 class="widget-title text-center">Subtotal</h2>
              <h3 class="fw-normal text-center my-4">₱ ${data.total}</h3>


            </div>
            <ul class="list-unstyled fs-sm pb-2 border-bottom">
              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span class="text-end">₱ ${data.total}</span></li>
              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span class="text-end">—</span></li>
            </ul>

              <ul class="list-unstyled fs-lead pb-2 ">
                <li class="d-flex justify-content-between align-items-center"><span class="me-2 fw-bold">Grand Total:</span><span class="text-end">₱ ${data.total}</span></li>
            </ul>`
                )
                }else{
                  @php
                    $total = floor(str_replace(',', '', Cart::Subtotal()));

                  @endphp
                     $('#couponCalField').html(
                        `<div class="widget mb-3">
              <h2 class="widget-title text-center">Subtotal</h2>
              <h3 class="fw-normal text-center my-4">₱ ${data.subtotal}</h3>


            </div>
            <ul class="list-unstyled fs-sm pb-2 border-bottom">
              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span class="text-end">₱ ${data.subtotal}</span></li>
              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span class="text-end">-₱ ${data.discount_amount}<small>.00</small></span></li>
            </ul>

              <ul class="list-unstyled fs-lead pb-2 ">
                <li class="d-flex justify-content-between align-items-center"><span class="me-2 fw-bold">Grand Total:</span><span class="text-end">₱ ${data.total_amount}<small>.00</small></span></li>
            </ul>

<div class="alert alert-accent d-flex text-center alert-dismissible fade show" role="alert">
  <div class="alert-icon">
    <i class="ci-discount me-1"></i><small>${Math.round((data.discount_amount / data.total_value)*100)}</small>
  </div>
  <div class="text-center">${data.coupon_name.length < 16 ? `${data.coupon_name.substring(0, 16)}`:`${data.coupon_name.substring(0, 16)}...`}   <button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="couponRemove()"></button>
</div>

</div> `
                )
                }
            }
        });
      }
     couponCalculation();

      </script>
      <!-- //////////////// =========== End Coupon Apply Start ================= //// -->


      <!--  //////////////// =========== Start Coupon Remove================= ////  -->

    <script type="text/javascript">

        function couponRemove(){
           $.ajax({
               type:'GET',
               url: "{{ url('/coupon-remove') }}",
               dataType: 'json',
               success:function(data){
                   couponCalculation();
                   $('#couponField').show(500);
                   $('#coupon_name').val('');
                    // Start Message
                   const Toast = Swal.mixin({
                         toast: true,
                         position: 'top-end',

                         showConfirmButton: false,
                         timer: 3000
                       })
                   if ($.isEmptyObject(data.error)) {
                       Toast.fire({
                           type: 'success',
                           icon: 'success',
                           title: data.success
                       })
                   }else{
                       Toast.fire({
                           type: 'error',
                           icon: 'error',
                           title: data.error
                       })
                   }
                   // End Message
               }
           });
        }
    </script>

<script>

  function checkPassword(form) {
    password = form.password.value;
    password_confirmation = form.password_confirmation.value;


    // If Not same return False.
    if (password != password_confirmation) {
      // alert ("\nPassword did not match: Please try again...")
      $('.confirm').removeClass();

    }else{
      $('#confirm').addClass('confirm');
    }
    // return false;
  }
  </script>

<script type="text/javascript">
  window.onload = function () {
      var password = document.getElementById("password");
      var password_confirmation = document.getElementById("password_confirmation");
      password.onchange = ConfirmPassword;
      password_confirmation.onkeyup = ConfirmPassword;
      function ConfirmPassword() {
          txtConfirmPassword.setCustomValidity("");
          if (password.value !== password_confirmation.value) {
              password_confirmation.setCustomValidity("Passwords do not match.");
          }
      }
  }
</script>



<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
'use strict'
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.needs-validation')
// Loop over them and prevent submission
Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>


  <script type="text/javascript">
    $(document).ready(function() {
      $('select[name="division_id"]').on('change', function(){
          var division_id = $(this).val();
          if(division_id) {

               $.ajax({
                  url: "{{  url('/district-get/ajax') }}/"+division_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                      $('select[name="state_id"]').empty();
                     var d =$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });
$('select[name="district_id"]').on('change', function(){
          var district_id = $(this).val();
          if(district_id) {
              $.ajax({
                  url: "{{  url('/state-get/ajax') }}/"+district_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="state_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');

                                // If Session has coupon
                  @if(Session::has('coupon'))

                      if(value.state_name == 'Luzon'){
                          if({{ session()->get('coupon')['total_amount'] }} < 1000){
                              $('.shipping_fee').html(`+₱ 35.00 `);



                              $('.grand_total').html(` ₱ {{ number_format(session()->get('coupon')['total_amount'] + 35,2)}}

                              `);
                          $('#shipping_form').val(35);
                          }else{
                              $('.shipping_fee').html(` Free Shipping `);
                              $('.grand_total').html(` ₱ {{ number_format(session()->get('coupon')['total_amount'],2) }}

                              `);
                          $('#shipping_form').val(0);

                          }



                      }else if(value.state_name == 'Metro Manila'){
                        if({{ session()->get('coupon')['total_amount'] }} < 1000){
                              $('.shipping_fee').html(`+₱ 45.00 `);



                              $('.grand_total').html(` ₱ {{ number_format(session()->get('coupon')['total_amount'] + 45,2)}}

                              `);
                          $('#shipping_form').val(45);
                          }else{
                              $('.shipping_fee').html(` Free Shipping `);
                              $('.grand_total').html(` ₱ {{ number_format(session()->get('coupon')['total_amount'],2) }}

                              `);
                          $('#shipping_form').val(0);

                          }

                      }else if(value.state_name == 'Visayas'){
                        if({{ session()->get('coupon')['total_amount'] }} < 1000){
                              $('.shipping_fee').html(`+₱ 65.00 `);



                              $('.grand_total').html(` ₱ {{ number_format(session()->get('coupon')['total_amount'] + 65,2)}}

                              `);
                          $('#shipping_form').val(65);
                          }else{
                              $('.shipping_fee').html(` Free Shipping `);
                              $('.grand_total').html(` ₱ {{ number_format(session()->get('coupon')['total_amount'],2) }}

                              `);
                          $('#shipping_form').val(0);

                          }
                      }else if(value.state_name == 'BANGSAMORO'){
                        if({{ session()->get('coupon')['total_amount'] }} < 1000){
                              $('.shipping_fee').html(`+₱ 75.00 `);



                              $('.grand_total').html(` ₱ {{ number_format(session()->get('coupon')['total_amount'] + 75,2)}}

                              `);
                          $('#shipping_form').val(75);
                          }else{
                              $('.shipping_fee').html(` Free Shipping `);
                              $('.grand_total').html(` ₱ {{ number_format(session()->get('coupon')['total_amount'],2) }}

                              `);
                          $('#shipping_form').val(0);

                          }
                      }else if(value.state_name == 'Mindanao'){
                        if({{ session()->get('coupon')['total_amount'] }} < 1000){
                              $('.shipping_fee').html(`+₱ 80.00 `);



                              $('.grand_total').html(` ₱ {{ number_format(session()->get('coupon')['total_amount'] + 80,2)}}

                              `);
                          $('#shipping_form').val(80);
                          }else{
                              $('.shipping_fee').html(` Free Shipping `);
                              $('.grand_total').html(` ₱ {{ number_format(session()->get('coupon')['total_amount'],2) }}

                              `);
                          $('#shipping_form').val(0);

                          }
                      }


                          // If Session has no coupon
                          @else

                          // If order is below 1000 and state is region I
                          if(value.state_name == 'Luzon'){
                              if({{ str_replace(',', '', Cart::Subtotal()) }} < 1000){
                                  $('.shipping_fee').html(`+₱ 35.00 `);

                              $('.grand_total').html(` ₱  {{number_format(str_replace(',', '', Cart::Subtotal()) + 35,2) }}

                              `);

                              $('#shipping_form').val(35);
                              }else{
                                  $('.shipping_fee').html(` Free Shipping `);
                                  $('.grand_total').html(` ₱ {{str_replace(',', '', Cart::Subtotal()) }}

                                  `);
                                  $('#shipping_form').val(0);

                              }


                          }else if(value.state_name == 'Metro Manila'){
                            if({{ str_replace(',', '', Cart::Subtotal()) }} < 1000){
                                  $('.shipping_fee').html(`+₱ 45.00 `);

                              $('.grand_total').html(` ₱  {{number_format(str_replace(',', '', Cart::Subtotal()) + 45,2) }}

                              `);

                              $('#shipping_form').val(45);
                              }else{
                                  $('.shipping_fee').html(` Free Shipping `);
                                  $('.grand_total').html(` ₱ {{str_replace(',', '', Cart::Subtotal()) }}

                                  `);
                                  $('#shipping_form').val(0);

                              }
                          }else if(value.state_name == 'Visayas'){
                            if({{ str_replace(',', '', Cart::Subtotal()) }} < 1000){
                                  $('.shipping_fee').html(`+₱ 65.00 `);

                              $('.grand_total').html(` ₱  {{number_format(str_replace(',', '', Cart::Subtotal()) + 65,2) }}

                              `);

                              $('#shipping_form').val(65);
                              }else{
                                  $('.shipping_fee').html(` Free Shipping `);
                                  $('.grand_total').html(` ₱ {{str_replace(',', '', Cart::Subtotal()) }}

                                  `);
                                  $('#shipping_form').val(0);

                              }
                          }else if(value.state_name == 'BANGSAMORO'){
                            if({{ str_replace(',', '', Cart::Subtotal()) }} < 1000){
                                  $('.shipping_fee').html(`+₱ 75.00 `);

                              $('.grand_total').html(` ₱  {{number_format(str_replace(',', '', Cart::Subtotal()) + 75,2) }}

                              `);

                              $('#shipping_form').val(75);
                              }else{
                                  $('.shipping_fee').html(` Free Shipping `);
                                  $('.grand_total').html(` ₱ {{str_replace(',', '', Cart::Subtotal()) }}

                                  `);
                                  $('#shipping_form').val(0);

                              }
                          }else if(value.state_name == 'Mindanao'){
                            if({{ str_replace(',', '', Cart::Subtotal()) }} < 1000){
                                  $('.shipping_fee').html(`+₱ 80.00 `);

                              $('.grand_total').html(` ₱  {{number_format(str_replace(',', '', Cart::Subtotal()) + 80,2) }}

                              `);

                              $('#shipping_form').val(80);
                              }else{
                                  $('.shipping_fee').html(` Free Shipping `);
                                  $('.grand_total').html(` ₱ {{str_replace(',', '', Cart::Subtotal()) }}

                                  `);
                                  $('#shipping_form').val(0);

                              }
                          }


                          @endif




                        });
                  },
              });
          } else {
              alert('danger');
          }



      });

  });
  </script>

  <script type="text/javascript">
    $(window).on('load', function() {
      $("#loader-wrapper").fadeOut(700);
    });
  </script>

      {{-- <script>
         setTimeout(function(){
            window.location.href = 'https://www.tutorialspoint.com/javascript/';
         }, 3000);
      </script> --}}



      <script>

gsap.registerPlugin(ScrollTrigger);

let sections = gsap.utils.toArray(".product-section");

sections.forEach((section) => {
  // scoped selector - select elements inside this section.
  let q = gsap.utils.selector(section)
  let tl = gsap.timeline({
    delay: 0.5,
    defaults: {
      duration: 1,
      ease: "sine.out"
    },
    scrollTrigger: {
      trigger: section,
      fastScrollEnd: true,
      // markers: true,
      start: "top bottom",
      end: "top 80%", // fastScrollEnd triggers as we leave the section so make sure you have an end position set low down enough to see the impact.
      toggleActions: "play none none reverse",
    }
  });
  tl.from(q('img'), {
    scale: 0.8,
    opacity: 0
  })
  .from(q('p'), {
    y: 50,
    opacity: 0
  },'<50%')
});

      </script>







    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{ asset('frontendv2/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

    <script src="{{ asset('frontendv2/assets/vendor/prismjs/components/prism-core.min.j') }}s"></script>
    <script src="{{ asset('frontendv2/assets/vendor/prismjs/components/prism-markup.min.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/prismjs/components/prism-clike.min.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/prismjs/components/prism-javascript.min.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/prismjs/components/prism-pug.min.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/prismjs/plugins/toolbar/prism-toolbar.min.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/prismjs/plugins/line-numbers/prism-line-numbers.min.js') }}"></script>

    <script src="{{ asset('frontendv2/assets/vendor/drift-zoom/dist/Drift.min.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/lightgallery.js/dist/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/lg-video.js/dist/lg-video.min.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/nouislider/dist/nouislider.min.js') }}"></script>

    <script src="{{ asset('frontendv2/assets/vendor/lg-fullscreen.js/dist/lg-fullscreen.min.js') }}"></script>

    <script src="{{ asset('frontendv2/assets/vendor/lg-zoom.js/dist/lg-zoom.min.js') }}"></script>
    <script src="{{ asset('frontendv2/assets/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>

    {{-- add custom js --}}
    <script src="{{ asset('frontendv2/assets/js/custom.js') }}"></script>


    <!-- Main theme script-->
    <script src="{{ asset('frontendv2/assets/js/theme.min.js') }}"></script>





  </body>
</html>
