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
                <h3 class="box-title">SubCategory List <sup><span class="badge badge-pill badge-danger"> {{ count($subcategory) }} </span></sup> </h3>
                            </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped  text-center">
                      <thead>
                          <tr>
                              <th>Category</th>
                              <th>Sub Category (Eng)</th>
                              {{-- <th>Sub Category (Fil)</th> --}}
                              <th>Action</th>
                          
                          </tr>
                      </thead>
                      <tbody>


                            @foreach($subcategory as $item)
                          <tr>

                            @if($item['category']['category_name_en'] == Null)
                            <td>N/A</td>
                            @else
                              <td>{{ $item['category']['category_name_en'] }}</td>
                            @endif

                            @if($item->subcategory_name_en == null)
                            <td>N/A</td>
                            @else
                              <td>{{ $item->subcategory_name_en }}</td>
                            @endif

                            {{-- @if($item->subcategory_name_fil == null)

                            <td>N/A</td>

                            @else

                              <td>{{ $item->subcategory_name_fil }}</td>
                            @endif --}}
                            

                              <td width="100">
                                
                                <a href="{{  route('subcategory.edit', $item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                <a href="{{  route('subcategory.delete', $item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>

                              
                              </td>
                        
                          </tr>
                            @endforeach



                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Sub Category Icon</th>
                            <th>Sub Category (Eng)</th>
                            {{-- <th>Sub Category (Fil)</th> --}}
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


          
          <!---------------------------------------------ADD Sub Category------------------------------------------------>

          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Sub Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">



                    <form method="post" action="{{ route('subcategory.store') }}">
                        @csrf
             	          
                                <!--brand name eng-->
                                <div class="form-group">
                                    <h5>Select Category <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected disabled>Select Product Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>

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
                                        <input type="text" name="subcategory_name_en" class="form-control"> 
                                        @error('subcategory_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                                <!--icon-->
                                {{-- <div class="form-group">
                                    <h5>Sub Category Name (Fil) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_fil" class="form-control"> 
                                        @error('subcategory_name_fil')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div> --}}

                            

                           
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