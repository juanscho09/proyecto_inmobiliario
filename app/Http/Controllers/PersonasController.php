<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietario;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Input;
use Response;
use Session;
use View;
use App\Repository\PersonasManager as RepPersonas;

class PersonasController extends Controller
{

    protected $personasrepo;

    public function __construct(RepPersonas $repPersonas){
        $this->personasrepo = $repPersonas;
    }

    public function  listado($tipoPersona)
    {
        $response = [];

        $response['tipoPersona'] = $tipoPersona;

        //return $this->personasrepo->

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

    public function edit($tipoPersona,$id){
        $response = [];

        $response['tipoPersona'] = $tipoPersona;

        $instanciaTipoPersona = instanciaTipoPersona($tipoPersona);

        $response['persona'] = $instanciaTipoPersona->find($id);
        return View::make('personas.edit')->with($response);
    }

    public function update(Request $request, $id){


        $instanciaTipoPersona = instanciaTipoPersona($request->tipoPersona);

        $persona = $instanciaTipoPersona->find($id);
        $persona->fill($request->all());
        $persona->save();

        return Redirect::route('personas.listado', [$request->tipoPersona]);
    }

    public function show(){
        return View::make('personas.show');
    }

}