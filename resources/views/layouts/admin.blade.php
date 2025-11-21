{{-- Usa el layout principal de Breeze --}}
<x-app-layout>
    
    {{-- Encabezado con título dinámico --}}
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <img src="/img/logo.png" class="w-16 h-16">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $title ?? 'Admin' }}
            </h2>
        </div>
    </x-slot>

    {{-- Contenido principal --}}
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Menú Admin (como Breeze) --}}
            <div class="mb-6 border-b pb-3 flex space-x-8 text-lg">
                <a href="{{ route('admin.dashboard') }}"
                   class="{{ request()->routeIs('admin.dashboard') ? 'border-b-2 border-blue-500' : '' }}">
                   Dashboard
                </a>

                <a href="{{ route('admin.products.index') }}"
                   class="{{ request()->routeIs('admin.products.*') ? 'border-b-2 border-blue-500' : '' }}">
                   Productos
                </a>

                <a href="{{ route('admin.categories.index') }}"
                   class="{{ request()->routeIs('admin.categories.*') ? 'border-b-2 border-blue-500' : '' }}">
                   Categorías
                </a>

                <a href="{{ route('admin.users.index') }}"
                   class="{{ request()->routeIs('admin.users.*') ? 'border-b-2 border-blue-500' : '' }}">
                   Usuarios
                </a>
            </div>

            {{-- Aquí va el contenido de cada vista --}}
            {{ $slot }}

        </div>
    </div>
</x-app-layout>
