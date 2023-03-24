@extends('seller.vendor_dashboard')
@section('vendor')

<div class="col-7">
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center my-3">
                    <h2 class="h3 py-2 me-2 text-center text-sm-start">Customer Reviews</h2>

					<div class="ms-auto">
						<div class="btn-group">

						</div>
					</div>
				</div>
				<!--end breadcrumb-->

				<hr/>

						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered text-center" style="width:100%">
								<thead>
			<tr>
				<th>#</th>
                <th>User </th>
				<th>Product </th>
				<th>Rating </th>
                <th>Comment </th>
                <th>Image</th>

				<th>Status </th>

			</tr>
		</thead>
		<tbody>
	@foreach($review as $key => $item)
			<tr>
				<td> {{ $key+1 }} </td>
                <td>{{ $item['user']['name'] }}</td>

				<td>{{ $item['product']['product_name_en'] }}</td>
				<td>
			@if($item->rating == NULL)
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 1)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 3)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 3)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-secondary"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 4)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-secondary"></i>
			@elseif($item->rating == 5)
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>
			<i class="bx bxs-star text-warning"></i>

			@endif
					 </td>
                     <td>


                        <dl>
                            <dt>{{ $item->summary }}</dt>
                            <dd>{{ Str::limit($item->comment, 25);  }}</dd>

                          </dl>



                     </td>
                     <td><img src="{{ asset($item->image) }}" width="40%"> </td>
					 <td>
					 	@if($item->status == 0)
 	<span class="badge rounded-pill bg-warning">Pending</span>
					 	@elseif($item->status == 1)
 <span class="badge rounded-pill bg-success">Published</span>
					 	@endif
					 </td>


			</tr>
			@endforeach


		</tbody>

	</table>
						</div>
					</div>
				</div>






@endsection
