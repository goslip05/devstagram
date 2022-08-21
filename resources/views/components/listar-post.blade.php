<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    @if($posts->count())

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($posts as $post)
        <div>
            <a href="{{ route('posts.show', ['post'=>$post, 'user'=>$post->user]) }}">
                <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post" {{$post->titulo}}>
            </a>
        </div>
    @endforeach
        </div>

        <div class="my-10">
        {{$posts->links()}}
        </div>


    @else
        <p class="text-center">No hay Posts, Sigue a alguien para poder ver sus Publicaciones</p>
    @endif
    </div>

