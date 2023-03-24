@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">

    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Change Admin Password</h4>
             <h6 class="box-subtitle">Fill in the<span class="text-success"> required fields </span></h6>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">

                    <form method="post" action="{{ route('update.change.password') }}">
                        @csrf
                     <div class="row">
                       <div class="col-12">			
                        
                        

                        <div class="row">

                            <div class="col-md-6">
                           
                                <!--OLD PASSWORD-->
                                <div class="form-group">
                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="oldpassword" id="current_password" class="form-control" required="" data-validation-required-message="This field is required"> 
                                        
                                    </div>
                                </div>

                                <!--NEW PASSWORD-->
                                <div class="form-group">
                                    <h5>New Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="password" id="password" class="form-control" required="" data-validation-required-message="This field is required"> 
                                        
                                    </div>
                                </div>

                                <!--CONFIRM NEW PASSWORD-->
                                <div class="form-group">
                                    <h5>Confirm Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required="" data-validation-required-message="This field is required"> 
                                        
                                    </div>
                                </div>

                            </div> <!--end col md-6-->                     

                        </div> <!--end row -->

            

                           
                       <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update" name="">
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




  @endsection