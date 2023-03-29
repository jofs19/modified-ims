@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Pending Items List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped text-center">
						<thead>
							<tr>
								<th>Date </th>
								<th>Request # </th>
								{{-- <th>Amount </th>
								<th>Payment </th> --}}
								<th>Status </th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($orders as $item)
	 <tr>
		<td> {{ $item->order_date }}  </td>
		<td> {{ $item->invoice_no }}  </td>
		{{-- <td>
			₱ {{ $item->amount + $item->shipping_charge }}

			</td>

		<td> {{ $item->payment_method }}  </td> --}}
		<td>
			@if ($item->status == 'pending')

			<span class="badge badge-pill badge-primary">{{ $item->status }}</span>

			@else

			<span class="badge badge-pill badge-danger"> cancelled </span>

			@endif

		 </td>

		<td width="25%">
			@if ($item->status == 'pending')

            <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info mr-5" title="View Data"><i class="fa fa-eye"></i> </a>

			<a href="{{ route('pending-confirm',$item->id) }}" class="btn btn-success fa fa-check" id="confirm"></a>
			<a href="{{ route('reject-orders', $item->id) }}" class="btn btn-danger fa fa-times" id="reject"></a>

			@else

			<a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info mr-5" title="View Data"><i class="fa fa-eye"></i> </a>

			@endif


		</td>

	 </tr>
	  @endforeach
						</tbody>

					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->


			</div>
			<!-- /.col -->






		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection
