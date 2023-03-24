@extends('seller.vendor_dashboard')
@section('vendor')


<section class="ms-ls-3 col-lg-7 pt-lg-6 pb-4 mb-3 ps-xl-0">
    <div class="table-responsive">
        <table class="table table-hover">
          <thead;>
            <tr>
              <th>#</th>
              <th>Date</th>
              <th>Invoice</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
            @forelse($orderitem as $key => $item)
            		@if($item->order->return_order == 1)
                    <tr>
                        <td> {{ $key+1 }} </td>
                        <td>{{ $item['order']['order_date'] }}</td>
                        <td>{{ $item['order']['invoice_no'] }}</td>
                        <td>${{ $item['order']['amount'] }}</td>
                        <td>{{ $item['order']['payment_method'] }}</td>
                        <td>{{ $item['order']['return_reason'] }}</td>
                        <td>
                        @if($item->order->return_order == 1)
        <span class="badge rounded-pill bg-danger"> Return </span>
                        @else
         <span class="badge rounded-pill bg-success"> Done </span>
                        @endif

                         </td>

                        <td>
        <a href=" " class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </a>


                        </td>
                    </tr>
			{{-- @empty
            <tr>
                <td colspan="50" class="text-center">No Order Found</td>
            </tr> --}}
            @else
{{-- <tr>                <td colspan="50" class="text-center">No Order Found</td>
</tr> --}}
		    @endif
            @endforeach


          </tbody>
        </table>
      </div>

</section>




@endsection
