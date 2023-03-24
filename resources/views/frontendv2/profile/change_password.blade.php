@extends('frontendv2.main_master')
@section('content')

<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
            <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
            </li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">Update Password</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 text-light mb-0">Profile info</h1>
      </div>
    </div>
  </div>
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">

      <!-- Sidebar-->
        @include('frontendv2.common.user_sidebar')



      <!-- Content  -->
      <section class="col-lg-8">
        <!-- Toolbar-->
        <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
          <h6 class="fs-base text-light mb-0">Update your Account password below:</h6><a class="btn btn-primary btn-sm" href="account-signin.html"><i class="ci-sign-out me-2"></i>Sign out</a>
        </div>
        <!-- Profile form-->
        <form method="post" action="{{ route('user.password.update') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="pass-visibility">Current Password</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" id="current_password" name="oldpassword">
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox">
                    <span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label" for="pass-visibility">New Password</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" id="password" name="password">
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox">
                    <span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label" for="pass-visibility">Confirm Password</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox">
                    <span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>


              <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="form-check">
                    <input class="form-check-input" hidden="hidden" type="checkbox" id="subscribe_me" checked>
                    <label class="form-check-label"  hidden="hidden" for="subscribe_me">Subscribe me to Newsletter</label>
                    </div>
                    <button class="btn btn-primary mt-3 mt-sm-0" type="submit">Update password</button>
                </div>
                </div>


        </form>
      </section>
    </div>
  </div>




  @endsection