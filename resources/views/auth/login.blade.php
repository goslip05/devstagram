@extends('layouts.app')

@section('titulo')
    Inicia Sesión en Devstagram
@endsection

@section('contenido')

    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="p-5 md:w-6/12">
            <img src="{{asset('img/login.jpg')}}" alt="imagen de login usuarios">
        </div>
        <div class="p-6 bg-white rounded-lg shadow-xl md:w-4/12">
            <form method="POST" action="{{route('login')}}" novalidate> 
                @csrf
                @if (session('mensaje'))
                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg white">{{session('mensaje')}}</p>
                @endif
                

                
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
              
                <input type="submit" value="Iniciar Sesión" class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700">
            </form>
            
        </div>

    </div>


@endsection