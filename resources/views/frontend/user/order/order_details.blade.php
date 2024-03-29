@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')


             <div class="col-md-5">
                <div class="card">
                  <div class="card-header"><h4>Shipping Details</h4></div>
                 <hr>
                 <div class="card-body" style="background: #E9EBEC;">
                   <table class="table">
                    <tr>
                      <th> Recipient Name : </th>
                       <th> {{ $order->name }} </th>
                    </tr>
        
                     <tr>
                      <th> Recipient Phone : </th>
                       <th> {{ $order->phone }} </th>
                    </tr>
        
                     <tr>
                      <th> Recipient Email : </th>
                       <th> {{ $order->email }} </th>
                    </tr>
        
                     <tr>
                      <th> Division : </th>
                       <th> {{ $order->division->division_name }} </th>
                    </tr>
        
                     <tr>
                      <th> District : </th>
                       <th> {{ $order->district->district_name }} </th>
                    </tr>
        
                     <tr>
                      <th> State : </th>
                       <th>{{ $order->state->state_name }} </th>
                    </tr>
        
                    <tr>
                      <th> Post Code : </th>
                       <th> {{ $order->post_code }} </th>
                    </tr>
        
                    <tr>
                      <th> Order Date : </th>
                       <th> {{ $order->order_date }} </th>
                    </tr>
        
                   </table>
        
        
                 </div> 
        
                </div>
        
              </div> <!-- // end col md -5 -->

              <div class="col-md-5">
                <div class="card">
                  <div class="card-header"><h4>Order Details
        <span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
                  </div>
                 <hr>
                 <div class="card-body" style="background: #E9EBEC;">
                   <table class="table">
                    
 
                     <tr>
                      <th> Payment Type : </th>
                       <th> {{ $order->payment_method }} </th>
                    </tr>
        

                    @if ($order->payment_method == 'Cash On Delivery')
                  
                    {{--                     
                    <tr>
                        <th> Tranx ID : </th>
                         <th> {{ $order->transaction_id }} </th>
                      </tr> --}}
                        
                    @else

                    
                    <tr>
                        <th> Tranx ID : </th>
                         <th> {{ $order->transaction_id }} </th>
                      </tr>
                        
                    @endif

        
                     <tr>
                      <th> Invoice  : </th>
                       <th class="text-danger"> {{ $order->invoice_no }} </th>
                    </tr>
        
                     <tr>
                      <th> Order Total : </th>
                      
                       <th>@if($order->amount >= 1000)
                        ₱ {{ $order->amount }}

                        @else
                        ₱ {{ $order->amount + $order->shipping_charge }}

                        @endif </th>
           
                    </tr>
        
                    <tr>
                      <th> Order : </th>
                       <th>   
                        <span class="badge badge-pill badge-warning" style="background: #418DB9;">
                        
                          @if ($order->status == 'reject'|| $order->status == 'confirm')
                          {{ $order->status }}ed
                          @else
                          {{ $order->status }}
                          @endif
                          

                        </span> </th>
                    </tr>
        
        
        
                   </table>
        
        
                 </div> 
        
                </div>
        
              </div> <!-- // 2ND end col md -5 -->
        
        
              <div class="row">
        
        
        
        <div class="col-md-12">
        
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
        
                      <tr style="background: #e2e2e2;">
                        <td class="col-md-1">
                          <label for=""> Image</label>
                        </td>
        
                        <td class="col-md-3">
                          <label for=""> Product Name </label>
                        </td>
        
                        <td class="col-md-3">
                          <label for=""> Product Code</label>
                        </td>
        
        
                        <td class="col-md-2">
                          <label for=""> Color </label>
                        </td>
        
                         <td class="col-md-2">
                          <label for=""> Size </label>
                        </td>
        
                         <td class="col-md-1">
                          <label for=""> Quantity </label>
                        </td>
        
                        <td class="col-md-1">
                          <label for=""> Price </label>
                        </td>

                        {{-- <td class="col-md-1">
                          <label for=""> Download </label>
                        </td> --}}

                  
        
                      </tr>
        
        
                      @foreach($orderItem as $item)
               <tr>
                        <td class="col-md-1">
                          <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" height="50px;" width="50px;"> </label>
                        </td>
        
                        <td class="col-md-3">
                          <label for=""> {{ $item->product->product_name_en }}</label>
                        </td>
        
        
                         <td class="col-md-3">
                          <label for=""> {{ $item->product->product_code }}</label>
                        </td>
        
                        <td class="col-md-2">
                          <label for=""> {{ $item->color }}</label>
                        </td>
        
                        <td class="col-md-2">
                          <label for=""> {{ $item->size }}</label>
                        </td>
        
                         <td class="col-md-2">
                          <label for=""> {{ $item->qty }}</label>
                        </td>
        
                  <td class="col-md-2">
                          <label for="" > ₱{{ $item->price }}  ( $ {{ $item->price * $item->qty}} ) </label>
                        </td>     
                        
                        
                        
        
                      </tr>
                      @endforeach
        
        
        
        
        
                    </tbody>
        
                  </table>
        
                </div>
        
        
        
        
        
               </div> <!-- / end col md 8 -->
      
              </div> <!-- // END ORDER ITEM ROW -->

              {{-- @if ($order->status == 'pending')
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header"><h4>Cancel Order</h4>
                    </div>
                    <hr>
                    <div class="card-body" style="background: #E9EBEC;">
                      <table class="table">
                        <tr>
                          <th>
                            <label for="">Reason</label>
                          </th>
                          <th>
                            <label for="">
                              <textarea name="reason" id="reason" cols="30" rows="10" class="form-control" placeholder="Write your reason here..."></textarea>
                            </label>
                          </th>
                        </tr>
                        <tr>
                          <th>
                            <label for="">
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this order?')">Cancel Order</button>
                            </label>
                          </th>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                @endif --}}


             
             
              @if($order->status !== "delivered")

              @else

              @php 
              $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
              @endphp
        
        
              @if($order)


              <form action="{{ route('return.order',$order->id) }}" method="post" enctype="multipart/form-data">
                @csrf
        
          <div class="form-group">
            <label for="label"> Order Return Reason:</label>
            <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Return Reason</textarea>    

          </div>

          <div class="form-group">
            <h5>Product Image <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="file" name="return_image" class="form-control" {{-- onChange="mainThumUrl(this)" --}} >
              @error('return_image')
                <span class="text-danger">{{ $message }}</span>
              @enderror
              <br>
              {{-- <img src="" id="mainThmb"> --}}
        
            </div>
          </div>
          
          <button type="submit" class="btn btn-danger">Return Order</button>

        </form>

        @else

       

        <span class="badge badge-pill badge-warning" style="background: red">
          
          
          You have sent return request for this product
        
        </span>
     
        @endif 
        
          @endif

         
        <br><br>


		</div> <!-- // end row -->

	</div>

</div>


@endsection