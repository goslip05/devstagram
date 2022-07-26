@extends('layouts.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')

    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="p-5 md:w-6/12">
            <img src="{{asset('img/registrar.jpg')}}" alt="imagen de registro usuarios">
        </div>
        <div class="p-6 bg-white rounded-lg shadow-xl md:w-4/12">
            <form action="{{route('register')}}" method="POST" novalidate> 
                @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-bold text-gray-500 uppercase">Nombre</label>
                    <input type="text" id="name" placeholder="Tu Nombre" name="name" class="w-full p-3 border rounded-lg @error('name')
                        border-red-500  
                    @enderror" value="{{old('name')}}">
                    @error('name')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg white">{{$message}}</p>   
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="Username" class="block mb-2 font-bold text-gray-500 uppercase">Username</label>
                    <input type="text" id="Username" placeholder="Tu Nombre de usuario" name="username" class="w-full p-3 border rounded-lg @error('username')
                    border-red-500  
                @enderror" value="{{old('Username')}}">
                    @error('username')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg white">{{$message}}</p>   
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 font-bold text-gray-500 uppercase">Email</label>
                    <input type="email" id="email" placeholder="Tu email de registro" name="email" class="w-full p-3 border rounded-lg @error('email')
                    border-red-500  
                    @enderror" value="{{old('email')}}">
                    @error('email')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg white">{{$message}}</p>   
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 font-bold text-gray-500 uppercase">Password</label>
                    <input type="password" id="password" placeholder="Tu password" name="password" class="w-full p-3 border rounded-lg @error('password')
                    border-red-500  
                @enderror">
                    @error('password')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg white">{{$message}}</p>   
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="block mb-2 font-bold text-gray-500 uppercase"> Repetir Password</label>
                    <input type="password" id="password_confirmation" placeholder="Repite tu password" name="password_confirmation" class="w-full p-3 border rounded-lg">
                </div>
                <input type="submit" value="Crear Cuenta" class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700">
            </form>
            
        </div>

    </div>


@endsection