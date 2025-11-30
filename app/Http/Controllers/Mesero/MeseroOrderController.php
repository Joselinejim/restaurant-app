<?php

namespace App\Http\Controllers\Mesero;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class MeseroOrderController extends Controller
{
    public function index()
    {
        // SOLO ÓRDENES DEL MESERO LOGEADO
        $orders = Order::where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->get();

        return view('mesero.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('mesero.orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'table' => 'required|string|max:255'
        ]);

        // SE CREA LA ORDEN ASIGNADA AL MESERO
        $order = Order::create([
            'table' => $request->table,
            'status' => 'pendiente',
            'user_id' => auth()->id(), // mesero que la creó
        ]);

        return redirect()->route('mesero.orders.show', $order);
    }

    public function show(Order $order)
    {
        // Validación de seguridad:
        if ($order->user_id !== auth()->id()) {
            abort(403, 'No puedes ver órdenes de otro mesero.');
        }

        $products = Product::orderBy('name')->get();

        return view('mesero.orders.show', compact('order', 'products'));
    }

    public function addItem(Request $request, Order $order)
    {
        // Seguridad: solo puede agregar a su propia orden
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        // Agregar item a order_items
        $order->items()->create([
            'product_id' => $product->id,
            'price'      => $product->price,
            'quantity'   => $request->quantity
        ]);

        return redirect()->route('mesero.orders.show', $order)
            ->with('success', 'Producto agregado a la orden.');
    }
}
