<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index()
    {
        return view('frontEnd.home.home',[
            'products'=>Product::where('status', 1)->orderBy('id','desc')->take(5)->get()
        ]);
    }
    public  function shopProduct()
    {
        return view('frontEnd.shop.shop');
    }
    public function singleProduct($id)
    {
        return view('frontEnd.shop.single-product',[
            'product'=>Product::find($id)
        ]);
    }
}
