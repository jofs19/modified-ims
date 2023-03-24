@extends('admin.admin_master')
@section('admin')

  <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          
          <!----------------------------------------------EDIT BRAND------------------------------------------------>

          <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">



                    <form method="post" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $brand->id }}">
                        <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
             	          
                                <!--brand name eng-->
                                <div class="form-group">
                                    <h5>Brand Name (Eng) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_en"  class="form-control" value="{{ $brand->brand_name_en }}"> 
                                        @error('brand_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                                <!--brand name fil-->
                                <div class="form-group">
                                    <h5>Brand Name (Fil) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_fil" class="form-control" value="{{ $brand->brand_name_fil }}"> 
                                        @error('brand_name_fil')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                                <!--brand name image-->
                                <div class="form-group">
                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="brand_image" class="form-control"> 
                                        @error('brand_image')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                           
                       <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update" name="">
                           <a href="{{ url('brand/view') }}">
                            <input type="button" class="btn btn-rounded btn-danger mb-5 ml-5"
                                value="Cancel">
                        </a>
                       </div>
                   </form>


                    
                 
             
               <!-- /.box-body -->
             </div>
 
 
            
             <!-- /.box -->          
           </div>

        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>


@endsection