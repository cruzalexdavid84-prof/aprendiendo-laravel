<?php

namespace App\Http\Controllers;

use App\Models\Movie;//Se agrega este "Modelo" para usar esto.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoviesController extends Controller
{
    public function index()
    {
        //Traemos todas las peliculas que tenemos a traves del Query Builder
        //$movies = DB::table('movies')->get();//Se adaptara esto con ELOQUENT. Esta linea era por QUERY BUILDER????//
        $movies = Movie::all();//Esto es ELOQUENT. EL metodo all() retorna una collection que tiene todos los registros de la tabla
        //
        
        //dd()=> dump and die; Hace una suerte de var_dump y die.
        //dd($movies);//SE usa para pruebas rapidas de impresion.

        //Necesitamos pasarle las peliculas a la vista.
        //Las variables qeu definimos en el controller "no" estan automaticamente disponible en la vista.
        //Por eso para que la variable exista en la vista 
        return view('movies/index',[
            'movies' => $movies,
        ]);
    }

    public function show(int $id)
    {
        $movie = Movie::findOrFail($id);
        //dd($movie);
        //echo $id;
        //die;
        return view('movies.show',[//escribir movies/show = movies.show
            'movie' => $movie,
        ]);
    }

    public function create()
    {
        return view('movies.create');
    }

}
