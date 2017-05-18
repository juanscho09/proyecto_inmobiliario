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
    Route::post('inmuebles/update', array(
        'as' => 'inmuebles.update',
        'uses' => 'InmueblesController@update'
    ));

    Route::get('inmuebles/{id}', array('as'=> 'inmuebles.show', 'uses' =>'InmueblesController@show'));
    // fin inmuebles

});