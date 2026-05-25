<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
Todos los modelos de Eloquent deben heredar de la clase Model
*/
class Movie extends Model
{
    protected $primaryKey = 'movie_id';//Esto se debe aclarar porque Laravel supone que el campo que es la primary key se llama por defecto "ID",
}
