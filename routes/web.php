<?php

use Illuminate\Support\Facades\Route;

/*

ACA SE CREAN RUTAS

#Definicion de rutas
Las rutas son las urls a partir de [public/] que van a existir en nuestra aplicacion para que los
usuarios puedan visitar 

En laravel registramos las rutas usando la clase Route
Esta clase tiene metodos para crear rutas usando los principales metodos de HTTP:

    get()
    post()
    put()
    patch()
    delete()
    options()

por ej. si tenemos un:
    Route::get(....)

Estamos definiendo una ruta por GET

Todos estos metodos reciben 2 parametros:

1 - String. La url que queremos registrar.
2 - Array|Callable. El nombre del metodo del controller 
que queremos invocar o un closure con la logica que queremos correr

Por ejemplo, la ruta que trae por defecto laravel:
    Route::get('/', function () {
        return view('welcome');
    }); 

Define una ruta por GET a la raiz de public, que debe ejecutar ese closure
En gral. no se recomienda usar closures en las rutas, salvo tal vez para casos muy simplexml_load_string

Todas las acciones deberian retornar un a "respuesta". Esto puede ser un html a traves de una visita, o 
podria ser un string en JSON, XML, un stream u otra cosa.

La funcion global de "view()" de laravel es un helper para poder generar rapidamente una respuesta
de una vista.

Como parametro, le pasamos el nombre de la vista. En el ejemplo de recien, el nombre de 
la vista es "welcome".

Las vistas en laravel figuran en el directorio de [Resources/views]

Cuando se pasa, se pasa sin el vendor y se debe correr el comando
"COMPOSER INSTALL"

*/


/*//Version con closure

Route::get('/', function () {
    //La vista es el enombre del archivo dentro de la carpeta [resouces/views], 
    //sin la extension ni ".php" ni ".blade.php" 
    return view('welcome');//Esto va sin extension el nombre completo es "welcome.blade.php"
});
*/
//Version con controller
Route::get('/',[\App\Http\Controllers\HomeController::class,'home'])//Tener en cuenta la estructura
    ->name('home');
//Para Asociar un metodo de un controller a una ruta debemos pasar como segundo parametro
//un array de 2 valores.
//1 - FQN(Fully-qualified Name) de la clase del controller.
//2 - El nombre del metodo dentro del controller.

Route::get('/nosotros', [\App\Http\Controllers\HomeController::class, 'about'])
    ->name('about');
/*
Se agrega en la carpeta APP/Controllers cualquier 
controlador de paginas web, no se lo haces como lo esta arriba ya que se hace inmanejable si crece

*/

Route::get('/peliculas/listado',[\App\Http\Controllers\MoviesController::class,'index'])
    ->name('movies.index');



/**
 * Parametros de Ruta
 * En muchos casos vamos a necesitar definir rutas que van a tener algun segmento de su URL que sea
 * dinamico
 */

Route::get('/peliculas/{id}',[\App\Http\Controllers\MoviesController::class,'show'])
    //El name define el nombre de la ruta. Es un identificador que podemos usar para luego poder generar URLs
    //sin tener que escribir la URL en si
    ->name('movies.show')
    ->whereNumber('id');


Route::get('/peliculas/nueva',[\App\Http\Controllers\MoviesController::class, 'create'])/* Esto se pone aca porque 
busca la primera ruta que encuentre y se volvio a poner donde estaba porque se agrego WHERENUMBER */
    ->name('movies.create');

//Para ka ryta de insercion, vamos a crear una ruta con la misma URL que la del formulario, pero que en vez de GET utilice POST
Route::post('/peliculas/nueva',[\App\Http\Controllers\MoviesController::class, 'store'])/* Esto se pone aca porque 
busca la primera ruta que encuentre y se volvio a poner donde estaba porque se agrego WHERENUMBER */
    ->name('movies.store');

Route::post('/peliculas/{id}/eliminar',[\App\Http\Controllers\MoviesController::class, 'destroy'])/* Aca son solo parentesis simple */
    ->name('movies.destroy');