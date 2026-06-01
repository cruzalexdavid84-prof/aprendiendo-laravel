<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/*
Todos los modelos de Eloquent deben heredar de la clase Model
*/
class Movie extends Model
{
    protected $primaryKey = 'movie_id';//Esto se debe aclarar porque Laravel supone que el campo que es la primary key se llama por defecto "ID",

    protected $fillable = ['title','price','release_date','synosis'];//Esto se agrega debido a la asignacion masiva a traves
    //del metodo create();

    /* Clase 6: Accessors y Mutators */
    public function price(): Attribute{//Muy importante el nombre de la funcion aca, si cambia el nombre no se aplica SOLA.
    //Esto hace coincider el nombre de la funcion con el nombre de la variable
    //Por ese motivo aca no se pasa un valor, SABE que dato TOMAR
        //Finalmente, tenemos que retornar una llamada al metodo Attribute::make().
        //Este metodo recibe 2 parametros, ambos opcionales:
        //1- ?callable. get. la funcion que transforma el valor en la lectura
        //2- ?callable. set. La funcion que transforma el valor en la asignacion a la bbdd

        return Attribute::make(
            get: function($value){
                return $value/100;
            },
            set: function($value){
                return $value*100;
            }

        );

        
    }

}
