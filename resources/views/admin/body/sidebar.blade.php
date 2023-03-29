@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();




@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo mb-0 pb-0">
				 <a href="{{ url('admin/dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center pt-2 mt-2 pb-2 mb-2">
						  <img src="{{ asset('frontendv2/assets/img/psu.png') }}" alt="" width="125">
						  {{-- <h3><b>Vartouhi</b> Admin</h3> --}}
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu mt-1 pt-1" data-widget="tree">

		<li class="{{ ($route == 'dashboard')? 'active':'' }}">
          <a href="{{ url('admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        {{-- @php
        $brand = (auth()->guard('admin')->user()->brand == 1);
        $category = (auth()->guard('admin')->user()->category == 1);
        $product = (auth()->guard('admin')->user()->product == 1);
        $slider = (auth()->guard('admin')->user()->slider == 1);
        $coupons = (auth()->guard('admin')->user()->coupons == 1);
        $shipping = (auth()->guard('admin')->user()->shipping == 1);
        $blog = (auth()->guard('admin')->user()->blog == 1);
        $setting = (auth()->guard('admin')->user()->setting == 1);
        $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
        $review = (auth()->guard('admin')->user()->review == 1);
        $orders = (auth()->guard('admin')->user()->orders == 1);
        $stock = (auth()->guard('admin')->user()->stock == 1);
        $reports = (auth()->guard('admin')->user()->reports == 1);
        $alluser = (auth()->guard('admin')->user()->alluser == 1);
        $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
        @endphp --}}


       {{-- @if($brand == true) --}}

        <li class="treeview {{ ($prefix == '/brand')? 'active':'' }}">
          <a href="#">
            <i class="glyphicon glyphicon-home"></i>
            <span>Departments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.brand')? 'active':'' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Departments</a></li>
            {{-- <li><a href="calendar.html"><i class="ti-more"></i>Calendar</a></li> --}}
          </ul>
        </li>

        {{-- @else
        @endif --}}


		  {{-- @if($category == true) --}}

        <li class="treeview {{ ($prefix == '/category')? 'active':'' }}">
          <a href="#">
            <i class="glyphicon glyphicon-tags"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.category')? 'active':'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
            <li class="{{ ($route == 'all.subcategory')? 'active':'' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All Sub Category</a></li>
            {{-- <li class="{{ ($route == 'all.subsubcategory')? 'active':'' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub-Sub Category</a></li> --}}
          </ul>
        </li>

        {{-- @else
        @endif

        @if($product == true) --}}

        <li class="treeview" class="treeview {{ ($prefix == '/product')? 'active':'' }}">
          <a href="#">
            <i class="glyphicon glyphicon-shopping-cart"></i>
            <span>Items</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'add-product')? 'active':'' }}"><a href="{{ route('add-product') }}"><i class="ti-more"></i>Add Items</a></li>
            <li class="{{ ($route == 'manage-product')? 'active':'' }}"><a href="{{ route('manage-product') }}"><i class="ti-more"></i>Manage Items</a></li>

          </ul>
        </li>


        <li class="treeview {{ ($prefix == '/setting')?'active':'' }}  ">
            <a href="#">
              <i class="glyphicon glyphicon-home"></i>
              <span>Manage Staffs</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
          <li class="{{ ($route == 'inactive.vendor')? 'active':'' }}"><a href="{{ route('inactive.vendor') }}"><i class="ti-more"></i>Unauthorized Staffs</a></li>

          <li class="{{ ($route == 'active.vendor')? 'active':'' }}"><a href="{{ route('active.vendor') }}"><i class="ti-more"></i>Authorized Staffs</a></li>


            </ul>
          </li>

        {{-- @else
        @endif

        @if($slider == true) --}}

        <!--SLIDER-->
        {{-- <li class="treeview {{ ($prefix == '/slider')?'active':'' }}  ">
          <a href="#">
            <i class="glyphicon glyphicon-random"></i>
            <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage-slider')? 'active':'' }}"><a href="{{ route('manage-slider') }}"><i class="ti-more"></i>Manage Slider</a></li>

          </ul>
        </li> --}}

