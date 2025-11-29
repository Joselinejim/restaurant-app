<x-admin-layout title="Crear Producto">

    <div class="max-w-2xl mx-auto bg-white shadow p-6 rounded">

        <h2 class="text-2xl font-bold mb-4 text-gray-800">Agregar Nuevo Producto</h2>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="block mb-2 font-semibold">Nombre:</label>
            <input type="text" name="name" required
                   class="w-full border px-3 py-2 rounded shadow-sm mb-4">

            <label class="block mb-2 font-semibold">Precio:</label>
            <input type="number" step="0.01" name="price" required
                   class="w-full border px-3 py-2 rounded shadow-sm mb-4">

            <label class="block mb-2 font-semibold">Categoría:</label>
            <select name="category_id" class="w-full border px-3 py-2 rounded shadow-sm mb-4" required>
                <option value="">Seleccionar...</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>

            <label class="block mb-2 font-semibold">Imagen (opcional):</label>
            <input type="file" name="image"
                   class="w-full border px-3 py-2 rounded shadow-sm mb-6">

            <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Guardar
            </button>
        </form>

    </div>

</x-admin-layout>
