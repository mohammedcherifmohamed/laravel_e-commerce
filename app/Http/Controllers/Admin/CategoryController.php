<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;    
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;

class CategoryController extends Controller
{   
    public function showCategory(){


        $categories = CategoryModel::all();
        return view('admin.Category',compact('categories'));
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
            return redirect()->route('Category')->with('success',"Category Added Successfully");
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
