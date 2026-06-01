<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function show()//Este es el nombre declarado en la ruta
    {
        return view('auth.login');//Esto tiene el nombre de la vista que mostrará. Esto es auth/login
    }

    public function process(Request $request)
    {
        //Validar. similar a lo que ya se hizo.
    }

}
