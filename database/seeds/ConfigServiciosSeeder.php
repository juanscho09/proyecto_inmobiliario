<?php

use Illuminate\Database\Seeder;

class ConfigServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuraciones_servicios')->truncate();

        //insert some dummy records
        DB::table('configuraciones_servicios')->insert([
            ['titulo'=>'Gas','descripcion'=>'-', 'valor' => 0],
            ['titulo'=>'Luz','descripcion'=>'-', 'valor' => 0],
            ['titulo'=>'Teléfono','descripcion'=>'-', 'valor' => 0],
            ['titulo'=>'ABL','descripcion'=>'-', 'valor' => 0],
            ['titulo'=>'API','descripcion'=>'-', 'valor' => 0],
            ['titulo'=>'Expensas','descripcion'=>'-', 'valor' => 0],
            ['titulo'=>'Agua','descripcion'=>'-', 'valor' => 0],
            ['titulo'=>'Seguro domiciliario','descripcion'=>'-', 'valor' => 0],
        ]);
    }
}
