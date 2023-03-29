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
            <li class="breadcrumb-item text-nowrap active" aria-current="page">Profile info</li>
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
          <h6 class="fs-base text-light mb-0">Update you profile details below:</h6><a class="btn btn-primary btn-sm" href="{{ route('user.logout') }}"><i class="ci-sign-out me-2"></i>Sign out</a>
        </div>
        <!-- Profile form-->
        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
            @csrf
                            {{-- <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">User Image </label>
                                <input type="file" name="profile_photo_path" class="form-control">
                            </div> --}}


          <div class="bg-secondary rounded-3 p-4 mb-4">
            <div class="d-flex align-items-center"><img class="rounded"
              src="{{ (!empty($user->profile_photo_path)) ? asset($user->profile_photo_path):url('upload/no_image.jpg') }}" width="90" alt="User">
              <div class="ps-3">


                {{-- ANCHOR Update Image --}}
                <label class="custom-file-upload">
                    <input type="file" name="profile_photo_path" id="real-file" hidden="hidden">

                    <button class="btn btn-light btn-shadow btn-sm mb-2" type="button" id="custom-button"><i class="ci-loading me-2"></i>Change avatar</button>

                </label>
                {{-- ANCHOR Update Image --}}


                <div class="p mb-0 fs-ms text-muted" id="custom-text">Upload JPG/PNG image. 300 x 300 required.</div>
              </div>
            </div>
          </div>
          <div class="row gx-4 gy-3">
            <div class="col-sm-6">
              <label class="form-label" for="account-fn">Username</label>
              <input class="form-control" name="name" type="text" id="account-fn" value="{{ $user->name }}">
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="account-ln">Email Address</label>
              <input class="form-control" name="email" type="email" id="account-ln" value="{{ $user->email }}">
              @error('email')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="account-email">Main Address</label>
              <input class="form-control" name="address" type="text" id="account-email" value="{{ $user->address }}">
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="account-phone">Phone Number</label>
              <input class="form-control" name="phone" type="text" id="account-phone" value="{{ $user->phone }}" required>
            </div>
            {{-- <div class="col-sm-6">
              <label class="form-label" for="account-pass">New Password</label>
              <div class="password-toggle">
                <input class="form-control" type="password" id="account-pass">
                <label class="password-toggle-btn" aria-label="Show/hide password">
                  <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                </label>
              </div>
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="account-confirm-pass">Confirm Password</label>
              <div class="password-toggle">
                <input class="form-control" type="password" id="account-confirm-pass">
                <label class="password-toggle-btn" aria-label="Show/hide password">
                  <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                </label>
              </div>
            </div> --}}
                    <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        {{-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="subscribe_me" checked>
                        <label class="form-check-label" for="subscribe_me">Subscribe me to Newsletter</label>
                        </div> --}}
                        <button class="btn btn-primary mt-3 mt-sm-0" type="submit">Update profile</button>
                    </div>
                    </div>
          </div>
        </form>
      </section>
    </div>
  </div>


  <script>

   const realFileBtn = document.getElementById("real-file");
    const customBtn = document.getElementById("custom-button");
    const customTxt = document.getElementById("custom-text");

    customBtn.addEventListener("click", function() {
      realFileBtn.click();
    });

    realFileBtn.addEventListener("change", function() {
      if (realFileBtn.value) {
        customTxt.innerHTML = realFileBtn.value.match(
          /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
      } else {
        customTxt.innerHTML = "No file chosen, yet.";
      }
    });


  </script>

  @endsection
