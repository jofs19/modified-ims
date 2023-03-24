{{-- < !DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">
        <title>Vartouhi Admin - Log in </title>
        < !-- Vendors Style-->
            <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">
            < !-- Style-->
                <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
                <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
    </head>

    <body class="hold-transition theme-primary bg-gradient-primary">
        <div class="container h-p100">
            <div class="row align-items-center justify-content-md-center h-p100">
                <div class="col-12">
                    <div class="row justify-content-center no-gutters">
                        <div class="col-lg-4 col-md-5 col-12">
                            <div class="content-top-agile p-10">
                                <h2 class="text-white">Get started with Us</h2>
                                <p class="text-white-50">Sign in to start your session</p>
                            </div>
                            <div class="p-30 rounded30 box-shadowed b-2 b-dashed">
                                <form method="POST"
                                    action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">@csrf <div
                                        class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span
                                                    class="input-group-text bg-transparent text-white"><i
                                                        class="ti-user"></i></span></div><input type="email" id="email"
                                                name="email"
                                                class="form-control pl-15 bg-transparent text-white plc-white"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span
                                                    class="input-group-text  bg-transparent text-white"><i
                                                        class="ti-lock"></i></span></div><input type="password"
                                                id="password" name="password"
                                                class="form-control pl-15 bg-transparent text-white plc-white"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="checkbox text-white"><input type="checkbox" id="remember_me"
                                                    name="remember"><label for="basic_checkbox_1">Remember Me</label>
                                            </div>
                                        </div>
                                        < !-- /.col -->
                                            <div class="col-6">
                                                <div class="fog-pwd text-right"><a
                                                        href="{{ route('password.request') }}"
                                                        class="text-white hover-info"><i
                                                            class="ion ion-locked"></i>Forgot pwd?</a><br></div>
                                            </div>
                                            < !-- /.col -->
                                                <div class="col-12 text-center"><button type="submit"
                                                        class="btn btn-info btn-rounded mt-10">SIGN IN</button></div>
                                                < !-- /.col -->
                                    </div>
                                </form>
                                <div class="text-center text-white">
                                    <p class="mt-20">- Sign With -</p>
                                    <p class="gap-items-2 mb-20"><a
                                            class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                                class="fa fa-facebook"></i></a><a
                                            class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                                class="fa fa-twitter"></i></a><a
                                            class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                                class="fa fa-google-plus"></i></a><a
                                            class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                                class="fa fa-instagram"></i></a></p>
                                </div>
                                <div class="text-center">
                                    <p class="mt-15 mb-0 text-white">Don't have an account? <a href="auth_register.html"
                                            class="text-info ml-5">Sign Up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        < !-- Vendor JS -->
            <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
            <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>
    </body>

    </html> --}}

    <!DOCTYPE html>
        <html lang="en">

        <head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">
			<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontendv2/assets/img/vlogos.png') }}">
			<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontendv2/assets/img/vlogos.png') }}">
			<title>Vartouhi Admin - Log in </title>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >


            <title>Vendor Login </title>
            <style>
                @import url("https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap");

                * {
                    box-sizing: border-box;
                }

                body {
                    font-family: "Rubik", sans-serif;
                }

                .container {
                    display: flex;
                    height: 100vh;
                }

                .left {
                    overflow: hidden;
                    display: flex;
                    flex-wrap: wrap;
                    flex-direction: column;
                    justify-content: center;
                    -webkit-animation-name: left;
                    animation-name: left;
                    -webkit-animation-duration: 1s;
                    animation-duration: 1s;
                    -webkit-animation-fill-mode: both;
                    animation-fill-mode: both;
                    -webkit-animation-delay: 1s;
                    animation-delay: 1s;
                }

                /* .right {
                    flex: 1;
                    background-color: black;
                    transition: 2s;
                    background-image: url({{ asset('backend/images/vart-logo.jpg') }});
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                } */


				@media (min-width: 767px) {
					.right {
                    flex: 1;
                    background-color: black;
                    transition: 2s;
                    background-image: url({{ asset('frontendv2/assets/img/logo5.svg') }});
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
					background-size: 100% 100%;
                }

			}

				@media screen and (min-width: 1024px) {
					.right {
                    flex: 1;
                    background-color: black;
                    transition: 2s;
                    background-image: url({{ asset('frontendv2/assets/img/logo5.svg') }});
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: 100% 100%;

                }

				}


				@media screen and (max-width: 767px) {
					.right {
                    flex: 1;
                    background-color: black;
                    transition: 2s;
                    background-image: url({{ asset('frontendv2/assets/img/logo5.svg') }});
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
					background-size: 100% 100%;
                }

				}



                .header>h2 {
                    margin: 0;
                    color: black;
                }

                .header>h4 {
                    margin-top: 10px
                    font-weight: normal;
                    font-size: 15px;
                    color: rgba(0, 0, 0, 0.4);
                }

                .form {
                    max-width: 95%;
                    display: flex;
                    flex-direction: column;
                }

                .form>p {
                    text-align: right;
                }

                .form>p>a {
                    color: #000;
                    font-size: 14px;
                }

                .form-field {
                    height: 46px;
                    padding: 0 16px;
                    border: 2px solid #ddd;
                    border-radius: 4px;
                    font-family: "Rubik", sans-serif;
                    outline: 0;
                    transition: 0.2s;
                    margin-top: 20px;
                }

                .form-field:focus {
                    border-color: rgb(17, 17, 17);
                }

                .form>button {
                    padding: 12px 10px;
                    border: 0;
                    background: linear-gradient(to right, black 0%, #cecb2f 100%);
                    border-radius: 3px;
                    margin-top: 10px;
                    color: #fff;
                    letter-spacing: 1px;
                    font-family: "Rubik", sans-serif;
					cursor: pointer;
                }

                .animation {
                    -webkit-animation-name: move;
                    animation-name: move;
                    -webkit-animation-duration: 0.4s;
                    animation-duration: 0.4s;
                    -webkit-animation-fill-mode: both;
                    animation-fill-mode: both;
                    -webkit-animation-delay: 2s;
                    animation-delay: 2s;
                }

                .a1 {
                    -webkit-animation-delay: 2s;
                    animation-delay: 2s;
                }

                .a2 {
                    -webkit-animation-delay: 2.1s;
                    animation-delay: 2.1s;
                }

                .a3 {
                    -webkit-animation-delay: 2.2s;
                    animation-delay: 2.2s;
                }

                .a4 {
                    -webkit-animation-delay: 2.3s;
                    animation-delay: 2.3s;
                }

                .a5 {
                    -webkit-animation-delay: 2.4s;
                    animation-delay: 2.4s;
                }

                .a6 {
                    -webkit-animation-delay: 2.5s;
                    animation-delay: 2.5s;
                }

                @-webkit-keyframes move {
                    0% {
                        opacity: 0;
                        visibility: hidden;
                        transform: translateY(-40px);
                    }

                    100% {
                        opacity: 1;
                        visibility: visible;
                        transform: translateY(0);
                    }
                }

                @keyframes move {
                    0% {
                        opacity: 0;
                        visibility: hidden;
                        transform: translateY(-40px);
                    }

                    100% {
                        opacity: 1;
                        visibility: visible;
                        transform: translateY(0);
                    }
                }

                @-webkit-keyframes left {
                    0% {
                        opacity: 0;
                        width: 0;
                    }

                    100% {
                        opacity: 1;
                        padding: 20px 40px;
                        width: 440px;
                    }
                }

                @keyframes left {
                    0% {
                        opacity: 0;
                        width: 0;
                    }

                    100% {
                        opacity: 1;
                        padding: 20px 40px;
                        width: 440px;
                    }
                }

            </style>
        </head>

        <body>
            <div class="container">
                <div class="left">
                    <div class="header">
                        <h2 class="animation a1">Welcome Back, Vendor!</h2>
                        <h4 class="animation a2">Log in to your account using email and password</h4>
                    </div>

					<form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
						@csrf

                    <div class="form">


						<input type="email" class="form-field animation a3"
                            placeholder="Email Address" id="email" name="email">

							<input type="password" class="form-field animation a4"
                            placeholder="Password" id="password" name="password">


                        <p class="animation a5"><a href="{{ route('password.request') }}">Forgot Password</a></p>
						<button type="submit" class="animation a6">Login</button>


					</form>

                    </div>
                </div>
                <div class="right"></div>
            </div>



            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

            <script>
             @if(Session::has('message'))
             var type = "{{ Session::get('alert-type','info') }}"
             switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;
                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;
                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;
                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
             }
             @endif
            </script>


        </body>




        </html>

