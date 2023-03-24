



@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">

            @php
            $ActiveVendor = DB::table('users')->where('status','Active')->get();
            $Inactive = DB::table('users')->where('status','Inactive')->get();
            $Activecount = DB::table('users')->where('status','Active')->count();
            $Inactivecount = DB::table('users')->where('status','Inactive')->count();
            @endphp


			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Authorized Vendors <sup><span class="badge badge-pill badge-danger"> {{$Activecount }} </span></sup></h3>
{{-- <a href="{{ route('add.post') }}" class="btn btn-success" style="float: right;">Add Post</a> --}}
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped text-center">
						<thead>
							<tr>

                                <th>Shop name</th>
                                <th>Vendor Username</th>
                                <th>Vendor Email</th>
                                <th>Date of Join</th>
                                <th>Vendor status</th>
                                <th>Action</th>

							</tr>
						</thead>
						<tbody>
                            @foreach($ActiveVendor as $key => $item)
                            <tr>

                                <td> {{ $item->name }}</td>
                                <td> {{ $item->username }}</td>
                                <td> {{ $item->email }}</td>
                                <td>  {{ $item->vendor_join }} </td>
                                <td> <span class="btn btn-primary">{{ $item->status }}</span></td>

                                <td><a href="{{ route('active.vendor.details',$item->id) }}"  class="btn btn-info" title="View Data"><i class="fa fa-eye"></i> </a></td>




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
