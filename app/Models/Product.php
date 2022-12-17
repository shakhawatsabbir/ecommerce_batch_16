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
        self::$product = new Product();
        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->category_name =$request->category_name;
        self::$product->brand_name = $request->brand_name;
        self::$product->description =$request->description;
        self::$product->image = self::saveImage($request);
        self::$product->save();
    }
    public static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'upload/image/';
        self::$imgUrl = self::$directory.self::$imageNewName;
        self::$image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }
}
