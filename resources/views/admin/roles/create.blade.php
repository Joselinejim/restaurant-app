<x-admin-layout title="Crear Rol">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Crear Nuevo Rol</h1>
        <p class="text-gray-500">Completa la información para registrar un nuevo rol</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow max-w-xl mx-auto">

        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf

            {{-- NOMBRE --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nombre del rol</label>
                <input type="text" name="name"
                       value="{{ old('name') }}"
                       class="w-full border px-3 py-2 rounded shadow-sm"
                       required>
            </div>

            {{-- DESCRIPCIÓN --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Descripción</label>
                <textarea name="description" rows="3"
                          class="w-full border px-3 py-2 rounded shadow-sm">{{ old('description') }}</textarea>
            </div>

            {{-- BOTONES --}}
            <div class="flex justify-end space-x-3">

                <a href="{{ route('admin.roles.index') }}"
                   class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">
                    Cancelar
                </a>

                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition">
                    Guardar
                </button>

            </div>

        </form>

    </div>

</x-admin-layout>
