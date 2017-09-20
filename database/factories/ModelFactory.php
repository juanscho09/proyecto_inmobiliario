<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});*/



	$factory->define(App\Models\Inmueble::class, function(Faker\Generator $faker) {
		return [
			'tipo_inmueble' => $faker->randomElement('departamento','casa'),
            'observacion' => $faker->paragraph(1),
            'calle' => $faker->street,
            'numero' => $faker->number,
            'piso' => $faker->number,
            'depto' => $faker->randomElement('A', 'B', 'C'),
            'localidad' => $faker->city ,
            'cod_postal' => $faker->postcode,
            'administrador_nombre' => $faker->name,
            'administrador_cta_banco' => $faker->number,
            'administrador_tel_1' => $faker->number,
            'administrador_email' => $faker->email,
            'administrador_tel_2' => $faker->phoneNumber,
            'administrador_tel_3' => $faker->phoneNumber,
            'administrador_domicilio' => $faker->address,            
            'administrador_cp' => $faker->postcode,
            'encargado' => $faker->name ,
            'encargado_tel_1' => $faker->phoneNumber,
            'encargado_tel_2' => $faker->phoneNumber,
            'encargado_tel_3' => $faker->phoneNumber,
		];
	});
	/*
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
            $table->string('encargado_tel_3');*/