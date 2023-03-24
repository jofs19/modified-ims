<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Compare;
use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use App\Models\ShipDivision;
use Stripe\Price;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){

		if (Session::has('coupon')) {
			Session::forget('coupon');
		 }

			// if qty is not greater that product_qty



    	$product = Product::findOrFail($id);
//8 > 8-1
		if($product->product_qty > $request->quantity-1){
			if ($product->discount_price == NULL) {
				Cart::add([
					'id' => $id,
					'name' => $request->product_name,
					'qty' => $request->quantity,
					'price' => $product->selling_price,
					'weight' => 1,
					'options' => [
						'image' => $product->product_thumbnail,
						'color' => $request->color,
						'size' => $request->size,
                        'vendor' => $request->vendor,
					],
				]);

				return response()->json(['success' => 'Successfully Added to Cart']);

			}else{

				Cart::add([
					'id' => $id,
					'name' => $request->product_name,
					'qty' => $request->quantity,
					'price' => $product->discount_price,
					'weight' => 1,
					'options' => [
						'image' => $product->product_thumbnail,
						'color' => $request->color,
						'size' => $request->size,
                        'vendor' => $request->vendor,
					],

				]);
				return response()->json(['success' => 'Successfully Added to Cart']);
			}
		}else{

			return response()->json(['error' => 'Quantity exceeded the product stock!']);

		}


    } // end mehtod



    public function AddToCartDetails(Request $request, $id){

        if(Session::has('coupon')){
            Session::forget('coupon');
        }

        $product = Product::findOrFail($id);

		if($product->product_qty > $request->quantity-1){
			if ($product->discount_price == NULL) {
				Cart::add([
					'id' => $id,
					'name' => $request->product_name,
					'qty' => $request->quantity,
					'price' => $product->selling_price,
					'weight' => 1,
					'options' => [
						'image' => $product->product_thumbnail,
						'color' => $request->color,
						'size' => $request->size,
                        'vendor' => $request->vendor,
					],
				]);

				return response()->json(['success' => 'Successfully Added to Cart']);

			}else{

				Cart::add([
					'id' => $id,
					'name' => $request->product_name,
					'qty' => $request->quantity,
					'price' => $product->discount_price,
					'weight' => 1,
					'options' => [
						'image' => $product->product_thumbnail,
						'color' => $request->color,
						'size' => $request->size,
                        'vendor' => $request->vendor,
					],

				]);
				return response()->json(['success' => 'Successfully Added to Cart']);
			}
		}else{

			return response()->json(['error' => 'Quantity exceeded the product stock!']);

		}

    }// End Method




    // Mini Cart Section
    public function AddMiniCart(){

    	$carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => $cartTotal,

    	));
    } // end method


// remove mini cart
    public function RemoveMiniCart($rowId){
    	Cart::remove($rowId);
    	return response()->json(['success' => 'Successfully Removed from Cart']);

    } // end mehtod


	    // add to wishlist mehtod

		public function AddToWishlist(Request $request, $product_id){

			if (Auth::check()) {

				$exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
				$wishlistQty = Wishlist::where('user_id',Auth::id())->count();

				if (!$exists) {
					Wishlist::insert([
					'user_id' => Auth::id(),
					'product_id' => $product_id,
					'created_at' => Carbon::now(),
				]);
				return response()->json(array(

					'wishlistQty' => $wishlistQty + 1,
					'success' => 'Successfully Added to Wishlist',

				));


				}else{

					return response()->json(['error' => 'This product was already added on your Wishlist']);

				}

			}else{

				return response()->json(['error' => 'Login Your Account First!']);

			}

		} // end method

		public function CouponApply(Request $request){

			$coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
			if ($coupon) {
				$total = (int)str_replace(',','',Cart::total());
				Session::put('coupon',[ 'coupon_name' => $coupon->coupon_name, 'coupon_discount' => $coupon->coupon_discount, 'discount_amount' => round($total * $coupon->coupon_discount/100), 'total_amount' => round($total - $total * $coupon->coupon_discount/100) ]);

				return response()->json(array(
					'validity' => true,
					'success' => 'Coupon Applied Successfully'
				));

			}else{
				return response()->json(['error' => 'Invalid Coupon']);
			}

		} // end method

		public function CouponCalculation(){

			if (Session::has('coupon')) {
				return response()->json(array(
					'subtotal' => Cart::total(),
					'coupon_name' => session()->get('coupon')['coupon_name'],
					'coupon_discount' => session()->get('coupon')['coupon_discount'],
					'discount_amount' => session()->get('coupon')['discount_amount'],
					'total_amount' => session()->get('coupon')['total_amount'],
					'total_value' => floor(str_replace(',', '', Cart::Subtotal()))
				));
			}else{
				return response()->json(array(
					'total' => Cart::total(),
				));

			}
		} // end method


		 // Remove Coupon
		 public function CouponRemove(){
			Session::forget('coupon');
			return response()->json(['success' => 'Coupon Removed Successfully']);
		}

		// Checkout Method
		public function CheckoutCreate(){

			if (Auth::check()) {
				if (Cart::total() > 0) {

			$carts = Cart::content();
			$cartQty = Cart::count();
			$cartTotal = Cart::total();
			$divisions = ShipDivision::orderBy('division_name','ASC')->get();

			return view('frontendv2.checkout.checkout_view',compact('carts','cartQty','cartTotal','divisions'));

				}else{

				$notification = array(
				'message' => 'Add atleast one product...',
				'alert-type' => 'error'
			);

			return redirect()->to('/')->with($notification);

				}


			}else{

				 $notification = array(
				'message' => 'You Need to Login First',
				'alert-type' => 'error'
			);

			return redirect()->route('login')->with($notification);

			}

		} // end method


		public function AddToCompare(Request $request, $product_id){

			if (Auth::check()) {

				$exists = Compare::where('user_id',Auth::id())->where('product_id',$product_id)->first();
				$compareQty = Compare::where('user_id',Auth::id())->count();

				if (!$exists && $compareQty < 3) {
					Compare::insert([
					'user_id' => Auth::id(),
					'product_id' => $product_id,
					'created_at' => Carbon::now(),
				]);
				return response()->json(array(

					'compareQty' => $compareQty + 1,
					'success' => 'Successfully Added to Compare Section',

				));


				}else{

					if($exists){
						return response()->json(['error' => 'This product was already added on your Compare section!']);
					}else{
						return response()->json(['error' => 'You can only add 3 products to compare']);

					}
				}

			}else{

				return response()->json(['error' => 'Login Your Account First!']);

			}

		} // end method




}
