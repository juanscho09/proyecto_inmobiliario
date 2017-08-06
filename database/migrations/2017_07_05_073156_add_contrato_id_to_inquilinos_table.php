<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContratoIdToInquilinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !Schema::hasColumn('inquilinos', 'contrato_id') ) {
            Schema::table('inquilinos', function (Blueprint $table) {
                $table->integer('contrato_id')->unsigned();
                $table->foreign('contrato_id')->references('id')->on('contratos');
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
        if( !Schema::hasColumn('inquilinos', 'contrato_id') ) {
            Schema::table('inquilinos', function (Blueprint $table) {
                $table->dropForeign('contrato_id');
                $table->dropColumn('contrato_id');
            });
        }
    }
}
