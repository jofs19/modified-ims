{{-- @extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Forgot Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Forgot Password</h4>
	<p class="">Have you forgot your password? No Problem!</p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
<br>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" >
		</div>


	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
	</form>
</div>
<!-- Sign-in -->
</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection --}}



@extends('frontendv2.main_master')
@section('content')

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</head>




<div class="container py-4 py-lg-5 my-4">



	<div class="row justify-content-center">



	  <div class="col-lg-8 col-md-10">





		<h2 class="h3 mb-4">Forgot your password?</h2>
		<p class="fs-md">Change your password in three easy steps. This helps to keep your new password secure.</p>
		<ol class="list-unstyled fs-md">
		  <li><span class="text-primary me-2">1.</span>Fill in your email address below.</li>
		  <li><span class="text-primary me-2">2.</span>We'll email you a reset link.</li>
		  <li><span class="text-primary me-2">3.</span>Click the link to change your password on our secured website.</li>
		</ol>
		<div class="card py-2 mt-4">
		  <form class="card-body needs-validation" novalidate method="POST" action="{{ route('password.email') }}">
			@csrf
			<div class="mb-3">
			  <label class="form-label" for="recover-email">Enter your email address</label>
			  <input class="form-control" type="email" id="email" name="email" required>
			  <div class="invalid-feedback">Please provide valid email address.</div>
			</div>
			<button class="btn btn-primary" type="submit">Submit request</button>
		  </form>


		</div>

	  </div>
	</div>
  </div>






  @endsection
