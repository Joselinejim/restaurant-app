<x-admin-layout title="Roles">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Gestión de Roles</h1>
        <p class="text-gray-500">Administra los roles del Restaurant Te-Pathé</p>
    </div>
    
    <div class="flex flex-wrap justify-between items-center mb-6 gap-3">

        <a href="{{ route('admin.roles.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-lg hover:bg-blue-700 transition">
            + Agregar Rol
        </a>


        <!--<input type="text" id="buscar" placeholder="Buscar rol..."
               class="border px-3 py-2 rounded shadow-sm w-64">-->
    </div>
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
    </div>

    <div class="bg-white shadow rounded-lg"> <!-- FIX: sin overflow-hidden -->

        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-left">ID</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-left">Nombre</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-left">Descripción</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700 text-center">Acciones</th>
                </tr>
            </thead>

            <tbody id="tablaRoles">
                @foreach ($roles as $role)
                <tr class="border-t hover:bg-gray-50 transition">

                    <td class="px-4 py-3">{{ $role->id }}</td>
                    <td class="px-4 py-3 font-medium">{{ $role->name }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $role->description }}</td>

                    <td class="px-4 py-3 text-center space-x-2">

                        <a href="{{ route('admin.roles.edit', $role) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded shadow hover:bg-yellow-600 transition">
                            Editar
                        </a>

                        <form action="{{ route('admin.roles.destroy', $role) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')

                            <button class="px-3 py-1 bg-red-600 text-white rounded shadow hover:bg-red-700 transition"
                                    onclick="return confirm('¿Seguro que deseas eliminar este rol?')">
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
