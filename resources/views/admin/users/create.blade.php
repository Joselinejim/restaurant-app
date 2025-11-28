<x-admin-layout title="Crear Usuario">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Crear Usuario</h1>
        <p class="text-gray-500">Agrega un nuevo usuario al sistema</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow max-w-xl mx-auto">

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            {{-- NOMBRE --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nombre</label>
                <input type="text" name="name"
                       value="{{ old('name') }}"
                       class="w-full border px-3 py-2 rounded shadow-sm"
                       required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- APELLIDOS --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Apellidos</label>
                <input type="text" name="lastname"
                       value="{{ old('lastname') }}"
                       class="w-full border px-3 py-2 rounded shadow-sm"
                       required>
                @error('lastname')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Correo electrónico</label>
                <input type="email" name="email"
                       value="{{ old('email') }}"
                       class="w-full border px-3 py-2 rounded shadow-sm"
                       required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- ROL --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Rol</label>

                <select name="role" class="w-full border px-3 py-2 rounded shadow-sm" required>
                    <option value="">Selecciona un rol</option>

                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                    @endforeach

                </select>

                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- BOTONES --}}
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('admin.users.index') }}"
                   class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
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
