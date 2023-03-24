@extends('frontendv2.main_master')
@section('content')

{{-- <head>
    <style>
        .btn-primary {
            background-color: #CCAC00;
            border-color: #CCAC00;

        }

        .btn-primary:hover {
            background-color: #000000;
            border-color: #000000;

        }

    </style>
</head> --}}

<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Account Dashboard</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">My Dashboard</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <!-- ANCHOR Sidebar-->

        @include('frontendv2.common.user_sidebar')

        <!-- ANCHOR End Sidebar-->




        <!-- ANCHOR ORDER VIEW Content (transfer it later) -->
        {{-- <section class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                <div class="d-flex align-items-center">

                </div><a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="{{ route('user.logout') }}"><i
                        class="ci-sign-out me-2"></i>Sign out</a>
            </div>

            @php
                $total_spent = App\Models\Order::where('user_id', Auth::user()->id)->where('status', 'delivered')->sum('amount');
                $total_orders = App\Models\Order::where('user_id', Auth::user()->id)->where('status', 'delivered')->count();
                $total_wishlist = App\Models\Wishlist::where('user_id', Auth::user()->id)->count();
                $total_reviews = App\Models\Review::where('user_id', Auth::user()->id)->count();

                $total_return = App\Models\Order::where('user_id', Auth::user()->id)->where('status', 'return')->count();

                $created_at = App\Models\User::where('id', Auth::user()->id)->first()->created_at->format('d M Y');
                $account_created = App\Models\User::where('id', Auth::user()->id)->first()->created_at->format('d M Y');
                $current_date = Carbon\Carbon::now()->format('d M Y');
                $updated_at = App\Models\User::where('id', Auth::user()->id)->first()->updated_at->format('d M Y');

              $greatest_wishlist = App\Models\Wishlist::select('product_id', DB::raw('count(*) as total'))->groupBy('product_id')->orderBy('total', 'DESC')->first();
              $greatest_wishlist_name = App\Models\Product::where('id', $greatest_wishlist->product_id)->first()->product_name_en;
              $greatest_wishlist_count = $greatest_wishlist->total;

              $greatest_reviewedProduct = App\Models\Review::select('product_id', DB::raw('count(*) as total'))->groupBy('product_id')->orderBy('total', 'DESC')->first();
              $greatest_reviewedProduct_name = App\Models\Product::where('id', $greatest_reviewedProduct->product_id)->first()->product_name_en;
              $greatest_reviewedProduct_count = $greatest_reviewedProduct->total;

              $best_seller_product = App\Models\OrderItem::with('product')->select('product_id',DB::raw('count(product_id) as total'))->groupBy('product_id')->orderBy('total','DESC')->first();
              $best_seller_product_name = $best_seller_product->product->product_name_en;
              $best_seller_product_count = $best_seller_product->total;


            @endphp






                     <div class="row mx-n2 pt-2">
                        <div class="col-md-4 col-sm-6 px-2 mb-4">
                          <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                            <h3 class="fs-sm text text-accent">Most Wishlisted Product</h3>

                            <a href="{{ url('product/details/'.$greatest_wishlist->product->id.'/'.$greatest_wishlist->product->product_slug_en ) }}">
                            <figure class="figure">
                              <img src="{{ asset($greatest_wishlist->product->product_thumbnail) }}" class="figure-img" alt="product">
                              <figcaption class="figure-caption text-center">{{ $greatest_wishlist_name }}</figcaption>
                            </figure>
                            </a>


                            <p class="fs-ms text-muted"> Wishlisted by {{ $greatest_wishlist_count }} users </p>


                          </div>
                        </div>

                        <div class="col-md-4 col-sm-6 px-2 mb-4">
                          <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                            <h3 class="fs-sm text text-danger">Most Reviewed Product</h3>


                            <a href="{{ url('product/details/'.$greatest_reviewedProduct->product->id.'/'.$greatest_reviewedProduct->product->product_slug_en ) }}">

                            <figure class="figure">
                              <img src="{{ asset($greatest_reviewedProduct->product->product_thumbnail) }}" class="figure-img" alt="product">
                              <figcaption class="figure-caption text-center">{{ $greatest_reviewedProduct_name }}</figcaption>
                            </figure>

                            </a>

                            <p class="fs-ms text-muted"> Reviewed by {{ $greatest_reviewedProduct_count }} users </p>
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-6 px-2 mb-4">
                          <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                            <h3 class="fs-sm text text-warning">Best Seller Product</h3>


                            <a href="{{ url('product/details/'.$best_seller_product->product->id.'/'.$best_seller_product->product->product_slug_en ) }}">

                            <figure class="figure">
                              <img src="{{ asset($best_seller_product->product->product_thumbnail) }}" class="figure-img" alt="product">
                              <figcaption class="figure-caption text-center">{{ $best_seller_product_name }}</figcaption>
                            </figure>

                            </a>

                            <p class="fs-ms text-muted"> Bought by {{ $best_seller_product_count }} users </p>
                          </div>
                        </div>


                     </div>














            <h2 class="h3 py-2 text-center text-sm-start">Your total spent / orders</h2>

            <div class="row mx-n2 pt-2">
                <div class="col-md-4 col-sm-6 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                    <h3 class="fs-sm text-muted">Total spent</h3>
                    <p class="h2 mb-2">₱{{ $total_spent-$total_return }}.<small>00</small> </p>


                    <p class="fs-ms text-muted mb-0">
                        @if ($account_created == $current_date)

                        {{ $account_created }}

                        @else

                        {{ $account_created }} - {{ $current_date }}

                        @endif



                    </p>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                    <h3 class="fs-sm text-muted">Delivered Orders</h3>
                    <p class="h2 mb-2">{{ $total_orders }}</p>
                    <a class="fs-ms text-muted mb-0" href="{{ route('shop.page') }}"><u>Shop now</u></a>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                    <h3 class="fs-sm text-muted">Returned Orders</h3>
                    <p class="h2 mb-2">{{ $total_return }}</p>
                    <a class="fs-ms text-muted mb-0" href="{{ route('return.order.list') }}"><u>View Returned Orders</u></a>
                  </div>
                </div>
              </div>


            </div>



        </section>
 --}}



    </div>

</div>



@endsection
