@extends('frontendv2.main_master')
@section('content')
 
@section('title')
Vartouhi | {{ $blogpost->post_title_en }}
@endsection


<div class="bg-secondary py-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ url('/') }}"><i class="ci-home"></i>Home</a></li>
            <li class="breadcrumb-item text-nowrap"><a href="{{ route('home.blog') }}">Blog</a>
            </li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="top" title="@if(session()->get('language') == 'filipino') {{ $blogpost->post_title_fil }} @else {{ $blogpost->post_title_en }} @endif">@if(session()->get('language') == 'filipino') {{ Str::limit($blogpost->post_title_fil,10) }} @else {{ Str::limit($blogpost->post_title_en,10) }} @endif</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 mb-0">Blog Details</h1>
      </div>
    </div>
  </div>
  <div class="container pb-5">
    <div class="row pt-5 mt-md-2">
      <section class="col-lg-8">
        <!-- Post meta-->
        <div class="d-flex flex-wrap justify-content-between align-items-center pb-4 mt-n1">
          <div class="d-flex align-items-center fs-sm mb-2"><a class="blog-entry-meta-link" href="#">
            @if(session()->get('language') == 'filipino') {{ $blogpost->post_title_fil }} @else {{ $blogpost->post_title_en }} @endif </a><span class="blog-entry-meta-divider"></span><a class="blog-entry-meta-link" href="#">
                {{ Carbon\Carbon::parse($blogpost->created_at)->diffForHumans()  }}</a></div>
          <div class="fs-sm mb-2">
            {{-- <a class="blog-entry-meta-link text-nowrap" href="#comments" data-scroll><i class="ci-message"></i>3</a> --}}
        </div>
        </div>
        <!-- Gallery-->
        <div class="gallery row pb-2">
          <div class="col-12"><a class="gallery-item rounded-3 mb-grid-gutter" href="{{ asset($blogpost->post_image) }}" data-bs-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Gallery image caption #1&lt;/h6&gt;"><img src="{{ asset($blogpost->post_image) }}" alt="Gallery image"><span class="gallery-item-caption">Gallery image caption #1</span></a></div>
         
        </div>
        <!-- Post content-->
            <!-- Post content-->
            <p>@if(session()->get('language') == 'filipino') {!!  $blogpost->post_details_fil  !!} @else {!!  $blogpost->post_details_en  !!} @endif</p>
            
           
            <!-- Post tags + sharing-->
            <div class="d-flex flex-wrap justify-content-between pt-2 pb-4 mb-1">
              <div class="mt-3 me-3">
                
                    
                    @foreach($blogcategory as $category)
                @if($blogpost->category_id == $category->id)

                
                <span class="text-muted fs-sm"> Blog Category: </span><a class="btn-tag me-2 mb-2" href="{{ url('blog/category/post/'.$category->id) }}">@if(session()->get('language') == 'filipino') {{ $category->blog_category_name_fil }} @else {{ $category->blog_category_name_en }} @endif</a>
                @endif
                @endforeach

            
            </div>
              <div class="mt-3"><span class="d-inline-block align-middle text-muted fs-sm me-3 mt-1 mb-2">Share post:</span>     <span class="addthis_inline_share_toolbox"></span>
            </div>
            </div>
        <!-- Post navigation-->
        
        <!-- Comments-->
        {{-- <div class="pt-2 mt-5" id="comments">
          <h2 class="h4">Comments<span class="badge bg-secondary fs-sm text-body align-middle ms-2">3</span></h2>
          <!-- comment-->
          <div class="d-flex align-items-start py-4 border-bottom"><img class="rounded-circle" src="img/testimonials/04.jpg" width="50" alt="Laura Willson">
            <div class="ps-3">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="fs-md mb-0">Laura Willson</h6><a class="nav-link-style fs-sm fw-medium" href="#"><i class="ci-reply me-2"></i>Reply</a>
              </div>
              <p class="fs-md mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat cupidatat non proident, sunt in culpa qui.</p><span class="fs-ms text-muted"><i class="ci-time align-middle me-2"></i>Sep 7, 2019</span>
              <!-- comment reply-->
              <div class="d-flex align-items-start border-top pt-4 mt-4"><img class="rounded-circle" src="img/testimonials/03.jpg" width="50" alt="Michael Davis">
                <div class="ps-3">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="fs-md mb-0">Michael Davis</h6>
                  </div>
                  <p class="fs-md mb-1">Egestas sed sed risus pretium quam vulputate dignissim. A diam sollicitudin tempor id eu nisl. Ut porttitor leo a diam. Bibendum at varius vel pharetra vel turpis nunc.</p><span class="fs-ms text-muted"><i class="ci-time align-middle me-2"></i>Sep 13, 2019</span>
                </div>
              </div>
            </div>
          </div>
          <!-- comment-->
          <div class="d-flex align-items-start py-4"><img class="rounded-circle" src="img/testimonials/02.jpg" width="50" alt="Benjamin Miller">
            <div class="ps-3">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="fs-md mb-0">Benjamin Miller</h6><a class="nav-link-style fs-sm fw-medium" href="#"><i class="ci-reply me-2"></i>Reply</a>
              </div>
              <p class="fs-md mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat cupidatat non proident, sunt in culpa qui.</p><span class="fs-ms text-muted"><i class="ci-time align-middle me-2"></i>Aug 15, 2019</span>
            </div>
          </div>
          <!-- Post comment form-->
          <div class="card border-0 shadow mt-2 mb-4">
            <div class="card-body">
              <div class="d-flex align-items-start"><img class="rounded-circle" src="img/testimonials/01.jpg" width="50" alt="Mary Alice">
                <form class="w-100 needs-validation ms-3" novalidate>
                  <div class="mb-3">
                    <textarea class="form-control" rows="4" placeholder="Write comment..." required></textarea>
                    <div class="invalid-feedback">Please write your comment.</div>
                  </div>
                  <button class="btn btn-primary btn-sm" type="submit">Post comment</button>
                </form>
              </div>
            </div>
          </div>
        </div> --}}
      </section>
      
        @include('frontendv2.blog.blog_sidebar')


    </div>
  </div>

  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62f0967ac2e94b04"></script>


@endsection