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
				  <h3 class="box-title">Return Items List</h3>
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
		{{-- <td> @if($item->amount >= 1000)
			₱ {{ $item->amount }}

			@else
			₱ {{ $item->amount + $item->shipping_charge }}

			@endif  </td>

		<td> {{ $item->payment_method }}  </td> --}}
		<td>
		@if($item->return_order == 1)
      <span class="badge badge-pill badge-primary">pending for approval </span>
       @elseif($item->return_order == 2)
       <span class="badge badge-pill badge-success">approved </span>
		@endif

		  </td>

		<td width="25%">
			<a href="{{ route('return.view',$item->id) }}" class="btn btn-info">View </a>		

            <a href="{{ route('return.approve',$item->id) }}" class="btn btn-danger">Approve </a>		
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