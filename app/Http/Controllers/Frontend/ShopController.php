<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
class ShopController extends Controller
{
    public function ShopPage(){
        $products = Product::query();
        if (!empty($_GET['category'])) {
            $slugs = explode(',',$_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug_en',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('category_id',$catIds)->paginate(6);
        }
         if (!empty($_GET['brand'])) {
            $slugs = explode(',',$_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug_en',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id',$brandIds)->paginate(6);
        }
        else{
             $products = Product::where('status',1);

             if(isset($_GET['sort']) && !empty($_GET['sort'])){
                if($_GET['sort'] == 'product_latest'){
                   $products = $products->orderBy('id','DESC');
                }elseif($_GET['sort'] == 'product_oldest'){
                   $products = $products->orderBy('id','ASC');
                }elseif($_GET['sort'] == 'price_lowest'){
                    // convert to int
                     $products =  $products->orderBy('selling_price','ASC')->orderBy('discount_price','ASC');

                }elseif($_GET['sort'] == 'price_highest'){

                     $products = $products->orderBy('selling_price','DESC')->orderBy('discount_price','DESC');

                }elseif($_GET['sort'] == 'name_a_z'){
                   $products = $products->orderBy('product_name_en','ASC');
                }elseif($_GET['sort'] == 'name_z_a'){
                   $products = $products->orderBy('product_name_en','DESC');
                }
             }


            //  Pagination

            $products = $products->paginate(6);

        }


        if(!empty($_GET['price'])){
         $price = explode('-',$_GET['price']);
         $products = $products->whereBetween('selling_price',$price);

        }

        $brands = Brand::orderBy('brand_name_en','ASC')->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontendv2.shop.shop_page',compact('products','categories','brands'));

    } // end Method



    public function ShopFilter(Request $request){
        // dd($request->all());

        $data = $request->all();

        // Filter Category

        $catUrl = "";
            if (!empty($data['category'])) {
               foreach ($data['category'] as $category) {
                  if (empty($catUrl)) {
                     $catUrl .= '&category='.$category;
                  }else{
                    $catUrl .= ','.$category;
                  }
               } // end foreach condition
            } // end if condition


 // Filter Brand

        $brandUrl = "";
            if (!empty($data['brand'])) {
               foreach ($data['brand'] as $brand) {
                  if (empty($brandUrl)) {
                     $brandUrl .= '&brand='.$brand;
                  }else{
                    $brandUrl .= ','.$brand;
                  }
               } // end foreach condition
            } // end if condition


         // Filter Price Range

         $priceRangeUrl = "";
         if (!empty($data['price_range'])) {
            if (empty($priceRangeUrl)) {
               $priceRangeUrl .= '&price='.$data['price_range'];
            }else{
               $priceRangeUrl .= ','.$data['price_range'];
            }
         }



            return redirect()->route('shop.page',$catUrl.$brandUrl.$priceRangeUrl);

    } // end Method














}
