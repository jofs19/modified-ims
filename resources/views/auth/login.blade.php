{{-- @extends('frontend.main_master')
{{-- @section('content')



<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
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
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account!</p>
	<div class="social-sign-in outer-top-xs">
		<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	</div>
    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
        @csrf
<br>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" >
			 @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
			@enderror
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input"  >
		</div>
		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
		  	</label>
		  	<a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
	</form>
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Create a new account</h4>
	<p class="text title-tag-line">Create your new account.</p>
	<form method="POST" action="{{ route('register') }}">
		@csrf

		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
		    <input type="text" id="name" name="name" class="form-control unicase-form-control text-input">
			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
			@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
	  	</div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
		    <input type="text" id="phone" name="phone" class="form-control unicase-form-control text-input">
			@error('phone')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>


		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Main Address <span>*</span></label>
		    <input type="text" id="address" name="address" class="form-control unicase-form-control text-input">
			@error('address')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
			@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
			@error('password_confirmation')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
	</form>


</div>
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection  --}}

@extends('frontendv2.main_master')
@section('content')

<head>
	<style>

		.confirms{
			visibility: collapse;
		}



	</style>

</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	{{-- ANCHOR SIGN-IN --}}

<div class="container py-4 py-lg-5 my-4">
    <div class="row">
      <div class="col-md-6">
        <div class="card border-0 shadow">
          <div class="card-body">
            <h2 class="h4 mb-1">Sign in</h2>
            <div class="py-1">
              <h3 class="d-inline-block align-middle fs-base fw-medium mb-2 me-2">With social account:</h3>
              <div class="d-inline-block align-middle"><a class="btn-social bs-google me-2 mb-2" href="{{ route('login.google') }}" data-bs-toggle="tooltip" title="Sign in with Google"><i class="ci-google"></i></a><a class="btn-social bs-facebook me-2 mb-2" href="{{ route('login.facebook') }}" data-bs-toggle="tooltip" title="Sign in with Facebook"><i class="ci-facebook"></i></a><a class="btn-social bs-twitter me-2 mb-2" href="{{ route('login.twitter') }}" data-bs-toggle="tooltip" title="Sign in with Twitter"><i class="ci-twitter"></i></a></div>
            </div>
            <hr class="my-3">
            <h3 class="fs-base pt-4 pb-2">Or using form below</h3>
            <form class="needs-validation" novalidate method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
				@csrf
              <div class="input-group mb-3"><i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>

                <input class="form-control rounded-start" type="email" placeholder="Email" id="email" name="email" required>
              </div>
              <div class="input-group mb-3"><i class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                <div class="password-toggle w-100">
                  <input class="form-control" type="password" placeholder="Password" id="password" name="password" required>
				  @error('password')
				  <span class="invalid-feedback" role="alert">
					<div class="invalid-feedback">{{ $message }}</div>
				</span>

				  @enderror

                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="d-flex flex-wrap justify-content-between">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" checked id="remember_me">
                  <label class="form-check-label" for="remember_me">Remember me</label>
                </div><a class="nav-link-inline fs-sm" href="{{ route('password.request') }}">Forgot password?</a>
              </div>
              <hr class="mt-4">
              <div class="text-end pt-4">
                <button class="btn btn-primary" type="submit"><i class="ci-sign-in me-2 ms-n21"></i>Sign In</button>
              </div>
            </form>
          </div>
        </div>
      </div>
	  {{-- END SIGN-IN --}}


	  {{-- ANCHOR SIGN-UP --}}
      <div class="col-md-6 pt-4 mt-3 mt-md-0">
        <h2 class="h4 mb-3">No account? Sign up</h2>
        <p class="fs-sm text-muted mb-4">Registration takes less than a minute but gives you full control over your orders.</p>
        <form class="needs-validation" novalidate method="POST" action="{{ route('register') }}" onSubmit = "return checkPasswords(this)" id="myForm">
			@csrf

          <div class="row gx-4 gy-3">
            <div class="col-sm-6">
              <label class="form-label" for="name">Username</label>
              <input class="form-control" type="text" required  id="name" name="name" >

              <div class="invalid-feedback">Please enter your username!</div>
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="email">E-mail Address</label>
              <input class="form-control" type="email" required  id="email" name="email" placeholder="johndoe@example.com">

              <div class="invalid-feedback">Please enter valid email address!</div>
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="address">Home Address</label>
              <input class="form-control" type="text" id="address" name="address" required>
			  <div class="invalid-feedback">Please enter your address!</div>

			  <div class="form-text">(<strong>e.g.</strong> #26 Padilla St. West Poblacion)</div>
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="phone">Phone Number </label>
              <input class="form-control" type="tel" id="phone" name="phone" required  pattern="[0-9]+" title="numbers are only allowed" max="11">
              <div class="invalid-feedback">Please enter valid phone number!</div>
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="password">Password</label>
              <input class="form-control" type="password" id="password" name="password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" data-bs-toggle="tooltip" data-bs-placement="right" title="Password must contain: Minimum of 8 characters; atleast 1 Alphabet and 1 Number.">
			  @error('password')
			  <span class="invalid-feedback" role="alert">
				<div class="invalid-feedback">{{ $message }}</div>
			</span>
			  @enderror



			  <div class="invalid-feedback" id="validate_p">Please provide valid password!</div>


			{{-- <div class="mt-3">
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" id="invalidCheck" required>
				  <label class="form-check-label" for="invalidCheck">Agree to <a data-bs-target="#modalScroll" href="#modalScroll" data-bs-toggle="modal" id="modalScroll">terms and conditions</a></label>
				  <div class="invalid-feedback">You must agree before submitting.</div>
				</div>
			  </div> --}}

			  {{-- <div class="form-text"><strong>Password must contain:</strong> Minimum of <strong>8</strong> characters; atleast <strong>1</strong> Alphabet and <strong>1</strong> Number.</div> --}}
			  {{-- <div class="valid-feedback">Looks good!</div>       --}}
			</div>
            <div class="col-sm-6">
              <label class="form-label" for="password_confirmation">Confirm Password</label>
              <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
              <div class="invalid-feedback" id="validate_cp">Password does not match!</div>

			  <div class="confirms" id="confirms"><small><span class="text-danger"> Password does not match!</span></small></div>

			  @error('password_confirmation')
			  <span class="invalid-feedback" role="alert">
				<div class="invalid-feedback">{{ $message }}</div>
			</span>

			  @enderror
			  {{-- <div class="valid-feedback">Looks good!</div>       --}}

            </div>

            <div class="col-12 text-end">

              <button class="btn btn-primary" type="submit" id="myBut"><i class="ci-user me-2 ms-n1"></i>Sign Up</button>
            </div>
          </div>
        </form>
      </div>

	  {{-- END SIGN-UP --}}

    </div>
  </div>

  <script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></>
  <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>
	<script type="text/javascript">
	  window.onload = function () {
		  var password = document.getElementById("password");
		  var password_confirmation = document.getElementById("password_confirmation");
		  password.onchange = ConfirmPassword;
		  password_confirmation.onkeyup = ConfirmPassword;
		  function ConfirmPassword() {
			  txtConfirmPassword.setCustomValidity("");
			  if (password.value !== password_confirmation.value) {
				  password_confirmation.setCustomValidity("Passwords do not match.");
			  }
		  }
	  }
  </script>

  <script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
				password: {
					required: true,
					minlength: 8,
					maxlength: 20,
					password: true
				},
				password_confirmation: {
					required: true,
					minlength: 8,
					maxlength: 20,
					equalTo: "#password"

				}

			},
			messages: {
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long",
					maxlength: "Your password must be at most 20 characters long",
					password: "Your password must contain atleast 1 Alphabet and 1 Number"
				},
				password_confirmation: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long",
					maxlength: "Your password must be at most 20 characters long",
					equalTo: "Please enter the same password as above"
				}
			},
			errorElement: 'div',
			errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}

        });
    });

</script>


<script>


	function checkPasswords(form) {
		password = form.password.value;
		password_confirmation = form.password_confirmation.value;



		// If Not same return False.
		if (password != password_confirmation) {
			// alert ("\nPassword did not match: Please try again...")
			$('.confirms').removeClass();
		}else{
			$('#confirms').addClass('confirms');
		}

		// return false;

	}
</script>




@endsection
