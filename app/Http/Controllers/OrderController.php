<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);
    
        // Crear la orden
        $order = $request->user()->orders()->create();
    
        // Adjuntar los productos con sus cantidades a la orden
        foreach ($request->products as $productData) {
            $order->products()->attach($productData['id'], ['quantity' => $productData['quantity']]);
        }
    
        return response()->json(['order' => $order->load('products')], 201);
    }
    
    public function index(Request $request)
    {
        $orders = $request->user()->orders()->with('products')->get();
        return response()->json(['orders' => $orders], 200);
    }

    public function show($id, Request $request)
    {


        $order = $request->user()->orders()->with('products')->where('id', $id)->first();
        if (!$order) {
            return response()->json(['error' => 'Orden no encontrada'], 404);
        }
        return response()->json(['order' => $order], 200);
    }
}
