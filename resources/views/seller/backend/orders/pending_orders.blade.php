@extends('seller.vendor_dashboard')
@section('vendor')


<section class="col-lg-8 pt-lg-6 pb-4 mb-3 ps-xl-0">
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
			<tr>
				<td> {{ $key+1 }} </td>
				<td>{{ $item['order']['order_date'] }}</td>
				<td>{{ $item['order']['invoice_no'] }}</td>
				<td>₱{{ $item['order']['amount'] }}</td>
				<td>{{ $item['order']['payment_method'] }}</td>
                <td> <span class="badge rounded-pill bg-success"> {{ $item['order']['status'] }}</span></td>

				<td>
<a href="{{ route('vendor.order.details',$item->order->id) }}" class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </a>


				</td>
			</tr>
			@empty
            <tr>
                <td colspan="50" class="text-center">No Order Found</td>
            </tr>
            @endforelse

          </tbody>
        </table>
      </div>

</section>




@endsection
