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

    public function update(Request $req){
    try{
        $validator = $req->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
            "order_id" => "required|exists:orders,id"

        ]);

        $order = Order::find($req->order_id);
        if ($order) {
            $order->update(['status' => $req->status]);
            return redirect()->route("admin.orders")->with("success", "Order status updated successfully.");
        }
    }catch(\Exception $e){
            return redirect()->route("admin.orders")->with("error", "Order not found.");
        }
    }


}
