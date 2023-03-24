@extends('seller.vendor_dashboard')
@section('vendor')

      <!-- Content  -->
      <section class="col-lg-8">
        <!-- Toolbar-->
        <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
          <h6 class="fs-base text-light mb-0">Update your Account password below:</h6>
        </div>
        <!-- Profile form-->
        <form method="post" action="{{ route('vendor.update.password') }}">
            @csrf

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                    {{session('status')}}
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
            @endif

            <div class="col-6">

            <div class="mb-3">
                <label class="form-label" for="pass-visibility">Current Password</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" id="current_password" name="old_password">
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox">
                    <span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>

            </div>

            <div class="col-6">

              <div class="mb-3">
                <label class="form-label" for="pass-visibility">New Password</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" id="password" name="new_password">
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox">
                    <span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>

            </div>

            <div class="col-6">

              <div class="mb-3">
                <label class="form-label" for="pass-visibility">Confirm Password</label>
                <div class="password-toggle">
                  <input class="form-control" type="password" id="password_confirmation" name="new_password_confirmation">
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox">
                    <span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>

            </div>


              <div class="col-6">
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

      @endsection
