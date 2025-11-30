<x-admin-layout title="Orden #{{ $order->id }}">

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Mesa: {{ $order->table }}</h1>
        <p class="text-gray-600">Estatus: <span class="font-semibold capitalize">{{ $order->status }}</span></p>
    </div>

    {{-- FORM PARA AGREGAR PRODUCTOS --}}
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <h2 class="text-xl font-semibold mb-4">Agregar Producto</h2>

        <form action="{{ route('mesero.orders.addItem', $order) }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 font-semibold">Producto</label>
                    <select name="product_id" class="w-full border p-2 rounded" required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->name }} - ${{ $product->price }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Cantidad</label>
                    <input type="number" name="quantity" min="1" value="1"
                           class="w-full border p-2 rounded" required>
                </div>
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Agregar
            </button>
        </form>
    </div>

    {{-- LISTA DE ITEMS --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Productos en la Orden</h2>

        @if ($order->items->isEmpty())
            <p class="text-gray-500">Aún no hay productos en esta orden.</p>
        @else
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Producto</th>
                        <th class="p-3 text-left">Cantidad</th>
                        <th class="p-3 text-left">Precio</th>
                        <th class="p-3 text-left">Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($order->items as $item)
                        <tr class="border-t">
                            <td class="p-3">{{ $item->product->name }}</td>
                            <td class="p-3">{{ $item->quantity }}</td>
                            <td class="p-3">${{ $item->price }}</td>
                            <td class="p-3">${{ $item->price * $item->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</x-admin-layout>
