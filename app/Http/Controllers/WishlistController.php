<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlist_item = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',compact('wishlist_item'));
    }

    public function add(Request $request)
    {
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
            if(Product::find($product_id))
            {
                Wishlist::insert([
                    'product_id'=>$product_id,
                    'user_id'=>Auth::id(),
                    'created_at'=>Carbon::now(),
                ]);
            return response()->json(['status'=>"Added to Wishlist"]);

            }
            else
            {
                return response()->json(['status'=>"Product doesnot exit"]);

            }
        }
        else{
            return response()->json(['status'=>"Login to continue"]);
        }
    }

    public function destroy(Request $request)
    {
        if(Auth::check()){
            $product_id = $request->input('product_id');
            if(Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
            {
                $wishlist_delete = Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $wishlist_delete->delete();
                return response()->json(['status'=>"Product Delete Succefully"]);
            }
        }
        else{
            return response()->json(['status'=>"Login to continue"]);
        }
    }
}
