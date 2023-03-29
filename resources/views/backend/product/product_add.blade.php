@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Item </h4>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">

                        <form method="post" action="{{ route('product-store') }}" enctype="multipart/form-data" >
                            @csrf

                            <div class="row">
                                <div class="col-12">


                                    <div class="row">
                                        <!-- start 1st row  -->
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Select Department  <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control" required="">
                                                        <option value="" selected="" disabled>Select Department</option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}">
                                                                {{ $brand->brand_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Select Category  <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control" required="">
                                                        <option value="" selected="" disabled>Select Category
                                                        </option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->category_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->


                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Select Sub Category <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control" required="">
                                                        <option value="" selected="" disabled>Select Sub Category
                                                        </option>

                                                    </select>
                                                    @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 1st row  -->



                                    <div class="row">
                                        <!-- start 2nd row  -->
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Select SubSubCategory  <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subsubcategory_id" class="form-control" required="">
                                                        <option value="" selected="" disabled>Select Sub- Sub Category
                                                        </option>

                                                    </select>
                                                    @error('subsubcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Item Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_en" class="form-control" required="">
                                                    @error('product_name_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->


                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Unit <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_code" class="form-control">
                                                    @error('product_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 2nd row  -->



                                    <div class="row">
                                        <!-- start 3RD row  -->


                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Item Stock <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_qty" class="form-control" required="">
                                                    @error('product_qty')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->


                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Select Staff <span class="text-danger">*</span></h5>
                                                    {{-- <label for="inputCollection" class="form-label">Select Vendor</label> --}}
                                                    <select name="vendor_id"  class="form-control" id="inputCollection">
                                                        <option></option>
                                                    @foreach($activeVendor as $vendor)
                                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                         @endforeach
                                                      </select>
                                                    @error('vendor_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>

                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Item Tags <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags_en" class="form-control"
                                                        value="Tag 1, Tag 2, Tag 3" data-role="tagsinput" required="">
                                                    @error('product_tags_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->




                                    </div> <!-- end 3RD row  -->









{{--
                                    <div class="row">
                                        <!-- start 5th row  -->
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Product Tags (Fil) <span class="text-danger">*</span></h5>
                                                <div class="controls">

                                                    <input type="text" name="product_tags_fil" class="form-control"
                                                        value="Tag 1, Tag 2, Tag 3" data-role="tagsinput" required="">
                                                    @error('product_tags_fil')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Product Variant (Fil) <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color_fil" class="form-control"
                                                        value="Baryant 1, Baryant 2, Baryant 3" data-role="tagsinput">
                                                    @error('product_color_fil')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->




                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Product Size (Fil) <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_size_fil" class="form-control"
                                                        value="Size 1, Size 2, Size 3" data-role="tagsinput">
                                                    @error('product_size_fil')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 5th row  --> --}}


                                    <div class="row">
                                        <!-- start 6th row  -->


                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="product_thumbnail" class="form-control" onChange="mainThumUrl(this)" required="">
                                                    @error('product_thumbnail')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <br>
                                                    <img src="" id="mainThmb">

                                                </div>
                                            </div>


                                        </div> <!-- end col md 4 -->


                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Multiple Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
                                                    @error('multi_img')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <br>
                                                    <div class="row ml-lg-2" id="preview_img"></div>
                                                </div>
                                            </div>


                                        </div> <!-- end col md 4 -->

                                        {{-- <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_price" class="form-control">

                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 --> --}}

                                    </div> <!-- end 6th row  -->



                                    <div class="row">
                                        <!-- start 7th row  -->
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <h5>Short Description  <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_descp_en" id="textarea" class="form-control"
                                                        required placeholder="Textarea text"></textarea>
                                                </div>
                                            </div>

                                        </div> <!-- end col md 6 -->

                                        {{-- <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Short Description  <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_descp_fil" id="textarea" class="form-control"
                                                        required placeholder="Textarea text"></textarea>
                                                </div>
                                            </div>


                                        </div> <!-- end col md 6 --> --}}

                                    </div> <!-- end 7th row  -->


                                    <div class="row p-0 m-0" style="visibility: collapse">
                                        <!-- start 6th row  -->





                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="selling_price" class="form-control" required="" value="0">
                                                    @error('selling_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">

                                            <div class="form-group ">
                                                <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                <div class="controls">

                                                    <div class="input-group ">
                                                        <span class="input-group-addon">
                                                          <input type="checkbox" id="addon_Checkbox_1" class="discount_price">
                                                          <label for="addon_Checkbox_1" style="padding-left: 20px;height: 13px;"></label>
                                                        </span>
                                                        <input type="text" name="discount_price" class="form-control" value="0">
                                                    </div>

                                                </div>
                                            </div>

                                        </div> <!-- end col md 6 -->



                                    </div> <!-- end 6th row  -->


                                    <div class="row">
                                        <!-- start 8th row  -->
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <h5>Long Description <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor1" name="long_descp_en" rows="10" cols="80" required="" placeholder="Textarea text">

                                                    </textarea>
                                                </div>
                                            </div>


                                        </div> <!-- end col md 6 -->

                                        {{-- <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Long Description (Fil) <span class="text-danger">*</span></h5>
                                                <div class="controls">

                                                    <textarea id="editor2" name="long_descp_fil" rows="10" cols="80" required="" placeholder="Textarea text">

                                                    </textarea>
                                                </div>
                                            </div>



                                        </div> <!-- end col md 6 --> --}}

                                    </div> <!-- end 8th row  -->

                                    <hr>

                                    {{-- <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">


                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                            value="1">
                                                        <label for="checkbox_2">Best Seller</label> <!--HOT DEALS-->
                                                    </fieldset>

                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_4" name="special_offer"
                                                            value="1" class="special_offer">
                                                        <label for="checkbox_4">Special Offers</label>
                                                    </fieldset>

                                                    <fieldset class="show_time">

                                                        <input class="form-control" type="date" name="so_saletime" min="{{ Carbon\Carbon::now()->format('m/y/d') }}">
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3" name="featured"
                                                            value="1">
                                                        <label for="checkbox_3">Featured Products</label> <!--FEATURED PRODUCTS-->
                                                    </fieldset>



                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_5" name="special_deals"
                                                            value="1">
                                                        <label for="checkbox_5">Trending Products</label><!--Special Deals-->
                                                    </fieldset>
                                                </div>

                                            </div>
                                        </div>
                                    </div> --}}



                                    {{-- <div class="col-md-6"> --}}

                                        {{-- <div class="form-group">
                                            <h5>Digital Product <span class="text-danger">pdf,xlx,csv*</span></h5>
                                            <div class="controls">
                                     <input type="file" name="file" class="form-control" >

                                              </div>
                                        </div> --}}


                                            {{-- </div> <!-- end col md 4 --> --}}

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="Add Item">
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



<script type="text/javascript">
	$(document).ready(function() {
	  $('select[name="category_id"]').on('change', function(){
		  var category_id = $(this).val();
		  if(category_id) {
			  $.ajax({
				  url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
				  type:"GET",
				  dataType:"json",
				  success:function(data) {
					$('select[name="subsubcategory_id"]').html('');
					 var d =$('select[name="subcategory_id"]').empty();
						$.each(data, function(key, value){
							$('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
						});
				  },
			  });
		  } else {
			  alert('danger');
		  }
	  });
$('select[name="subcategory_id"]').on('change', function(){
		  var subcategory_id = $(this).val();
		  if(subcategory_id) {
			  $.ajax({
				  url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
				  type:"GET",
				  dataType:"json",
				  success:function(data) {
					 var d =$('select[name="subsubcategory_id"]').empty();
						$.each(data, function(key, value){
							$('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
						});
				  },
			  });
		  } else {
			  alert('danger');
		  }
	  });

  });
  </script>

<script type="text/javascript">
	function mainThumUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>


<script>

  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                  .height(80); //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });

  </script>

  <script>

    $(".show_time").hide();
    $(".special_offer").click(function(){
        if($(this).is(":checked")){
            $(".show_time").show(300);
        }else{
            $(".show_time").hide(300);
        }
    });


    $(".sale_duration").hide();
    $(".discount_price").click(function(){
        if($(this).is(":checked")){
            $(".sale_duration").show(300);
        }else{
            $(".sale_duration").hide(300);
        }
    });




  </script>


@endsection

{{-- File c:/wamp64/bin/apache/apache2.4.51/bin/libssh2.dll exists.
Should be a symbolic link
File c:/wamp64/bin/apache/apache2.4.51/bin/php.ini exists.
Should be a symbolic link --}}
