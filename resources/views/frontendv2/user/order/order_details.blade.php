@extends('frontendv2.main_master')
@section('content')


@section('title')
PSU-LC | {{  $order->invoice_no }}
@endsection







<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap"><a href="{{ route('my.orders') }}">Requests</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ $order->invoice_no }}</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Order Details</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <!-- Sidebar-->
        @include('frontendv2.common.user_sidebar')


        <!-- Content  -->
        <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                <h6 class="fs-base text-light mb-0">Request #: {{ $order->invoice_no }}</h6>

                <a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="http://127.0.0.1:8000/user/logout"><i class="ci-sign-out me-2"></i>Sign out</a>



                {{-- @if ($order->status == 'reject'|| $order->status == 'confirm')
                {{ $order->status }}ed
                @else
                {{ $order->status }}
                @endif --}}



            </div>

            <div class="bg-secondary rounded-3 px-4 pt-4 pb-2">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="h6">To be received by:</h4>
                        <ul class="list-unstyled fs-sm">
                            <li><span class="text-muted">Requestor:&nbsp;</span>{{ $order->name }}</li>
                            <li><span class="text-muted">Email Address:&nbsp;</span>{{ $order->email }}</li>
                            <li><span class="text-muted">Phone:&nbsp;</span>{{ $order->phone }}</li>
                            <li><span class="text-muted">Address:&nbsp;</span>{{ $order->address }}</li>

                            @if($order->address2 != NULL)
                            <li><span class="text-muted">Address 2:&nbsp;</span>{{ $order->address2 }}</li>
                            @endif
                            {{-- <li><span class="text-muted">Local Area:&nbsp;</span>{{ $order->division->division_name }}, {{ $order->district->district_name }}, {{ $order->state->state_name }} [{{ $order->post_code }}] </li> --}}

                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="h6">Request Details:</h4>
                        <ul class="list-unstyled fs-sm">
                            <li><span class="text-muted">Request #:&nbsp;</span>{{ $order->invoice_no }}</li>
                            {{-- Vendor info --}}


                            {{-- @if($order->payment_method == 'Cash On Delivery')
                            <li><span class="text-muted">Payment Method:&nbsp;</span>{{ $order->payment_method }}</li>
                            @else
                            <li><span class="text-muted">Online Payment:&nbsp;</span>{{ $order->payment_method }}</li>
                            @endif


                            <li><span class="text-muted">Date of Purchase:&nbsp;</span>{{ $order->order_date }}</li>
                            @if($order->payment_method == 'Stripe')
                            <li><span class="text-muted">Transaction ID:&nbsp;</span>{{ $order->order_date }}</li>
                            @endif       --}}

                @if($order->status == 'delivered')

                @if($order->return_order == 0)

                  <li> <span class="text-muted">Request Status:&nbsp;</span>  <span class="badge bg-success m-0">Delivered</span> </li>

                    @elseif($order->return_order == 1)

                   <li> <span class="text-muted">Request Status:&nbsp;</span>  <span class="badge bg-dark m-0"> Return requested </span>
                   </li>

                    @elseif($order->return_order == 2)
                     <li> <span class="text-muted">Request Status:&nbsp;</span> <span class="badge bg-success m-0">Returned </span></li>
                @endif

                @else



                @if($order->status == 'pending')
                <li><span class="text-muted">Request Status:&nbsp;</span> <span class="badge bg-light m-0"> Pending </span></li>
                @elseif($order->status == 'confirm')
                <li><span class="text-muted">Request Status:&nbsp;</span> <span class="badge bg-info m-0"> Confirmed </span></li>
                @elseif($order->status == 'processing')
                <li><span class="text-muted">Request Status:&nbsp;</span> <span class="badge bg-accent m-0"> Processed </span></li>
                @elseif($order->status == 'picked')
                <li><span class="text-muted">Request Status:&nbsp;</span> <span class="badge bg-warning m-0"> Picked </span></li>
                @elseif($order->status == 'shipped')
                <li><span class="text-muted">Request Status:&nbsp;</span> <span class="badge bg-primary m-0"> Shipped </span></li>
                @elseif($order->status == 'delivered')
                <li><span class="text-muted">Request Status:&nbsp;</span> <span class="badge bg-success m-0"> Delivered </span></li>
                @elseif($order->status == 'cancel_order')
                <li><span class="text-muted">Request Status:&nbsp;</span> <span class="badge bg-danger m-0"> Cancelled </span></li>
                @else
                <li><span class="text-muted">Request Status:&nbsp;</span> <span class="badge bg-danger m-0"> Rejected </span></li>
                @endif


                @endif





            </ul>


                    </div>
                </div>
            </div>

            <!-- Wishlist-->
            <div style="height: 24rem;" data-simplebar data-simplebar-auto-hide="false">

                @foreach($orderItem as $item)

                <!-- Item-->
                <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
                    <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a
                            class="d-block flex-shrink-0 mx-auto me-sm-4" href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}"
                            style="width: 10rem;"><img src="{{ asset($item->product->product_thumbnail) }}" alt="Product"></a>
                        <div class="pt-2">
                            <h3 class="product-title fs-base mb-2"><a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug_en ) }}">{{ $item->product->product_name_en }}</a></h3>
                            {{-- <div class="fs-sm"><span class="text-muted me-2">Size:</span>{{ $item->size }}</div>
                            <div class="fs-sm"><span class="text-muted me-2">Variant:</span>{{ $item->color }}</div> --}}
                            {{-- <div class="fs-lg text-accent pt-2">{{ $item->qty }}</span>
                            </div> --}}
                        </div>
                    </div>
                    <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                        <p class="mb-0"><span class="text-muted fs-sm">Quantity:</span><span>&nbsp;{{ $item->qty }}</span></p>
                    </div>
                </div>

                @endforeach



            @php

              $total=0;

              foreach ($orderItem as $item) {
                $total += $item->price * $item->qty;

              }


              $total_formatted = number_format($total, 2);
              $all_total = floatval($total);

            @endphp


