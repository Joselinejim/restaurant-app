<x-admin-layout title="Productos">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Gestión de Productos</h1>
        <p class="text-gray-500">Administra los productos del restaurant</p>
    </div>

    <div class="flex flex-wrap justify-between items-center mb-6 gap-3">

        <a href="{{ route('admin.products.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-lg hover:bg-blue-700 transition">
            + Agregar Producto
        </a>

        <input type="text" id="buscar" placeholder="Buscar producto..."
               class="border px-3 py-2 rounded shadow-sm w-64">
    </div>

    <div class="bg-white shadow rounded-lg">

        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700">ID</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700">Nombre</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700">Precio</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700">Categoría</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-center">Acciones</th>
                </tr>
            </thead>

            <tbody id="tablaProductos">
                @foreach ($products as $product)
                <tr class="border-t hover:bg-gray-50 transition">

                    <td class="px-4 py-3">{{ $product->id }}</td>
                    <td class="px-4 py-3 font-semibold">{{ $product->name }}</td>
                    <td class="px-4 py-3">${{ number_format($product->price, 2) }}</td>
                    <td class="px-4 py-3 text-gray-600">
                        {{ $product->category->name ?? 'Sin categoría' }}
                    </td>

                    <td class="px-4 py-3 text-center space-x-2">

                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded shadow hover:bg-yellow-600 transition">
                            Editar
                        </a>

                        <form action="{{ route('admin.products.destroy', $product) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')

                            <button class="px-3 py-1 bg-red-600 text-white rounded shadow hover:bg-red-700 transition"
                                onclick="return confirm('¿Deseas eliminar este producto?')">
                                Eliminar
                            </button>
                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</x-admin-layout>

<script>
document.getElementById("buscar")?.addEventListener("input", function () {
    let filtro = this.value.toLowerCase();
    let filas = document.querySelectorAll("#tablaProductos tr");

    filas.forEach(fila => {
        let texto = fila.innerText.toLowerCase();
        fila.style.display = texto.includes(filtro) ? "" : "none";
    });
});
</script>
