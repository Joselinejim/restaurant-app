<x-admin-layout title="Crear categoría">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Crear nueva categoría</h1>
        <p class="text-gray-500">Completa la información para registrar una nueva categoría</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow max-w-xl mx-auto">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nombre</label>
                <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-gray-300 rounded">Cancelar</a>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Guardar</button>
            </div>
        </form>
    </div>
</x-admin-layout>
