<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;


class ProductController extends Controller
{
    public function index(){

        $category = Category::all();
        return view('backend.product.index',compact('category'));
    }

    public function store(Request $request){
        // dd($request->all());
        $product_store = Product::insertGetId([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'small_description'=>$request->small_description,
            'description'=>$request->description,
            'meta_title'=>$request->meta_title,
            'meta_keywords'=>$request->meta_keywords,
            'meta_description'=>$request->meta_description,
            'orginal_price'=>$request->orginal_price,
            'selling_price'=>$request->selling_price,
            'quantity'=>$request->quantity,
            'taxs'=>$request->taxs,
            'tranding'=>$request->tranding,
            'created_at'=>Carbon::now(),
        ]);

        $new_product_image = $request->image;
        $extension =  $new_product_image->getClientOriginalExtension();
        $new_product_name = $product_store.'.'.$extension;

        Image::make($new_product_image)->save(base_path('public/uploads/product/'.$new_product_name));
        Product::find($product_store)->update([
            'image'=>$new_product_name,
        ]);

        return back()->with('status','Product Add Successfully');
    }
}
