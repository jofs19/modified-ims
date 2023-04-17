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
				  <h3 class="box-title">Item Stock List <span class="badge badge-pill badge-danger"> {{ count($products) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example" class="table table-bordered table-striped text-center">
						<thead>
							<tr>
								{{-- <th>Image </th> --}}
								<th>Item</th>
								<th>Category</th>
								<th>Staff</th>
								<th>Department</th>
								{{-- <th>Product Price </th> --}}
								<th>Quantity </th>
								<th>Date</th>
								{{-- <th>Discount </th> --}}
								{{-- <th>Status </th> --}}


							</tr>
						</thead>
						<tbody>
	 @foreach($products as $item)
	 <tr>
		{{-- <td> 
			

			<a href="{{ asset($item->product_thumbnail) }}" data-toggle="lightbox" data-gallery="multiimages" data-title="{{ $item->product_name_en }}"><img src="{{ asset($item->product_thumbnail) }}" class="all studio isotope-item" alt="gallery" style="width: 60px; height: 50px;"> </a>
			
		
		
		
		</td> --}}
		<td>{{ $item->product_name_en }}</td>
		{{-- Display item category --}}
		@php

		$cat = App\Models\Category::where('id',$item->category_id)->first();


		@endphp
		

		<td>{{$cat->category_name_en}}</td>
		<td>{{$item->vendor->username}}</td>
		<td>{{$item->vendor->name}}</td>
		 {{-- <td>₱{{ $item->selling_price }}</td> --}}
		 <td>{{ $item->product_qty }} pcs.</td>
		 {{-- get date --}}
		 
		 <td>{{($item->created_at)->format('m/d/Y')}}</td>

		 {{-- <td> 
		 	@if($item->discount_price == NULL)
		 	<span class="badge badge-pill badge-danger">No Discount</span>

		 	@else
		 	@php
		 	$amount = $item->selling_price - $item->discount_price;
		 	$discount = ($amount/$item->selling_price) * 100;
		 	@endphp
   <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>

		 	@endif



		 </td> --}}

		 {{-- <td>
		 	@if($item->status == 1)
		 	<span class="badge badge-pill badge-success"> Active </span>
		 	@else
           <span class="badge badge-pill badge-danger"> InActive </span>
		 	@endif

		 </td> --}}




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