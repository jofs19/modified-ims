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
				  <h3 class="box-title">All Pending Reviews </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped text-center">
						<thead>
							<tr>
								<th>Rating</th>
								<th>Summary  </th>
								<th>Comment </th>
								<th>User </th>
								<th>Email</th>
								<th>Product  </th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($review as $item)
	 <tr>
		<td> {{ $item->rating }}/5  </td>

		<td> <div style="width: 145px;
			word-wrap: break-word;">{{ $item->summary }}</div>  </td>
		<td> <div style="width: 145px;
			word-wrap: break-word;">{{ $item->comment }}</div>   </td>
		<td>  <div style="width: 120px;
			word-wrap: break-word;">{{ $item->name }}</div>  </td>
		<td> <div style="width: 120px;
			word-wrap: break-word;">{{ $item->email }}</div>  </td>

		<td width="20%"> <img src="{{ asset($item->image) }}"  alt="" class="mb-1"> <br> {{ $item->product->product_name_en }}  </td>
		

		<td>
  <a href="{{ route('review.approve',$item->id) }}" class="btn btn-danger">Approve </a>
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