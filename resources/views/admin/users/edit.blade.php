<x-admin-layout title="Editar Usuario">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Editar Usuario</h1>
        <p class="text-gray-500">Actualiza los datos del usuario</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow max-w-xl mx-auto">

        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- NOMBRE --}}
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nombre</label>
                <input type="text" name="name"
                       value="{{ old('name', $user->name) }}"
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
                       value="{{ old('lastname', $user->lastname) }}"
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
                       value="{{ old('email', $user->email) }}"
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
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}"
                            {{ $user->roles->first()?->name === $role->name ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
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
                        class="px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-700 transition">
                    Actualizar
                </button>
            </div>

        </form>

    </div>

</x-admin-layout>
