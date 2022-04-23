<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // $old_order_item = Cart::where('user_id',Auth::id())->get();
        // foreach($old_order_item as $itemcart)
        // {
        //     if(!Product::where('id',$itemcart->product_id)->where('quantity','>=',$itemcart->product_quantity)->exists())
        //     {
        //         $remove_item = Cart::where('user_id',Auth::id())->where('product_id',$itemcart->product_id)->first();
        //         $remove_item->delete();
        //     }
        // }
        $order_item = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('order_item'));

    }

    public function placeorder(Request $request)
    {
        // Order::insert([
        //     'fname'=>$request->fname,
        //     'lname'=>$request->lname,
        //     'email'=>$request->email,
        //     'phone'=>$request->phone,
        //     'address01'=>$request->address01,
        //     'address02'=>$request->address02,
        //     'country'=>$request->country,
        //     'state'=>$request->state,
        //     'city'=>$request->city,
        //     'pincode'=>$request->pincode,
        //     'comment'=>$request->comment,
        //     'comment'=>$request->comment,
        //     'tracking_no'=>$request->tracking_no("shaon".rand(1111,9999)),
        // ]);


        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address01 = $request->input('address01');
        $order->address02 = $request->input('address02');
        $order->country = $request->input('country');
        $order->state = $request->input('state');
        $order->city = $request->input('city');
        $order->pincode = $request->input('pincode');
        $order->comment = $request->input('comment');

        //To Calulate Total Price
        $total = 0;
        $cartitems_total = Cart::where('user_id',Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $total += $prod->rtn_product->selling_price;
        }

        $order->total_price = $total;
          //To Calulate Total Price end

        $order->tracking_no = "shaon".rand(1111,9999);
        $order->save();


        $order_item = Cart::where('user_id',Auth::id())->get();
        foreach($order_item as $item)
        {
            Orderitem::insert([
                'order_id'=>$order->id,
                'product_id'=>$item->product_id,
                'quantity'=>$item->product_quantity,
                'price'=>$item->rtn_product->selling_price,
                'created_at'=>Carbon::now(),
            ]);
            if($order_item){
                Cart::where('user_id',Auth::id())->delete();
            }
            else{
                return back();
            }

            Product::find($item->product_id)->decrement('quantity', $item->product_quantity);
        }

        if(Auth::user()->address01 == NULL)
        {
            $user = User::where('id',Auth::id())->first();
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address01 = $request->input('address01');
            $user->address02 = $request->input('address02');
            $user->country = $request->input('country');
            $user->state = $request->input('state');
            $user->city = $request->input('city');
            $user->pincode = $request->input('pincode');
            $user->comment = $request->input('comment');
            $user->update();
        }

        return back()->with('status',"Successfully Placed Order");

    }
}
