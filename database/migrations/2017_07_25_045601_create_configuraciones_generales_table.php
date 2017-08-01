<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracionesGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuraciones_generales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_empresa');
            $table->string('telefono_1');
            $table->string('telefono_2');
            $table->string('direccion_sede');
            $table->string('ciudad');
            $table->string('provincia');
            $table->string('pais');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('configuraciones_generales');
    }
}
