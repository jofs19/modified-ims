@php
$id = Auth::user()->id;
$verdorId = App\Models\User::find($id);
$status = $verdorId->status;
@endphp

@if($status === 'active')


   <!-- Sidebar-->
            <aside class="col-lg-4 pe-xl-5">
                <!-- Account menu toggler (hidden on screens larger 992px)-->
                <div class="d-block d-lg-none p-4"><a class="btn btn-outline-accent d-block" href="#account-menu" data-bs-toggle="collapse"><i class="ci-menu me-2"></i>Account menu</a></div>
                <!-- Actual menu-->
                <div class="h-100 border-end mb-2">
                  <div class="d-lg-block collapse" id="account-menu">

                    <div class="bg-secondary p-4">
                      <h3 class="fs-sm mb-0 text-muted">Seller Dashboard</h3>
                    </div>

                    @php
                        $productCount = App\Models\Product::where('vendor_id', $id)->count();
                    @endphp

                    <ul class="list-unstyled mb-0">
                      <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 {{ (request()->is('vendor/dashboard')) ? 'active' : '' }}" href="{{ route('vendor.dashboard') }}"><i class="ci-home opacity-60 me-2"></i>Dashboard</a></li>
                      <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 {{ (request()->is('vendor/all/product')) ? 'active' : '' }}" href="{{ route('vendor.all.product') }}"><i class="ci-package opacity-60 me-2"></i>Items<span class="fs-sm text-muted ms-auto">{{ $productCount }}</span></a></li>
                      <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 {{ (request()->is('vendor/add/product')) ? 'active' : '' }}" href="{{ route('vendor.add.product') }}"><i class="ci-cloud-upload opacity-60 me-2"></i>Add New Items</a></li>
                      <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 {{ (request()->is('vendor/order')) ? 'active' : '' }}" href="{{ route('vendor.order') }}"><i class="ci-currency-exchange opacity-60 me-2"></i>Requestor Requests</a></li>
                      <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 {{ (request()->is('vendor/return/order')) ? 'active' : '' }}" href="{{ route('vendor.return.order') }}"><i class="ci-arrows-horizontal opacity-60 me-2"></i>Returning Requests</a></li>
                      <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 {{ (request()->is('vendor/complete/return/order')) ? 'active' : '' }}" href="{{ route('vendor.complete.return.order') }}"><i class="ci-reply opacity-60 me-2"></i>Returned Requests</a></li>
                      {{-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 {{ (request()->is('vendor/all/review')) ? 'active' : '' }}" href="{{ route('vendor.all.review') }}"><i class="ci-thumb-up opacity-60 me-2"></i>Customer Reviews</a></li> --}}

                    </ul>
                    <div class="bg-secondary p-4">
                        <h3 class="fs-sm mb-0 text-muted">Account</h3>
                      </div>
                      <ul class="list-unstyled mb-0">
                        <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 {{ (request()->is('vendor/profile')) ? 'active' : '' }}" href="{{ route('vendor.profile') }}"><i class="ci-settings opacity-60 me-2"></i>Profile Settings</a></li>
                        <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 {{ (request()->is('vendor/change/password')) ? 'active' : '' }}" href="{{ route('vendor.change.password') }}"><i class="ci-security-check opacity-60 me-2"></i>Change Password</a></li>
                        {{-- <li class="border-bottom"><a class="nav-link-style d-flex align-items-center px-4 py-3 {{ (request()->is('vendor/all/review')) ? 'active' : '' }}" href="{{ route('inactive.vendor') }}"><i class="ci-heart opacity-60 me-2"></i>View Inactive Vendors<span class="fs-sm text-muted ms-auto"></span></a></li>
                        <li class="border-bottom"><a class="nav-link-style d-flex align-items-center px-4 py-3 {{ (request()->is('vendor/all/review')) ? 'active' : '' }}" href="{{ route('active.vendor') }}"><i class="ci-heart opacity-60 me-2"></i>View Active Vendors<span class="fs-sm text-muted ms-auto"></span></a></li> --}}
                        <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 {{ (request()->is('vendor/all/review')) ? 'active' : '' }}" href="{{ route('vendor.logout') }}"><i class="ci-sign-out opacity-60 me-2"></i>Sign out</a></li>
                      </ul>
                    <hr>
                  </div>
                </div>
              </aside>


        @else




        @endif



