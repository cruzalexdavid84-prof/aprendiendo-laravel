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
        /**
         * El Schema::table es el metodo que permite editar lo que es una tabla
         * lo que seria un "ALTER TABLE" en SQL.
         */
        Schema::table('movies', function (Blueprint $table) {
            //
            $table->string('cover')->nullable();//Cuando habia hecho esto, me habia olvidado los parentesis
            $table->string('cover_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            //
            $table->dropColumn(['cover','cover_description']);
        });
    }
};
