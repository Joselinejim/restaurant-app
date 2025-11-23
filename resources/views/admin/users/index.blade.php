<x-admin-layout title="Usuarios">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Gestión de Usuarios</h1>
        <p class="text-gray-500">Administra los usuarios del sistema</p>
    </div>

    <div class="flex flex-wrap justify-between items-center mb-6 gap-3">

        <a href="{{ route('admin.users.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-lg hover:bg-blue-700 transition">
            + Agregar Usuario
        </a>

        <input type="text" id="buscar" placeholder="Buscar usuario..."
               class="border px-3 py-2 rounded shadow-sm w-64">
    </div>

    <div class="bg-white shadow rounded-lg">

        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700">ID</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700">Nombre</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700">Apellido</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700">Email</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-700">Rol</th>
                    <th class="px-4 py-3 text-sm font-semibold text-center text-gray-700">Acciones</th>
                </tr>
            </thead>

            <tbody id="tablaUsers">
                @foreach ($users as $user)
                <tr class="border-t hover:bg-gray-50 transition">

                    <td class="px-4 py-3">{{ $user->id }}</td>
                    <td class="px-4 py-3 font-medium">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->lastname }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3">
                        {{ $user->roles->pluck('name')->implode(', ') }}
                    </td>

                    <td class="px-4 py-3 text-center space-x-2">

                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded shadow hover:bg-yellow-600 transition">
                            Editar
                        </a>

                        <form action="{{ route('admin.users.destroy', $user) }}"
                              method="POST" class="inline">
                            @csrf @method('DELETE')

                            <button class="px-3 py-1 bg-red-600 text-white rounded shadow hover:bg-red-700 transition"
                                    onclick="return confirm('¿Eliminar usuario?')">
                                Eliminar
                            </button>
                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-admin-layout>
<script>
document.getElementById("buscar")?.addEventListener("input", function () {
    let filtro = this.value.toLowerCase();
    let filas = document.querySelectorAll("#tablaUsers tr");

    filas.forEach(fila => {
        let texto = fila.innerText.toLowerCase();
        fila.style.display = texto.includes(filtro) ? "" : "none";
    });
});
</script>
