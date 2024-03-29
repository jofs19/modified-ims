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
				  <h3 class="box-title">Blog Post List <sup><span class="badge badge-pill badge-danger"> {{ count($blogpost) }} </span></sup></h3>
<a href="{{ route('add.post') }}" class="btn btn-success" style="float: right;">Add Post</a>				  
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>

								<th>Post Category  </th>
								<th>Post Image </th>
								<th>Post Title (Eng) </th>
								<th>Post Title (Fil) </th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($blogpost as $item)
	 <tr>

        <td>{{ $item->category->blog_category_name_en }}</td>		 
        <td> <img src="{{ asset($item->post_image) }}" style="width: 60px; height: 60px;"> </td>
		<td>{{ $item->post_title_en }}</td>
		 <td>{{ $item->post_title_fil }}</td>
		<td width="20%">
 <a href="{{ route('blogpost.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
 <a href="{{ route('blogpost.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a>
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