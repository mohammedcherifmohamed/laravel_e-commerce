<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ImageModel;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showproduct(){


        $categories = CategoryModel::all();
        $products = ProductModel::with(['category',"images"])->get();
        return view('admin.Product',compact('categories','products'));
    }

    public function AddProduct(Request $req){

        $req->validate([
            "name" => "required|max:255",
            "description" => "required|max:1000",
            "price" => "required|numeric|min:0",
            "category_id" => "required|integer|exists:category,id",
            "quantity" => "required|integer|min:0",
            "status" => "required|in:in_stock,out_of_stock",
            "images" => "required|",
            "images.*" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $result = ProductModel::create([
            "name" => $req->name,
            "description" => $req->description,
            "price" => $req->price,
            "category_id" => $req->category_id,
            "quantity" => $req->quantity,
            "status" => $req->status,
        ]);
        if($req->hasFile('images')){
            foreach($req->file('images') as $image){
                $filename = time() . "_" . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('products',$filename,"public");
                ImageModel::create([
                    "product_id" => $result->id ,
                    "image_path" => "products/" . $filename ,
                ]);
            }
        }
        if($result)
            return redirect()->back()->with('success', 'Product added successfully');
        
        return    back()->with('error', 'couldnt Add Product ! ');
        

    }

    public function editProduct($id){

        $categories = CategoryModel::all();
        $product = ProductModel::with(['category', 'images'])->findOrFail($id);
        return view('admin.EditProduct', compact('product', 'categories'));
    }

    public function updateProduct(Request $req, $id) {
        $req->validate([
            "name" => "required|max:255",
            "description" => "required|max:1000",
            "price" => "required|numeric|min:0",
            "category_id" => "required|integer|exists:category,id",
            "quantity" => "required|integer|min:0",
            "status" => "required|in:in_stock,out_of_stock",
            "images.*" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $product = ProductModel::findOrFail($id);
        $product->name = $req->name;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->category_id = $req->category_id;
        $product->quantity = $req->quantity;
        $product->status = $req->status;
        $product->save();

        // Handle new images
        if ($req->hasFile('images')) {
            foreach ($req->file('images') as $image) {
                $filename = time() . "_" . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('products', $filename,"public");
                ImageModel::create([
                    "product_id" => $id,
                    "image_path" => "products/" . $filename,
                ]);
            }
        }

        return redirect()->route('showProduct')->with('success', 'Product updated successfully');
    }

    public function deleteProduct($id){

        $product = ProductModel::findorFail($id);
        $result = $product->delete();
        
        if ($result ) {
            return redirect()->back()->with('success', 'Product deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }

    } 
    public function deleteImage($id){

        $image = ImageModel::findorFail($id);
        $result = $image->delete();
        
        if ($result ) {
            return redirect()->back()->with('success', 'Image deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }

    } 
}
