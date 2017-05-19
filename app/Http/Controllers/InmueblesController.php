<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use DB;
use Auth;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Input;
use View;
use App\Repository\InmueblesManager as InmueblesRepo;
use App\Models\Inmueble;
use Session;
use Illuminate\Http\Request;

class InmueblesController extends Controller
{
    protected $inmueblesrepo;

    public function __construct(InmueblesRepo $inmueblesrepo)
    {
        $this->inmueblesrepo = $inmueblesrepo;
    }

    public function listado()
    {

        $response = $this->inmueblesrepo->index();
        return View::make("inmuebles.listado")->with($response);

    }

    public function show($id)
    {
        $response = [];

        try{
            $inmueble = Inmueble::find($id);
            $response['inmueble'] = $inmueble;


        } catch (Exception $ex) {

        }

        return view("inmuebles.show")->with($response);

    }

    public function create(){
        $response = [];

        $propietarios = Propietario::all();

        $response['propietarios'] = $propietarios;
        return View::make("inmuebles.create")->with($response);
    }

    public function store(Request $request){
        
        //TODO : validation $this->validate($request, array());
        $inmueble = $request->all();

        $response = $this->inmueblesrepo->create($inmueble);

        if($response){
            Session::flash('success', 'Inmueble guardado correctamente');
            return redirect()->route("inmuebles.listado");
        } else {
            Session::flash('error', 'No se pudo guardar inmueble en DB');
            return redirect()->route("inmuebles.listado");
        }
        
    }

    public function edit($id){

        $response = [];
        $response["inmueble"] = Inmueble::findOrFail($id);

        return view("inmuebles.edit")
                ->with($response);
    }

    public function update(Request $request, $id){
        
        //TODO : validation $this->validate($request, array());
        
        $success = null;

        DB::beginTransaction();

        try {

            $inmueble = Inmueble::find($id)->first();
            $inmueble->fill($request->all());
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
            return redirect()->route("inmuebles.listado");
        } else {
            Session::flash('error', 'No se pudo actualizar inmueble en DB');
            return redirect()->route("inmuebles.listado");
        }
        
    }

    public function delete($id)
    {
        DB::begintransaction();

        try{
            $inmueble = Inmueble::findOrFail($id);
            $inmueble->delete();
            //TODO : ver relaciones al eliminar inmueble(desincronizar etc)
            DB::commit();
            $success = true;
        }catch(Exception $ex){
            // TODO : log 
            DB::rollback();
            $success = false;
        }

        if($success){
            Session::flash('success', 'Inmueble eliminado correctamente');
            return redirect()->route("inmuebles.listado");
        } else {
            Session::flash('error', 'No se pudo eliminar inmueble en DB');
            return redirect()->route("inmuebles.listado");
        }
    }
}