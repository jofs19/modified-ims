<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use App\Models\MultiImg;
use DateTime;
use App\Models\User;
use App\Notifications\StockNotification;
use Illuminate\Support\Facades\Notification;

class ProductController extends Controller
{

    public function AddProduct(){
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();

		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		return view('backend.product.product_add',compact('categories','brands','activeVendor'));

	} //end method AddProduct


	public function StoreProduct(Request $request){

		// $request->validate([
		// 	'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
		//   ]);

		//   if ($files = $request->file('file')) {
		// 	$destinationPath = 'upload/pdf'; // upload path
		// 	$digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
		// 	$files->move($destinationPath,$digitalItem);
		//   }

        $image = $request->file('product_thumbnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(518,484)->save('upload/products/thumbnail/'.$name_gen);
    	$save_url = 'upload/products/thumbnail/'.$name_gen;
		$product_id = Product::insertGetId([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	// 'subsubcategory_id' => $request->subsubcategory_id,
      	'product_name_en' => $request->product_name_en,
      	'product_name_fil' => $request->product_name_fil,
      	'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
      	'product_slug_fil' => str_replace(' ', '-', $request->product_name_fil),
      	'product_code' => $request->product_code,
      	'product_qty' => $request->product_qty,
		'stock' => (int)$request->product_qty,
      	'product_tags_en' => $request->product_tags_en,
      	'product_tags_fil' => $request->product_tags_fil,
      	'product_size_en' => $request->product_size_en,
      	'product_size_fil' => $request->product_size_fil,
      	'product_color_en' => $request->product_color_en,
      	'product_color_fil' => $request->product_color_fil,
      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
		'total_price' => ($request->selling_price + $request->discount_price) - $request->selling_price,
      	'short_descp_en' => $request->short_descp_en,
      	'short_descp_fil' => $request->short_descp_fil,
      	'long_descp_en' => $request->long_descp_en,
      	'long_descp_fil' => $request->long_descp_fil,
      	'hot_deals' => $request->hot_deals,
      	'featured' => $request->featured,
      	'special_offer' => $request->special_offer,
      	'special_deals' => $request->special_deals,
		'sale_time' => $request->sale_time,
		'so_saletime' => $request->so_saletime,
		'item_created_date' => Carbon::now()->format('d F Y'),
		'item_created_month' => Carbon::now()->format('F'),	
		'item_created_year' => Carbon::now()->format('Y'),
      	'product_thumbnail' => $save_url,
      	'status' => 1,
        'vendor_id' => $request->vendor_id,
      	'created_at' => Carbon::now(),



      ]);


	        // Multiple Image Upload Start ///////////

			$images = $request->file('multi_img');
			foreach ($images as $img) {
				$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
			  Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
			  $uploadPath = 'upload/products/multi-image/'.$make_name;

			  MultiImg::insert([

				  'product_id' => $product_id,
				  'photo_name' => $uploadPath,
				  'created_at' => Carbon::now(),

			  ]);

			}

			// End Multiple Image Upload  ///////////


			 $notification = array(
				  'message' => 'Product Inserted Successfully',
				  'alert-type' => 'success'
			  );

			  return redirect()->route('manage-product')->with($notification);


	} // end method


	public function ManageProduct(){

		$products = Product::latest()->get();
		return view('backend.product.product_view',compact('products'));
	}// end method


	public function EditProduct($id){

		$multiImgs = MultiImg::where('product_id',$id)->get();
        $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();

		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = SubCategory::latest()->get();
		// $subsubcategory = SubSubCategory::latest()->get();
		$products = Product::findOrFail($id);
		return view('backend.product.product_edit',compact('categories','brands','subcategory','products','multiImgs','activeVendor'));

	}// end	method


	public function ProductDataUpdate(Request $request){

		$product_id = $request->id;

         Product::findOrFail($product_id)->update([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	// 'subsubcategory_id' => $request->subsubcategory_id,
      	'product_name_en' => $request->product_name_en,
      	'product_name_fil' => $request->product_name_fil,
      	'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
      	'product_slug_fil' => str_replace(' ', '-', $request->product_name_fil),
      	'product_code' => $request->product_code,

      	'product_qty' => $request->product_qty,
		'stock' => (int)$request->product_qty,

      	'product_tags_en' => $request->product_tags_en,
      	'product_tags_fil' => $request->product_tags_fil,
      	'product_size_en' => $request->product_size_en,
      	'product_size_fil' => $request->product_size_fil,
      	'product_color_en' => $request->product_color_en,
      	'product_color_fil' => $request->product_color_fil,

      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
		'total_price' => $request->selling_price - $request->discount_price,

      	'short_descp_en' => $request->short_descp_en,
      	'short_descp_fil' => $request->short_descp_fil,
      	'long_descp_en' => $request->long_descp_en,
      	'long_descp_fil' => $request->long_descp_fil,

      	'hot_deals' => $request->hot_deals,
      	'featured' => $request->featured,
      	'special_offer' => $request->special_offer,
      	'special_deals' => $request->special_deals,

		'sale_time' => $request->sale_time,
		'so_saletime' => $request->so_saletime,
		'item_created_date' => Carbon::now()->format('d F Y'),
		'item_created_month' => Carbon::now()->format('F'),	
		'item_created_year' => Carbon::now()->format('Y'),

      	'status' => 1,
        'vendor_id' => $request->vendor_id,

      	'created_at' => Carbon::now(),

      ]);

          $notification = array(
			'message' => 'Product Updated Without Image Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('manage-product')->with($notification);


	} // end method


	/// Multiple Image Update
	public function MultiImageUpdate(Request $request){
		$imgs = $request->multi_img;

		foreach ($imgs as $id => $img) {
	    $imgDel = MultiImg::findOrFail($id);
	    unlink($imgDel->photo_name);

    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
    	$uploadPath = 'upload/products/multi-image/'.$make_name;

    	MultiImg::where('id',$id)->update([
    		'photo_name' => $uploadPath,
    		'updated_at' => Carbon::now(),

    	]);

	 } // end foreach

       $notification = array(
			'message' => 'Product Image Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	} // end method


	/// Product Main thumbnail Update ///
	public function ThumbnailImageUpdate(Request $request){
		$pro_id = $request->id;
		$oldImage = $request->old_img;
		unlink($oldImage);

	   $image = $request->file('product_thumbnail');
		   $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
		   Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
		   $save_url = 'upload/products/thumbnail/'.$name_gen;

		   Product::findOrFail($pro_id)->update([
			   'product_thumbnail' => $save_url,
			   'updated_at' => Carbon::now(),

		   ]);

			$notification = array(
			   'message' => 'Product Image thumbnail Updated Successfully',
			   'alert-type' => 'info'
		   );

		   return redirect()->back()->with($notification);

		} // end method

		 // Multi Image Delete ////
		 public function MultiImageDelete($id){
			$oldimg = MultiImg::findOrFail($id);
			unlink($oldimg->photo_name);
			MultiImg::findOrFail($id)->delete();

			$notification = array(
			   'message' => 'Product Image Deleted Successfully',
			   'alert-type' => 'error'
		   );

		   return redirect()->back()->with($notification);

		} // end method


		public function ProductInactive($id){
			Product::findOrFail($id)->update(['status' => 0]);
			$notification = array(
			   'message' => 'Product Inactive',
			   'alert-type' => 'success'
		   );

		   return redirect()->back()->with($notification);
		}


	 public function ProductActive($id){
		 Product::findOrFail($id)->update(['status' => 1]);
			$notification = array(
			   'message' => 'Product Active',
			   'alert-type' => 'success'
		   );

		   return redirect()->back()->with($notification);

		}

	public function ProductDelete($id){
		$product = Product::findOrFail($id);
		unlink($product->product_thumbnail);
		Product::findOrFail($id)->delete();

		$images = MultiImg::where('product_id',$id)->get();
		foreach ($images as $img) {
			unlink($img->photo_name);
			MultiImg::where('product_id',$id)->delete();
		}

		$notification = array(
			'message' => 'Product Deleted Successfully',
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

	}// end method

	  // product Stock
// 	public function ProductStock(){

//     $products = Product::latest()->get();

//     return view('backend.product.product_stock',compact('products'));
//   }

	public function stockReportView(){
		return view('backend.product.stockReport_view');
	}

	public function StockReportByDate(Request $request){
		// $created_at =
		$date = new DateTime($request->date);
		// format created_at date to d F Y
	
		$formatDate = $date->format('d F Y');
	
		// return $formatDate;
		$products = Product::where('item_created_date',$formatDate)->latest()->get();
		return view('backend.product.stockReport_show',compact('products'));
	
	
	
	} // end method
	
	
	
	public function StockReportByMonth(Request $request){
	
		$products = Product::where('item_created_month',$request->month)->where('item_created_year',$request->year_name)->latest()->get();
		return view('backend.product.stockReport_show',compact('products'));
	
	} // end method
	
	
	   public function StockReportByYear(Request $request){
	
		$products = Product::where('item_created_year',$request->year)->latest()->get();
		return view('backend.product.stockReport_show',compact('products'));
	
	} // end method

	public function StockReportByStock(Request $request){
		// where stock is less than 10
	
		if($request->stock == 10){
			$products = Product::whereBetween('stock', [0,10] )->latest()->get();
	
		}elseif($request->stock == 50){
			$products = Product::whereBetween('stock', [11,50] )->latest()->get();
		}elseif($request->stock == 100){
			$products = Product::whereBetween('stock', [51,100] )->latest()->get();
		}elseif($request->stock == 500){
			$products = Product::whereBetween('stock', [101,500] )->latest()->get();
		}elseif($request->stock == 1000){
			$products = Product::whereBetween('stock', [501,1000] )->latest()->get();
		}
	
	
		// $products = Product::whereBetween('stock', [$request->stock] )->latest()->get();
		return view('backend.product.stockReport_show',compact('products'));
	
	} // end method



}
