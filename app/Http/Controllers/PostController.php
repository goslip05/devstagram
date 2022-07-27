<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth'); //ojo va auth entre comillas sencillas , no la funcion 
    }


    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->get();

        return view('dashboard', [
            'user'=> $user,
            'posts'=>$posts
        ]);

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descripcion'=> 'required',
            'imagen'=> 'required'
        ]);

       /*  Post::create([
            'titulo'=> $request-> titulo,
            'descripcion'=>$request->descripcion,
            'imagen'=> $request->imagen,
            'user_id'=>auth()->user()->id
        ]); */


        //otra forma de crear registros


        /* $post = new Post;

        $post->titulo= $request-> titulo;
        $post->descripcion= $request-> descripcion;
        $post->imagen= $request->imagen;
        $post->user_id= auth()->user()->id;
        $post->save(); */



        //almacerna informacion utilizando las relaciones

        $request->user()->posts()->create([
            'titulo'=> $request-> titulo,
            'descripcion'=>$request->descripcion,
            'imagen'=> $request->imagen,
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
