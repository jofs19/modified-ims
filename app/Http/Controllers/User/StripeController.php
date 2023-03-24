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

class StripeController extends Controller
{
    public function StripeOrder(Request $request){

        if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = (int)str_replace(',','',Cart::total());
    	}



    \Stripe\Stripe::setApiKey('sk_test_51LSCr4KV6PpOFEuXjNce0Gc3oQA89OtUpSHXFzVZOiMsXFT0l0irojUk8bCfl53g3JoQA8kriOIfUilXnflGeW2300HiIgTb8N');

	$token = $_POST['stripeToken'];
	$charge = \Stripe\Charge::create([
        'amount' => $total_amount*100,
        'currency' => 'usd',
        'description' => 'JOFS',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
    ]);

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

        'payment_type' => 'Stripe',
        'payment_method' => 'Stripe',
        'payment_type' => $charge->payment_method,
        'transaction_id' => $charge->balance_transaction,
        'currency' => $charge->currency,
        'amount' => $total_amount,
        'shipping_charge' => $request->shipping_charge,
		'change_amount' => $request->change_amount,

        'order_number' => $charge->metadata->order_id,

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
            'vendor' => $cart->options->vendor,
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

       return redirect()->route('dashboard')->with($notification);


    } // end method




}
