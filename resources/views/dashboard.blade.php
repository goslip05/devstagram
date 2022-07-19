@extends('layouts.app')

@section('titulo')

    Tu Cuenta



@endsection


@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="px-5 md:w-8/12 lg:w-6/12"><p><img src="{{ asset('img/usuario.svg') }}" alt="imagen de usuario"></p></div>
            <div class="px-5 md:w-8/12 lg:w-6/12"><p class="text-2xl text-bg-gray-700">{{auth()->user()->username}}</p></div>
            
        </div>

    </div>

@endsection