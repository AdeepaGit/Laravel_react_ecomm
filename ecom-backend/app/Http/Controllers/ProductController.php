<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    function addProduct(Request $req)
    {
    /* *return 1req->file('file')->store('products');*/
    $products= new Product;
    $products->name=$req->input('name');
    $products->price=$req->input('price');
    $products->description=$req->input('description');
    $products->file_path=$req->file('file')->store('products');
    $products->save();

    return $products;
    }

    function list()
    {
        return Product::all();
    }

    function delete($id)
    {
        $result = Product::where('id',$id)->delete();
        if($result)
        {
            return ["result"=>"product has been deleted"];
        }
        else
        {
            return ["result"=>"Oparation failed"];
        }
    }
}
