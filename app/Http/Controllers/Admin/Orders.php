<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;


class Orders extends Controller
{

    public function index(){
        $orders = Order::with('user')->paginate(50);
        return view("admin.Orders",compact('orders'));
    }

}
