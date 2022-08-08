@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username  }}
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="p-6 bg-white shadow md:w-1/2">
            <form action="{{ route('perfil.store') }}" class="mt-10 md:mt-0" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="block mb-2 font-bold text-gray-500 uppercase">Username</label>
                    <input type="text" id="username" placeholder="Tu Nombre de Usuario" name="username" class="w-full p-3 border rounded-lg @error('username')
                        border-red-500  
                    @enderror" value="{{auth()->user()->username}}">
                    @error('username')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg white">{{$message}}</p>   
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="block mb-2 font-bold text-gray-500 uppercase">Imagen Perfil</label>
                    <input type="file" id="imagen" name="imagen" class="w-full p-3 border rounded-lg" value="" accept=".jpg, .jpeg, .png"/>
                </div>
                <input type="submit" value="Guardar Cambios" class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700">
            </form>
        </div>
    </div>
@endsection