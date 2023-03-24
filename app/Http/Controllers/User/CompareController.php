<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Compare;
use Carbon\Carbon;

class CompareController extends Controller
{
    public function ViewCompare(){
		return view('frontendv2.wishlist.view_compare');
	} // end method 


    public function GetCompareProduct(){

		$compare = Compare::with('product')->where('user_id',Auth::id())->latest()->get();
		$compareQty = Compare::where('user_id',Auth::id())->count();
		
		return response()->json(array(
			'compare' => $compare,
			'compareQty' => $compareQty,

    	));
	} // end method 

    public function RemoveCompareProduct($id){

		Compare::where('user_id',Auth::id())->where('id',$id)->delete();
		return response()->json(['success' => 'Successfully removed from Compare section']);
	}
}
