<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        $order = $request->user()->orders()->create([
            'product' => $request->product,
            'quantity' => $request->quantity,
        ]);

        return response()->json(['order' => $order], 201);
    }

    public function index(Request $request)
    {
        // Obtener todas las órdenes del usuario autenticado
        $orders = $request->user()->orders;

        // Retornar la respuesta en formato JSON
        return response()->json(['orders' => $orders], 200);
    }
}
