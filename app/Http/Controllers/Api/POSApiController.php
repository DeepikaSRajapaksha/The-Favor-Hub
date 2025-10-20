<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class POSApiController extends Controller
{
    // Get all menu items
    public function getMenu()
    {
        $menu = Menu::select('id', 'name', 'price', 'image', 'description')->get();

        return response()->json([
            'status' => true,
            'message' => 'Menu items loaded successfully',
            'data' => $menu
        ]);
    }

    // Create a new order
    public function createOrder(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array|min:1',
            'items.*.menu_id' => 'required|exists:menus,id',
            'items.*.quantity' => 'required|integer|min:1',
            'payment_method' => 'nullable|string',
        ]);

        $total = 0;

        foreach ($validated['items'] as $item) {
            $menu = Menu::find($item['menu_id']);
            $total += $menu->price * $item['quantity'];
        }

        $order = Order::create([
            'total' => $total,
            'status' => 'Paid',
            'payment_method' => $validated['payment_method'] ?? 'Cash',
        ]);

        foreach ($validated['items'] as $item) {
            $menu = Menu::find($item['menu_id']);
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $menu->id,
                'quantity' => $item['quantity'],
                'price' => $menu->price
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Order created successfully',
            'order_id' => $order->id,
            'total' => $total
        ]);
    }

    // Get all orders
    public function getOrders()
    {
        $orders = Order::with('items.menu:id,name,price,image')
            ->orderByDesc('id')
            ->get();

        return response()->json([
            'status' => true,
            'data' => $orders
        ]);
    }

    // Get single order by ID
    public function getOrder($id)
    {
        $order = Order::with('items.menu:id,name,price,image')->find($id);

        if (!$order) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $order
        ]);
    }
}
