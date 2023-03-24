<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;

class HomeBlogController extends Controller
{
    public function AddBlogPost(){

    	$blogcategory = BlogPostCategory::latest()->get();
    	$blogpost = BlogPost::latest()->paginate(4);
		
    	return view('frontendv2.blog.blog_list',compact('blogpost','blogcategory'));

    } //end method

    public function DetailsBlogPost($id){

        $blogcategory = BlogPostCategory::latest()->get();
    	$blogpost = BlogPost::findOrFail($id);
    	return view('frontendv2.blog.blog_details',compact('blogpost','blogcategory'));
    } //end method


    public function HomeBlogCatPost($category_id){

    	$blogcategory = BlogPostCategory::latest()->get();
    	$blogpost = BlogPost::where('category_id',$category_id)->orderBy('id','DESC')->get();
    	return view('frontendv2.blog.blog_cat_list',compact('blogpost','blogcategory'));

    } // end mehtod 



}