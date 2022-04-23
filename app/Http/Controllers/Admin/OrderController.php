<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::where('status','0')->get();
        return view('backend.Order.index',compact('orders'));
    }

    public function vieworder($id)
    {
        $orders_admin_view = Order::where('id',$id)->first();
        return view('backend.Order.view',compact('orders_admin_view'));
    }

    public function updateuserorder(Request $request,$id)
    {
        $update_order = Order::find($id);
        $update_order->status = $request->input('order_status');
        $update_order->update();
        return back()->with('status','User Order Updated Successfully');
    }

    public function vieworderhistory(){
        $orders_history = Order::where('status','1')->get();
        return view('backend.Order.historyorder',compact('orders_history'));
    }
}