@php
  $discount_amount = floatval($order->amount);
@endphp
{{-- {{  $all_total - $discount_amount }} --}}

@php
  $discount_format = number_format($all_total - $discount_amount, 2);
  $discount = floatval($all_total - $discount_amount);
@endphp


{{-- <p>Sub-Total : ₱ {{ $total - $discount }}</p> --}}

@php
  $subtotal_format = number_format($total - $discount, 2);
@endphp

{{-- <h3>Sub-Total : ₱ {{ $subtotal_format }}</h3> --}}
                <div class="modal-footer flex-wrap bg-secondary fs-md text-right">

                    @if($order->status !== "delivered")

                    @if ($order->status == "pending")

                    <div class="text-center">
                      <a class="btn btn-danger btn-sm removeOrder" href="{{ route("cancel.order", $order->id) }}"><i class="ci-reply me-2"></i>Cancel Request</a>
                      </div>

                    @endif
                    {{-- <div class="px-2 py-1"><span class="text-muted">SubTotal:&nbsp;</span><span> ₱ {{ $total_formatted}} </span></div>
                    <div class="px-2 py-1"><span class="text-muted">Discount:&nbsp;</span><span>-₱ {{ $discount_format }}</span></div>
                    <div class="px-2 py-1"><span class="text-muted">Shipping:&nbsp;</span> --}}

                        {{-- @if($order->shipping_charge == NULL)
                        <span>Free shipping</span>
                        @else
                        <span>+₱ {{ number_format($order->shipping_charge,2) }}</span>
                        @endif

                    </div>

                    <div class="px-2 py-1"><span class="text-muted">Grand total:&nbsp;</span><span class="fs-lg text-accent">₱ {{ number_format($order->amount+$order->shipping_charge,2) }}</span></div> --}}
                    {{-- @if($order->status !== "delivered")

@else

@php
$order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
@endphp






@if(!($order))

<span class="badge badge-pill badge-warning" style="background: red">


    You have sent return request for this product

  </span>

@endif


@endif --}}
                  </div>


            </div><!--simplebar-->





            @else

            @php
            $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
            @endphp


            @if($order)

            <div class="text-end pt-2">
            <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#open-ticket"><i class="ci-reply me-2"></i>Return Order</a>
            </div>

        </section>
    </div>
</div>




<!-- Open Ticket Modal-->
<form class="needs-validation modal fade" action="{{ route('return.order',$order->id) }}" method="post" id="open-ticket" tabindex="-1" novalidate enctype="multipart/form-data">
@csrf

<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title">Return the product</h5>
  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
  <p class="text-muted fs-sm">Upload an image of the product.</p>
  <div class="row gx-4 gy-3">
    <div class="col-12">
        <div class="file-drop-area">
            <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Drag and drop here to upload</span>
            <input class="file-drop-input" type="file" name="return_image">
            <button class="file-drop-btn btn btn-outline-accent" type="button">Or select file</button>
          </div>
    </div>


    <div class="col-12">
      <label class="form-label" for="ticket-description">Describe your issue</label>
      <textarea class="form-control" id="ticket-description" rows="8" required name="return_reason"></textarea>
      <div class="invalid-feedback">Please provide description!</div>
    </div>

  </div>
</div>
<div class="modal-footer">
  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
  <button class="btn btn-primary" type="submit">Return</button>
</div>
</div>
</div>
</form>



@else

<div class="alert alert-warning d-flex pt-2 mt-2" role="alert">
    <div class="alert-icon">
      <i class="ci-security-announcement"></i>
    </div>
    <div>You had already sent a return request for this order.</div>
  </div>

@endif
@endif


@endsection
