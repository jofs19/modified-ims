@extends('frontendv2.main_master')
@section('content')

@section('title')
PSU-LC | Requested Items
@endsection

<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
            {{-- <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
            </li> --}}
            <li class="breadcrumb-item text-nowrap active" aria-current="page">Requests</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 text-light mb-0">Your Requests</h1>
      </div>
    </div>
  </div>
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
      <!-- List of items-->
      <section class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
          <h2 class="h6 text-light mb-0">Items</h2><a class="btn btn-outline-primary btn-sm ps-2" href="{{ route('shop.page') }}"><i class="ci-arrow-left me-2"></i>Continue shopping</a>
        </div>
        <div style="height: 30rem;" data-simplebar data-simplebar-auto-hide="false">

            <!-- Item-->
        <div id="cartPage"></div>
        <!-- End Item-->




        </div>

<div class="row">
    <div class="col-lg-6">
        <a class="btn btn-danger btn-shadow  w-100 mt-4" href="{{ url('/') }}"><i class="ci-reply fs-lg me-2"></i>Exit</a>

    </div>
    <div class="col-lg-6">
        <a class="btn btn-accent btn-shadow  w-100 mt-4" href="{{ route('checkout') }}"><i class="ci-card fs-lg me-2"></i>Request Items</a>
    </div>
</div>

      </section>
      <!-- Sidebar-->
      {{-- <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
        <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
          <div class="py-2 px-xl-2">

            <div id="couponCalField"></div>

            @if(Session::has('coupon'))

	          @else


            <div class="accordion accordion-flush" id="couponField">
                  <div class="accordion-item">
                    <h3 class="accordion-header"><a class="accordion-button" href="#promo-code" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="promo-code">Apply promo code</a></h3>
                    <div class="accordion-collapse collapse show" id="promo-code" data-bs-parent="#order-options">
                        <div class="mb-3">
                          <input class="form-control" type="text" placeholder="Promo code" required id="coupon_name">
                          <div class="invalid-feedback">Please provide promo code.</div>
                        </div>
                        <button class="btn btn-outline-primary d-block w-100 applyCpn" type="submit" onclick="applyCoupon()">Apply promo code</button>
                    </div>
                  </div>

                </div>
            @endif

            <a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="{{ route('checkout') }}"><i class="ci-card fs-lg me-2"></i>Proceed to Checkout</a>
          </div>
        </div>
      </aside> --}}
    </div>
  </div>

  <script>

  </script>

  @endsection
