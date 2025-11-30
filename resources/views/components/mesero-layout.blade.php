@props(['title' => 'Mesero'])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Restaurant</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <!-- NAVBAR MESERO -->
    <nav class="bg-green-700 text-white px-6 py-3 shadow flex justify-between items-center">
        <h1 class="text-xl font-bold">Área de Mesero</h1>

        <div class="space-x-4">
            <a href="{{ route('mesero.orders.index') }}" class="hover:underline">Mis Órdenes</a>
            <a href="{{ route('mesero.orders.create') }}" class="hover:underline">Nueva Orden</a>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button class="text-red-300 hover:text-red-500">Salir</button>
            </form>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <main class="p-6 max-w-6xl mx-auto">
        {{ $slot }}
    </main>

</body>
</html>
