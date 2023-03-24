<head>
    <style>
        .btn-warning {
            background-color: #9b7d2b;
            border-color: #9b7d2b;
            text-shadow: #9b7d2b;
        }

        .btn-warning:hover {
            background-color: #CCAC00;
            border-color: #CCAC00;

        }

    </style>
</head>

<aside class="col-lg-4">
    <!-- Sidebar-->
    <div class="offcanvas offcanvas-collapse offcanvas-end border-start ms-lg-auto" id="blog-sidebar" style="max-width: 22rem;">
      <div class="offcanvas-header align-items-center shadow-sm">
        <h2 class="h5 mb-0">Sidebar</h2>
        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body py-grid-gutter py-lg-1 px-lg-4" data-simplebar data-simplebar-auto-hide="true">
        <!-- Categories-->
        <div class="widget widget-links mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
          <h3 class="widget-title">Blog categories</h3>
          <ul class="widget-list">
            @foreach($blogcategory as $category)

            @php
                $blogcount = App\Models\BlogPost::where('category_id', $category->id)->get()->count();
            @endphp

            <li class="widget-list-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="{{ url('blog/category/post/'.$category->id) }}"><span>@if(session()->get('language') == 'filipino') {{ $category->blog_category_name_fil }} @else {{ $category->blog_category_name_en }} @endif</span><span class="fs-xs text-muted ms-3"> {{ $blogcount }}</span></a></li>

            @endforeach
            
          </ul>
        </div>
        
        <!-- Promo banner-->
        <div class="bg-size-cover bg-position-center rounded-3 py-5 mx-lg-2" style="background-image: url({{ asset('frontendv2/assets/img/blog/banner-bg.jpg') }});">
          <div class="py-5 px-4 text-center">
            <h5 class="mb-2">No more dreaming anymore,</h5>
            <p class="fs-sm text-muted">It's about time to glow!</p><a class="btn btn-primary btn-shadow btn-sm" href="{{ route('shop.page') }}">Shop now!</a>
          </div>
        </div>


        
      </div>
    </div>
  </aside>