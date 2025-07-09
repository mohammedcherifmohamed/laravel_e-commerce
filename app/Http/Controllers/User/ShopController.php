<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductModel::query()->with('images');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('categories')) {
            $query->whereIn('category_id', $request->categories);
        }

        if ($request->filled('price')) {
            $query->where('price', '<=', $request->price);
        }

        if ($request->filled('rating') && $request->rating > 0) {
            // This assumes a 'rating' column on the products table.
            // If you have a different setup (e.g., average rating from a related table),
            // you might need to adjust this query.
            $query->where('rating', '>=', $request->rating);
        }

        $products = $query->get();
        $categories = \App\Models\CategoryModel::all();

        return view('user.Shop', compact('products', 'categories'));
    }
    
    public function productDetails(Request $req , $id){

        // dd($id) ;

        $product = ProductModel::with('images')->findOrFail($id);
        return view('user.ProductDetails',compact("product"));
    }


}
