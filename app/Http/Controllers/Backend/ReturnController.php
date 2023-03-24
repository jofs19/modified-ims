<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderReturned;

class ReturnController extends Controller
{
    public function ReturnRequest(){

    	$orders = Order::where('return_order',1)->orderBy('id','DESC')->get();
    	return view('backend.return_order.return_request',compact('orders'));

    }

    public function ReturnRequestView($order_id){

        $notification = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'success'
        );

    	$orders = Order::findOrFail($order_id);
    	return view('backend.return_order.return_request_view',compact('orders'))->with($notification);

    } // end method
  

    public function ReturnRequestApprove($order_id){

    	Order::where('id',$order_id)->update(['return_order' => 2]);
    	$orders = Order::where('return_order',2)->orderBy('id','DESC')->get();

        		// get user id in order db to send notifications
		$user_id = Order::where('id',$order_id)->first()->user_id;
		$user = User::where('id',$user_id)->first();

        $order_invoice = Order::where('id',$order_id)->first()->invoice_no;

		Notification::send($user, new OrderReturned($order_id,$order_invoice));

    	$notification = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod 





    public function ReturnAllRequest(){

    	$orders = Order::where('return_order',2)->orderBy('id','DESC')->get();
    	return view('backend.return_order.all_return_request',compact('orders'));

    }


}