<?php
//ACA SE CREAN METODOS
//ACA TMB  se PONEN LOS REQUISITOS DE LAS VALIDACIONES
namespace App\Http\Controllers;

use App\Models\Movie;//Se agrega este "Modelo" para usar esto.
use Illuminate\Http\Request;// esta clase sirve para pedir los datos del objeto.
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
        return view('movies.index',[
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

    public function store(Request $request)//Request es el tipo de objeto
    //Se pasa a la funcion el objeto Request para poder usarlo aca.
    {

        //Tema clase 5, se hace la validacion.
        $request->validate([
            //Usando nomenclatura de array
            'title'=> ['required', 'min:2'],
            'price'=> ['required','numeric', 'min:0'],
            'release_date' => 'required',
            'synosis'=> 'required',//Si no aparece aca, entonces no retorna el error
        ],[//Esta parte es opcional, aca se personaliza los mensjes que ve el usuario
            'title.required' => 'El titulo no puede estar vacio',
            'title.min' => "El nombre no puede tener menos de :min caracteres",//Si te equivocas aca no tira error, no dice que no lo reconoce
            'price.required' => "El precio no puede estar vacio",
            'price.numeric' => 'El precio debe ser un valor numerico',
            'price.min'=> "El numero debe ser mayor a 0",
            'release_date.required' => "La fecha no puede estar vacia",
            'synosis.required' => "La sinopsis no puede estar vacia",
            


        ]);

        
        //dd($request);//Esto se usa para ver que llega todo los valores
        /** A continuacion una manera de recibir las cosas*/
        //$data= $request->input();//Esto es el metodo input
        //dd($data);//Solo trae los valores que se agrego, a diferencia del request que me trae todos los datos.
    
        $data= $request->only('title','price', 'release_date', 'synosis');//Esto es otra manera de recibir, especificando que recibo
        //La forma de hacerlo con el Only es mas sanetizado
        //dd($data);

        //a continuacion grabaremos un registro
        // - Forma manual
        //      $movie = new Movie();//Aca se crea una instancia del objeto.
        //      $movie->title = $data['title'];
        //      $movie->price = $data['price'];
        //      $movie->release_date = $data['release_date'];
        //      $movie->synosis = $data['synosis'];
        //      $movie->save();//Metodo de guardar, aunque no se en donde. AL parecer esto es una forma abreviada de Laravel
        
        
        // - Forma usando Eloquent Esto es lo mismo que todo lo anterior, solo que mas sintetico.
        $movie = Movie::create($data);

        return redirect()->route('movies.index');//Con esto redirecciono la accion del usuario.
    }

    public function destroy(int $id){
        $movie = Movie::findOrFail($id);

        //Eliminamos usando el metodo delete.
        $movie->delete();//Al parecer es un metodo de laravel que simplifica todo
        return redirect()->route('movies.index');

    }



}
