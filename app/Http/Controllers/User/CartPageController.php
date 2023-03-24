<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function MyCart(){
    	return view('frontendv2.wishlist.view_mycart');

    }


    public function GetCartProduct(){
        $carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();
        

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => $cartTotal,
    	));

    } //end method 


    public function RemoveCartProduct($rowId){
        Cart::remove($rowId);

        if (Session::has('coupon')) {
            Session::forget('coupon');
         }

        return response()->json(['success' => 'Successfully Remove From Cart']);
    } //end method



     // Cart Increment 
     public function CartIncrement($rowId){
        $row = Cart::get($rowId);

        // here I want to check the product quantity from database

        $product = Product::where('id',$row->id)->first();

        if ($product->product_qty < $row->qty + 1) {
            return response()->json('out of stock');
        }
        
        Cart::update($rowId, $row->qty + 1);


        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            $total = (int)str_replace(',','',Cart::total()); 
            Session::put('coupon',[ 'coupon_name' => $coupon->coupon_name, 'coupon_discount' => $coupon->coupon_discount, 'discount_amount' => round($total * $coupon->coupon_discount/100), 'total_amount' => round($total - $total * $coupon->coupon_discount/100) ]);
        }

        

        return response()->json('increment');

    } // end method

       // Cart Decrement  
       public function CartDecrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            $total = (int)str_replace(',','',Cart::total()); 
            Session::put('coupon',[ 'coupon_name' => $coupon->coupon_name, 'coupon_discount' => $coupon->coupon_discount, 'discount_amount' => round($total * $coupon->coupon_discount/100), 'total_amount' => round($total - $total * $coupon->coupon_discount/100) ]);
        }

        return response()->json('Decrement');

    }// end method 

    




} 