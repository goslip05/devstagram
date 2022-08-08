<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class Perfilcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        //modificar el request
        $request->request->add(['username'=>Str::slug($request->username)]);

        $this->validate($request, [
            'username'=>['required','unique:users,username,'. auth()->user()->id,'min:3','max:20']
        ]);

        if($request->imagen) {
            
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();//esta funcion crea un id unico para cada imagen
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);
            $imagenPath = public_path('perfiles') . '/'  . $nombreImagen;
            $imagenServidor->save($imagenPath); 
        }

        
        //guardar cambios
        $usuario=User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

    
        //redireccionar al usuario

        return redirect()->route('posts.index', $usuario->username);

    }
}
