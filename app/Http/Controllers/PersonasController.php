<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Input;
use Response;
use Session;
use View;

class PersonasController extends Controller
{

    public function  listado($tipoPersona)
    {
        $response = [];

        $response['tipoPersona'] = $tipoPersona;
        $response['personas'] = [];
        try {
            $instanciaTipoPersona = instanciaTipoPersona($tipoPersona);

            if ($instanciaTipoPersona != '') {
                $personas = $instanciaTipoPersona->query()->paginate(10);
                $response['personas'] = $personas;
            }
        } catch (Exception $ex) {

        }

        return View::make("personas.listado")->with($response);
    }

    public function create($tipoPersona){

        $response = [];

        $response['tipoPersona'] = $tipoPersona;
        return View::make("personas.create")->with($response);
    }

    public function store(){

        DB::beginTransaction();
        try{
            $datos_persona = Input::get();
            $tipoPersona = Input::get('tipoPersona','');
            $instanciaTipoPersona = instanciaTipoPersona($tipoPersona);

            if( $instanciaTipoPersona != '' ){
                $instanciaTipoPersona->fill($datos_persona);
                if( !$instanciaTipoPersona->validate(true) ){
                    return Redirect::back()->withErrors($instanciaTipoPersona->errors)->withInput();
                }
                if( $instanciaTipoPersona->save() ){
                    DB::commit();
                    $response['mensaje']    =   'Se guardaron los datos correctamente';
                    $response['error']      =   false;
                } else {
                    DB::rollBack();
                    $response['mensaje']    =   'No se pudo guardar los datos de la persona';
                    $response['error']      =   true;
                }
            } else {
                DB::rollBack();
                $response['mensaje']    =   'Error al instanciar el tipo de persona';
                $response['error']      =   true;
            }
        } catch (Exception $ex) {
            DB::rollBack();
            $response['mensaje']    =   'Error al guardar';
            $response['error']      =   true;
        }

        return Redirect::route('personas.listado', [$tipoPersona])->with($response);
    }

    public function edit($id){
        $response = [];


        return View::make('personas.edit')->with($response);
    }

    public function update(){

    }

}