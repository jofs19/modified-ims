@extends('frontendv2.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
Item Details
@endsection


<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="url('/')"><i class="ci-home"></i>Home</a></li>
            <li class="breadcrumb-item text-nowrap"><a href="{{ route('shop.page') }}">Shop</a>
            </li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 text-light mb-0">Requestor Information</h1>
      </div>
    </div>
  </div>
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
      <section class="col-lg-8">
        <!-- Steps-->
        <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="{{ route('mycart') }}">
            <div class="step-progress"><span class="step-count">1</span></div>
            <div class="step-label"><i class="ci-cart"></i>Request</div></a><a class="step-item active current" href="{{ route('mycart') }}">
            <div class="step-progress"><span class="step-count">2</span></div>
            <div class="step-label"><i class="ci-user-circle"></i>Details</div></a><a class="step-item" href="{{ route('checkout') }}">
            {{-- <div class="step-progress"><span class="step-count">3</span></div>
            <div class="step-label"><i class="ci-package"></i>Shipping</div></a><a class="step-item" href="checkout-payment.html"> --}}
            {{-- <div class="step-progress"><span class="step-count">3</span></div>
            <div class="step-label"><i class="ci-card"></i>Payment</div></a><a class="step-item" href="checkout-review.html"> --}}
            <div class="step-progress"><span class="step-count">3</span></div>
            <div class="step-label"><i class="ci-check-circle"></i>Review</div></a></div>
        <!-- Autor info-->
        @php
                  $id = Auth::user()->id;
                  $user = App\Models\User::find($id);
        @endphp
        <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
          <div class="d-flex align-items-center">
            <div class="img-thumbnail rounded-circle position-relative flex-shrink-0">
              {{-- <span class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip" title="Reward points">384</span> --}}
              <img class="rounded-circle" src="{{ (!empty($user->profile_photo_path)) ? asset($user->profile_photo_path):url('upload/no_image.jpg') }}" width="90" alt="User Image"></div>
            <div class="ps-3">
              <h3 class="fs-base mb-0">{{ Auth::user()->name }}</h3><span class="text-accent fs-sm">

                @php
                $truncate = Auth::user()->email;
                $numOfChars = strlen($truncate);
                if ($numOfChars > 11) {
                    $truncate = substr($truncate, 0, 22).'...';
                }else{
                    $truncate = substr($truncate, 0, 22);
                }
                @endphp

            {{ $truncate }}


              </span>
            </div>
          </div><a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="{{ route('user.profile') }}"><i class="ci-edit me-2"></i>Edit profile</a>
        </div>
        <!-- Shipping address-->


        <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Requestor Details</h2>
        <form class="needs-validation" action="{{ route('checkout.store') }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf

        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label class="form-label" for="checkout-fn"><small> <span class="ci-announcement mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Field is required"></span></small> Requestor's Name </label>
              <input class="form-control" type="text" id="checkout-fn" name="shipping_name" value="{{ Auth::user()->name }}" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label class="form-label" for="checkout-ln"><small> <span class="ci-announcement mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Field is required"></span></small> Email Address</label>
              <input class="form-control" type="email" id="checkout-ln" name="shipping_email" value="{{ Auth::user()->email }}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label class="form-label" for="checkout-email"> <small> <span class="ci-announcement mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Field is required"></span></small> Phone number </label>
              <input class="form-control" type="tel" id="checkout-email" name="shipping_phone" value="{{ Auth::user()->phone }}" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label class="form-label" for="checkout-company"> <small> <span class="ci-announcement mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Field is required"></span></small> Home Address [House #, Street/Bldg. Name, Brgy.] </label>
              <input class="form-control" type="text" id="checkout-company" name="shipping_address" value="{{ Auth::user()->address }}" required placeholder="House #, Street/Bldg. Name, Brgy.">
            </div>
          </div>
        </div>

        {{-- <div class="row">
            <div class="col-12 mb-4">
                <label class="form-label mb-3" for="fd-comments"><span class="badge bg-info fs-xs me-2">Note</span>Additional comments</label>
                <textarea class="form-control" rows="5" id="fd-comments" name="notes" placeholder="Write a note... (optional)"></textarea>
              </div>
        </div>  --}}
       {{-- <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <select class="form-select" required="required" name="district_id">
                <option value="" disabled class="bg-secondary" selected>Choose your City</option>

              </select>
              <div class="invalid-feedback">Please choose your City!</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <select class="form-select" required="required" name="state_id">
                  <option value="">Your Region</option>

                </select>
                <div class="invalid-feedback">Please choose your city!</div>
          </div>
          </div>
        </div> --}}
        {{-- <h6 class="mb-3 py-3 border-bottom">Select Mode of Payment</h6> --}}

        {{-- <div class="row">
          <div class="col-12">
            <div class="accordion accordio-flush shadow-sm rounded-3 mb-1" id="payment-methods">
              <div class="accordion-item border-bottom">
                <div class="accordion-header py-3 px-3">
                  <div class="form-check d-table collapsed" data-bs-toggle="collapse" data-bs-target="#cash" aria-expanded="false">
                    <input class="form-check-input" type="radio" name="payment_method" value="cash" id="payment-cash" checked="">
                    <label class="form-check-label fw-medium text-dark" for="payment-cash">Cash on delivery<i class="ci-wallet text-muted fs-lg align-middle mt-n1 ms-2"></i></label>
                  </div>
                </div>
                <div class="collapse show" id="cash" data-bs-parent="#payment-methods" style="">
                  <div class="accordion-body pt-2">
                    <div class="d-flex align-items-center">
                      <label class="form-label fw-semibold text-nowrap me-3 mb-0" for="fd-change">I need change from <span class="text-muted"><small>(optional)</small></span> </label>
                      <div class="input-group flex-nowrap" style="width: 9rem;"><span class="input-group-text">₱</span>
                        <input class="form-control bg-none pe-3" type="text" id="fd-change" name="change_amount">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <div class="accordion-header py-3 px-3">
                  <div class="form-check d-table collapsed" data-bs-toggle="collapse" data-bs-target="#paypal" aria-expanded="false">
                    <input class="form-check-input" type="radio" name="payment_method" value="online" id="payment-paypal">
                    <label class="form-check-label fw-medium text-dark" for="payment-paypal">Pay with GCash<i class="ci-mobile text-muted fs-base align-middle mt-n1 ms-1"></i></label>
                  </div>
                </div>
                <div class="collapse" id="paypal" data-bs-parent="#payment-methods" style="">
                  <div class="accordion-body">

                    <div class="row">

                        <div class="col-6">
                            <!-- Toggle first element -->
                            <a href="#multiCollapseExample1" class="btn btn-info btn-shadow d-block w-100 collapsed fw-semibold" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                              <span class="fw-bold">Via QR Code</span>
                            </a>
                        </div>

                        <div class="col-6">
                            <!-- Toggle second element -->
                            <button type="button" class="btn btn-accent btn-shadow d-block w-100 collapsed fw-semibold" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">
                              <span class="fw-bold">Pay manually</span>
                            </button>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-sm-6">

                            <!-- Collapse 1 -->
                            <div class="multi-collapse collapse" id="multiCollapseExample1" style="">
                                <div class="card card-body mb-2">
                                    <center>
                                        <img src="https://1.bp.blogspot.com/-Qr453VqCHB4/YKZvu20gXbI/AAAAAAAAAhc/mkP88PM_4qg0PEUaQjIvAbooUehTCPpQACNcBGAsYHQ/s447/187137836_4066479340104143_2611949824001093430_n.jpg" alt="" width="250"></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <!-- Collapse 2 -->
                            <div class="multi-collapse collapse" id="multiCollapseExample2" style="">
                                <div class="card card-body mb-2">
                                    <p class="fs-sm">Username:&nbsp;&nbsp; <strong>John Oliver
                                            Santiago</strong> </p>
                                    <p class="fs-sm">Account number:&nbsp;&nbsp; <strong>09475220247</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="credit-card-wrapper"></div>
                    <div class="mb-md-5 mb-4 pb-md-0 pb-2">
                        <h2 class="h5 mb-2 pb-1">Upload Receipt of Purchase <small><span class="ci-announcement" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload a valid receipt."></span></small></h2>
                        <p class="mb-4 fs-sm">File types supported: PNG, JPG/JPEG, & GIF. Max size:
                            2mb.</p>
                        <!-- Drag and drop file upload-->




                            <div class="file-drop-area">
                                <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Drag and drop here to upload</span>
                                <input class="file-drop-input" type="file" name="receipt">
                                <button class="file-drop-btn btn btn-outline-accent" type="button">Or select
                                    file</button>
                            </div>
                    </div>
                </div>
                </div>
              </div>
              <div class="accordion-item border-bottom">
                <div class="accordion-header py-3 px-3">
                  <div class="form-check d-table collapsed" data-bs-toggle="collapse" data-bs-target="#credit-card" aria-expanded="false">
                    <input class="form-check-input" type="radio" name="payment_method" value="stripe" id="payment-card">
                    <label class="form-check-label fw-medium text-dark" for="payment-card">Credit card<i class="ci-card text-muted fs-lg align-middle mt-n1 ms-2"></i></label>
                  </div>
                </div>
                <div class="collapse" id="credit-card" data-bs-parent="#payment-methods" style="">
                  <div class="accordion-body py-2">
                    <input class="form-control bg-image-none mb-3" type="text" placeholder="Card number">
                    <div class="row">
                      <div class="col-6 mb-3">
                        <input class="form-control bg-image-none" type="text" placeholder="MM/YY">
                      </div>
                      <div class="col-6 mb-3">
                        <input class="form-control bg-image-none" type="text" placeholder="CVC">
                      </div>
                    </div>
                  </div> <!--end body-->
                </div>
              </div>


            </div>
          </div>

        </div> --}}



        <!-- Navigation (desktop)-->
        <div class="d-none d-lg-flex pt-4 mt-3">
          <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="{{ route('mycart') }}"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
          <div class="w-50 ps-2"><button class="btn btn-primary d-block w-100" type="submit"><span class="d-none d-sm-inline">Finalize</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></button></div>
        </div>
      </section>
      <!-- Sidebar-->
      <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
        <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
          <div class="py-2 px-xl-2">
            <div class="widget mb-3">
              <h2 class="widget-title text-center">Request summary</h2>
              <div style="height: 14.5rem;" data-simplebar data-simplebar-auto-hide="false">

                @foreach ($carts as $item)


              <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0" href="shop-single-v1.html"><img src="{{ asset($item->options->image) }}" width="64" alt="Product"></a>
                <div class="ps-2">
                  <h6 class="widget-product-title"><a href="#">{{ $item->name }}</a></h6>
                  {{-- <div class="widget-product-meta fs-ms">
                    <span class="text-muted me-2"><span class="fw-bold">Size:</span> @if($item->options->size == null) --- @else {{ $item->options->size }} @endif </span> <span class="text-muted"><span class="fw-bold">Variant:</span> @if($item->options->color == null) --- @else {{ $item->options->color }} @endif</span>
                    </div>--}}
                  <div class="widget-product-meta"><span class="text-accent me-2"><small>x</small> {{ $item->qty }}</span></div>

                </div>
              </div>

              @endforeach
              </div>


            </div>
            {{-- @if(Session::has('coupon'))

            <ul class="list-unstyled fs-sm pb-2 border-bottom">
              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span class="text-end">₱ {{ str_replace(',', '', Cart::Subtotal()) }}</span></li>

              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span class="text-end">-₱ {{ number_format(session()->get('coupon')['discount_amount'], 2) }}
                <small> ({{ session()->get('coupon')['coupon_discount'] }})%</small></span></li>

	        @if(str_replace(',', '',session()->get('coupon')['total_amount']) >= 1000)
              <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span class="text-end shipping_fee">Free Shipping</span></li>

            </ul>

            <h3 class="fw-normal text-center my-4">₱{{ number_format(session()->get('coupon')['total_amount'],2)}}</h3>

            @else

            <li class="d-flex justify-content-between align-items-center" ><span class="me-2">Shipping:</span><span class="text-end shipping_fee" >—</span></li>


        </ul>

        <h3 class="fw-normal text-center my-4 grand_total">—</h3>

            @endif --}}





{{--
            @else <!--HAS NO COUPON-->

            <ul class="list-unstyled fs-sm pb-2 border-bottom">
                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span class="text-end">₱{{ str_replace(',', '', Cart::Subtotal()) }}</span></li>

                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span class="text-end">—</span></li>

                @if(str_replace(',', '', Cart::Subtotal())  >= 1000)



                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span class="text-end ">Free Shipping</span></li>

            </ul>

            <h3 class="fw-normal text-center my-4"> ₱{{ str_replace(',', '', Cart::Subtotal())}} </h3>


                @else


                <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span class="text-end shipping_fee">—</span></li>

            </ul>

            <h3 class="fw-normal text-center my-4 grand_total">—</h3>

                @endif


    @endif  --}}


                {{-- <li class="d-flex justify-content-between align-items-center"><span class="me-2">Taxes:</span><span class="text-end">$9.<small>50</small></span></li> --}}









          </div>

          <div class="mb-3 mb-4">
            <label class="form-label mb-3" for="fd-comments"><span class="badge bg-info fs-xs me-2">Note</span>Additional comments</label>
            <textarea class="form-control" rows="5" id="fd-comments" name="notes" placeholder="Write a note... (optional)"></textarea>
          </div>




        </div>
      </aside>
    </div>
    <!-- Navigation (mobile)-->
    <div class="row d-lg-none">
      <div class="col-lg-8">
        <div class="d-flex pt-4 mt-3">
          <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="{{ route('mycart') }}"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
          <div class="w-50 ps-2"><button class="btn btn-primary d-block w-100" type="submit"><span class="d-none d-sm-inline">Finalize</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></button></div>
        </div>
      </div>
    </div>
  </div>

</form>





  @endsection
