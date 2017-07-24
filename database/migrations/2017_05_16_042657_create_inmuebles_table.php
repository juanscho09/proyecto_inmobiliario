<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('tipo_inmueble');
            $table->string('observacion', 600);
            $table->string('calle');
            $table->string('numero');
            $table->string('piso');
            $table->string('depto');
            $table->string('localidad');    
            $table->string('cod_postal');    
            $table->string('administrador_nombre');
            $table->string('administrador_cta_banco');
            $table->string('administrador_tel_1');
            $table->string('administrador_email');
            $table->string('administrador_tel_2');
            $table->string('administrador_tel_3');
            $table->string('administrador_domicilio');
            
            $table->string('administrador_cp');
            $table->string('encargado');
            $table->string('encargado_tel_1');
            $table->string('encargado_tel_2');
            $table->string('encargado_tel_3');
            $table->string('estado_id')->nullable();
            $table->timestamps('');
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inmuebles');
    }
}
