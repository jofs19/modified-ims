<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VendorProductController extends Controller
{
     public function VendorAllProduct(){

        $id = Auth::user()->id;
        $products = Product::where('vendor_id',$id)->latest()->get();
        return view('seller.backend.product.vendor_product_all',compact('products'));
    } // End Method

 public function VendorAddProduct(){

		$categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        // $subsubcategories = SubSubCategory::latest()->get();
		$brands = Brand::latest()->get();
        return view('seller.backend.product.vendor_product_add',compact('brands','categories','subcategories'));

    } // End Method


 public function VendorGetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
            return json_encode($subcat);

    }// End Method

    public function VendorGetSubSubCategory($subcategory_id){
            $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
                return json_encode($subsubcat);

        }// End Method


public function VendorStoreProduct(Request $request){


        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            // 'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'stock' => (int)$request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_size_en' => $request->product_size_en,
            'product_color_en' => $request->product_color_en,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'long_descp_en' => $request->long_descp_en,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'sale_time' => $request->sale_time,
            'so_saletime' => $request->so_saletime,
            'product_thumbnail' => $save_url,
            'vendor_id' => Auth::user()->id,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        /// Multiple Image Upload From her //////

        $images = $request->file('multi_img');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
        $uploadPath = 'upload/products/multi-image/'.$make_name;


        MultiImg::insert([

            'product_id' => $product_id,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(),

        ]);
        } // end foreach

        /// End Multiple Image Upload From her //////

        $notification = array(
            'message' => 'Vendor Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('vendor.all.product')->with($notification);


    } // End Method

 public function VendorEditProduct($id){

        $multiImgs = MultiImg::where('product_id',$id)->get();

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $products = Product::findOrFail($id);
        // $subsubcategories = SubSubCategory::latest()->get();

        return view('seller.backend.product.vendor_product_edit',compact('brands','categories', 'products','subcategories','multiImgs'));
    }// End Method



public function VendorUpdateProduct(Request $request){

             $product_id = $request->id;

             Product::findOrFail($product_id)->update([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            // 'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'stock' => (int)$request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_size_en' => $request->product_size_en,
            'product_color_en' => $request->product_color_en,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'long_descp_en' => $request->long_descp_en,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'sale_time' => $request->sale_time,
            'so_saletime' => $request->so_saletime,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);


         $notification = array(
            'message' => 'Vendor Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('vendor.all.product')->with($notification);

    }// End Method


 public function VendorUpdateProductThumbnail(Request $request){

        $pro_id = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

         if (file_exists($oldImage)) {
           unlink($oldImage);
        }

        Product::findOrFail($pro_id)->update([

            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Vendor Product Image Thumbnail Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }// End Method


    //Vendor Multi Image Update
    public function VendorUpdateProductmultiImage(Request $request){

        $imgs = $request->multi_img;

        foreach($imgs as $id => $img ){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

   $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
        $uploadPath = 'upload/products/multi-image/'.$make_name;

        MultiImg::where('id',$id)->update([
            'photo_name' => $uploadPath,
            'updated_at' => Carbon::now(),

        ]);
        } // end foreach

         $notification = array(
            'message' => 'Vendor Product Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


 public function VendorMultiimgDelete($id){
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_name);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Vendor Product Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


    public function VendorProductInactive($id){

        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


      public function VendorProductActive($id){

        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


     public function VendorProductDelete($id){

        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $imges = MultiImg::where('product_id',$id)->get();
        foreach($imges as $img){
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Vendor Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method


}
