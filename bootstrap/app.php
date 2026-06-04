<?php
/* ACA SE PUSO UNA CONFIGURACION DEL MIDDLEWARE */
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Session;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //Configuramos a donde va el usuario que no esta autenticado
        //$middleware->redirectGuestsTo('/ingresar');//Esto seria una manera pero si cambia la direccion se romperia
        $middleware->redirectGuestsTo(function() {
            Session::flash('feedback.message', 'Para acceder a esta sesion se debe logear');//Para usar el session hay que agregar la fachada
            Session::flash('feedback.type','danger');//Consultar la ESTRUCTURA DE ESTO.
            return route ('login.show');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
