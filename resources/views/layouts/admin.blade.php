<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Panel de Control') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @laravelPWA
    </head>
    <body>
        <div class="grid grid-rows-7 grid-cols-5 h-screen">
            <div class="bg-pink-600 row-span-1 col-span-5 grid grid-cols-5 place-items-center">
                <img src="/images/mokalogo.png" alt="" class="col-span-1 w-5/6">
                {{-- <h2 class="col-start-4 col-span-2 text-neutral-50 font-extrabold text-5xl font-sans">Panel de Administracion</h2>      --}}
            </div>

            <div class="bg-neutral-50 row-span-6 col-span-1 border-r-2 border-neutral-200 flex flex-col items-center">
                <x-nav-item titulo="Productos"/>
                <x-nav-item titulo="Usuarios"/>
                <x-nav-item titulo="Reservas"/>
                <x-nav-item titulo="Órdenes"/>
                <x-nav-item titulo="Estadísticas"/>
            </div>

            <div class="bg-neutral-50 row-span-6 col-span-4">
                {{ $slot }}
            </div>    
            </div>
    </body>
</html>
