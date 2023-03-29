<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    public function CategoryView()
    {
        $category = Category::latest()->get();

        return view('backend.category.category_view', compact('category'));
    }


    public function CategoryStore(Request $request){




        // $image = $request->file('category_image');
        // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // Image::make($image)->resize(500, 500)->save('upload/category/'.$name_gen);
        // $save_url = 'upload/category/'.$name_gen;

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_fil' => $request->category_name_fil,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_fil' => str_replace(' ', '-', $request->category_name_fil),
            'category_icon' => $request->category_icon,

        ]);

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }//end method

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);

        return view('backend.category.category_edit', compact('category'));
    }
    

    public function CategoryUpdate(Request $request, $id){
        

        Category::findOrFail($id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_fil' => $request->category_name_fil,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_fil' => str_replace(' ', '-', $request->category_name_fil),
            'category_icon' => $request->category_icon,

        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }//end 
    

    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    
    }//end method
    
}
