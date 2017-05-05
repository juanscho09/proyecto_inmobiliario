<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasTable('garantes') )
        {
            Schema::create('garantes', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('nombre');
                $table->string('apellido');
                $table->string('tipo_documento');
                $table->string('nro_documento');
                $table->string('cuil_cuit');
                $table->string('condicion_iva');
                $table->dateTime('fecha_nacimiento');
                $table->string('telefono_1');
                $table->string('telefono_2');
                $table->string('telefono_3');
                $table->string('email');
                $table->string('banco');
                $table->string('nro_cuenta');
                $table->string('direccion');
                $table->string('cod_postal');
                $table->string('ciudad');
                $table->string('provincia');
                $table->string('pais');
                $table->text('notas');
                $table->string('contacto_1');
                $table->string('telefono_cont_1');
                $table->string('contacto_2');
                $table->string('telefono_cont_2');
                $table->string('contacto_3');
                $table->string('telefono_cont_3');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        if(Schema::hasTable('garantes') )
        {
            Schema::drop('garantes');
        }
    }
}
