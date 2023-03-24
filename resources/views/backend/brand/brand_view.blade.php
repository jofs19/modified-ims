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
                <h3 class="box-title">Brand List <span class="badge badge-pill badge-danger"> {{ count($brands) }} </span></h3>
                 </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped text-center">
                      <thead>
                          <tr>
                              <th>Brand Name (Eng)</th>
                              <th>Brand Name (Fil)</th>
                              <th>Image</th>
                              <th>Action</th>
                          
                          </tr>
                      </thead>
                      <tbody>


                            @foreach($brands as $item)
                          <tr>
                              <td>{{ $item->brand_name_en }}</td>
                              <td>{{ $item->brand_name_fil }}</td>
                              <td>
                                
                                <a href="{{ asset($item->brand_image) }}" data-toggle="lightbox" data-gallery="multiimages" data-title="{{ $item->brand_name_en }}"><img src="{{ asset($item->brand_image) }}" class="all studio isotope-item" alt="gallery" style="width: 70px" height="40px"> </a>


                                {{-- <img src="{{ asset($item->brand_image) }}" alt="brand-image" style="width: 70px" height="40px"> --}}
                              
                              
                              
                              </td>
                              <td width="100">
                                
                                <a href="{{  route('brand.edit', $item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                <a href="{{  route('brand.delete', $item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>

                              
                              </td>
                        
                          </tr>
                            @endforeach



                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Brand Name (Eng)</th>
                            <th>Brand Name (Fil)</th>
                            <th>Image</th>
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


          
          <!----------------------------------------------ADD BRAND------------------------------------------------>

          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">



                    <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                        @csrf
             	          
                                <!--brand name eng-->
                                <div class="form-group">
                                    <h5>Brand Name (Eng) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_en"  class="form-control"> 
                                        @error('brand_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>

                                <!--brand name fil-->
                                <div class="form-group">
                                    <h5>Brand Name (Fil) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_fil" class="form-control"> 
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