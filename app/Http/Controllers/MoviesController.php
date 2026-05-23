<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoviesController extends Controller
{
    public function index()
    {
        //Traemos todas las peliculas que tenemos a traves del Query Builder
        $movies = DB::table('movies')->get();
        //dd()=> dump and die; Hace una suerte de var_dump y die.
        //dd($movies);//SE usa para pruebas rapidas de impresion.

        //Necesitamos pasarle las peliculas a la vista.
        //Las variables qeu definimos en el controller "no" estan automaticamente disponible en la vista.
        //Por eso para que la variable exista en la vista 
        return view('movies/index',[
            'movies' => $movies,
        ]);
    }
}
