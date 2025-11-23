<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Panel Administrador' }} - Admin</title>

    <link rel="icon" href="/img/logo2.png" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">

    {{-- NAVBAR --}}
    @include('layouts.admin-navigation')

    {{-- ENCABEZADO DEL DASHBOARD (opcional) --}}
    @isset($header)
        <header class="bg-white shadow p-4 mb-6">
            <div class="max-w-7xl mx-auto">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="p-6">
        {{ $slot }}
    </main>

</body>
</html>
