<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;    
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Http\Controllers\Admin\ProductController;

class CategoryController extends Controller
{   
    public function showCategory(){


        $categories = CategoryModel::all();
        $products_nbr = [];
        foreach ($categories as $category) {
            $products_nbr[$category->id] = $category->products()->count();
        }

        return view('admin.Category',compact('categories','products_nbr'));
    }
    
    public function StoreCategory(Request $req){

        $req->validate([
            "name" => "required|max:255",
            "description" => "required|max:255",

        ]);

        $result = CategoryModel::create([
            "name" => $req->name,
            "description" => $req->description,
            "icon" => $req->icon,
            "status" => $req->status,
        ]) ;
        if($result){
            return redirect()->route('admin.Category')->with('success',"Category Added Successfully");
        }else{
            return back()->with('Error',"Category Faild To Add")->withInput();
        }

        return view('admin.Category');
    }

    public function showEdit(Request $req , $id){

        $category = CategoryModel::findOrFail($id) ;
        // dd($category);
        return view('admin.EditCategory',compact('category'));
    }

    public function editPost(Request $req , $id){

        $req->validate([
            "name" => "required|max:255",
            "description" => "required|max:255",
        ]);

        $category = CategoryModel::findOrFail($id);
        $category->name = $req->name ;
        $category->description = $req->description ;
        $category->icon = $req->icon ;
        $category->status = $req->status ;

        $result = $category->save() ;
        if($result){
            return redirect()->route('Category')->with('success',"Category Updated");
        }else{
            return back()->with('error',"Category Faild to Update");
        }


    }

    public function delete(Request $req , $id){

        $category = CategoryModel::findOrFail($id) ;
        $result = $category->delete();

        if($result){
            return redirect()->back()->with('success', 'Category deleted successfully!');
        }else{
            return redirect()->back()->with('error', 'Couldnt deleted Cqtegory');

        }
    }
}
