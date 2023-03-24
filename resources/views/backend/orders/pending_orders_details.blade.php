@extends('admin.admin_master')
@section('admin')


<head>
  <style>
    small {
    overflow-x: auto; /* Use horizontal scroller if needed */
    white-space: pre-wrap; /* css-3 */
    white-space: -moz-pre-wrap !important; /* Mozilla, since 1999 */
    word-wrap: break-word; /* Internet Explorer 5.5+ */
    white-space : normal;
    letter-spacing: 0.3px;
}

  </style>
</head>

  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Order Details</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Order Details</li>

							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>




    {{-- <div class="box">
      <div class="box-header">
        <h4 class="box-title">Simple Toastr Alerts</h4>
         <p class="subtitle mb-0">You can use four different alert <code>info, warning, success, and error</code> message.</p>
      </div>
      <div class="box-body pad res-tb-block">
        <div class="button-box">
          <button class="tst1 btn btn-info btn-block mb-15">Info Message</button>
          <button class="tst2 btn btn-warning btn-block mb-15">Warning Message</button>
          <button class="tst3 btn btn-success btn-block mb-15">Success Message</button>
          <button class="tst4 btn btn-danger btn-block mb-15">Danger Message</button>
        </div>              
      </div>
      <!-- /.box-body --> --}}
 


    <section class="invoice printableArea box-round ">
			
      <!-- title row -->
      <div class="row">
      <div class="col-12">
        <div class="bb-1 clearFix">
        <div class="text-left pb-15">
          <button id="print2" class="btn btn-warning ml-2" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>

          @if ($order->receipt == '')
            
          @else
          <a href="{{ asset($order->receipt) }}" data-toggle="lightbox" data-title="Purchase Receipt" class="btn btn-secondary ml-2" class="all studio isotope-item" >View Purchase Receipt</a>
          @endif


        </div>	
        </div>
      </div>
      <div class="col-12">
        <div class="page-header">
        <h2 class="d-inline"><span class="font-size-30">Order Details</span></h2>
        <div class="pull-right text-right">
          <h3>{{ $order->order_date }}</h3>
        </div>	
        </div>
      </div>
      <!-- /.col -->
      </div>
      <!-- info row -->
      <p>Customer needs a change from: {{ $order->change_amount }}</p>
      {{-- @if ($order->shipping_charge < 1000)
      <p>Shipping Fees: {{ $order->shipping_charge }}</p>

      @else
      <p>Shipping Fee: Free Shipping</p>

      @endif --}}


      <div class="row invoice-info">
      <div class="col-md-6 invoice-col">
        {{-- <img src="{{ asset('upload/user_images/'.$order->user->profile_photo_path) }}" alt="" style="width: 120px;height:120px; position:relative" > --}}

       


        <strong> <u> Recipient Details</u></strong>	
        <address>
        <strong class="text-blue font-size-24">{{ $order->name }}</strong><br>
        <strong>Phone:</strong>   {{ $order->user->phone }} <br> <strong> Email:</strong>  {{ $order->email }} 
 
        </address>
      </div>
      <!-- /.col -->
      <div class="col-md-6 invoice-col text-right">
        <strong> <u> Billing Address</u></strong>


        <address>
        <p class="d-inline"> {{ $order->address }}</p><br>
        @if($order->address2 == NULL)
        @else
        
        <p class="d-inline"> {{ $order->address2 }}</p><br>
        @endif
        <strong>{{ $order->district->district_name }}, {{ $order->division->division_name }} {{ $order->state->state_name }}</strong>         <strong>({{ $order->post_code }})</strong> 

        </address> 
        <br>
      </div>
      
      <!-- /.col -->
      <div class="col-sm-12 invoice-col mb-15">
        <div class="invoice-details row no-margin text-center">
          @if ($order->payment_method == 'Cash On Delivery')
          <div class="col-md-6 col-lg-4"><b>Invoice </b>#: {{ $order->invoice_no }}</div>
          <div class="col-md-6 col-lg-4"><b>Payment Type:</b> {{ $order->payment_method }}</div>
          <div class="col-md-6 col-lg-4"><b>Order Status:</b> 
            @if($order->status == 'confirm' || $order->status == 'reject')
              {{ $order->status }}ed
            @else
              {{ $order->status }}
            
            @endif  
          </div>

          @else
          <div class="col-md-6 col-lg-3"><b>Invoice </b>#: {{ $order->invoice_no }}</div>
          <div class="col-md-6 col-lg-3"><b>Transaction ID:</b> {{ $order->transaction_id }}</div>
          <div class="col-md-6 col-lg-3"><b>Payment Type:</b> {{ $order->payment_method }}</div>
          <div class="col-md-6 col-lg-3"><b>Order Status:</b> 
            @if($order->status == 'confirm')
              confirmed
            @else
              {{ $order->status }}
            
            @endif
            </div>

          @endif
        </div>
      </div>
      <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-bordered text-center">
        <tbody>
        <tr class="text-center">
          <th>#</th>
          <th>Product Image</th>
          <th>Product Code #</th>
          <th class="text-center">Product Name</th>
          <th class="text-center">Variant</th>
          <th class="text-center">Size</th>
          <th class="text-center">Quantity</th>
          <th class="text-center">Price</th>
          <th class="text-center">Total Price</th>

        </tr>

     

        @foreach($orderItem as $item)
        <tr>
                <td>

                  @foreach ($orderItem as $x)

                  @if ($x->product_id == $item->product_id)
                  {{ $loop->iteration }}
                  @endif
                    
                  @endforeach

                </td>

                <td >
                   <label for="">
                    
                    
                    <div id="gallery">

                      <a href="{{ asset($item->product->product_thumbnail) }}" data-toggle="lightbox" data-gallery="multiimages" data-title="{{ $item->product->product_name_en }}"><img src="{{ asset($item->product->product_thumbnail) }}" class="all studio isotope-item" alt="gallery" style=" width:50px;height:50px"> </a>
                    
                    </div>
                    
                    
                    {{-- <img src="{{ asset($item->product->product_thumbnail) }}" height="50px;" width="50px;">  --}}
                  
                  
                  
                  
                  </label>
                 </td>
 
 
                 <td >
                  <label for=""> {{ $item->product->product_code }}</label>
                </td>


                <td >
                   <label for=""> {{ $item->product->product_name_en }}</label>
                 </td>
 

 
                <td >
                   <label for=""> {{ $item->color }}</label>
                 </td>
 
                <td >
                   <label for=""> {{ $item->size }}</label>
                 </td>
 
                 <td >
                   <label for=""> {{ $item->qty }}</label>
                 </td>
 
                  <td >
                   <label for=""> ₱{{ $item->price }} </label>
                 </td>

                 <td>
                  <label for="">₱ {{ $item->price * $item->qty}} </label>
                 </td>
 
               </tr>
               @endforeach



        </tbody>

      
        </table>
      </div>
      <!-- /.col -->
      </div>
      <!-- /.row -->

      <br><br>

      <div class="row">
        <div class="col-12 text-right">
          {{-- <p class="lead"><b>Coupon</b><span class="text-danger"> *coupon name*  --}}
          
            @php
              $total=0;

              foreach ($orderItem as $item) {
                $total += $item->price * $item->qty;
                
              }

              
              $total_formatted = number_format($total, 2);
              $all_total = floatval($total);

            @endphp

                  
          
          </span></p>


                       {{-- @php
	
	$convert = number_format($total = (int)str_replace(',','',Cart::total()) + $order->shipping_charge, 2)

@endphp

{{ $convert }} --}}
          <div>
            <h5>Total amount  : ₱ {{ $total_formatted}}</h5>

            @php
              $discount_amount = floatval($order->amount);
            @endphp
            {{-- {{  $all_total - $discount_amount }} --}}

            @php
              $discount_format = number_format($all_total - $discount_amount, 2);
              $discount = floatval($all_total - $discount_amount);
            @endphp

            <p>Coupon Discount : ₱ {{ $discount_format }}</p>

            {{-- <p>Sub-Total : ₱ {{ $total - $discount }}</p> --}}

            @php
              $subtotal_format = number_format($total - $discount, 2);
            @endphp

        <h3>Sub-Total : ₱ {{ $subtotal_format }}</h3>


        @php
        $shipping_charge = floatval($order->shipping_charge);
        $shipping_charge_format = number_format($shipping_charge, 2);
       @endphp

        @if($order->shipping_charge == null)
        <p>Shipping Charge : Free Shipping</p>
        @else
        <p>Shipping Charge : ₱ {{ $shipping_charge_format }}</p>

        @endif




        @if($order->shipping_charge == null)

        @php

        $grandTotal = floatval($total - $discount);
        $grandTotal_format = number_format($grandTotal, 2);

     @endphp

        @else

        @php

            $grandTotal = floatval($total - $discount + $shipping_charge);
            $grandTotal_format = number_format($grandTotal, 2);

        @endphp
        <hr>



        @endif

        <h2><strong>Grand-Total :</strong> <span class="text-success"> ₱ {{ $grandTotal_format }} </span></h3>

            

          
            {{-- @php
            $discount = 0;
            $amount = number_format($order->amount, 2);
            $discount = $amount;
            $shipping = number_format($order->shipping_charge, 2);
            $totalDiscount = $total - $order->amount;
            $totalDiscount = number_format($totalDiscount, 2);
            $grandTotal = number_format($amount + $order->shipping_charge, 2)
            @endphp --}}

            {{-- @php
	
	$convert = number_format($total = (float)str_replace(',','',Cart::total()) + $data['shipping_charge'], 2)

@endphp
<strong>Grand Total : </strong> ${{ $convert}} <hr> --}}

            {{-- <p>Coupon discount amount  : -₱ {{ $totalDiscount }} </p>
            @if ($order->shipping_charge == 0)
            <p>Shipping Fee  : Free Shipping </p>

            @else
            <p>Shipping Fee  : +₱ {{ $shipping }} </p>

            @endif

            {{-- <p>Coupon Discount  :  $646.56</p>
            <p>Shipping  :  $110.44</p> --}}
          </div>
          <div class="total-payment">

            

            {{-- <h3><b>Grand Total :</b> ₱ {{ $grandTotal}}</h3>  --}}
<br><br>
            
            

            
          </div>
  
        </div>
        <!-- /.col -->
 
      </div>
      <!-- /.row -->

          {{-- <div class="box ">
						<div class="box-body ribbon-box">
							<div class="ribbon ribbon-dark">Notes</div>
							<small class="text-light mb-0">{{ $order->notes }}</small>
						</div> <!-- end box-body-->
					</div> --}}
{{-- 
          <p class="lead"><b>Note</b></p>

        <p><small class="text-light mb-0 text-sm">{{ $order->notes }}</small></p> --}}
        




      

      <!-- this row will not appear when printing -->
      <div class="row no-print">
      <div class="col-12">
        @if($order->status == 'pending')
        <a href="{{ route('reject-orders', $order->id) }}" class="btn btn-danger pull-right" id="reject">Reject Order</a>

        <a href="{{ route('pending-confirm',$order->id) }}" class="btn  btn-success pull-right mx-5" id="confirm">Confirm Order</a>    

        @elseif($order->status == 'confirm')
        <a href="{{ route('confirm.processing',$order->id) }}" class="btn btn-success pull-right" id="processing">Process Order</a>

        @elseif($order->status == 'processing')
        <a href="{{ route('processing.picked',$order->id) }}" class="btn  btn-success pull-right" id="picked">Pick Order</a>

        @elseif($order->status == 'picked')
        <a href="{{ route('picked.shipped',$order->id) }}" class="btn  btn-success pull-right" id="shipped">Ship Order</a>

        @elseif($order->status == 'shipped')
       <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-success pull-right" id="delivered">Successfuly Delivered</a>

        @endif
      </div>
      </div>
      
  </section>


@if($order->notes != null)

  <section class="content">
  <div class="row">


    <div class="col-6">
    <div class="box box-hover-shadow no-shadow">
      <div class="box-header with-border">
      <h4 class="box-title"><strong>Note</strong> </h4>
      </div>
      <div class="box-body">
      <p><small class="text-light mb-0 text-sm">{{ $order->notes }}</small></p> 
    </div>
    </div>
    </div>

  </div>
  
  </section>

  @else

  @endif
  

{{-- <div id="gallery">

  <a href="{{ asset($order->receipt) }}" data-toggle="lightbox" data-gallery="multiimages" data-title="Image title will be apear here"><img src="{{ asset($order->receipt) }}" class="all studio isotope-item" alt="gallery" style="position: absolute; left: 0px; top: 0px; transform: translate3d(310px, 219px, 0px); width:50px;height:50px"> </a>

</div> --}}




	  </div>


<iframe style="border:0;position:absolute;width:0px;height:0px;right:0px;top:0px;" id="printArea_1" src="#1661419316615"></iframe>
<script src="{{ asset('../assets/vendor_plugins/JqueryPrintArea/demo/jquery.PrintArea.js') }}"></script>
<script src="{{ asset('backend/js/pages/invoice.js') }}"></script>


@endsection