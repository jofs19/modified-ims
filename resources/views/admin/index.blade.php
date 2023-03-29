@extends('admin.admin_master')
@section('admin')

@php
	$date = date('d-m-y');
	$today = App\Models\Order::where('order_date',$date)->sum('amount');
	$month = date('F');
	$month = App\Models\Order::where('order_month',$month)->sum('amount');
    $year = date('Y');
	$year = App\Models\Order::where('order_year',$year)->sum('amount');
    $pending = App\Models\Order::where('status','pending')->get();
    $best_seller_product = App\Models\OrderItem::with('product')->select('product_id',DB::raw('count(product_id) as total'))->groupBy('product_id')->orderBy('total','DESC')->first();


    // Convert product_qty to integer

    $out_of_stock = App\Models\Product::where('stock','<','1')->get();
    $soon_to_be_out_of_stock = App\Models\Product::where('stock','<=','10')->get();
    $soon_to_be_out_of_stock_count = App\Models\Product::where('stock','<=','10')->count();
    $total_user = App\Models\User::count();
@endphp

<div class="container-full">


    {{-- BEST SELLER --}}
    {{-- <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header
                    with-border">
                        <h3 class="box-title">Best Seller Product</h3>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box box-widget widget-user-2">
                                <div class="widget-user-header bg-info">
                                    <div class="widget-user-image">
                                        <img class="rounded-circle" src="{{ asset($best_seller_product->product->product_thumbnail) }}" alt="User Avatar">
                                    </div>
                                    <h3 class="widget-user-username">{{ $best_seller_product->product->product_name_en }}</h3>
                                    <h5 class="widget-user-desc">Total Sell: {{ $best_seller_product->total }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}





    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-4 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-success-light rounded w-60 h-60">
                            <i class="text-success mr-0 font-size-24 glyphicon glyphicon-user"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Total Users </p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $total_user }} <small class="text-success"><i class="fa fa-user"></i> Number of Users</small></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 glyphicon glyphicon-exclamation-sign"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Pending Requests </p>
                            <h3 class="text-white mb-0 font-weight-500">{{ count($pending) }} <small class="text-success"><i class="fa fa-caret-up"></i> Requests </small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-6">
                <a type="btn" data-toggle="modal" data-target=".bs-example-modal-lg">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 glyphicon glyphicon-warning-sign"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Nearly Out of Stock Items </p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $soon_to_be_out_of_stock_count }} products   <small class="text-primary"><i class="fa fa-caret-up"></i> Check Now </small></h3>
                        </div>
                    </div>
                </div>
            </a>
            </div>

            <div class="col-12">
                {{-- <div class="box">
                    <div class="box-header">
                        <h4 class="box-title align-items-start flex-column">
                           All Recent Orders
                           @php
                           $orders = App\Models\Order::where('status','pending')->orderBy('id','DESC')->get();
                               @endphp
                        </h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table no-border text-center table-striped">
                                <thead>
                                    <tr class="text-uppercase bg-lightest">
                                        <th style="min-width: 250px"><span class="text-white">Date</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Invoice</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Amount</span></th>
                                        <th style="min-width: 150px"><span class="text-fade">Payment</span></th>
                                        <th style="min-width: 130px"><span class="text-fade">Status</span></th>
                                        <th style="min-width: 120px"><span class="text-fade">View</span> </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($orders as $item)
                                    <tr>
                                        <td class="pl-0 py-8">
                                             <span class="text-white font-weight-600 d-block font-size-16">
                                                {{-- {{ Carbon\Carbon::parse($item->order_date)->diffForHumans()  }} --}}
                                                {{-- {{ $item->order_date }}
                                            </span>
                                        </td>

                                        <td>

                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                {{ $item->invoice_no }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                $ {{ $item->amount }}
                                            </span>

                                        </td>

                                        <td>

                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                {{ $item->payment_method }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary-light badge-lg">{{ $item->status }}</span>
                                        </td>

                                        <td>
                                            <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info" title="View Data"><i class="fa fa-eye"></i> </a>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   --}}

                <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Pending Orders</h3>
                      @php
                      $orders = App\Models\Order::where('status','pending')->orderBy('id','DESC')->get();

                         @endphp
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                          <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100 text-center">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Request #</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                <tr>
                                    <td class="pl-0 py-8">
                                         <span class="text-white font-weight-600 d-block font-size-16">
                                            {{-- {{ Carbon\Carbon::parse($item->order_date)->diffForHumans()  }} --}}
                                             {{ $item->order_date }}
                                        </span>
                                    </td>

                                    <td>

                                        <span class="text-white font-weight-600 d-block font-size-16">
                                            {{ $item->invoice_no }}
                                        </span>
                                    </td>


                                    <td>
                                        <span class="badge badge-primary-light badge-lg">{{ $item->status }}</span>
                                    </td>

                                    <td>
                                        <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info" title="View Order"><i class="fa fa-eye"></i> </a>
                                        <a href="{{ route('pending-confirm',$item->id) }}" class="btn btn-success fa fa-check" id="confirm" title="Confirm Order"></a>

                                    </td>
                                </tr>
                                @endforeach


                            </tbody>

                        </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>


  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-2 mb-2">
                {{-- Put badge --}}
                <h4 class="modal-title py-2 my-2 font-bold" id="myLargeModalLabel">Nearly Out of Stock Products! </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100 text-center font-bold">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($soon_to_be_out_of_stock as $item)
                        <tr>
                            <td>{{ $item->product_name_en }}</td>
                            <td>{{ $item->product_qty }}</td>

                            <td><img src="{{ asset($item->product_thumbnail) }}" alt="" style="height: 50px; width: 50px;"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-rounded text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


  @endsection
