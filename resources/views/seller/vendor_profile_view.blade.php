@extends('seller.vendor_dashboard')
@section('vendor')

<section class="col-lg-8 pt-lg-4 pb-4 mb-3">
    <!-- Toolbar-->
    <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">

    </div>
    <!-- Profile form-->
    <form method="post" action="{{ route('vendor.profile.store') }}" enctype="multipart/form-data">
        @csrf
                        {{-- <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">User Image </label>
                            <input type="file" name="profile_photo_path" class="form-control">
                        </div> --}}


      <div class="bg-secondary rounded-3 p-4 mb-4 mr-4 pr-4">
        <div class="d-flex align-items-center"><img class="rounded"
            src="{{ (!empty($vendorData->profile_photo_path)) ? url('upload/vendor_images/'.$vendorData->profile_photo_path):url('upload/no_image.jpg') }}" width="90" alt="User">
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
          <input class="form-control" type="text" id="account-fn" value="{{ $vendorData->username }}" style="width: 22rem;" disabled>
        </div>



        <div class="col-sm-5">
            <label class="form-label" for="account-email">Department name</label>
            <input class="form-control" name="name" type="text" value="{{ $vendorData->name }}" value="" style="width: 22rem;">
        </div>

        <div class="col-sm-6">
          <label class="form-label" for="account-email">Main Address</label>
          <input class="form-control" name="address" type="text" id="account-email" value="{{ $vendorData->address }}" style="width: 22rem;">
        </div>
        <div class="col-sm-5">
          <label class="form-label" for="account-phone">Phone Number</label>
          <input class="form-control" name="phone" type="text" id="account-phone" value="{{ $vendorData->phone }}" style="width: 22rem;">
        </div>

        <div class="col-sm-5">

            <label class="form-label">Date of Join</label>
            <div class="input-group">
            <input class="form-control date-picker rounded pe-5" type="text" placeholder="Choose date" style="width: 22rem;" data-datepicker-options='{"altInput": true, "altFormat": "F j, Y", "dateFormat": "Y-m-d"}' name="vendor_join" value="{{$vendorData->vendor_join }}">
            <i class="fi-calendar position-absolute top-50 end-0 translate-middle-y me-3"></i>
            </div>

        </div>

        <div class="col-sm-6">
            <label class="form-label" for="account-ln">Email Address</label>
            <input class="form-control" name="email" type="email" id="account-ln" value="{{ $vendorData->email }}">
          </div>


        <div class="col-sm-11">

            <!-- Icon addon -->
            <label class="form-label">Additional Info</label>

            <div class="input-group">
                <span class="input-group-text">
                <i class="ci-message"></i>
                </span>
                <textarea class="form-control" placeholder="Type your message here..." rows="6" name="vendor_short_info">{{$vendorData->vendor_short_info }}</textarea>
            </div>

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
