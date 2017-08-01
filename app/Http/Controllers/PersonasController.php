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
        
        return view("personas.listado")->with($this->response);
    }

    public function show($tipoPersona, $id){

        $this->personasrepo = setModelTipoPersona($this->personasrepo, $tipoPersona);
        $this->response['tipoPersona'] = $tipoPersona;
        $this->response['persona'] = $this->personasrepo->find($id);
        
        return view('personas.show')->with($this->response);
    }

    public function create($tipoPersona){
        $this->response['tipoPersona'] = $tipoPersona;
        
        return view("personas.create")->with($this->response);
    }

    public function store(){                                 

        DB::beginTransaction();
        try{
            $datos_persona = Input::get();
            $tipoPersona = Input::get('tipoPersona','');
            $this->personasrepo = setModelTipoPersona($this->personasrepo, $tipoPersona);

            $crearPersona = $this->personasrepo->create($datos_persona);

            if( $crearPersona ){
                DB::commit();
                $this->response['mensaje']  =   'Se guardaron los datos correctamente';
                $this->response['error']    =   false;
            } else {
                DB::rollBack();
                $this->response['mensaje']  =   'No se pudo guardar los datos de la persona';
                $this->response['error']    =   true;
            }
        } catch (Exception $ex) {
            DB::rollBack();
            $this->response['mensaje']    =   'Error al guardar: '.$ex;
            $this->response['error']      =   true;
        }

        return Redirect::route('personas.listado', [$tipoPersona])->with($this->response);
    }

    public function edit($tipoPersona,$id){
        $this->personasrepo = setModelTipoPersona($this->personasrepo, $tipoPersona);
        $this->response['tipoPersona'] = $tipoPersona;
        $this->response['persona'] = $this->personasrepo->find($id);
        
        return view('personas.edit')->with($this->response);
    }

    public function update(Request $request, $id){
        $this->personasrepo = setModelTipoPersona($this->personasrepo, $request->tipoPersona);
        $guardado = $this->personasrepo->updateRich($request->all(), $id);

        return Redirect::route('personas.listado', [$request->tipoPersona]);
    }


}