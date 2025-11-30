<x-admin-layout title="Nueva Orden">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Crear Nueva Orden</h1>
        <p class="text-gray-500">Indica el número o nombre de la mesa.</p>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('mesero.orders.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Mesa</label>
                <input type="text" name="table" class="w-full border p-2 rounded" required>
            </div>

            <div class="flex justify-end">
                <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    Guardar Orden
                </button>
            </div>
        </form>
    </div>

</x-admin-layout>
