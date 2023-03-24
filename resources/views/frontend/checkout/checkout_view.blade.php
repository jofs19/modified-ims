@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('title')
Checkout Page
@endsection
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb --> 
<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">
	<!-- panel-heading -->
	 
    <!-- panel-heading -->
	<div id="collapseOne" class="panel-collapse collapse in">
		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		
				<!-- guest-login -->			
			 <div class="col-md-6 col-sm-6 already-registered-login">
		 <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>







	{{-- ANCHOR start form --}}
	<form class="register-form" action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data">
		@csrf


		<div class="form-group">

    
          
            
  
	    <label class="info-title" for="exampleInputEmail1"><b>Shipping Name</b>  <span>*</span></label>
	    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
	  </div>  <!-- // end form group  -->
	 
<div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Email </b> <span>*</span></label>
	    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required="">
	  </div>  <!-- // end form group  -->
<div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Phone</b>  <span>*</span></label>
	    <input type="tel" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}" required="">
	  </div>  <!-- // end form group  -->

	  <div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Address Line 1</b>  <span>*</span></label>
	    <input type="text" name="shipping_address" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Address" value="{{ Auth::user()->address }}" required="">
	  </div>  <!-- // end form group  -->


	  <div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Address Line 2</b>  <span>*optional*</span></label>
	    <input type="text" name="shipping_address2" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Address Line 2 (Optional)">
	  </div>  <!-- // end form group  -->


	  <div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Post Code </b> <span>*</span></label>
	    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" required="">
	  </div>  <!-- // end form group  -->
	 
	 
				</div>	
				<!-- guest-login -->
 
				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					 
