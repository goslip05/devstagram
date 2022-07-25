<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <title>Devstagram - @yield('titulo')</title>
        <script src="{{ asset('js/app.js') }}"></script>
        
        {{-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/> --}}
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        
    </head>
    <body class="bg-gray-100">
        <header class="p-5 bg-white border-b shadow">
            
            <div class="container flex items-center justify-between mx-auto">
                <h1 class="text-3xl font-black">
                    Devstagram
                </h1>

                {{-- metodo para verificar si el usuario esta autenticado
                @if (auth()->user())
                    <p>Autenticado</p>
                @else
                    <p>No autenticado</p>
                @endif --}}
                
                {{--otro metodo para verificar si el usuario esta autenticado--}}

                @auth
                    <nav class="flex items-center gap-2" >

                        <a href="{{ route('posts.create') }}" class="flex items-center gap-2 p-2 text-sm font-bold text-gray-600 uppercase bg-white border rounded cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                            Crear</a>
                        
                        <a class="text-sm font-bold text-gray-600" href="{{ route('posts.index', auth()->user()->username) }}">
                            Hola <span class="font-normal">{{auth()->user()->username}}</span></a>
                            
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                        <button type="submit" class="text-sm font-bold text-gray-600 uppercase" >Cerrar Sesión</button>
                        </form>
                    </nav>
                @endauth

                @guest
                    <nav class="flex items-center gap-2" >
                        <a class="text-sm font-bold text-gray-600 uppercase" href="#">Login</a>
                        <a class="text-sm font-bold text-gray-600 uppercase" href="{{route('register')}}">Crear Cuenta</a>
                    </nav>
                @endguest



                
                
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
