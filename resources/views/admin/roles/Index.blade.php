<x-admin-layout title="Roles">

    <div class="max-w-7xl mx-auto">

        {{-- ENCABEZADO --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Roles</h1>

            <a href="#" 
               class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                + Agregar Rol
            </a>
        </div>

        {{-- BUSCADOR --}}
        <div class="mb-4"> 
            <form method="GET" action="{{ route('admin.roles.index') }}">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Buscar rol..."
                    class="w-full sm:w-1/3 px-4 py-2 border rounded-md focus:ring focus:ring-blue-300"
                >
            </form>
        </div>

        {{-- TABLA --}}
        <div class="bg-white shadow-md rounded-lg p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($roles as $role)
                        <tr>
                            <td class="px-4 py-2">{{ $role->id }}</td>
                            <td class="px-4 py-2">{{ $role->name }}</td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-blue-600 hover:underline">Editar</a>
                                |
                                <a href="#" class="text-red-600 hover:underline">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</x-admin-layout>
