<?php

use Illuminate\Database\Seeder;

class InmueblesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Inmueble')->create(100);
    }
}
