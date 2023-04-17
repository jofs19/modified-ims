<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Notification;


use App\Notifications\OrderConfirmed;
use App\Notifications\OrderProcessed;
use App\Notifications\OrderPicked;
use App\Notifications\OrderShipped;
use App\Notifications\OrderDelivered;
use App\Notifications\OrderRejected;

class OrderController extends Controller
{

	// Pending Orders
	public function PendingOrders(){
		$orders = Order::where('status','pending')->orWhere('status','cancel_order')->orderBy('id','DESC')->get();
		return view('backend.orders.pending_orders',compact('orders'));

	} // end method


    	// Pending Order Details
	public function PendingOrdersDetails($order_id){

		$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('backend.orders.pending_orders_details',compact('order','orderItem'));

	} // end method




    	// Confirmed Orders
	public function ConfirmedOrders(){
		$orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
		return view('backend.orders.confirmed_orders',compact('orders'));

	} // end method


	// Processing Orders
	public function ProcessingOrders(){
		$orders = Order::where('status','processing')->orderBy('id','DESC')->get();
		return view('backend.orders.processing_orders',compact('orders'));

	} // end method


		// Picked Orders
	public function PickedOrders(){
		$orders = Order::where('status','picked')->orderBy('id','DESC')->get();
		return view('backend.orders.picked_orders',compact('orders'));

	} // end method



			// Shipped Orders
	public function ShippedOrders(){
		$orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
		return view('backend.orders.shipped_orders',compact('orders'));

	} // end method


			// Delivered Orders
	public function DeliveredOrders(){
		$orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
		return view('backend.orders.delivered_orders',compact('orders'));

	} // end method


				// Cancel Orders
	public function CancelOrders(){
		$orders = Order::where('status','reject')->orderBy('id','DESC')->get();
		return view('backend.orders.cancel_orders',compact('orders'));

	} // end method


    public function PendingToConfirm($order_id){

        Order::findOrFail($order_id)->update(['status' => 'confirm']);

		// get user id in order db to send notifications
		$user_id = Order::where('id',$order_id)->first()->user_id;
		$user = User::where('id',$user_id)->first();

		// order invoice
		$order_invoice = Order::where('id',$order_id)->first()->invoice_no;

		Notification::send($user, new OrderConfirmed($order_id,$order_invoice));
		// $user->notify(new OrderConfirmed($order_id));

        $notification = array(
              'message' => 'Order Confirmed Successfully',
              'alert-type' => 'success'
          );

		  // Send Notification to users


          return redirect()->route('pending-orders')->with($notification);


      } // end method

	  public function RejectOrders($order_id){

		Order::findOrFail($order_id)->update(['status' => 'reject']);

		$user_id = Order::where('id',$order_id)->first()->user_id;
		$user = User::where('id',$user_id)->first();

		$order_invoice = Order::where('id',$order_id)->first()->invoice_no;

		Notification::send($user, new OrderRejected($order_id,$order_invoice));

		$notification = array(
			'message' => 'Order Rejected Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	} // end method


      public function ConfirmToProcessing($order_id){

        Order::findOrFail($order_id)->update(['status' => 'processing']);

		$user_id = Order::where('id',$order_id)->first()->user_id;
		$user = User::where('id',$user_id)->first();

		$order_invoice = Order::where('id',$order_id)->first()->invoice_no;

		Notification::send($user, new OrderProcessed($order_id,$order_invoice));

        $notification = array(
              'message' => 'Order Processing Successfully',
              'alert-type' => 'success'
          );

          return redirect()->route('confirmed-orders')->with($notification);


      } // end method



    public function ProcessingToPicked($order_id){

        Order::findOrFail($order_id)->update(['status' => 'picked']);

		$user_id = Order::where('id',$order_id)->first()->user_id;
		$user = User::where('id',$user_id)->first();

		$order_invoice = Order::where('id',$order_id)->first()->invoice_no;

		Notification::send($user, new OrderPicked($order_id,$order_invoice));

        $notification = array(
              'message' => 'Order Picked Successfully',
              'alert-type' => 'success'
          );

          return redirect()->route('processing-orders')->with($notification);

    } // end method


       public function PickedToShipped($order_id){

        Order::findOrFail($order_id)->update(['status' => 'shipped']);

		$user_id = Order::where('id',$order_id)->first()->user_id;
		$user = User::where('id',$user_id)->first();

		$order_invoice = Order::where('id',$order_id)->first()->invoice_no;

		Notification::send($user, new OrderShipped($order_id,$order_invoice));

        $notification = array(
              'message' => 'Order Shipped Successfully',
              'alert-type' => 'success'
          );

          return redirect()->route('picked-orders')->with($notification);


      } // end method


       public function ShippedToDelivered($order_id){

		$product = OrderItem::where('order_id',$order_id)->get();
		foreach ($product as $item) {
			Product::where('id',$item->product_id)
					->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
		}

        Order::findOrFail($order_id)->update(['status' => 'delivered']);

		$user_id = Order::where('id',$order_id)->first()->user_id;
		$user = User::where('id',$user_id)->first();

		$order_invoice = Order::where('id',$order_id)->first()->invoice_no;

		Notification::send($user, new OrderDelivered($order_id,$order_invoice));

        $notification = array(
              'message' => 'Order Delivered Successfully',
              'alert-type' => 'success'
          );

          return redirect()->route('shipped-orders')->with($notification);


      } // end method







      public function AdminInvoiceDownload($order_id){

		$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

		$pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf');

	} // end method






}
