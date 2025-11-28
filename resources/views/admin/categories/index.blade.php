<x-admin-layout title="Categorías">
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold">Categorías</h1>
    </div>

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('admin.categories.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700">+ Agregar</a>

        <input type="text" placeholder="Buscar..." class="border px-3 py-2 rounded w-64">
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700">ID</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700">Nombre</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $c)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $c->id }}</td>
                    <td class="px-4 py-3 font-medium">{{ $c->name }}</td>
                    <td class="px-4 py-3 text-center space-x-2">
                        <a href="{{ route('admin.categories.edit', $c) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Editar</a>

                        <form action="{{ route('admin.categories.destroy', $c) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 text-white rounded"
                                    onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