<div class="form-group">
	<h5><b>Division Select </b> <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="division_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select Division</option>
			@foreach($divisions as $item)
 <option value="{{ $item->id }}">{{ $item->division_name }}</option>	
			@endforeach
		</select>
		@error('division_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div> <!-- // end form group -->
		 <div class="form-group">
	<h5><b>District Select</b>  <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="district_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select District</option>
			 
		</select>
		@error('district_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div> <!-- // end form group -->
		 <div class="form-group">
	<h5><b>State Select</b> <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="state_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select State</option>
			 
		</select>
		@error('state_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div> <!-- // end form group -->
				 
					 
    <div class="form-group">
	 <label class="info-title" for="exampleInputEmail1">Notes <span>*</span></label>
	     <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
	  </div>  <!-- // end form group  -->


	<div class="form-group">
		<h5>Receipt <span class="text-danger">*</span></h5>
		<div class="controls">
			<input type="file" name="receipt" class="form-control" {{-- onChange="mainThumUrl(this)" --}}  >
			{{-- @error('receipt')
				<span class="text-danger">{{ $message }}</span>
			@enderror --}}
			<br>
			{{-- <img src="" id="mainThmb"> --}}

		</div>
	</div>

	<div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>I want a change from: </b> </label>
	    <input type="text" name="change_amount" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="(optional)">
	  </div>  <!-- // end form group  -->


	  <div class="form-group">
		{{-- <label class="info-title" for="exampleInputEmail1"><b>Shipping charge: </b> </label> --}}
		<input type="hidden" name="shipping_charge" class="form-control unicase-form-control text-input" id="shipping_form" placeholder="(optional)">
	  </div>






				</div>	
				<!-- already-registered-login -->		
   
  
			</div>			
		</div>
		<!-- panel-body  -->
	</div><!-- row -->
</div>
<!-- End checkout-step-01  -->
					    
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
					@foreach($carts as $item)
					<li> 
						<strong>Product Image: </strong>
						<img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;">
					</li>
					<li> 
                        <strong>Price: </strong>
                        ₱{{ $item->price }}

						<strong>Qty: </strong>
						 ( {{ $item->qty }} )
						 <strong>Color: </strong>
						 {{ $item->options->color }}
						 <strong>Size: </strong>
						 {{ $item->options->size }} 
					</li>
                    @endforeach 
<hr>
		 <li>
		 	@if(Session::has('coupon'))
<strong>SubTotal: </strong> ₱{{ $cartTotal }} <hr>
<strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
( {{ session()->get('coupon')['coupon_discount'] }} % )
 <hr>
 <strong>Coupon Discount : </strong> ₱{{ session()->get('coupon')['discount_amount'] }} 
 <hr>

{{-- if grand total is greater than 1000 --}}
	@if(session()->get('coupon')['total_amount'] > 1000)

	<strong>Shipping Fee :</strong> Free Shipping
	<hr>
	<strong>Grand Total :</strong> ₱{{ session()->get('coupon')['total_amount']}}
	

	@else {{-- if grand total is less than 1000 --}}
	<strong>Shipping Fee :</strong> <p id="shipping_fee"></p>
	<hr>
	<strong>Grand Total :</strong> <p id="grand_total"></p> 




	@endif


  
  
 
{{-- @php
	$val= "<script>document.writeln(charge);</script>";
	
	
@endphp

  ₱{{ session()->get('coupon')['total_amount'] + intval($val) }}

{{ intval($val) }} --}}

 <hr>

 {{-- shippig charge --}}
 






		 	@else
<strong>SubTotal: </strong> ₱{{ $cartTotal }} <hr>
{{-- <strong>Grand Total : </strong> ₱{{ $cartTotal }}<hr> --}}


@if($cartTotal > 1000)

<strong>Shipping Fee :</strong> Free Shipping
<hr>
<strong>Grand Total :</strong> ₱{{ $cartTotal}}


@else {{-- if grand total is less than 1000 --}}
<strong>Shipping Fee :</strong> <p id="shipping_fee"></p>
<hr>
<strong>Grand Total :</strong> <p id="grand_total"></p> 




@endif



		 	@endif 
		 </li>
					 
					
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar --> </div>







	<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Select Payment Method</h4>
		    </div>


		    <div class="row">
		    	<div class="col-md-4">
		   <label for="">Stripe</label> 		
       <input type="radio" name="payment_method" value="stripe">
       <img src="{{ asset('frontend/assets/images/payments/4.png') }}">		    		
		    	</div> <!-- end col md 4 -->

		    	<div class="col-md-4">
		    		<label for="">Card</label> 		
       <input type="radio" name="payment_method" value="card">	
		<img src="{{ asset('frontend/assets/images/payments/3.png') }}">    		
		    	</div> <!-- end col md 4 -->

		    	<div class="col-md-4">
		    		<label for="">COD</label> 		
       <input type="radio" name="payment_method" value="cash">	
		  <img src="{{ asset('frontend/assets/images/payments/6.png') }}">  		
		    	</div> <!-- end col md 4 -->


			</div> <!-- // end row  -->
<hr>
  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>


		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar --> </div>







</form> <!-- ANCHOR // end form  -->


















			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- === ===== BRANDS CAROUSEL ==== ======== -->
 
<!-- ===== == BRANDS CAROUSEL : END === === -->	
</div><!-- /.container -->
</div><!-- /.body-content -->
 
 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {

                 $.ajax({
                    url: "{{  url('/district-get/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="state_id"]').empty(); 
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/state-get/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="state_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');

							  	// If Session has coupon
					@if(Session::has('coupon'))

						if(value.state_name == 'Region I'){
							if({{ session()->get('coupon')['total_amount'] }} < 1000){
								$('#shipping_fee').html(` 65 `);
								
								

								$('#grand_total').html(` ₱{{ session()->get('coupon')['total_amount'] + 65}} 
								
								`);
							$('#shipping_form').val(65);
							}else{
								$('#shipping_fee').html(` Free Shipping `);
								$('#grand_total').html(` ₱{{ session()->get('coupon')['total_amount'] }} 
								
								`);
							$('#shipping_form').val(0);

							}
							

								
						}else if(value.state_name == 'Region II'){
							if({{ session()->get('coupon')['total_amount'] }} < 1000){
								$('#shipping_fee').html(` 75 `);
								$('#grand_total').html(` ₱{{ session()->get('coupon')['total_amount'] + 75}} 
								
								`);
							$('#shipping_form').val(75);
							}else{
								$('#shipping_fee').html(` Free Shipping `);
								$('#grand_total').html(` ₱{{ session()->get('coupon')['total_amount'] }} 
								
								`);
								$('#shipping_form').val(0);

							}

						}else if(value.state_name == 'Region III'){
							if({{ session()->get('coupon')['total_amount'] }} < 1000){
								$('#shipping_fee').html(` 85 `);
								$('#grand_total').html(` ₱{{ session()->get('coupon')['total_amount'] + 85}} 
								
								`);
							$('#shipping_form').val(85);
							}else{
								$('#shipping_fee').html(` Free Shipping `);
								$('#grand_total').html(` ₱{{ session()->get('coupon')['total_amount'] }} 
								
								`);
								$('#shipping_form').val(0);

							}
						}else if(value.state_name == 'Region IV-A'){
							if({{ session()->get('coupon')['total_amount'] }} < 1000){
								$('#shipping_fee').html(` 95 `);
								$('#grand_total').html(` ₱{{ session()->get('coupon')['total_amount'] + 95}} 
								
								`);
							$('#shipping_form').val(95);
							}else{
								$('#shipping_fee').html(` Free Shipping `);
								$('#grand_total').html(` ₱{{ session()->get('coupon')['total_amount'] }} 
								
								`);
								$('#shipping_form').val(0);

							}
						}else if(value.state_name == 'Region IV-B'){
							if({{ session()->get('coupon')['total_amount'] }} < 1000){
								$('#shipping_fee').html(` 105 `);
								$('#grand_total').html(` ₱{{ session()->get('coupon')['total_amount'] + 105}} 
								
								`);
							$('#shipping_form').val(105);
							}else{
								$('#shipping_fee').html(` Free Shipping `);
								$('#grand_total').html(` ₱{{ session()->get('coupon')['total_amount'] }} 
								
								`);
								$('#shipping_form').val(0);

							}
						}


							// If Session has no coupon
							@else 

							// If order is below 1000 and state is region I
							if(value.state_name == 'Region I'){

								if({{ $cartTotal }} < 1000){
									$('#shipping_fee').html(` 65 `);

								$('#grand_total').html(` ₱  {{ (int)$cartTotal + 65 }} 
								
								`);

								$('#shipping_form').val(65);
								}else{
									$('#shipping_fee').html(` Free Shipping `);
									$('#grand_total').html(` ₱ {{ (int)$cartTotal }} 
									
									`);
									$('#shipping_form').val(0);

								}


							}else if(value.state_name == 'Region II'){
								if({{ $cartTotal }} < 1000){
									$('#shipping_fee').html(` 75 `);
									$('#grand_total').html(` ₱  {{ (int)$cartTotal + 75 }} 
									
									`);
								$('#shipping_form').val(75);
								}else{
									$('#shipping_fee').html(` Free Shipping `);
									$('#grand_total').html(` ₱ {{ (int)$cartTotal }} 
									
									`);
									$('#shipping_form').val(0);

								}
							}else if(value.state_name == 'Region III'){
								if({{ $cartTotal }} < 1000){
									$('#shipping_fee').html(` 85 `);
									$('#grand_total').html(` ₱  {{ (int)$cartTotal + 85 }} 
									
									`);
								$('#shipping_form').val(85);
								}else{
									$('#shipping_fee').html(` Free Shipping `);
									$('#grand_total').html(` ₱ {{ (int)$cartTotal }} 
									
									`);
									$('#shipping_form').val(0);

								}
							}else if(value.state_name == 'Region IV-A'){
								if({{ $cartTotal }} < 1000){
									$('#shipping_fee').html(` 95 `);
									$('#grand_total').html(` ₱  {{ (int)$cartTotal + 95 }} 
									
									`);
								$('#shipping_form').val(95);
								}else{
									$('#shipping_fee').html(` Free Shipping `);
									$('#grand_total').html(` ₱ {{ (int)$cartTotal }} 
									
									`);
									$('#shipping_form').val(0);

								}
							}else if(value.state_name == 'Region IV-B'){
								if({{ $cartTotal }} < 1000){
									$('#shipping_fee').html(` 105 `);
									$('#grand_total').html(` ₱  {{ (int)$cartTotal + 105 }} 
									
									`);
								$('#shipping_form').val(105);
								}else{
									$('#shipping_fee').html(` Free Shipping `);
									$('#grand_total').html(` ₱ {{ (int)$cartTotal }} 
									
									`);
									$('#shipping_form').val(0);

								}
							}


							@endif



							  
                          });
                    },
                });
            } else {
                alert('danger');
            }

			

        });
 
    });
    </script>
@endsection