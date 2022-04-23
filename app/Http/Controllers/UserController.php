<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders_user = Order::where('user_id',Auth::id())->get();
        return view('frontend.Userdashboad',compact('orders_user'));
    }

    public function viewuserorder($id)
    {
        $orders_user_view = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('frontend.vieworderuser',compact('orders_user_view'));
    }
}
