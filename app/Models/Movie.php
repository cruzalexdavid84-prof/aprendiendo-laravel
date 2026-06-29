<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/*
Todos los modelos de Eloquent deben heredar de la clase Model
*/

class Movie extends Model
{
    protected $primaryKey = 'movie_id'; //Esto se debe aclarar porque Laravel supone que el campo que es la primary key se llama por defecto "ID",

    protected $fillable = ['title', 'price', 'release_date', 'synosis', 'cover', 'cover_description', 'rating_fk']; //Esto se agrega debido a la asignacion masiva a traves
    //del metodo create();//Sino dice aca, entonces no se agregará

    /* Clase 6: Accessors y Mutators */
    public function price(): Attribute
    { //Muy importante el nombre de la funcion aca, si cambia el nombre no se aplica SOLA.
        //Esto hace coincider el nombre de la funcion con el nombre de la variable
        //Por ese motivo aca no se pasa un valor, SABE que dato TOMAR
        //Finalmente, tenemos que retornar una llamada al metodo Attribute::make().
        //Este metodo recibe 2 parametros, ambos opcionales:
        //1- ?callable. get. la funcion que transforma el valor en la lectura
        //2- ?callable. set. La funcion que transforma el valor en la asignacion a la bbdd

        return Attribute::make(
            get: fn($value) => $value / 100, //LA arrow fn no puede tener una llave de apertura, solo puede tener 1 expresion
            set: fn($value) => $value * 100,
        );

        //Clase 7
        /**
         * Named Arguments
         * 
         * 
         */
    }

    /*
    |--------------------------------------------------------------------------
    | Relaciones en Eloquent
    |--------------------------------------------------------------------------
    |
    | Para definir en un modelo de Eloquent una relación, tenemos que
    | crear un método.
    | El nombre del método va a definir el "nombre de la relación".
    | Para que cuente como relación, debe retornar la llamada a uno de
    | los métodos para definir relaciones.
    | Por ejemplo, para una relación de 1 a muchos, podría ser:
    | - hasMany() (si estamos en la tabla del "1", la referenciada).
    | - belongsTo() (si estamos en la tabla del "muchos", la referenciante).
    |
    | En nuestro, estamos en la tabla referente (la que lleva la FK),
    | así que vamos a retornar la llamada al método belongsTo().
    Este método acepta algunos parámetros:
        1. Obligatorio. String. El FQN de la clase del modelo de la tabla relacionada.
        2. Opcional. String. El nombre de la "foreign key".
        3. Opcional. String. El nombre de la "owner key" (la PK referenciada).

    Para ver como usamos este metodo para atraer la data, ver la vista de 
    [movies/index.blade.php]
    */

    public function rating()
    {
        return $this->belongsTo(
            Rating::class,
            'rating_fk',
            'rating_id'
        );
    }
}
