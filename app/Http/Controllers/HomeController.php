<?php
namespace App\Http\Controllers;

class HomeController extends Controller//Esta clase no se puede instanciar
{
    public function home()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }

    /* public function movies()
    {
        return movies
    }
     */
}



/*
Clase 2
Aca se crean todos los controladores de las paginas 
*/