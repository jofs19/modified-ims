@extends('seller.vendor_dashboard')
@section('vendor')

<section class="col-lg-8 pt-lg-4 pb-4 mb-3">
    <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
      <!-- Title-->
      <div class="d-sm-flex flex-wrap justify-content-between align-items-center border-bottom">
        {{-- Products count --}}
        {{-- @php
        $id = Auth::user()->id;
        $products = App\Models\Product::where('user_id', $id)->get();

        @endphp --}}
        <h2 class="h3 py-2 me-2 text-center text-sm-start">Your products<span class="badge bg-faded-accent fs-sm text-body align-middle ms-2">{{ $products->count() }}</span></h2>
        <div class="py-2">
          <div class="d-flex flex-nowrap align-items-center pb-3">
            {{-- <label class="form-label fw-normal text-nowrap mb-0 me-2" for="sorting">Sort by:</label> --}}
            {{-- <select class="form-select form-select-sm me-2" id="sorting">
              <option>Date Created</option>
              <option>Product Name</option>
              <option>Price</option>
              <option>Your Rating</option>
              <option>Updates</option>
            </select>
            <button class="btn btn-outline-secondary btn-sm px-2" type="button"><i class="ci-arrow-up"></i></button> --}}

            <a class="btn btn-accent btn-sm px-2" href="{{ route('vendor.add.product') }}"><i class="ci-add-circle me-2"></i>Add new product</a>



          </div>
        </div>
      </div>

      <div style="height: 33rem;" data-simplebar data-simplebar-auto-hide="false">


      @foreach($products as $key => $item)
      <!-- Product-->
      <div class="d-block d-sm-flex align-items-center py-4 border-bottom"><a class="d-block position-relative mb-3 mb-sm-0 me-sm-4 ms-sm-0 mx-auto" href="marketplace-single.html" style="width: 10.5rem;"><img class="rounded-3" src="{{ asset($item->product_thumbnail) }}" alt="Product">


        @if($item->status == 1)
        <span class="btn btn-icon btn-success position-absolute top-0 end-0 py-0 px-1 m-2" data-bs-toggle="tooltip" title="Product status"><i class="ci-check-circle"></i></span>
        @else
        <span class="btn btn-icon btn-danger position-absolute top-0 end-0 py-0 px-1 m-2" data-bs-toggle="tooltip" title="Product status"><i class="ci-close-circle"></i></span>
        @endif


    </a>
        <div class="text-center text-sm-start">
          <h3 class="h6 product-title mb-2"><a href="marketplace-single.html">{{ $item->product_name_en }}</a></h3>


          @php
          $amount = $item->selling_price - $item->discount_price;
          $discount = ($amount/$item->selling_price) * 100;
          @endphp

          <div class="d-inline-block text-accent">
            @if($item->discount_price == NULL)


            ₱{{ $item->selling_price }}.<small>00</small>

            @else
            <span class="text-muted text-sm"><del>₱{{ $item->selling_price }}.<small>00</small></del></span> ₱{{ $item->discount_price }}.<small>00</small>
            @endif


        </div>




          @if($item->discount_price == NULL)
          @else
          <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Discount: <span class="fw-medium">
            {{ round($discount) }}%




        </span></div>
        @endif

        <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Status:
            @if($item->status == 1)
            <span class="fw-medium text-success">Active</span>
            @else
            <span class="fw-medium text-danger">Inactive</span>
            @endif
       </div>





          <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Stocks left: <span class="fw-medium">{{ $item->product_qty }}</span></div>
          <div class="d-flex justify-content-center justify-content-sm-start pt-3">
            {{-- <a class="btn bg-faded-accent btn-icon me-2" href="{{ route('vendor.edit.product',$item->id) }}" type="button" data-bs-toggle="tooltip" title="View"><i class="ci-eye text-accent"></i></a> --}}
            <a class="btn bg-faded-info btn-icon me-2" href="{{ route('vendor.edit.product',$item->id) }}" type="button" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit text-info"></i></a>
            <a class="btn bg-faded-primary btn-icon me-4" href="{{ route('vendor.delete.product',$item->id) }}" type="button" data-bs-toggle="tooltip" title="Delete" id="deleteMe"><i class="ci-trash text-danger"></i></a>


            @if ($item->status == 1)
            <a class="btn bg-faded-danger btn-icon me-2" href="{{ route('vendor.product.inactive',$item->id) }}" type="button" data-bs-toggle="tooltip" title="deactivate"><i class="ci-close text-danger"></i></a>

            @else
            <a class="btn bg-faded-success btn-icon me-2" href="{{ route('vendor.product.active',$item->id) }}" type="button" data-bs-toggle="tooltip" title="activate"><i class="ci-check text-success"></i></a>

            @endif

            {{-- <a class="btn bg-faded-success btn-icon me-2" href="{{ route('vendor.product.active',$item->id) }}" type="button" data-bs-toggle="tooltip" title="activate"><i class="ci-check text-success"></i></a>

            <a class="btn bg-faded-danger btn-icon" href="{{ route('vendor.product.inactive',$item->id) }}" type="button" data-bs-toggle="tooltip" title="deactivate"><i class="ci-close text-danger"></i></a> --}}
          </div>
        </div>
      </div>
      @endforeach
      </div>

    </div>
  </section>

  @endsection