{{--
        @else
        @endif


        @if($coupons == true) --}}
        <!--Coupon section-->

        {{-- <li class="treeview {{ ($prefix == '/coupons')?'active':'' }}  ">
         <a href="#">
           <i class="glyphicon glyphicon-certificate"></i>
           <span>Coupons</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-right pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li class="{{ ($route == 'manage-coupon')? 'active':'' }}"><a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>



         </ul>
       </li> --}}

       {{-- @else
       @endif

       <!-- End Coupon section-->


       @if($shipping == true) --}}

      <!--Shipping section-->

      {{-- <li class="treeview {{ ($prefix == '/shipping')?'active':'' }}  ">
        <a href="#">
          <i class="glyphicon glyphicon-map-marker"></i>
          <span>Shipping Area</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'manage-division')? 'active':'' }}"><a href="{{ route('manage-division') }}"><i class="ti-more"></i>Ship Province</a></li>

          <li class="{{ ($route == 'manage-district')? 'active':'' }}"><a href="{{ route('manage-district') }}"><i class="ti-more"></i>Ship City/Municipality</a></li>

          <li class="{{ ($route == 'manage-state')? 'active':'' }}"><a href="{{ route('manage-state') }}"><i class="ti-more"></i>Ship State</a></li>



        </ul>
      </li> --}}

      {{-- @else
      @endif

      @if($blog == true) --}}

      {{-- <li class="treeview {{ ($prefix == '/blog')?'active':'' }}  ">
        <a href="#">
          <i class="glyphicon glyphicon-picture"></i>
          <span>Manage Blog</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
      <li class="{{ ($route == 'blog.category')? 'active':'' }}"><a href="{{ route('blog.category') }}"><i class="ti-more"></i>Blog Category</a></li>

      <li class="{{ ($route == 'list.post')? 'active':'' }}"><a href="{{ route('list.post') }}"><i class="ti-more"></i>Blog Posts List</a></li>

      <li class="{{ ($route == 'add.post')? 'active':'' }}"><a href="{{ route('add.post') }}"><i class="ti-more"></i>Add Blog Post</a></li>

          </ul>
        </li> --}}


        {{-- @else
        @endif


        @if($setting == true) --}}

        <li class="treeview {{ ($prefix == '/setting')?'active':'' }}  ">
          <a href="#">
            <i class="glyphicon glyphicon-cog"></i>
            <span>Manage Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'site.setting')? 'active':'' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a></li>

        {{-- <li class="{{ ($route == 'seo.setting')? 'active':'' }}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>SEO Setting</a></li> --}}


          </ul>
        </li>

        {{-- @else
        @endif


        @if($returnorder == true) --}}

        <li class="treeview {{ ($prefix == '/return')?'active':'' }}  ">
          <a href="#">
            <i class="glyphicon glyphicon-circle-arrow-left"></i>
            <span>Returned Items</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'return.request')? 'active':'' }}"><a href="{{ route('return.request') }}"><i class="ti-more"></i>Return Request</a></li>

        <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i class="ti-more"></i>All Request</a></li>


          </ul>
        </li>

        {{-- @else
        @endif


        @if($review == true) --}}

        {{-- <li class="treeview {{ ($prefix == '/review')?'active':'' }}  ">
          <a href="#">
            <i class="glyphicon glyphicon-thumbs-up"></i>
            <span>Manage Review</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'pending.review')? 'active':'' }}"><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Reviews</a></li>

        <li class="{{ ($route == 'publish.review')? 'active':'' }}"><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Published Reviews</a></li>


          </ul>
        </li> --}}
{{--
        @else
        @endif



        <li class="header nav-small-cap">Manage Store</li>


        @if($orders == true) --}}

        <li class="treeview {{ ($prefix == '/orders')?'active':'' }} ">
          <a href="#">
            <i class="glyphicon glyphicon-bed"></i>
            <span>Requests </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i>Pending Items</a></li>

            <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirmed Items</a></li>

            <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processed Items</a></li>

          <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i> Picked Items</a></li>

          <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Distributed Items</a></li>

         <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Completed Items</a></li>

      <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Rejected Items</a></li>

          </ul>
        </li>

        {{-- @else
        @endif


        @if($stock == true) --}}

        <li class="treeview {{ ($prefix == '/stock')?'active':'' }}  ">
          <a href="#">
            <i class="glyphicon glyphicon-list-alt"></i>
            <span>Manage Stock </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'product.stock')? 'active':'' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a></li>


          </ul>
        </li>

        {{-- @else
        @endif

        @if($reports == true) --}}

        <li class="treeview {{ ($prefix == '/reports')?'active':'' }}  ">
          <a href="#">
            <i class="glyphicon glyphicon-file"></i>
            <span>All MR </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'all-reports')? 'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>Memorandum of Receipts</a></li>


          </ul>
        </li>
{{--
        @else
        @endif

        @if($alluser == true) --}}

        <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
          <a href="#">
            <i class="mdi mdi-account-multiple"></i>
            <span>All Users </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i class="ti-more"></i>All Users</a></li>


          </ul>
        </li>

        {{-- @else
        @endif


        @if($adminuserrole == true) --}}

        <li class="treeview {{ ($prefix == '/adminuserrole')?'active':'' }}  ">
          <a href="#">
            <i class="glyphicon glyphicon-briefcase"></i>
            <span>Admin Role </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'all.admin.user')? 'active':'' }}"><a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>All Admin User </a></li>


          </ul>
        </li>
{{--
        @else
        @endif --}}



      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
