<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $featured_product = Product::where('tranding','tranding')->limit(2)->get();
        return view('frontend.index',compact('featured_product'));
    }
}
