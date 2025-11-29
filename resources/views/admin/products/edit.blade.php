<x-admin-layout title="Editar Producto">

    <div class="max-w-2xl mx-auto bg-white shadow p-6 rounded">

        <h2 class="text-2xl font-bold mb-4 text-gray-800">Editar Producto</h2>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block mb-2 font-semibold">Nombre:</label>
            <input type="text" name="name" required
                   value="{{ $product->name }}"
                   class="w-full border px-3 py-2 rounded shadow-sm mb-4">

            <label class="block mb-2 font-semibold">Precio:</label>
            <input type="number" step="0.01" name="price" required
                   value="{{ $product->price }}"
                   class="w-full border px-3 py-2 rounded shadow-sm mb-4">

            <label class="block mb-2 font-semibold">Categoría:</label>
            <select name="category_id" class="w-full border px-3 py-2 rounded shadow-sm mb-4" required>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <label class="block mb-2 font-semibold">Imagen actual:</label>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="h-32 rounded mb-4">
            @else
                <p class="text-gray-500 mb-4">No hay imagen</p>
            @endif

            <label class="block mb-2 font-semibold">Nueva imagen (opcional):</label>
            <input type="file" name="image"
                   class="w-full border px-3 py-2 rounded shadow-sm mb-6">

            <button class="w-full bg-yellow-600 text-white py-2 rounded hover:bg-yellow-700">
                Actualizar
            </button>
        </form>

    </div>

</x-admin-layout>
