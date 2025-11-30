<?php

namespace App\Http\Controllers\Cocina;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CocinaOrderController extends Controller
{
    public function index()
        {
            $orders = Order::with('items.product', 'user')->get();

            return view('cocina.orders.index', compact('orders'));
        }

        public function updateStatus(Request $request, Order $order)
        {
            $order->update([
                'status' => $request->status
            ]);

            return back()->with('success', 'Estatus actualizado.');
        }

}
