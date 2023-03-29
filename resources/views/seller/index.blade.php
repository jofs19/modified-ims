@extends('seller.vendor_dashboard')
@section('vendor')



@php
	$id = Auth::user()->id;
	$verdorId = App\Models\User::find($id);
	$status = $verdorId->status;
@endphp

@if($status == 'inactive')


<section class="pt-lg-4 pb-4 mb-3">


        <div class="row justify-content-center pt-lg-4 text-center">
          <div class="col-lg-5 col-md-7 col-sm-9">
            <h2 class="h3 mb-4">Wait for the admin to authorize your account.</h2>
            <p class="fs-md mb-4">
            </p>
          </div>
        {{-- <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-10">
            <div class="row">
              <div class="col-sm-4 mb-3"><a class="card h-100 border-0 shadow-sm" href="index.html">
                  <div class="card-body">
                    <div class="d-flex align-items-center"><i class="ci-home text-primary h4 mb-0"></i>
                      <div class="ps-3">
                        <h5 class="fs-sm mb-0">Homepage</h5><span class="text-muted fs-ms">Return to homepage</span>
                      </div>
                    </div>
                  </div></a></div>
              <div class="col-sm-4 mb-3"><a class="card h-100 border-0 shadow-sm" href="#">
                  <div class="card-body">
                    <div class="d-flex align-items-center"><i class="ci-search text-success h4 mb-0"></i>
                      <div class="ps-3">
                        <h5 class="fs-sm mb-0">Search</h5><span class="text-muted fs-ms">Find with advanced search</span>
                      </div>
                    </div>
                  </div></a></div>
              <div class="col-sm-4 mb-3"><a class="card h-100 border-0 shadow-sm" href="help-topics.html">
                  <div class="card-body">
                    <div class="d-flex align-items-center"><i class="ci-help text-info h4 mb-0"></i>
                      <div class="ps-3">
                        <h5 class="fs-sm mb-0">Help &amp; Support</h5><span class="text-muted fs-ms">Visit our help center</span>
                      </div>
                    </div>
                  </div></a></div>
            </div>
          </div>
        </div> --}}
      </div>

</section>

@else


@php
    $id = Auth::user()->id;
    $verdorId = App\Models\User::find($id);
    $status = $verdorId->status;



    $total_products = App\Models\Product::where('vendor_id',$id)->count();
    $orderitem = App\Models\OrderItem::with('order')->where('vendor_id',$id)->orderBy('id','DESC')->get();
    $current_date = Carbon\Carbon::now()->format('d-m-Y');
    $customer_reviews = App\Models\Review::where('vendor_id',$id)->count();

@endphp


<!-- Content-->
<section class="col-lg-8 pt-lg-4 pb-4 mb-3">
                <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                  <h2 class="h3 py-2 text-center text-sm-start">Your total products</h2>
                  <div class="row mx-n2 pt-2">
                    <div class="col-md-6 col-sm-6 px-2 mb-4">
                      <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                        <h3 class="fs-sm text-muted">Total Items</h3>
                        <p class="h2 mb-2">{{ $total_products }}</p>
                        <p class="fs-ms text-muted mb-0">as of {{ $current_date }}</p>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 px-2 mb-4">
                      <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                        <h3 class="fs-sm text-muted">Requestor Requests</h3>
                        <p class="h2 mb-2">{{ count($orderitem) }}</p>
                        <p class="fs-ms text-muted mb-0">as of {{ $current_date }}</p>
                      </div>
                    </div>
                    {{-- <div class="col-md-4 col-sm-12 px-2 mb-4">
                      <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                        <h3 class="fs-sm text-muted">Customer reviews</h3>
                        <p class="h2 mb-2">{{ $customer_reviews }}</p>
                        <p class="fs-ms text-muted mb-0">as of {{ $current_date }}</p>
                      </div>
                    </div> --}}
                  </div>

                </div>
              </section>

@endif

@endsection
