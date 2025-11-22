<x-admin-layout title="Editar Rol">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Editar Rol</h1>
        <p class="text-gray-500">Modifica la información del rol seleccionado</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow max-w-xl mx-auto">

        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- NOMBRE --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nombre del rol</label>
                <input type="text" name="name"
                       value="{{ old('name', $role->name) }}"
                       class="w-full border px-3 py-2 rounded shadow-sm"
                       required>
            </div>

            {{-- DESCRIPCIÓN --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Descripción</label>
                <textarea name="description" rows="3"
                          class="w-full border px-3 py-2 rounded shadow-sm">{{ old('description', $role->description) }}</textarea>
            </div>

            {{-- BOTONES --}}
            <div class="flex justify-end space-x-3">

                <a href="{{ route('admin.roles.index') }}"
                   class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                    Cancelar
                </a>

                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-700 transition">
                    Actualizar
                </button>

            </div>

        </form>

    </div>

</x-admin-layout>
