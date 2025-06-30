<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showproduct(){


        // $categories = CategoryModel::all();
        return view('admin.Product');
    }}
