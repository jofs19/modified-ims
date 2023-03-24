@extends('admin.admin_master')
@section('admin')

  <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Category List <sup><span class="badge badge-pill badge-danger"> {{ count($category) }} </span></sup></h3>
                   </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped text-center">
                      <thead>
                          <tr>
                              <th>Category Icon</th>
                              <th>Category (Eng)</th>
                              <th>Category (Fil)</th>
                              <th>Action</th>
                          
                          </tr>
                      </thead>
                      <tbody>


                            @foreach($category as $item)
                          <tr>
                              <td  width="20"> <span><i class="{{ $item->category_icon }}"></i></span></td>
                              <td>{{ $item->category_name_en }}</td>
                              <td>{{ $item->category_name_fil }}</td>

                              <td width="100">
                                
                                <a href="{{  route('category.edit', $item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                <a href="{{  route('category.delete', $item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>

                              
                              </td>
                        
                          </tr>
                            @endforeach



                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Category Icon</th>
                            <th>Category (Eng)</th>
                            <th>Category (Fil)</th>
                            <th>Action</th>
                              
                          </tr>
                      </tfoot>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>


           
            <!-- /.box -->          
          </div>
          <!-- /.col -->


          
          <!----------------------------------------------ADD Category------------------------------------------------>

          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">



                    <form method="post" action="{{ route('category.store') }}">
                        @csrf
             	          
                                <!--brand name eng-->
                                <div class="form-group">
                                    <h5>Category Name (Eng) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_en"  class="form-control"> 
                                        @error('category_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                                <!--brand name fil-->
                                <div class="form-group">
                                    <h5>Category Name (Fil) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_fil" class="form-control"> 
                                        @error('category_name_fil')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                                <!--icon-->
                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" class="form-control"> 
                                        @error('category_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                            

                           
                       <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New" name="">
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