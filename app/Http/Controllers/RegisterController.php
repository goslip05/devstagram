<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    } 

    public function store(Request $request)
    {

        //dd($request);
        //dd($request->get('name'));


        //modifircar el request para evitar datos repetidos se reescribe el el reeques y se pone en el create

        //$request->request->add(['username'=>Str::slug($request->username),])

        //validacion:

        $this->validate($request,[
            'name'=>'required|min:5',
            'username'=>'required|unique:users|min:3|max:20',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:6'
        ]);

        User::create([
            'name'=>$request->name,
            'username'=> Str::slug($request->username),
            'email'=>$request->email,
            'password'=> Hash::make( $request->password)
        ]);

        //Autenticar a un asuario

        /* auth()->attempt([
            'email'=> $request->email,
            'password'=> $request->password
        ]);  */

        //otra forma de autenticar

        auth()->attempt($request->only('email', 'password'));



        //redireccionar al usuario
        return redirect()->route('posts.index');
    }
}
