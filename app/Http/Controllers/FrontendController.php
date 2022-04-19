<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $featured_product = Product::where('tranding','tranding')->limit(2)->get();
        $category = Category::where('status','0')->get();
        return view('frontend.index',compact('featured_product','category'));
    }

    public function showcategory($slug){
        // $product_wise_category = Category::where('slug',$slug)->exists();
        if(Category::where('slug',$slug)->exists()){
            $category = Category::where('slug',$slug)->first();
            $product = Product::where('category_id',$category->id)->where('status','0')->get();
            return view('frontend.category_product',compact('product','category'));
        }
        else{
            return back()->with('status','Slug doesnot match');
        }
    }

    public function showsingleproduct($category_slug,$product_name){

        if(Category::where('slug',$category_slug)->exists())
        {
            if(Product::where('name',$product_name)->exists())
            {
               $single_product = Product::where('name',$product_name)->first();
                return view('frontend.single_product',compact('single_product'));
            }
            else{

                return back();

            }

        }
        else{
            return back();
        }
    }
}
