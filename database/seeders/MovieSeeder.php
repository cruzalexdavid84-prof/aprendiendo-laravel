<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;//Esto se agrega al poner DB abajo, despues ese DB lo borra el profe

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /**
         * Aca dentro de este metodo se pone las intrucciones para insertar los registros en la tabla
         * Para est fin, tipicamente vamos a usar algunos de los mecanismos para interactuar con la bbdd
         * Exiten 3 posibilidades:
         *  - Pedir el objeto PDO de la conexion y hacerlo todo manualmente.
         *  - USar el "Query Builder" de Laravel.
         *  - Usar el elquent (el ORM de Laravel)
         * 
         * Eloquent lo vamos a ver despues. PDO lo usamos el cuatri pasado.
         * Ahora usaremos el Query Builder.
         * 
         * Esto es una clase que sirve para poder armar y correr consultas sin escribir codigo SQL.
         * Escribir SQL puede ser tedioso.
         * 
         * El Query Builder suele ser mas comodo de trabajarlo. Y tiene importantes beneficios.
         * 1 - Aplica proteccion contra inyeccion SQL de manera automatica.
         * 2 - Las consultas se ajustan automaticamente para la bbdd que estemos usando. Es decir
         * Se usa el mismo codigo para SQL, mysql, mariadb y postgresSQL, SQL server, etc.
         * 
         * Para usar el Query Builder se puede hacer desde la fachada "DB" Ej.
         */
        DB::table('movies')->insert([
            [
                'movie_id' => 1,//Esto no es necesario ya que es auto incremental.
                'title' => 'El señor de los anillos: La Comunidad del anillo',
                'price' => 1999,
                'release_date' => '2000-12-12',
                'synosis' => 'Un grupo de amigos muy bajitos se van a buscar un anillo para tirarlo a un volcan porque un malo lo quiere agarrar',
                'created_at' => now(),//Retorna la fecha actual.
                'updated_at' => now(),//Esto se agrega porque no uso eloquent.
            ],
            [
                'movie_id' => 2,//Esto no es necesario ya que es auto incremental.
                'title' => 'Matrix',
                'price' => 1799,
                'release_date' => '1998-07-24',
                'synosis' => 'Neo sigue al conejo blanco y lo lleva a despertar a un mundo que desconocia para descubrir que era el elegido',
                'created_at' => now(),//Retorna la fecha actual.
                'updated_at' => now(),
            ],
            [
                'movie_id' => 3,//Esto no es necesario ya que es auto incremental.
                'title' => 'El discurso del Rey',
                'price' => 1499,
                'release_date' => '2011-04-04',
                'synosis' => 'La historia de como un rey tartamudo tuvo que dar un discurso a todo un pais',
                'created_at' => now(),//Retorna la fecha actual.
                'updated_at' => now(),
            ],
        ]);
    }
}
