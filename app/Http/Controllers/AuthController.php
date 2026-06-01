<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//Esto es la fachada de Auth

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
        $request->validate([
            //Usando nomenclatura de array
            'email'=> ['required','email'],
            'password'=> ['required','min:8'],
        ],[//Esta parte es opcional, aca se personaliza los mensjes que ve el usuario
            'email.required' => 'El email no puede estar vacio',
            'email.email'=> 'El email debe tener "@" y el dominio',
            'password.required' => "El password no puede estar vacio",
            'password.min' => "El password no puede tener menos de :min caracteres",//Si te equivocas aca no tira error, no dice que no lo reconoce
        
        ]);
        $credentials = $request->only('email','password');//Variable donde va la info.
        if(Auth::attempt($credentials)===false){
            //tiramos algun error
            return redirect()
                ->route('login.show')
                ->withInput()//agrega una variable flash en la sesion de datos del form. Permite usar la funcion "old()"
                ->with('feedback.message','Las credenciales ingresadas no coinciden con nuestros registros');
        }
        return redirect()
        ->route('movies.index')
        ->with('feedback.message','¡Hola de nuevo,'. auth::user()->email . '!, como estas?');


    }

}
