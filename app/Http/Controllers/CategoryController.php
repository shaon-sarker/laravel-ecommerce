<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index(){
        return view('backend.category.index');
    }

    public function store(Request $request){

        $category_store = Category::insertGetId([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'meta_title'=>$request->meta_title,
            'meta_keywords'=>$request->meta_keywords,
            'meta_description'=>$request->meta_description,
            'popular'=>$request->popular,
            'updated_at'=>Carbon::now(),
        ]);

        $new_category_image = $request->image;
        $extension =  $new_category_image->getClientOriginalExtension();
        $new_category_name = $category_store.'.'.$extension;

        Image::make($new_category_image)->save(base_path('public/uploads/category/'.$new_category_name));
        Category::find($category_store)->update([
            'image'=>$new_category_name,
        ]);

        return back()->with('status','Category Add Successfully');
    }

    public function view(){
        $categorys = Category::all();
        return view('backend.category.view',compact('categorys'));
    }
}
