<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request){
        $product_id = $request->input('product_id');
        $product_quantity = $request->input('product_quantity');

        if(Auth::check()){
            $product_check = Product::where('id',$product_id)->first();

            if($product_check){

                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){

                    return response()->json(['status'=>$product_check->name.''."Already Added to Cart"]);

                }
                else{
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_quantity = $product_quantity;
                    $cartItem->save();
                    return response()->json(['status'=>$product_check->name. "Added to Cart"]);
                }
            }
        }
        else{
            return response()->json(['status'=>"Login to continue"]);
        }

    }


    public function viewcart(){

        $cartsitem = Cart::where('user_id',Auth::id())->get();
        return view('frontend.Cart',compact('cartsitem'));
    }

    public function destroy(Request $request){

        if(Auth::check()){
            $product_id = $request->input('product_id');
            if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
            {
                $cart_delete = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cart_delete->delete();
                return response()->json(['status'=>"Product Delete Succefully"]);
            }
        }
        else{
            return response()->json(['status'=>"Login to continue"]);
        }
    }
}
