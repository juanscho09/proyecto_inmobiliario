<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigGeneral;
use App\Models\ConfigServicio;
use App\Http\Requests;

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

    public function updateGenerales($id)
    {

    }

    public function updateServicios($id)
    {

    }
}
