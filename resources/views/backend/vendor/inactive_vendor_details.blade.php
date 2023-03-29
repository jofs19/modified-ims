
  @extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container-full">

    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Unauthorized Staff Details</h4>
             {{-- <h6 class="box-subtitle">Fill in the<span class="text-success"> required fields </span></h6> --}}
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">

                <form method="post" action="{{ route('active.vendor.approve') }}" enctype="multipart/form-data" >                    @csrf

                    <input type="hidden" name="id" value="{{ $inactiveVendorDetails->id }}">
                     <div class="row">
                       <div class="col-12">



                        <div class="row">


                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Username <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="username" value="{{ $inactiveVendorDetails->username }}" />


                                    </div>
                                </div>

                            </div> <!--end col md-6-->

                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Department Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" required="" data-validation-required-message="This field is required" value="{{ $inactiveVendorDetails->name }}">

                                    </div>
                                </div>

                            </div> <!--end col md-6-->

                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Staff Email <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control" required="" data-validation-required-message="This field is required" value="{{ $inactiveVendorDetails->email }}">

                                    </div>
                                </div>



                            </div> <!--end col md-6-->

                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Staff Phone <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="tel" name="phone" class="form-control" required="" data-validation-required-message="This field is required" value="{{ $inactiveVendorDetails->phone }}">

                                    </div>
                                </div>



                            </div> <!--end col md-6-->

                        </div> <!--end row -->

                        <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <h5>Date of Join <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="address" class="form-control" required="" data-validation-required-message="This field is required" value="{{ $inactiveVendorDetails->address }}">

                                </div>
                            </div>

                        </div> <!--end col md-6-->


                        <div class="col-md-6">

                            <div class="form-group">
                                <h5>Date of Join <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="vendor_join" class="form-control" required="" data-validation-required-message="This field is required" value="{{ $inactiveVendorDetails->vendor_join }}">

                                </div>
                            </div>

                        </div> <!--end col md-6-->


                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <h5>Additional Information <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea type="text" name="vendor_short_info" class="form-control" required="" data-validation-required-message="This field is required">

                                    </textarea>{{$inactiveVendorDetails->vendor_short_info }}</textarea>

                                </div>
                            </div>

                        </div> <!--end col md-6-->


                            <div class="col-md-6">


                                <img id="showImage" src="{{ (!empty($inactiveVendorDetails->profile_photo_path)) ? url('upload/vendor_images/'.$inactiveVendorDetails->profile_photo_path):url('upload/no_image.jpg') }}" style="width: 100px; height: 100px; border: 1px solid #000000;">


                            </div> <!--end col md-6-->


                        </div> <!--end row -->



                       <div class="text-xs-right">
                        <input type="submit" class="btn btn-danger px-4" value="Authorize Staff" />
                       </div>
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>
    <!-- /.content -->
  </div>


{{-- <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
        });
    });
</script> --}}


  @endsection
