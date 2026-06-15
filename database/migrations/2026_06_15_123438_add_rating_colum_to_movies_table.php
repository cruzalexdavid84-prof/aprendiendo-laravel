<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            //Definimos la FK para ratings.
            //Primero, creamos el campo, como sabemos, debe tener el mismo dominio qeu la PK que referencia
            $table->unsignedTinyInteger('rating_fk');
            //La declaramos como FK
            $table->foreign('rating_fk')->references('rating_id')->on('ratings');//Se puede agregar aca el onDelete..
            //... y el onUpdate, consultar que es eso a Chat. 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            //
            $table->dropColumn('rating_fk');
        });
    }
};
