@extends('seller.vendor_dashboard')
@section('vendor')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
    .bootstrap-tagsinput {
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  display: block;
  padding: 4px 4px;
  color: #555;
  vertical-align: middle;
  border-radius: 4px;
  max-width: 100%;
  line-height: 22px;
  cursor: text;
}

.bootstrap-tagsinput input {
  border: none;
  box-shadow: none;
  outline: none;
  background-color: transparent;
  margin: 0;
  width: auto;
  max-width: inherit;
}
</style>

@php
	$id = Auth::user()->id;
	$verdorId = App\Models\User::find($id);
	$status = $verdorId->status;
@endphp

@if($status == 'inactive')


<section class="pt-lg-4 pb-4 mb-3">


        <div class="row justify-content-center pt-lg-4 text-center">
          <div class="col-lg-5 col-md-7 col-sm-9">
            <h2 class="h3 mb-4">Wait for the admin to authorize your Vendor account.</h2>
            <p class="fs-md mb-4">
            </p>
          </div>

      </div>

</section>

@else

<section class="col-lg-8 pt-lg-4 pb-4 mb-3">
    <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
      <!-- Title-->
      <div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
        <h2 class="h3 py-2 me-2 text-center text-sm-start">Add New Product</h2>
        {{-- <div class="py-2">
          <select class="form-select me-2" id="unp-category">
            <option>Select Vendor</option>
            <option>Photos</option>
            <option>Graphics</option>
            <option>UI Design</option>
            <option>Web Themes</option>
            <option>Fonts</option>
            <option>Add-Ons</option>
          </select>
        </div> --}}
      </div>


      <form id="myForm" method="post" action="{{ route('vendor.store.product') }}" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3 pb-2">
          <label class="form-label" for="unp-product-name">Product name</label>
          <input class="form-control" type="text" id="unp-product-name" name="product_name_en" max="100" placeholder="Enter product name" required>
          <div class="form-text">Maximum 100 characters</div>
        </div>



        <div class="row pb-4">




            <div class="col-6">




                <!-- Textual addon -->
                <div class="input-group">
                    <span class="input-group-text fw-medium">Brand</span>
                    <select class="form-select" name="brand_id">
                    <option>Choose one...</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
                     @endforeach
                    </select>
                </div>


        </div>

        <div class="col-6">


            <!-- Textual addon -->
            <div class="input-group">
                <span class="input-group-text fw-medium">Category</span>
                <select class="form-select" name="category_id">
                    <option value="" selected="" disabled>Select Category
                    </option>
                     @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->category_name_en }}</option>
            @endforeach
                </select>
            </div>


    </div>
        </div>


        <div class="row pb-4">


            <div class="col-6">


                    <!-- Textual addon -->
                <div class="input-group">
                    <span class="input-group-text fw-medium">Sub Category</span>
                    <select class="form-select" name="subcategory_id">
                        <option value="" selected="" disabled>Select Sub- Sub Category
                        </option>
                        @foreach( $subcategories as $subcategory)
                        @if($subcategory->subcategory_name_en != "-----")
                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name_en }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-6">


                <!-- Textual addon -->
            <div class="input-group">
                <span class="input-group-text fw-medium">Sub-sub Category</span>
                <select class="form-select" name="subsubcategory_id">
                    <option value="" selected="" disabled>Select Sub- Sub Category
                    </option>
                    @foreach( $subsubcategories as $subsubcategory)
                    @if($subsubcategory->subsubcategory_name_en != "-----")
                    <option value="{{ $subsubcategory->id }}">{{ $subsubcategory->subsubcategory_name_en }}</option>
                    @endif
                    @endforeach

                </select>
            </div>

        </div>












        </div>

        @php
            $shop_name = Auth::user()->shop_name;
        @endphp

        <div class="row pb-4" >

            <div class="col-12">
                <div class="mb-3 py-2">
                    <label class="form-label" for="unp-product-tags">Product tags</label>
                    <textarea class="form-control" rows="4" id="unp-product-tags" name="product_tags_en">computer, hardware, pcbuild</textarea>
                    <div class="form-text">Up to 10 keywords that describe your item. Tags should all be in lowercase and separated by commas.</div>
                  </div>
              </div>

        </div>


        <div class="row pb-4">


              <div class="col-6">
                <label class="form-label" for="unp-product-description">Product Sizes</label>
                <input  value='size 1, size 2, size 3' class="form-control tag2" autofocus name="product_size_en">
                <div class="form-text"> Tags should all be in lowercase and separated by commas.</div>
              </div>

              <div class="col-6">
                <label class="form-label" for="unp-product-description">Product Variants</label>
                <input  value='variant 1, variant 2, variant 3' class="form-control tag3" autofocus name="product_color_en">
                <div class="form-text"> Tags should all be in lowercase and separated by commas.</div>
              </div>
        </div>


        <div class="row pb-2">

            <div class="mb-3 pb-2 col-6">
                <label class="form-label" for="unp-product-name">Product Code</label>
                <input class="form-control" type="text" id="unp-product-name" name="product_code">
              </div>

              <div class="mb-3 pb-2 col-6">
                <label class="form-label" for="unp-product-name">Product Stock</label>
                <input class="form-control" type="text" id="unp-product-name" name="product_qty">
              </div>
        </div>
        {{-- END ROW --}}



        <div class="row">
            <div class="col-sm-6 mb-3">
              <label class="form-label" for="unp-standard-price">Selling Price</label>
              <div class="input-group"><span class="input-group-text">₱</span>
                <input class="form-control" type="text" id="unp-standard-price" name="selling_price" placeholder="00.00">
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <label class="form-label" for="unp-extended-price">Discounted Price <small class="text-muted">(Check the box to activate sale duration.)</small></label>
              <!-- Checkbox addon -->
                <div class="input-group">
                    <div class="input-group-text pe-2">
                    <div class="form-check">
                        <input class="form-check-input discount_price form-check-sm" name="discount_price" type="checkbox" id="ex-check-1" placeholder="00.00">
                        <label class="form-check-label" for="ex-check-1"></label>
                    </div>
                    </div>
                    <input class="form-control form-control-sm" type="text" name="discount_price" placeholder="Enter discounted price" id="small-input">

                </div>

            </div>



        </div>


        <div class="row">

            <div class="col-sm-12 mb-3 sale_duration">

                    <label class="form-label">Choose date</label>
                    <div class="input-group ">
                    <input class="form-control date-picker rounded pe-5 " type="date" placeholder="Choose date" data-datepicker-options='{"altInput": true, "altFormat": "d/m/Y", "dateFormat": "d-m-Y", "defaultDate": "today", "minDate": "today"}' name="sale_time">
                    <i class="fi-calendar position-absolute top-50 end-0 translate-middle-y me-3"></i>
                    </div>

            </div>


        </div>





        <div class="mb-3 py-2">
            <label class="form-label" for="unp-product-name">Product header description</label>
            <input class="form-control" type="text" id="unp-product-name" name="short_descp_en" max="100">
            <div class="form-text">Maximum 100 characters</div>
          </div>


        {{-- <div class="mb-3 py-2">
          <label class="form-label" for="unp-product-description">Product body description</label>
          <textarea class="form-control" rows="6" id="unp-product-description" name="long_descp_en"></textarea>
          <div class="bg-secondary p-3 fs-ms rounded-bottom"><span class="d-inline-block fw-medium me-2 my-1">Markdown supported:</span><em class="d-inline-block border-end pe-2 me-2 my-1">*Italic*</em><strong class="d-inline-block border-end pe-2 me-2 my-1">**Bold**</strong><span class="d-inline-block border-end pe-2 me-2 my-1">- List item</span><span class="d-inline-block border-end pe-2 me-2 my-1">##Heading##</span><span class="d-inline-block">--- Horizontal rule</span></div>
        </div> --}}


        <div class="mb-3 py-2">
            <label for="inputProductDescription" class="form-label">Product body description</label>
            <textarea id="mytextarea" name="long_descp_en"><span class="text-muted">Enter product description...</span></textarea>
          </div>

        <label class="form-label" for="unp-product-files">Product Thumbnail</label>

        <div class="file-drop-area mb-3">

            <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Drag and drop here to upload product screenshot</span>
            <input class="file-drop-input" type="file" name="product_thumbnail" id="formFile" onChange="mainthumUrl(this)">
            <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select file</button>
            <div class="form-text">1000 x 800px ideal size for hi-res displays</div>
          </div>

        {{-- <div class="mb-3 py-2">
          <label class="form-label" for="unp-product-tags">Product tags</label>
          <textarea class="form-control" rows="4" id="unp-product-tags"></textarea>
          <div class="form-text">Up to 10 keywords that describe your item. Tags should all be in lowercase and separated by commas.</div>
        </div> --}}
        <div class="mb-3 pb-2">
          <label class="form-label" for="unp-product-files">Product Multi-image</label>
          <input class="form-control" type="file" name="multi_img[]" multiple="" id="multiImg" required="">
          <div class="form-text">Maximum file size is 1GB</div>

        </div>

        <div class="row pb-4" id="preview_img"></div>







        <fieldset>

            <div class="row pb-4">

                <div class="col-md-6 ">
                    <div class="form-check  py-2">
                        <input class="form-check-input" type="checkbox" id="ex-check-1" name="hot_deals" value="1">
                        <label class="form-check-label" for="ex-check-1">Best Seller</label>
                      </div>
                </div>

                <div class="col-md-6">

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ex-check-1" name="featured" value="1">
                        <label class="form-check-label" for="ex-check-1">Featured Products</label>
                      </div>
                </div>


                <div class="col-md-6 py-2">

                      <div class="form-check">
                        <input class="form-check-input special_offer" type="checkbox" id="ex-check-1" name="special_offer" value="1">
                        <label class="form-check-label" for="ex-check-1">Special Offers</label>
                      </div>


                      <fieldset class="show_time">

                        <input class="form-control date-picker rounded pe-5 " name="so_saletime" type="date" placeholder="Choose date" data-datepicker-options='{"altInput": true, "altFormat": "d/m/Y", "dateFormat": "d-m-Y", "defaultDate": "today", "minDate": "today"}'>

                    </fieldset>

                </div>

                <div class="col-md-6 ">

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ex-check-1" name="special_deals" value="1">
                        <label class="form-check-label" for="ex-check-1">Trending Products</label>
                      </div>
                </div>


            </div>






        </fieldset>




        <button class="btn btn-primary d-block w-100" type="submit"><i class="ci-cloud-upload fs-lg me-2"></i>Upload Product</button>
      </form>
    </div>

  </section>

  @endif

  <script type="text/javascript">
	$(document).ready(function() {
	  $('select[name="category_id"]').on('change', function(){
		  var category_id = $(this).val();
		  if(category_id) {
			  $.ajax({
				  url: "{{  url('/vendor/subcategory/ajax') }}/"+category_id,
				  type:"GET",
				  dataType:"json",
				  success:function(data) {
					$('select[name="subsubcategory_id"]').html('');
					 var id =$('select[name="subcategory_id"]').empty();
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
				  url: "{{  url('/vendor/sub-subcategory/ajax') }}/"+subcategory_id,
				  type:"GET",
				  dataType:"json",
				  success:function(data) {
					 var id =$('select[name="subsubcategory_id"]').empty();
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
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(100)
                  .height(100); //create image element
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
