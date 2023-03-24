@extends('admin.admin_master')
@section('admin')

  <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">
            


          
          <!----------------------------------------------ADD Category------------------------------------------------>

          <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">



                    <form method="post" action="{{ route('category.update', $category->id) }}">
                        @csrf

             	          
                                <!--brand name eng-->
                                <div class="form-group">
                                    <h5>Category Name (Eng) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_en"  class="form-control" value="{{ $category->category_name_en }}"> 
                                        @error('category_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                                <!--brand name fil-->
                                <div class="form-group">
                                    <h5>Category Name (Fil) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_fil" class="form-control" value="{{ $category->category_name_fil }}"> 
                                        @error('category_name_fil')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                                <!--icon-->
                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" class="form-control" value="{{ $category->category_icon }}"> 
                                        @error('category_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                            

                           
                       <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update" name="">
                           <a href="{{ url('category/view') }}">
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