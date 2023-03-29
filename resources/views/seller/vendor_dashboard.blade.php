<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Staff Dashboard </title>

    <!-- SEO Meta Tags-->
    <meta name="description" content="JOFS E-Commerce">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="color-scheme" content="dark"> --}}

    <meta name="keywords" content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean, vendor">
    <meta name="author" content="John Oliver Santiago">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{ asset('frontendv2/assets/img/psu.png') }}" />

    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontendv2/assets/img/psu.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontendv2/assets/img/psu.png') }}">
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
    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/vendor/prismjs/plugins/line-numbers/prism-line-numbers.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/vendor/flatpickr/dist/flatpickr.min.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- TinyMCE -->
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
          tinymce.init({
            selector: 'textarea#tiny'
                plugins: [
                'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
                'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
                'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
                ],
                toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify |' +
                'bullist numlist checklist outdent indent | removeformat | code table help'
          })
        </script>



    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />





    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/vendor/nouislider/dist/nouislider.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>




    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('frontendv2/assets/css/theme.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


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

{{--
  <div id="loader-wrapper">
  	<div>
      <img src="{{ asset('frontendv2/assets/img/my-loader.svg') }}" alt="" srcset="" width="80" height="80" style="text-align: center; display:inline-block; margin-top:calc(50vh - 20px);
      ">
    </div>
  </div> --}}
  <!-- Body-->
  <body class="handheld-toolbar-enabled">


    {{-- NOTIFICATION --}}


                            <!-- Offcanvas Notifications -->
<div class="offcanvas offcanvas-end" id="offcanvasRight2" tabindex="-1">
    <div class="offcanvas-header border-bottom">
      <h5 class="offcanvas-title">Notifications</h5>
      <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body" data-simplebar>

        @php
            $user = Auth::user();

        @endphp

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


        PCBuild Corporation </h6>

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



    <main class="page-wrapper">
      <!-- Navbar Marketplace-->
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->

      @php
      $id = Auth::user()->id;
      $user = App\Models\User::find($id);
      @endphp

      @include('seller.body.header')

      <div class="container mb-5 pb-3">
        <div class="bg-light shadow-lg rounded-3 overflow-hidden">
          <div class="row">

            @include('seller.body.sidebar')


            @yield('vendor')




          </div>
        </div>
      </div>
    </main>
    <!-- Footer-->
    @include('seller.body.footer')

    <!-- Toolbar for handheld devices (Marketplace)-->
    <div class="handheld-toolbar">
      <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item {{ (request()->is('vendor/all/product')) ? 'active' : '' }}" href="{{ route('vendor.all.product') }}"><span class="handheld-toolbar-icon"><i class="ci-package"></i></span><span class="handheld-toolbar-label">Items</span></a><a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i class="ci-menu"></i></span><span class="handheld-toolbar-label">Menu</span></a><a class="d-table-cell handheld-toolbar-item {{ (request()->is('vendor/order')) ? 'active' : '' }}" href="{{ route('vendor.order') }}"><span class="handheld-toolbar-icon"><i class="ci-currency-exchange opacity-60"></i></span><span class="handheld-toolbar-label">Requests</span></a></div>
    </div>
    <!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon ci-arrow-up">   </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    {{-- tags input --}}


    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

        {{-- <script src="{{ asset('frontendv2/assets/js/jquery-1.11.1.min.js') }}"></script>  --}}
        <script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>

        <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>

    <script src="{{ asset('frontendv2/assets/js/vendorcode.js') }}"></script>

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-
    KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>


    {{-- add custom js --}}
    <script src="{{ asset('frontendv2/assets/js/custom.js') }}"></script>


    <!-- Main theme script-->
    <script src="{{ asset('frontendv2/assets/js/theme.min.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
      </script>

      <script>
          tinymce.init({
            selector: '#mytextarea'
          });
      </script>

  </body>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/@yaireo/tagify"></script>
  <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
  <script>
    // The DOM element you wish to replace with Tagify
var input1 = document.querySelector('.tag1')
var input2 = document.querySelector('.tag2')
var input3 = document.querySelector('.tag3')


// initialize Tagify on the above input node reference and convert to string
new Tagify(input1)
new Tagify(input2)
new Tagify(input3)

// convert to string
var str =

  </script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- TOASTR + SWEETALERT --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



    {{-- TOASTR + SWEETALERT CDN --}}







</html>
