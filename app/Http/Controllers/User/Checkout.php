<?php


namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Checkout extends Controller
{

   public function Showcheckout() {
    $cart = session('cart', []);
    return view('user.Checkout', compact('cart'));
}
    
    
    public function checkoutsubmit(Request $req){
        // Handle AJAX checkout here
     dd($req->all());
        return response()->json(['success' => true, 'data' => $req->all()]);
    }

    // Show the checkout form
    public function showCheckoutForm()
    {
        $cart = session('cart', []); 
        $total = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        return view('user.Auth.Checkout', compact('cart', 'total'));
    }


    // Process the checkout
   public function processCheckout(Request $request){

    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email',
        'cart' => 'required|array',
    ]);

    $cart = $request->cart;

    if (empty($cart)) {
        return response()->json(['success' => false, 'message' => 'Cart is empty.']);
    }
    // check if user is authenticated
    if (!Auth::check()) {
        return response()->json(['success' => false, 'message' => 'User not authenticated.'], 401);
    }

    DB::beginTransaction();

    try {
        $order = Order::create([
            'user_id' => Auth::id(),
            'address' => $request->address,
            'total' => array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cart)),
            'status' => 'pending',
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        DB::commit();

        // Send Email 

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully.',
            'order_id' => $order->id
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'success' => false,
            'message' => 'Checkout failed.',
            'error' => $e->getMessage()
        ]);
    }
}

    // Show order confirmation
    public function confirmation($orderId)
    {
        $order = Order::with('items.product')->findOrFail($orderId);
        return view('user.Auth.Confirmation', compact('order'));
    }

}