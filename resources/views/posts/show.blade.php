@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container gap-4 mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{ $post->titulo }}">

            <div class="flex items-center p-2">
                @auth
                    @if ($post->checkLike(auth()->user()))
                        <form action="{{ route('posts.like.destroy', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="red" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('posts.like.store', $post) }}" method="POST">
                        @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endif
                    
                @endauth
                
                <p class="p-2 font-bold">{{ $post->likes->count() }} 
                    <span class="font-normal">Likes</span>
                </p>
            </div>

            <div>
                <p class="font-bold ">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>
            
            @auth
                @if ($post->user_id === auth()->user()->id)
                
            <form action="{{ route('posts.destroy', $post) }}" class="" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" name="" id="" value="Eliminar Publicación" class="p-2 mt-4 font-bold text-white bg-red-500 rounded cursor-pointer hover:bg-red-600">
            </form>
                @endif
            @endauth
            
        </div>
        
        <div class="p-5 md:w-1/2">
            <div class="p-5 mb-5 bg-white shadow">

                @auth
                    
                
                <p class="mb-4 text-xl font-bold text-center"> Agrega un Nuevo Comentario</p>

                @if (session('mensaje'))
                    <div class="p-2 mb-6 font-bold text-center text-white uppercase bg-green-500 rounded-lg">
                        {{session('mensaje')}}
                    </div>
                @endif

                <form action="{{ route('comentarios.store', ['post'=>$post, 'user'=>$user]) }}" method="POST" >
                    @csrf
                    <div class="mb-5">
                        <label for="descripcion" class="block mb-2 font-bold text-gray-500 uppercase">Añade un Comentario</label>
                        
                        <textarea type="text" id="comentario" placeholder="Agrega un Comentario" name="comentario" class="w-full p-3 border          rounded-lg  @error('name') border-red-500 @enderror"> </textarea>
                        @error('comentario')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg white">{{$message}}</p>   
                        @enderror
                    </div>
                    <input type="submit" value="Comentar" class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700">
                </form>
                @endauth

                <div class="mt-10 mb-5 overflow-y-scroll bg-white shadow max-h-96" >
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario )
                            <div class="p-5 border-b border-gray-300">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold ">{{ $comentario->user->username }}</a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No Hay Comentarios Aún</p>
                    @endif
                </div>

                
            </div>
        </div>
    </div>
@endsection