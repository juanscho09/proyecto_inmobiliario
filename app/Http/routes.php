<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/admin', 'HomeController@index');

    // personas
    Route::get('personas/listado/{tipoPersona?}', array(
        'as' => 'personas.listado',
        'uses' => 'PersonasController@listado'
    ));
    Route::get('personas/create/{tipoPersona?}', array(
        'as' => 'personas.create',
        'uses' => 'PersonasController@create'
    ));
    Route::post('personas/store', array(
        'as' => 'personas.store',
        'uses' => 'PersonasController@store'
    ));
    Route::get('personas/edit/{tipoPersona?}/{id?}', array(
        'as' => 'personas.edit',
        'uses' => 'PersonasController@edit'
    ));
    Route::post('personas/update/{id}', array(
        'as' => 'personas.update',
        'uses' => 'PersonasController@update'
    ));
    Route::get('personas/{tipoPersona?}/{id}', array(
        'as'=> 'personas.show',
        'uses' =>'PersonasController@show'
    ));
    // fin personas

    // inmuebles
    Route::get('inmuebles/listado', array(
        'as' => 'inmuebles.listado',
        'uses' => 'InmueblesController@listado'
    ));
    Route::get('inmuebles/create', array(
        'as' => 'inmuebles.create',
        'uses' => 'InmueblesController@create'
    ));
    Route::post('inmuebles/store', array(
        'as' => 'inmuebles.store',
        'uses' => 'InmueblesController@store'
    ));
    Route::get('inmuebles/{id}/edit', array(
        'as' => 'inmuebles.edit',
        'uses' => 'InmueblesController@edit'
    ));

    Route::put('inmuebles/{id}', array(
        'as' => 'inmuebles.update',
        'uses' => 'InmueblesController@update'
    ));

    Route::get('inmuebles/{id}', array(
        'as'=> 'inmuebles.show',
        'uses' =>'InmueblesController@show'
    ));

    Route::delete('inmuebles/{id}', array(
        'as'=> 'inmuebles.destroy',
        'uses' =>'InmueblesController@delete'
    ));
    // fin inmuebles

    Route::group(['prefix' => 'movimientos'], function() {
        
        Route::get('listado', [
                'as' => 'movimientos.listado', 
                'uses' => 'MovimientosController@index'
            ]);

    });

    Route::group(['prefix' => 'contratos'], function() {

        Route::get('listado', [            
                'as' => 'contratos.listado', 
                'uses' => 'ContratosController@index'
            ]);
    });

});