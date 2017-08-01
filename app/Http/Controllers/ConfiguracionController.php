<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigGeneral;
use App\Models\ConfigServicio;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Log;

class ConfiguracionController extends Controller
{
    public function generales()
    {
        $generales = ConfigGeneral::all();

    	return view('configuracion.generales',
                        compact('generales'));
    }

    public function servicios()
    {
        $servicios = ConfigServicio::all();

        return view('configuracion.servicios',
                        compact('servicios'));
    }

    public function updateGenerales(Request $request, $id)
    {
        try {
            $general = ConfigGeneral::findOrFail($id);
            $general['nombre_empresa'] = $request['nombre_empresa'];
            $general['telefono_1'] = $request['telefono_1'];
            $general['telefono_2'] = $request['telefono_2'];
            $general['direccion_sede'] = $request['direccion_sede'];
            $general['ciudad'] = $request['ciudad'];
            $general['provincia'] = $request['provincia'];
            $general['pais'] = $request['pais'];
            $general['email'] = $request['email'];
            $general->save();

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::error('No se pudo actualizar el servicio');
        }

        Session::success('Servicio actualizado correctamente');

        return back();

    }

    public function updateServicios(Request $request, $id)
    {
        $this->validate($request, [
           'titulo' => 'required',
           'descripcion' => 'required',
           'valor' => 'required|int',
           'plazo_pago' => 'required|int',
        ]);

        try {
            $servicio = ConfigServicio::findOrFail($id);
            $servicio['titulo'] = $request['titulo'];
            $servicio['descripcion'] = $request['descripcion'];
            $servicio['valor'] = $request['valor'];
            $servicio['plazo_pago'] = $request['plazo_pago'];
            $servicio->save();

        } catch (\Exception $e) {
            Log::error($e->getMessage());

            Session::flash('error','No se pudo actualizar el servicio');
        }

        Session::flash('success','Servicio actualizado correctamente');

        return back();
    }
}
