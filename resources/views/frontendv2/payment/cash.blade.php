@extends('frontendv2.main_master')
@section('content')

@section('title')
Vartouhi | COD
@endsection


<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="url('/')"><i class="ci-home"></i>Home</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="route('shop.page')">Shop</a>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">Checkout</h1>
    </div>
  </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
  <div class="row">
    <section class="col-lg-8">
      <!-- Steps-->
      <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="shop-cart.html">
          <div class="step-progress"><span class="step-count">1</span></div>
          <div class="step-label"><i class="ci-cart"></i>Cart</div></a><a class="step-item active" href="checkout-details.html">
          <div class="step-progress"><span class="step-count">2</span></div>
          <div class="step-label"><i class="ci-user-circle"></i>Details</div></a><a class="step-item active" href="checkout-shipping.html">
         
          
          <div class="step-progress"><span class="step-count">3</span></div>
          <div class="step-label"><i class="ci-check-circle"></i>Review</div></a></div>
      <!-- Order details-->
      <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Review your order</h2>

      <div style="height: 24.5rem;" data-simplebar data-simplebar-auto-hide="false">

      @foreach ($carts as $item)
      <!-- Item-->

      <div class="d-sm-flex justify-content-between my-4 pb-3 border-bottom">

        <div class="d-sm-flex text-center text-sm-start">

          <a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html"><img src="{{ asset($item->options->image) }}" width="150" alt="Product"></a>
          <div class="pt-2">
            <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">{{ $item->name }}</a></h3>
            <div class="fs-sm"><span class="text-muted me-2">Size:</span> @if($item->options->size == null) --- @else {{ $item->options->size }} @endif</div>
            <div class="fs-sm"><span class="text-muted me-2">Variant:</span> @if($item->options->color == null) --- @else {{ ucwords($item->options->color) }} @endif</div>
            <div class="fs-lg text-accent pt-2">₱ {{ $item->price }}<small>.00</small></div>
          </div>
        </div>
        <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-end" style="max-width: 9rem;">
          <p class="mb-0"><span class="text-muted fs-sm">Quantity:</span> <span class="text-muted"><small>x</small> {{ $item->qty }}</span></p>
          <a class="btn btn-link px-0" type="button" href="{{ route('mycart') }}"><i class="ci-edit me-2"></i><span class="fs-sm">Edit</span></a>
        </div>
      </div>
      <!-- Item-->
      @endforeach
    </div>

      <!-- Client details-->
      <div class="bg-secondary rounded-3 px-4 pt-4 pb-2">
        <div class="row">
          <div class="col-sm-6">
            <h4 class="h6">Shipping to:</h4>
            <ul class="list-unstyled fs-sm">
              
              <li><span class="text-muted">Recipient:&nbsp;</span>{{ Auth::user()->name }}</li>
              <li><span class="text-muted">Email:&nbsp;</span>{{ $data['shipping_email'] }}</li>
              <li><span class="text-muted">Phone:&nbsp;</span>{{ $data['shipping_phone'] }}</li>
              @if ($data['notes'] == null)
              <li><span class="text-muted">Notes:&nbsp;</span>----</li>
              @else
              <li><span class="text-muted">Notes:&nbsp;</span>{{ $data['notes'] }}</li>               
              @endif

            </ul>
          </div>
          <div class="col-sm-6">
            <h4 class="h6">Payment method:</h4>
            <ul class="list-unstyled fs-sm">
              <li><span class="text-muted">Standard Payment:&nbsp;</span>Cash on Delivery (COD)</li>
            </ul>

            <h4 class="h6">Shipping Address:</h4>
            <ul class="list-unstyled fs-sm">
              <li><span class="text-muted">Address 1:&nbsp;</span>{{ $data['shipping_address'] }}</li>
              @if ($data['shipping_address2'] != null)
              <li><span class="text-muted">Address 2:&nbsp;</span>{{ $data['shipping_address2'] }}</li>
              @endif
              <li><span class="text-muted">City:&nbsp;</span>{{ $data['post_code'] }}</li>
            </ul>

          </div>
        </div>
      </div>
      <form action="{{ route('cash.order') }}" method="post" id="payment-form">
        @csrf

        <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
        <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
        <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
      <input type="hidden" name="address" value="{{ $data['shipping_address'] }}">
      <input type="hidden" name="address2" value="{{ $data['shipping_address2'] }}">
        <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
        <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
        <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
        <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
        <input type="hidden" name="notes" value="{{ $data['notes'] }}"> 
        <input type="hidden" name="receipt" value="{{ $data['receipt'] }}"> 
        <input type="hidden" name="shipping_charge" value="{{ $data['shipping_charge'] }}"> 
        <input type="hidden" name="change_amount" value="{{ $data['change_amount'] }}"> 
      <!-- Navigation (desktop)-->
      <div class="d-none d-lg-flex pt-4">
        {{-- <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout-payment.html"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Payment</span><span class="d-inline d-sm-none">Back</span></a></div> --}}
        <div class="w-100 ps-2"><button class="btn btn-primary d-block w-100" type="submit"><span class="d-none d-sm-inline">Complete order</span><span class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></button></div>
      </div>
    </section>
    <!-- Sidebar-->
    <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
      <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
        <div class="py-2 px-xl-2">
          <h2 class="h6 text-center mb-4">Order summary</h2>
          
          @if(Session::has('coupon'))

          <ul class="list-unstyled fs-sm pb-2 border-bottom">
            <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span class="text-end">₱ {{ str_replace(',', '', Cart::Subtotal()) }}</span></li>

            <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span class="text-end">-₱ {{ number_format(session()->get('coupon')['discount_amount'], 2) }} 
              <small> ({{ session()->get('coupon')['coupon_discount'] }})%</small></span></li>

              

            {{-- if grand total is greater than 1000 --}}
        @if(str_replace(',', '',session()->get('coupon')['total_amount']) >= 1000)
            <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span class="text-end shipping_fee">Free Shipping</span></li>

          </ul>

          <h3 class="fw-normal text-center my-4">₱{{ number_format(session()->get('coupon')['total_amount'],2)}}</h3>

          @else {{-- if grand total is less than 1000 --}}

          <li class="d-flex justify-content-between align-items-center" ><span class="me-2">Shipping:</span><span class="text-end shipping_fee" >+₱ {{ number_format($data['shipping_charge'],2) }}</span></li>


      </ul>

      <h3 class="fw-normal text-center my-4 grand_total">₱ {{ number_format(str_replace(',', '',session()->get('coupon')['total_amount']) + $data['shipping_charge'],2)}}</h3>

          @endif

            
            
          


          @else <!--HAS NO COUPON-->

          <ul class="list-unstyled fs-sm pb-2 border-bottom">
              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span class="text-end">₱{{ str_replace(',', '', Cart::Subtotal()) }}</span></li>

              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span class="text-end">—</span></li>

              @if(str_replace(',', '', Cart::Subtotal())  >= 1000)

              

              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span class="text-end ">Free Shipping</span></li>

          </ul>

          <h3 class="fw-normal text-center my-4"> ₱{{ str_replace(',', '', Cart::Subtotal())}} </h3>


              @else {{-- if grand total is less than 1000 --}}
              

              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span class="text-end shipping_fee">+₱ {{ number_format($data['shipping_charge'],2) }}</span></li>

          </ul>

          <h3 class="fw-normal text-center my-4 grand_total">₱ {{ number_format(str_replace(',', '', Cart::Subtotal()) + $data['shipping_charge'],2)}}</h3>

              @endif <!--if($cartTotal > 1000)-->


  @endif <!--If session has coupon-->

         
        </div>
      </div>
    </aside>
  </div>
  <!-- Navigation (mobile)-->
  <div class="row d-lg-none">
    <div class="col-lg-8">
      <div class="d-flex pt-4 mt-3">
        {{-- <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="checkout-payment.html"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Payment</span><span class="d-inline d-sm-none">Back</span></a></div> --}}
        <div class="w-100 ps-2"><button class="btn btn-primary d-block w-100" type="submit"><span class="d-none d-sm-inline">Complete order</span><span class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></button></div>
      </div>
    </div>
  </div>
</div>

</form>

@endsection
