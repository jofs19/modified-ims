<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Models\User;
use App\Notifications\OrderComplete;
use Illuminate\Support\Facades\Notification;

class OnlinePaymentController extends Controller
{

    public function OnlineOrder(Request $request){

        $user = User::findOrFail(Auth::id());

    	if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = (int)str_replace(',','',Cart::total());
    	}



	  // dd($charge);

     $order_id = Order::insertGetId([
     	'user_id' => Auth::id(),
     	'division_id' => $request->division_id,
     	'district_id' => $request->district_id,
     	'state_id' => $request->state_id,
     	'name' => $request->name,
     	'email' => $request->email,
     	'phone' => $request->phone,
		'address' => $request->address,
		'address2' => $request->address2,
     	'post_code' => $request->post_code,
     	'notes' => $request->notes,
		'receipt' => $request->receipt,

     	'payment_type' => 'Online Payment',
     	'payment_method' => 'Online Payment',

     	'currency' =>  'Php',
     	'amount' => $total_amount,
		'shipping_charge' => $request->shipping_charge,
		'change_amount' => $request->change_amount,


     	'invoice_no' => 'VRTH'.mt_rand(10000000,99999999),
     	'order_date' => Carbon::now()->format('d F Y'),
     	'order_month' => Carbon::now()->format('F'),
     	'order_year' => Carbon::now()->format('Y'),
     	'status' => 'pending',
     	'created_at' => Carbon::now(),

     ]);

     // Start Send Email
     $invoice = Order::findOrFail($order_id);
     	$data = [
     		'invoice_no' => $invoice->invoice_no,
     		'amount' => $total_amount + $request->shipping_charge,
     		'name' => $invoice->name,
     	    'email' => $invoice->email,
     	];

     	Mail::to($request->email)->send(new OrderMail($data));

     // End Send Email


     $carts = Cart::content();
     foreach ($carts as $cart) {
     	OrderItem::insert([
     		'order_id' => $order_id,
     		'product_id' => $cart->id,
            'vendor_id' => $cart->options->vendor,
     		'color' => $cart->options->color,
     		'size' => $cart->options->size,
     		'qty' => $cart->qty,
     		'price' => $cart->price,
     		'created_at' => Carbon::now(),

     	]);
     }


     if (Session::has('coupon')) {
     	Session::forget('coupon');
     }

     Cart::destroy();

     $notification = array(
			'message' => 'Your Order Placed Successfully',
			'alert-type' => 'success'
		);

		$order_invoice = Order::findOrFail($order_id)->invoice_no;


		$order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        Notification::send($user, new OrderComplete($request->name,$order_invoice));
		// $user->notify(new OrderComplete($request->name));
		return view('frontendv2.checkout.checkout_complete',compact('order', 'orderItem'))->with($notification);


    } // end method


}
