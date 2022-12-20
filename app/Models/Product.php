<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public static $product, $image, $imageNewName, $directory, $imgUrl;
    use HasFactory;

    public static function saveProduct($request)
    {
        if ($request->product_id)
        {
            self::$product = Product::find($request->product_id);
        }
        else{
            self::$product = new Product();
        }
        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->category_name =$request->category_name;
        self::$product->brand_name = $request->brand_name;
        self::$product->description =$request->description;
        if ($request->image)
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$product->image = self::saveImage($request);
        }

        self::$product->save();
    }

    public static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'adminAssets/product-image/';
        self::$imgUrl = self::$directory.self::$imageNewName;
        self::$image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }

    public static function statusProduct($id)
    {
        self::$product = Product::find($id);

        if (self::$product->status == 1) {
            self::$product->status = 0;

        } else {
            self::$product->status = 1;
        }
        self::$product->save();
    }

    public static function productDeletes($request)
    {
        self::$product = Product::find($request->product_id);
        if (self::$product->image)
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
        }
        self::$product->delete();


    }
}
