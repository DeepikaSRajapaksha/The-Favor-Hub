<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class UserCartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_column($cart, 'subtotal'));

        return view('User.cart.index', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$request->id])) {
            $cart[$request->id]['quantity']++;
        } else {
            $cart[$request->id] = [
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => 1,
            ];
        }

        // calculate subtotal
        $cart[$request->id]['subtotal'] = $cart[$request->id]['quantity'] * $request->price;

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back();
    }

    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_column($cart, 'subtotal'));

        $order = Order::create([
            'table_number' => 'Online',
            'total' => $total,
            'status' => 'pending'
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['id'],          
                'quantity' => $item['quantity'],   
                'price' => $item['price'],         
            ]);
        }

        session()->forget('cart');

        return redirect()->route('User.order-success.index');
    }

    public function success()
    {
        return view('User.order-success.index');
    }
}
