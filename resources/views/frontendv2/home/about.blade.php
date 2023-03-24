@extends('frontendv2.main_master')
@section('content')


@section('title')
Vartouhi | About Us
@endsection

          <!-- Page Title (Light)-->
          <div class="bg-dark py-4">
            <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
              <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="{{ url('/') }}"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="{{ url('/about') }}">About Us</a>
                    </li>
        
                    {{-- <li class="breadcrumb-item text-nowrap active" aria-current="page">Shop</li> --}}
        
                    
                  </ol>
                </nav>
              </div>
              <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">About Us</h1>
              </div>
            </div>
          </div>
          {{-- <br>
          <br> --}}

<main class="container-fluid px-0">

    <!-- Row: Shop online-->
    <section class="row g-0">
      <div class="col-md-6 bg-position-center bg-size-cover bg-secondary" style="min-height: 15rem; background-image: url({{ asset('frontendv2/assets/img/about/01.jp') }}g);"></div>
      <div class="col-md-6 px-3 px-md-5 py-5">
        <div class="mx-auto py-lg-5" style="max-width: 35rem;">
          <h2 class="h3 pb-3">Search, Select, Buy online</h2>
          <p class="fs-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor tristique nec. Tristique nulla aliquet enim tortor at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p><a class="btn btn-primary btn-shadow" href="shop-grid-ls.html">View products</a>
        </div>
      </div>
    </section>
    <!-- Row: Delivery-->
    <section class="row g-0">
      <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2" style="min-height: 15rem; background-image: url({{ asset('frontendv2/assets/img/about/02.jpg') }});"></div>
      <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
        <div class="mx-auto py-lg-5" style="max-width: 35rem;">
          <h2 class="h3 pb-3">Fast delivery nationwide</h2>
          <p class="fs-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor tristique nec. Tristique nulla aliquet enim tortor at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p><a class="btn btn-accent btn-shadow" href="#">Shipping details</a>
        </div>
      </div>
    </section>
    <!-- Row: Mobile app-->
    <section class="row g-0">
      <div class="col-md-6 bg-position-center bg-size-cover bg-secondary" style="min-height: 15rem; background-image: url({{ asset('frontendv2/assets/img/about/03.jpg') }});"></div>
      <div class="col-md-6 px-3 px-md-5 py-5">
        <div class="mx-auto py-lg-5" style="max-width: 35rem;">
          <h2 class="h3 pb-3">Portability at its finest. Shop on the go</h2>
          <p class="fs-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod. Duis erat lectus, ultrices euismod sagittis at dolor tristique nec. Tristique nulla aliquet enim tortor at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p>
          {{-- <a class="btn-market btn-apple me-3 mb-3" href="#" role="button"><span class="btn-market-subtitle">Download on the</span><span class="btn-market-title">App Store</span></a><a class="btn-market btn-google mb-3" href="#" role="button"><span class="btn-market-subtitle">Download on the</span><span class="btn-market-title">Google Play</span></a> --}}
        </div>
      </div>
    </section>
    <!-- Section: Shopping outlets-->
    <section class="row g-0">
      <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2" style="min-height: 15rem; background-image: url('https://th.bing.com/th/id/R.efbdfa912f287e01adafb67915099179?rik=%2fv7ovTEMIOKJJg&riu=http%3a%2f%2fwww.specbuildingservice.com.au%2fwp-content%2fuploads%2f1-24.jpg&ehk=d2isjnh2PxNw%2bE2Um6fxdGWWFYHpGVf6Rsm61lfkTj8%3d&risl=&pid=ImgRaw&r=0');"></div>
      <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
        <div class="mx-auto py-lg-5" style="max-width: 35rem;">
          <h2 class="h3 pb-3">Shop offline. Cozy outlet stores</h2>
          <p class="fs-sm pb-3 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor tristique nec. Tristique nulla aliquet enim tortor at auctor urna nunc. Sit amet aliquam id diam maecenas ultricies mi eget.</p><a class="btn btn-warning btn-shadow" href="contacts.html">See outlet stores</a>
        </div>
      </div>
    </section>
    <hr>
    <!-- Section: Team-->
    <section class="container py-3 py-lg-5 mt-4 mb-3">
      <h2 class="h3 my-2">Our core team</h2>
      <p class="fs-sm text-muted">People behind your great shopping experience</p>
      <div class="row pt-3">

        <div class="col-lg-3 col-sm-6 mb-grid-gutter">
          <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('frontendv2/assets/img/doms-circle.pn') }}g" width="90" alt="Ugaban">
            <div class="ps-3">
              <h6 class="fs-base pt-1 mb-1">Christian Dominic Ugaban</h6>
              <p class="fs-ms text-muted mb-0">QA Analyst | Documentarian</p><a class="nav-link-style fs-ms text-nowrap" href="mailto:thatsmextian@gmail.com"><i class="ci-mail me-2"></i>thatsmextian@gmail.com</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-grid-gutter">
          <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('frontendv2/assets/img/rems-circle.png') }}" width="90" alt="Basilio">
            <div class="ps-3">
              <h6 class="fs-base pt-1 mb-1">Remdell Ardie Basilio</h6>
              <p class="fs-ms text-muted mb-0">QA Analyst | Documentarian</p><a class="nav-link-style fs-ms text-nowrap" href="mailto:remdellardie@gmail.com"><i class="ci-mail me-2"></i>remdellardie@gmail.com</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-grid-gutter">
          <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('frontendv2/assets/img/ramos-circle.png') }}" width="90" alt="Ramos">
            <div class="ps-3">
              <h6 class="fs-base pt-1 mb-1">Maria Leonor Ramos</h6>
              <p class="fs-ms text-muted mb-0">QA Analyst | Documentarian</p><a class="nav-link-style fs-ms text-nowrap" href="mailto:maleonorramos@gmail.com"><i class="ci-mail me-2"></i>maleonorramos@gmail.com</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-grid-gutter">
            <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('frontendv2/assets/img/jofs-circle.png') }}" width="90" alt="Santiago">
              <div class="ps-3">
                <h6 class="fs-base pt-1 mb-1">John Oliver Santiago</h6>
                <p class="fs-ms text-muted mb-0">Web Developer | Project Manager</p><a class="nav-link-style fs-ms text-nowrap" href="mailto:johnoliversantiago5@gmail.com"><i class="ci-mail me-2"></i>johnoliversantiago5@gmail.com</a>
              </div>
            </div>
          </div>
        {{-- <div class="col-lg-4 col-sm-6 mb-grid-gutter">
          <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('frontendv2/assets/img/team/01.jpg') }}" width="96" alt="Benjamin Miller">
            <div class="ps-3">
              <h6 class="fs-base pt-1 mb-1">Benjamin Miller</h6>
              <p class="fs-ms text-muted mb-0">Website development</p><a class="nav-link-style fs-ms text-nowrap" href="mailto:b.miller@example.com"><i class="ci-mail me-2"></i>b.miller@example.com</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-grid-gutter">
          <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ asset('frontendv2/assets/img/team/07.jpg') }}" width="96" alt="Miguel Rodrigez">
            <div class="ps-3">
              <h6 class="fs-base pt-1 mb-1">Miguel Rodrigez</h6>
              <p class="fs-ms text-muted mb-0">Content manager</p><a class="nav-link-style fs-ms text-nowrap" href="mailto:b.miller@example.com"><i class="ci-mail me-2"></i>m.rodrigez@example.com</a>
            </div>
          </div>
        </div> --}}
      </div>
    </section>
    <!-- Section: We are hiring-->
    <hr>
    <section class="row g-0">
      <div class="col-md-6 bg-position-center bg-size-cover bg-secondary order-md-2" style="min-height: 15rem; background-image: url({{ asset('frontendv2/assets/img/about/05.jpg') }});"></div>
      <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
        <div class="mx-auto py-lg-5" style="max-width: 35rem;">
          <h2 class="h3 mb-2">We are hiring new talents</h2>
          <p class="fs-sm text-muted pb-2">If you want to be part of our team please submit you CV using the form below:</p>
          <form class="needs-validation row g-4" method="post" novalidate>
            <div class="col-sm-6">
              <input class="form-control" type="text" placeholder="Your name" required>
            </div>
            <div class="col-sm-6">
              <input class="form-control" type="email" placeholder="Your email" required>
            </div>
            <div class="col-12">
              <textarea class="form-control" rows="4" placeholder="Message" required></textarea>
            </div>
            <div class="col-12">
              <input class="form-control" type="file" required>
            </div>
            <div class="col-12">
              <button class="btn btn-info btn-shadow" type="submit">Submit your CV</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>

@endsection