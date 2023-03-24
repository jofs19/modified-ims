@extends('admin.admin_master')
@section('admin')

  <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">
            


          
          <!---------------------------------------------ADD Sub Category------------------------------------------------>

          <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Sub Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">



                    <form method="post" action="{{ route('subcategory.update') }}">
                        @csrf
             	          
                        <input type="hidden" name="id" value="{{ $subcategory->id }}">

                                <!--brand name eng-->
                                <div class="form-group">
                                    <h5>Select Category <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected disabled>Select Product Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{  $category->id == $subcategory->category_id ? 'selected':'' }}>{{ $category->category_name_en }}</option>

                                            @endforeach
                          
                                        </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    </div>

                                </div>

                                <!--brand name fil-->
                                <div class="form-group">
                                    <h5>Sub Category Name (Eng) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_en" class="form-control" value="{{ $subcategory->subcategory_name_en }}"> 
                                        @error('subcategory_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                                <!--icon-->
                                <div class="form-group">
                                    <h5>Sub Category Name (Fil) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_fil" class="form-control" value="{{ $subcategory->subcategory_name_fil }}"> 
                                        @error('subcategory_name_fil')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                            

                           
                       <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update" name="">
                           <a href="{{ url('category/sub/view') }}">
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