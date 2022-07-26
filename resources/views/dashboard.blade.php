@extends('layouts.app')

@section('titulo')

    Perfil:{{$user->username}}



@endsection


@section('contenido')

    <div class="flex justify-center">
        <div class="flex flex-col items-center w-full md:w-8/12 lg:w-6/12 md:flex-row">
            <div class="w-8/12 px-5 lg:w-6/12">
                <p><img src="{{
                    $user->imagen ? asset('perfiles'). '/' . $user->imagen : asset('img/usuario.svg')}}
                    " alt="imagen de usuario"></p></div>
                    
            <div class="flex flex-col items-center px-5 py-10 md:w-8/12 lg:w-6/12 md:justify-center md:py-10 md:items-start">
                
                <div class="flex items-center gap-2">    
                    <p class="text-2xl text-gray-700"> {{ $user->username }}</p>
                    @auth
                    @if ($user->id === auth()->user()->id )
                        <a href="{{ route('perfil.index') }}" class="text-gray-500 cursor-pointer hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>
                    @endif
                    @endauth
                    
                </div>
                
                <p class="mt-5 mb-3 text-sm font-bold text-gray-800">{{ $user->followers->count() }}
                <span class="font-normal">@choice('Seguidor|Seguidores', $user->followers->count())</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">{{ $user->followings->count() }}
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class="mb-3 text-sm font-bold text-gray-800">{{ $user->posts->count() }}
                <span class="font-normal">Posts</span>
                </p>

                @auth
                    @if ($user->id !== auth()->user()->id)
                        @if(!$user->siguiendo(auth()->user()))
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                @csrf
                                <input type="submit" class="px-3 py-1 text-xs font-bold text-white uppercase bg-blue-600 rounded-lg cursor-pointer" value="Seguir">
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="px-3 py-1 text-xs font-bold text-white uppercase bg-red-600 rounded-lg cursor-pointer" value="Dejar de Seguir">
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
            
        </div>

    </div>

    <section class="container mx-auto mt-10 ">
        <h2 class="my-10 text-4xl font-black text-center ">Publicaciones</h2>
        <x-listar-post :posts="$posts"/>
    </section>

@endsection