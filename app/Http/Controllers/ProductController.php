<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product;

    public function addProduct()
    {
        return view('admin.product.add-product');
    }
    public function manageProduct()
    {
        return view('admin.product.manage-product',[
            'products' => Product::all()
        ]);
    }
    public  function saveProduct(Request $request)
    {
        Product::saveProduct($request);
        return redirect(route('add.product'))->with('massage','New Product Create');
    }
    public  function productEdit($id)
    {
        $this->product =Product::find($id);

        return view('admin.product.edit-product',['product' => $this->product]);
    }
    public function statusProduct($id)
    {
        Product::statusProduct($id);
        return back();
    }
    public  function updateProduct(Request $request)
    {

        Product::saveProduct($request);
        return redirect(route('manage.product'));

    }
    public function productDelete(Request $request)
    {
        Product::productDeletes($request);
        return redirect(route('manage.product'));
    }
}
