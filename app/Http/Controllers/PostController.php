<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth'); //ojo va auth entre comillas sencillas , no la funcion 
    }


    public function index()
    {
        return view('dashboard');

    }
}
