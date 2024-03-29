<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;


class SubCategoryController extends Controller
{
    
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'asc')->get();
        $subcategory = SubCategory::latest()->get();
        
        return view('backend.category.subcategory_view', compact('subcategory', 'categories'));
    }

    public function SubCategoryStore(Request $request){

       
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_fil' => $request->subcategory_name_fil,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_fil' => strtolower(str_replace(' ', '-', $request->subcategory_name_fil)),

        ]);

        $notification = array(
            'message' => 'Sub Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }//end method

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en', 'asc')->get();
        $subcategory = SubCategory::findOrFail($id);
        
        return view('backend.category.subcategory_edit', compact('subcategory', 'categories'));
    }//end method

    public function SubCategoryUpdate(Request $request){

        $subcat_id = $request->id;

        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_fil' => $request->subcategory_name_fil,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_fil' => strtolower(str_replace(' ', '-', $request->subcategory_name_fil)),

        ]);

        $notification = array(
            'message' => 'Sub Category Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subcategory')->with($notification);


    }//end method

    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub Category Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }//end method

    public function SubSubCategoryView(){

        $categories = Category::orderBy('category_name_en','ASC')->get();
           $subsubcategory = SubSubCategory::latest()->get();
           return view('backend.category.sub_subcategory_view',compact('subsubcategory','categories'));
   
    }//end method

    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }//end method

    public function GetSubSubCategory($subcategory_id){

        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
     }//end method


    public function SubSubCategoryStore(Request $request){

        $request->validate([
             'category_id' => 'required',
             'subcategory_id' => 'required',
             'subsubcategory_name_en' => 'required',
             'subsubcategory_name_fil' => 'required',
         ],[
             'category_id.required' => 'Please Select Any Option',
             'subsubcategory_name_en.required' => 'Input Sub-Sub Category in English',
             'subsubcategory_name_fil.required' => 'Input Sub-Sub Category in Filipino',
         ]);
 
 
 
        SubSubCategory::insert([
         'category_id' => $request->category_id,
         'subcategory_id' => $request->subcategory_id,
         'subsubcategory_name_en' => $request->subsubcategory_name_en,
         'subsubcategory_name_fil' => $request->subsubcategory_name_fil,
         'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
         'subsubcategory_slug_fil' => str_replace(' ', '-',$request->subsubcategory_name_fil),
 
 
         ]);
 
         $notification = array(
             'message' => 'Sub-Sub Category Inserted Successfully',
             'alert-type' => 'success'
         );
 
         return redirect()->back()->with($notification);
 
     } // end method 



     //EDIT CONTROLLER
     public function SubSubCategoryEdit($id){
    	$categories = Category::orderBy('category_name_en','ASC')->get();
    	$subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
    	$subsubcategories = SubSubCategory::findOrFail($id);
    	return view('backend.category.sub_subcategory_edit',compact('categories','subcategories','subsubcategories'));

    }


    //UPDATE CONTROLLER
    public function SubSubCategoryUpdate(Request $request){

    	$subsubcat_id = $request->id;

    	SubSubCategory::findOrFail($subsubcat_id)->update([
		'category_id' => $request->category_id,
		'subcategory_id' => $request->subcategory_id,
		'subsubcategory_name_en' => $request->subsubcategory_name_en,
		'subsubcategory_name_fil' => $request->subsubcategory_name_fil,
		'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
		'subsubcategory_slug_fil' => str_replace(' ', '-',$request->subsubcategory_name_fil),


    	]);

	    $notification = array(
			'message' => 'Sub-Sub Category Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.subsubcategory')->with($notification);

    } // end method 

    public function SubSubCategoryDelete($id){

    	SubSubCategory::findOrFail($id)->delete();
    	 $notification = array(
			'message' => 'Sub-Sub Category Deleted Successfully',
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

    }


}
