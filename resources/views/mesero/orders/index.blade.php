<x-admin-layout title="Mis Órdenes">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Órdenes del Mesero</h1>
        <p class="text-gray-500">Solo puedes ver tus propias órdenes.</p>
    </div>

    <div class="flex justify-end mb-4">
        <a href="{{ route('mesero.orders.create') }}"
           class="px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-700 transition">
            + Nueva Orden
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Mesa</th>
                    <th class="p-3 text-left">Estatus</th>
                    <th class="p-3 text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($orders as $order)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3">{{ $order->id }}</td>
                        <td class="p-3">{{ $order->table }}</td>
                        <td class="p-3 capitalize">{{ $order->status }}</td>

                        <td class="p-3 text-center">
                            <a href="{{ route('mesero.orders.show', $order) }}"
                               class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                Ver
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-3 text-center text-gray-500">
                            Aún no tienes órdenes registradas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-admin-layout>
