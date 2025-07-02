<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    

    
    public function index()
    {

        $products = ProductModel::with('images')->get();
        return view('user.Shop', compact('products'));
    }
    
    public function productDetails(Request $req , $id){

        // dd($id) ;

        $product = ProductModel::with('images')->findOrFail($id);
        return view('user.ProductDetails',compact("product"));
    }
}
