<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Panel Administrador' }} - Admin</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">

    {{-- NAVBAR SUPERIOR --}}
    @include('layouts.admin-navigation')

    <!-- Contenido Principal -->
    <main class="p-6">
        {{ $slot }}
    </main>

</body>
</html>
