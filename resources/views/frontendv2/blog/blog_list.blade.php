@extends('frontendv2.main_master')
@section('content')
 
@section('title')
Blog Page 
@endsection

<div class="bg-dark py-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="{{ url('/') }}"><i class="ci-home"></i>Home</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="{{ url('/contact') }}">Blog</a>
          </li>

          {{-- <li class="breadcrumb-item text-nowrap active" aria-current="page">Shop</li> --}}

          
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">Blog Page</h1>
    </div>
  </div>
</div>
  <div class="container pb-5 mb-2 mb-md-4">
    <!-- Featured posts carousel-->
    
    <div class="row pt-5 mt-md-2">
      <!-- Entries grid-->
      <section class="col-lg-8">
        <div class="masonry-grid" data-columns="2">

        @foreach($blogpost as $blog)
          <!-- Entry-->
          <article class="masonry-grid-item">
            <div class="card"><a class="blog-entry-thumb" href="{{ route('post.details', $blog->id) }}"><img class="card-img-top" src="{{ asset($blog->post_image) }}" alt="Post"></a>
              <div class="card-body">
                <h2 class="h6 blog-entry-title"><a href="blog-single-sidebar.html">@if(session()->get('language') == 'filipino') {{ $blog->post_title_fil }} @else {{ $blog->post_title_en }} @endif</a></h2>

                <small><p class="fs-sm"> @if(session()->get('language') == 'filipino') {!! Str::limit($blog->post_details_fil, 200 )  !!} @else {!! Str::limit($blog->post_details_en, 200 )  !!} @endif </p>
                </small>

                @foreach($blogcategory as $category)
                @if($blog->category_id == $category->id)

                
                <a class="btn-tag me-2 mb-2" href="{{ url('blog/category/post/'.$category->id) }}">@if(session()->get('language') == 'filipino') {{ $category->blog_category_name_fil }} @else {{ $category->blog_category_name_en }} @endif</a>
                @endif
                @endforeach
              </div>
              <div class="card-footer d-flex align-items-center fs-xs">                <div class="addthis_inline_share_toolbox"></div>

                <div class="ms-auto text-nowrap"><a class="blog-entry-meta-link text-nowrap" href="#">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</a></div>
              </div>
            </div>
          </article>
          <!-- End Entry -->
          @endforeach


        </div>
        <hr class="mb-4">
        <!-- Pagination-->
        {{ $blogpost->links('vendor.pagination.grid_paginate') }}

      </section>

      {{-- Sidebar --}}

      @include('frontendv2.blog.blog_sidebar')

    </div>
  </div>
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62f0967ac2e94b04"></script>

      <script src="{{ asset('frontendv2/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>

  @endsection