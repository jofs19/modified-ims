@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Returned Requests Details</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Request Details</li>

							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

         



		<!-- Main content -->
		<section class="content">
{{--             
            <div class="col-md-12 col-12">
				<div class="box box-slided-up">
				  <div class="box-header with-border">
					<h4 class="box-title">Return reason</h4>
					<ul class="box-controls pull-right">
					  <li><a class="box-btn-close" href="#"></a></li>
					  <li><a class="box-btn-slide" href="#"></a></li>
					  <li><a class="box-btn-fullscreen" href="#"></a></li>
					</ul>
				  </div>

				  <div class="box-body" style="display: none;">
					<div class="callout callout-info mb-0" role="alert">
                        {{ $orders->return_reason }} Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam nam deleniti at officia voluptate explicabo? Excepturi optio nam sequi magnam temporibus, quis animi rem debitis, dolore, error aliquid perferendis quibusdam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores sequi illum officia? Itaque, sed officia aliquid eaque expedita eveniet, voluptas dolorem ipsam deleniti, cum corporis natus eos alias. Cum, adipisci.
                        Molestiae, voluptas? Dolore beatae esse doloribus? Consequuntur ratione temporibus incidunt aut voluptatum minus, saepe facilis iure ad aliquid voluptate nostrum magnam est nihil ipsam error recusandae cumque ab accusamus? Est!
                        Ipsa explicabo aliquam eum, nisi ipsum amet minima asperiores id aperiam eaque quis incidunt labore eveniet porro saepe tenetur libero enim earum expedita illum laudantium quas ratione voluptatum. Cumque, vel.
					</div>
					<div class="box-body text-center" style="display: none;">
                        <img src="{{ asset($orders->return_image) }}" alt="" srcset="">
					</div>
				  </div>
				</div>
			  </div> --}}



              <div class="col-12">
                <div class="box box-default">
                  <div class="box-header with-border">
                    <a href="{{ route('return.approve',$orders->id) }}" class="btn btn-success pull-right">Approve </a>		

                    <h4 class="box-title">Returned Item of [{{ Auth::user()->name }}]</h4>
                    <h5 class="box-subtitle"><b>Request number:</b> [<code>{{ $orders->invoice_no }}</code>]</h5>
                    <h6 class="box-subtitle"><b> Purchased Date:</b> [{{ $orders->order_date }}] </h6>



                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <!-- Nav tabs -->
                      <div class="vtabs">
                          <ul class="nav nav-tabs tabs-vertical" role="tablist">
                              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home4" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span class="hidden-xs-down">Return Reason</span> </a> </li>
                              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile4" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span class="hidden-xs-down">Product Image</span></a> </li>
                              
                          </ul>
                          <!-- Tab panes -->
                          <div class="tab-content">
                              <div class="tab-pane" id="home4" role="tabpanel">
                                  <div class="p-15">
                                    {{ $orders->return_reason }}
                                  </div>
                              </div>
                              <div class="tab-pane active text-center" id="profile4" role="tabpanel">
                                  <div class="p-15 text-center">
                                    <img src="{{ asset($orders->return_image) }}" alt="" srcset="">

                                  </div>
                              </div>
                             
                          </div>
                      </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
		</section>
		<!-- /.content -->

	  </div>




@endsection