@php
$id = Auth::user()->id;
$verdorId = App\Models\User::find($id);
$status = $verdorId->status;
@endphp



<header class="bg-darker shadow-sm">
    <div class="navbar navbar-expand-lg navbar-dark">
      <div class="container"><a class="navbar-brand d-none d-sm-block flex-shrink-0 me-4 order-lg-1" href="{{ route('vendor.dashboard') }}"><img src="{{ asset('frontendv2/assets/img/psu.png') }}" width="100" alt="PCBUILD"></a><a class="navbar-brand d-sm-none me-2 order-lg-1" href="{{ route('vendor.dashboard') }}"><img src="{{ asset('frontendv2/assets/img/logo5.svg') }}" width="70" alt="PCBUILD"></a>



            <div class="navbar-toolbar d-flex align-items-center order-lg-3">
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a class="navbar-tool d-none d-lg-flex" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#searchBox" role="button" aria-expanded="false" aria-controls="searchBox"><span class="navbar-tool-tooltip">Search</span> --}}
                  {{-- <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-search"></i></div></a><a class="navbar-tool d-none d-lg-flex" href="dashboard-favorites.html"><span class="navbar-tool-tooltip">Favorites</span>
                  <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-heart"></i></div></a> --}}
                <div class="navbar-tool dropdown ms-2"><a class="navbar-tool-icon-box border dropdown-toggle"
                  href="{{ route('login') }}"><img class="rounded-circle"
                  src="{{ (!empty($vendorData->profile_photo_path)) ? url('upload/vendor_images/'.$vendorData->profile_photo_path):url('upload/no_image.jpg') }}"
                      alt="User Profile"><a class="navbar-tool-text ms-n1" href="dashboard-sales.html"><small>PSU Staff</small>{{ Auth::user()->name }}</a>

                  <div class="dropdown-menu dropdown-menu-end">
                    <div style="min-width: 14rem;">
                        @if ($status == 'inactive')


                        {{-- <div style="visibility:collapse"> --}}
                      {{-- <h6 class="dropdown-header">Account</h6><a class="dropdown-item d-flex align-items-center" href="dashboard-settings.html"><i class="ci-settings opacity-60 me-2"></i>Settings</a><a class="dropdown-item d-flex align-items-center" href="dashboard-purchases.html"><i class="ci-basket opacity-60 me-2"></i>Purchases</a><a class="dropdown-item d-flex align-items-center" href="dashboard-favorites.html"><i class="ci-heart opacity-60 me-2"></i>Favorites<span class="fs-xs text-muted ms-auto">4</span></a>
                      <div class="dropdown-divider"></div>
                      <h6 class="dropdown-header">Seller Dashboard</h6><a class="dropdown-item d-flex align-items-center" href="dashboard-sales.html"><i class="ci-dollar opacity-60 me-2"></i>Sales<span class="fs-xs text-muted ms-auto">$1,375.00</span></a><a class="dropdown-item d-flex align-items-center" href="dashboard-products.html"><i class="ci-package opacity-60 me-2"></i>Products<span class="fs-xs text-muted ms-auto">5</span></a><a class="dropdown-item d-flex align-items-center" href="dashboard-add-new-product.html"><i class="ci-cloud-upload opacity-60 me-2"></i>Add New Product</a><a class="dropdown-item d-flex align-items-center" href="dashboard-payouts.html"><i class="ci-currency-exchange opacity-60 me-2"></i>Payouts</a> --}}
                    </div>

                      <a class="dropdown-item d-flex align-items-center" href="{{ route('vendor.logout') }}"><i class="ci-sign-out opacity-60 me-2"></i>Sign Out</a>

                    {{-- </div> --}}
                  </div>
                </div>
                {{-- <div class="navbar-tool ms-4"><a class="navbar-tool-icon-box bg-secondary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight2"><span class="navbar-tool-label">3</span><i class="navbar-tool-icon ci-bell text-light"></i></a></div> --}}
              </div>
              <div class="collapse navbar-collapse me-auto order-lg-2" id="navbarCollapse">
                <!-- Search-->
                <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                  <input class="form-control rounded-start" type="text" placeholder="Search marketplace">
                </div>

              </div>
            </div>
          </div>
          <!-- Search collapse-->
          <div class="search-box collapse" id="searchBox">
            <div class="card pt-2 pb-4 border-0 rounded-0">
              <div class="container">
                <div class="input-group"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                  <input class="form-control rounded-start" type="text" placeholder="Search marketplace">
                </div>
              </div>
            </div>
          </div>







                @else
                <h6 class="dropdown-header">Account</h6><a class="dropdown-item d-flex align-items-center" href="{{ url('/vendor/profile') }}"><i class="ci-settings opacity-60 me-2"></i>Profile Settings</a>
                
                {{-- <a class="dropdown-item d-flex align-items-center" href="dashboard-purchases.html"><i class="ci-basket opacity-60 me-2"></i>Purchases</a> --}}
                
                
                <a class="dropdown-item d-flex align-items-center" href="{{ url('vendor/change/password') }}"><i class="ci-security-check opacity-60 me-2"></i>Change Password<span class="fs-xs text-muted ms-auto"></span></a>


                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Staff Dashboard</h6>
                
                <a class="dropdown-item d-flex align-items-center" href="{{ url('/vendor/all/product') }}"><i class="ci-bag opacity-60 me-2"></i>Items<span class="fs-xs text-muted ms-auto"></span></a>
                
                
                <a class="dropdown-item d-flex align-items-center" href="{{ url('vendor/all/product') }}"><i class="ci-package opacity-60 me-2"></i>Add New Item</a>
                
                
                <a class="dropdown-item d-flex align-items-center" href="{{ url('/vendor/return/order') }}"><i class="ci-arrows-horizontal opacity-60 me-2"></i>Returning Requests</a>
                

                <a class="dropdown-item d-flex align-items-center" href="{{ url('vendor/order') }}"><i class="ci-currency-exchange opacity-60 me-2"></i>Requestor's Request</a>


                <div class="dropdown-divider"></div><a class="dropdown-item d-flex align-items-center" href="{{ route('vendor.logout') }}"><i class="ci-sign-out opacity-60 me-2"></i>Sign Out</a>

              </div>
            </div>
          </div>
          <div class="navbar-tool ms-4">


            {{-- <a type="button" class="navbar-tool-icon-box bg-secondary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight2" href="marketplace-cart.html"><span class="navbar-tool-label">3</span><i class="navbar-tool-icon ci-bell"></i></a> --}}



        </div>
        </div>
        <div class="collapse navbar-collapse me-auto order-lg-2" id="navbarCollapse">
          <!-- Search-->
          <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
            <input class="form-control rounded-start" type="text" placeholder="Search marketplace">
          </div>

        </div>
      </div>
    </div>
    <!-- Search collapse-->
    <div class="search-box collapse" id="searchBox">
      <div class="card pt-2 pb-4 border-0 rounded-0">
        <div class="container">
          <div class="input-group"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
            <input class="form-control rounded-start" type="text" placeholder="Search marketplace">
          </div>
        </div>
      </div>
    </div>
    @endif

  </header>


  @php
  $vendorData = DB::table('users')->where('id', $user->id)->first();
@endphp

  <!-- Dashboard header-->
  <div class="page-title-overlap bg-dark pt-4">
    <div class="container d-flex flex-wrap flex-sm-nowrap justify-content-center justify-content-sm-between align-items-center pt-2">
      <div class="d-flex align-items-center pb-3">
        <div class="img-thumbnail rounded-circle position-relative flex-shrink-0" style="width: 6.375rem;"><img class="rounded-circle" src="{{ (!empty($vendorData->profile_photo_path)) ? url('upload/vendor_images/'.$vendorData->profile_photo_path):url('upload/no_image.jpg') }}" alt="Createx Studio"></div>
        <div class="ps-3">
            {{-- member since --}}


          <h3 class="text-light fs-lg mb-0">{{ $vendorData->name }}</h3><span class="d-block text-light fs-ms opacity-60 py-1">Member since {{ Auth::user()->vendor_join }}</span>
        </div>
      </div>
      <div class="d-flex">
        <div class="text-sm-end me-5">



        </div>


        {{-- Total ratings --}}


    {{-- end rating --}}

        </div>
      </div>
    </div>
  </div>
