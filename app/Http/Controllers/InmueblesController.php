<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use DB;
use Auth;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Input;
use View;

class InmueblesController extends Controller
{

    public function  listado()
    {
        $response = [];

        try {
            $response['inmuebles'] = [];
        } catch (Exception $ex) {

        }

        return View::make("inmuebles.listado")->with($response);
    }

    public function create(){
        $response = [];

        $propietarios = Propietario::all();

        $response['propietarios'] = $propietarios;
        return View::make("inmuebles.create")->with($response);
    }

    public function store(Request $request){
        
        //TODO : validation $this->validate($request, array());

        $success = null;

        DB::beginTransaction();

        try {
            $inmueble = new Inmueble;
            $inmueble->tipo_inmueble = $request->tipo_inmueble;
            $inmueble->observacion = $request->observacion;
            $inmueble->calle = $request->calle;
            $inmueble->numero = $request->numero;
            $inmueble->piso = $request->piso;
            $inmueble->depto = $request->depto;
            $inmueble->localidad = $request->localidad;
            $inmueble->cod_postal = $request->cod_postal;
            $inmueble->administrador_nombre = $request->administrador_nombre;
            $inmueble->administador_cta_banco = $request->administador_cta_banco;
            $inmueble->administrador_tel_1 = $request->administrador_tel_1;
            $inmueble->administrador_tel_2 = $request->administrador_tel_2;
            $inmueble->administrador_tel_3 = $request->administrador_tel_3;
            $inmueble->administrador_domicilio = $request->administrador_domicilio;
            $inmueble->administrador_cp = $request->administrador_cp;
            $inmueble->encargado = $request->encargado;
            $inmueble->encargado_tel_1 = $request->encargado_tel_1;
            $inmueble->encargado_tel_2 = $request->encargado_tel_2;
            $inmueble->encargado_tel_3 = $request->encargado_tel_3;
            $inmueble->estado_id = 0;

            $inmueble->save();
            DB::commit();

            //TODO : relacionar con sync los propietarios(many to many)
            $success = true;

        } catch(Exception $ex) {
            DB::rollback();

            //TODO :log errors

            $success = false;
        }

        if($success){

        Session::flash('success', 'Inmueble guardado correctamente');
        return Route::redirect("inmuebles.listado")->with($response)
            ;
        } else {
        Session::flash('error', 'No se pudo guardar inmueble en DB');
        return Route::redirect("inmuebles.listado")->with($response)
            ;
        }
        
    }

    public function edit(Request $request, $id){

        $propietarios = Propietario::all();

        return view("inmuebles.edit")
            ->withPropietarios($propietarios);
    }

    public function update(Request $request, $id){
        
        //TODO : validation $this->validate($request, array());

        $success = null;

        DB::beginTransaction();

        try {
            $inmueble = Inmueble::find($id);
            $inmueble->tipo_inmueble = $request->input('tipo_inmueble');
            $inmueble->observacion = $request->input('observacion');
            $inmueble->calle = $request->input('calle');
            $inmueble->numero = $request->input('numero');
            $inmueble->piso = $request->input('piso');
            $inmueble->depto = $request->input('depto');
            $inmueble->localidad = $request->input('localidad');
            $inmueble->cod_postal = $request->input('cod_postal');
            $inmueble->administrador_nombre = $request->input('administrador_nombre');
            $inmueble->administador_cta_banco = $request->input('administador_cta_banco');
            $inmueble->administrador_tel_1 = $request->input('administrador_tel_1');
            $inmueble->administrador_tel_2 = $request->input('administrador_tel_2');
            $inmueble->administrador_tel_3 = $request->input('administrador_tel_3');
            $inmueble->administrador_domicilio = $request->input('administrador_domicilio');
            $inmueble->administrador_cp = $request->input('administrador_cp');
            $inmueble->encargado = $request->input('encargado');
            $inmueble->encargado_tel_1 = $request->input('encargado_tel_1');
            $inmueble->encargado_tel_2 = $request->input('encargado_tel_2');
            $inmueble->encargado_tel_3 = $request->input('encargado_tel_3');
            $inmueble->estado_id = 0;

            $inmueble->save();
            DB::commit();

            $success = true;

        } catch(Exception $ex) {
            DB::rollback();

            //TODO :log errors

            $success = false;
        }

        if($success){

            Session::flash('success', 'Inmueble actualizado correctamente');
            return Route::redirect("inmuebles.listado")->with($response);
        } else {
            Session::flash('error', 'No se pudo actualizar inmueble en DB');
            return Route::redirect("inmuebles.listado")->with($response);
        }
        
    }

    public function delete($id)
    {
        DB::transaction();

        try{
            $inmueble = Inmueble::findOrFail($id);
            $inmueble->delete();
            //TODO : ver relaciones al eliminar inmueble(desincronizar etc)
            DB::commit();
            $success = true;
        }
        catch(Exception $ex){
            // TODO : log 
            DB::rollback();
            $success = false;
        }

        if($success){
            Session::flash('success', 'Inmueble eliminado correctamente');
            return Route::redirect("inmuebles.listado")->with($response);
        } else {
            Session::flash('error', 'No se pudo eliminar inmueble en DB');
            return Route::redirect("inmuebles.listado")->with($response);
        }
    }
}