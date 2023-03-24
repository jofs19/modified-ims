@extends('frontendv2.main_master')
@section('content')




<section class="container py-4 py-sm-5">

    <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 me-2">Vendor List &nbsp; <span class="badge bg-primary badge-shadow">{{ count($vendors) }}</span>
        </h2>
      </div>
    <div class="row pt-3 pt-sm-0">

        {{-- vendor start --}}
        @foreach($vendors as $vendor)
        @php
        $products = App\Models\Product::where('vendor_id',$vendor->id)->get();
         @endphp
      <div class="col-md-4 col-sm-6 mb-grid-gutter"><a class="card product-card h-100 border-0 shadow pb-2" href="{{ route('vendor.details',$vendor->id) }}"><span class="badge badge-end badge-shadow bg-success fs-md fw-medium" data-bs-toggle="tooltip" title="Average meal cost">{{ count($products) }} <small>products.</small></span><img class="card-img-top" src="{{ asset('frontendv2/assets/img/logo.png') }}" alt="Vendor" >
          <div class="bg-white rounded-3 pt-1 px-2 mx-auto mt-n5" style="width: 100px;height:100px"><img class="d-block rounded-3 mx-auto" src="{{ (!empty($vendor->profile_photo_path)) ? url($vendor->profile_photo_path):url('upload/no_image.jpg') }}" width="100" alt="Brand"></div>
          <div class="card-body text-center pt-3 pb-4">
            <h3 class="h5 mb-2">{{ $vendor->name }}</h3>
            <div class="fs-ms text-muted">member since {{ $vendor->vendor_join }}</div>
          </div></a>
      </div>
      @endforeach
      {{-- vendor end --}}

    </div>
  </section>

  @endsection
