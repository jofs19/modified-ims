@extends('frontendv2.main_master')
@section('content')


@section('title')
Vartouhi | Track your Order
@endsection

<head>

  <style>
.hover-4 {
  --h: 1.2em;   /* the height */
  --c: #1095c1; /* the color */
  
  line-height: var(--h);
  color: #0000;
  text-shadow: 
    0 var(--_t,var(--h)) #fff,
    0 0 var(--_c,#000);
  box-shadow: 0 var(--_t,var(--h)) var(--c);
  clip-path: inset(0 0 1px 0);
  background: linear-gradient(var(--c) 0 0) 0 var(--_t,var(--h)) no-repeat;
  transition: 0.4s ,clip-path 0.4s 0.4s;
}
.hover-4:hover {
  --_t: 0;
  --_c: #0000;
  clip-path: inset(0 0 calc(-1*var(--h)) 0);
  transition: 0.4s 0.4s, clip-path 0.4s;
}

  </style>
</head>

{{-- <head>
    <style>
      
      @include('frontendv2.partials.loading_screen');

    </style>
</head> --}}

<div class="container pb-5 mb-sm-4">
    <div class="pt-5">
      <div class="card py-3 mt-sm-3">
        <div class="card-body text-center">
          <h2 class="h4 pb-3">Thank you for your order, {{ $order->name }}!</h2>
          <p class="fs-sm mb-2">Your order has been placed and will be processed as soon as possible.</p>
          <p class="fs-sm mb-2">Make sure you make note of your order number, which is <span class='fw-medium hover-4'>{{ $order->invoice_no }}</span></p>
          <p class="fs-sm">You will be receiving an email shortly with confirmation of your order. <u>You can now:</u></p><a class="btn btn-secondary mt-3 me-3" href="{{ url('/') }}">Go back shopping</a><a class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalLarge" href="#modalLarge"><i class="ci-location"></i>&nbsp;Track order</a>
        </div>
      </div>
    </div>
  </div>

  @endsection