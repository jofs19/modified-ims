@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">






<!--   ------------ Add Search Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Search By Date </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('search-by-date-stock') }}">
	 	@csrf


	 <div class="form-group">
		<h5>Select Date <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="date" class="form-control" >
	 @error('date')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	</div>
	</div>


			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
						</div>
					</form>


					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>




   <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Search By Month </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


        <form method="post" action="{{ route('search-by-month-stock') }}">
                            	 	@csrf


	 <div class="form-group">
		<h5>Select Month  <span class="text-danger">*</span></h5>
		<div class="controls">

		<select name="month" class="form-control">
			<option label="Choose One"></option>
			<option value="January">January</option>
			<option value="February">February</option>
			<option value="March">March</option>
			<option value="April">April</option>
			<option value="May">May</option>
			<option value="Jun">Jun</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="September">September</option>
			<option value="October">October</option>
			<option value="November">November</option>
			<option value="December">December</option>


		</select>

	 @error('month')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	</div>
	</div>


 <div class="form-group">
		<h5>Select Year  <span class="text-danger">*</span></h5>
		<div class="controls">

		<select name="year_name" class="form-control">
			<option label="Choose One"></option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option>
		</select>

	 @error('year_name')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	</div>
	</div>

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
						</div>
					</form>


					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>





			   <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Select Year </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


        <form method="post" action="{{ route('search-by-year-stock') }}" >
                            @csrf

<div class="form-group">
		<h5>Select Year  <span class="text-danger">*</span></h5>
		<div class="controls">

		<select name="year" class="form-control">
			<option label="Choose One"></option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option>
            <option value="2027">2027</option>
			<option value="2028">2028</option>
			<option value="2029">2029</option>
			<option value="2030">2030</option>
		</select>

	 @error('year')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	</div>
	</div>


    

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
						</div>
					</form>


					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>


            <div class="col-4">

                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Select Item PCS </h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">


           <form method="post" action="{{ route('search-by-stock') }}" >
                               @csrf

   <div class="form-group">
           <h5>Item PCS  <span class="text-danger">*</span></h5>
           <div class="controls">

           <select name="stock" class="form-control">
               <option label="Choose One"></option>
               <option value="10">0-10</option>
               <option value="50">11-50</option>
               <option value="100">51-100</option>
               <option value="500">101-500</option>
               <option value="1000">501-1000</option>

           </select>

        @error('stock')
        <span class="text-danger">{{ $message }}</span>
        @enderror
       </div>

       </div>

                <div class="text-xs-right">
       <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                           </div>
                       </form>


                       </div>
                   </div>
                   <!-- /.box-body -->
                 </div>
                 <!-- /.box -->
               </div>





 <!--   ------------End  Add Search Page -------- -->


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection
