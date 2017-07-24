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
    protected $response;

    public function __construct(RepPersonas $repPersonas){
        $this->response = [];
        $this->personasrepo = $repPersonas;
    }

    public function listado($tipoPersona)
    {
        $this->personasrepo = setModelTipoPersona($this->personasrepo, $tipoPersona);
        $this->response['tipoPersona'] = $tipoPersona;
        $this->response['personas'] = $this->personasrepo->paginate(10);
        
        return view("personas.listado")
                    ->with($this->response);
        //
                    return view("personas.listado")
                    ->with($this->response);
    }

    public function show($tipoPersona, $id){

        $this->personasrepo = setModelTipoPersona($this->personasrepo, $tipoPersona);
        $this->response['tipoPersona'] = $tipoPersona;
        $this->response['persona'] = $this->personasrepo->find($id);
        
        return view('personas.show')
                    ->with($this->response);
    }

    public function create($tipoPersona){
        $this->response['tipoPersona'] = $tipoPersona;
        
        return view("personas.create")
                    ->with($this->response);
    }

    public function store(){                                 

        DB::beginTransaction();
        try{
            $datos_persona = Input::get();
            $tipoPersona = Input::get('tipoPersona','');
            $instanciaTipoPersona = setModelTipoPersona($tipoPersona);

            if( $instanciaTipoPersona != '' ){
                $instanciaTipoPersona->fill($datos_persona);
                if( !$instanciaTipoPersona->validate(true) ){
                    return Redirect::back()
                                ->withErrors($instanciaTipoPersona->errors)
                                ->withInput();
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

        return Redirect::route('personas.listado', [$tipoPersona])
                    ->with($response);
    }

    public function edit($tipoPersona,$id){
        $this->personasrepo = setModelTipoPersona($this->personasrepo, $tipoPersona);
        $this->response['tipoPersona'] = $tipoPersona;
        $this->response['persona'] = $this->personasrepo->find($id);
        
        return view('personas.edit')
                    ->with($this->response);
    }

    public function update(Request $request, $id){
        $this->personasrepo = setModelTipoPersona($this->personasrepo, $request->tipoPersona);
        $guardado = $this->personasrepo->updateRich($request->all(), $id);

        return Redirect::route('personas.listado', [$request->tipoPersona]);
    }

    

}