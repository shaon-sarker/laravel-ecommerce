<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_order_item = Cart::where('user_id',Auth::id())->get();
        foreach($old_order_item as $itemcart)
        {
            if(!Product::where('id',$itemcart->product_id)->where('quantity','>=',$itemcart->product_quantity)->exists())
            {
                $remove_item = Cart::where('user_id',Auth::id())->where('product_id',$itemcart->product_id)->first();
                $remove_item->delete();
            }
        }
        $order_item = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('order_item'));

    }
}
