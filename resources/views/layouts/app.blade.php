<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}>
        <title>Devstagram - @yield('titulo')</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        @vite('resources/css/app.css')
        
    </head>
    <body class="bg-gray-100">
        <header class="p-5 bg-white border-b shadow">
            
            <div class="container flex items-center justify-between mx-auto">
                <h1 class="text-3xl font-black">
                    Devstagram
                </h1>
                <nav class="flex items-center gap-2" >
                    <a class="text-sm font-bold text-gray-600 uppercase" href="#">Login</a>
                    <a class="text-sm font-bold text-gray-600 uppercase" href="/crear-cuenta">Crear Cuenta</a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">  
            <h2 class="mb-10 text-3xl font-black text-center">
                @yield('titulo')
            </h2>
            @yield('contenido') 
        </main> 

        <footer class="mt-10 font-bold text-center text-gray-500 uppercase ">
            Devstagram - Todos los derechos reservados 
            {{now()->year}}
        </footer>
    
    
    
    </body>
</html>
