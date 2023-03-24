<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

class WishlistController extends Controller
{
    

    public function ViewWishlist(){
		return view('frontendv2.wishlist.view_wishlist');
	} // end method 


    public function GetWishlistProduct(){

		$wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
		$wishlistQty = Wishlist::where('user_id',Auth::id())->count();
		
		return response()->json(array(
			'wishlist' => $wishlist,
			'wishlistQty' => $wishlistQty,

    	));
	} // end method 

    public function RemoveWishlistProduct($id){

		Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
		return response()->json(['success' => 'Successfully removed from Wishlist']);
	}

}
