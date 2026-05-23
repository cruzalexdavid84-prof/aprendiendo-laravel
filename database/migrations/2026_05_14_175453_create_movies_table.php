<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
Cada migracion se crea como una clase anonima, que hereda de la clase Migration
Debe tener, al menos, dos metodos publicos para funcionar correctamente:
- up ():
    Aca van a ir las instrucciones qeu queres que se ejecuten al correr la migracion.
    O sea, los cambios que queremos apliar en la bbdd.
- Down():

    Aca van las instrcciones que deshacen (revierten) los cambios en el up().
    Esto es importante para asegurarnos de que las migraciones siempre sean reversibles.
*/

return new class extends Migration
{
    /**
     * Run the migrations.
     * La clase Schema es la clase de Laravael para modificar una estructura de la bbdd.
     * 
     * Entre sus metodos esta create () que permite crear una nueva tabla.
     * 
     * Recibe 2 parametros:
     * - string, El nombre de la tabla que queremos crear.
     * - Closure, la funcion con las instrucciones para ejecutar la tabla.
     * A la funcion del Closure, es habitual "inyectarle" una instancia d ela clase Blueprint.
     * 
     * Blueprint (plano de construccion) es la clase que define los cambios a realizar sobre una tabla.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            /**
             * Se crea la siguiente tabla.
             * 
             */
            //Blueprint::id() define un campo que es:

            $table->id('movie_id');//ESto define un campo que es BIGINT UNSIGNED NOT NULL AUTO INCREMENT PRIMARY
            $table->string('title',100);//Esto define un campo VARCHAR
            $table->unsignedInteger('price');//Blueprint::unsignedInteger() define un campo INT Unsigned.
            $table->date('release_date');//Blueprint::date() define un campo DATE
            $table->text('synosis');//Blueprint::text() define un campo Texto
            $table->timestamps();//Blueprint::timestamps() es un metodo que define dos campos en la tabla
            // - Created_at 
            // - updated_at
            //Esto guarda la ultima fecha de creacion y actualizacion del registro.
            //Si usamos Eloquent, estos campos se manejan automaticamente por el framework

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');//Elimina una tabla si existe-
    }
};
