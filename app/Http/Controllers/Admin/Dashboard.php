<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;    
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductModel as Product;
use App\Models\User;


class Dashboard extends Controller
{   
    public function index(){

    // load Total Sales
    $totalSales = Order::where('status','delivered')->sum('total');

    // load Total products
    $totalProducts = Product::count();
    // load Total orders
    $totalOrders = Order::count();    
    // load Total Users
    $usersCount = User::count();

    // load Recent Orders
     $recentOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard',compact("usersCount","recentOrders","totalOrders","totalProducts","totalSales"));
    }
}
